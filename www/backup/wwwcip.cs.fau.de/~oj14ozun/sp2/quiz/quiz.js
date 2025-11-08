// Copyright (C) 2024	Philip Kaludercic

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.

"use strict";

// request query parameters once (this can be done before the page is
// finished loading everything).
const params = new URLSearchParams(window.location.search);

// a string to prefix local storage keys with, so as to avoid
// conflicts with other quizzes.
const ls_prefix = window.location.toString().split("").reduce(
    function (acc, val) {	// Fowler–Noll–Vo Hash (FNV-1a)
	return ((acc ^ val) * 0x01000193);
    }, 0x811c9dc5).toString(36) + "_";

function shuf(arr) {            // shuffle ARR using Fisher–Yates
    for (let i = 0; i < arr.length - 1; i++) {
        const j = Math.floor(Math.random() * arr.length);
        const tmp = arr[j];
        arr[j] = arr[i];
        arr[i] = tmp;
    }
    return arr;
}

function create_gitlab_issue(title, desc) {
    if (!gitlab_base) {
        return "#";             // empty link
    }

    return `${gitlab_base}/issues/new?issue[title]=${encodeURIComponent(title)}&issue[description]=${encodeURIComponent(desc)}`;
}

function init(questions) {
    console.table(questions);

    // the part of the state of the website is controlled by CSS
    // classes applied to the document root.  We fetch this class list
    // here to make manipulating it easier.
    const state  = document.documentElement.classList;

    // configure the info button
    const info_toggle = document.getElementById("info-toggle");
    info_toggle.addEventListener("click", function (event) {
        state.toggle("open");
    });
    info_toggle.addEventListener("keydown", function (event) {
        // prevent CR from toggling the info panel, by dismissing
        // every key event as invalid
        return false;
    });

    // shared state variables
    let current;                    // current question
    let opts = [];                  // list of options as currently displayed

    let progress = JSON.parse(
	window.localStorage.getItem(ls_prefix + "progress")
    ) || {};

    // seconds during which a question remains "recent", and we wish
    // to avoid presenting it again.
    const cooldown = 1000 * 60 * 5;

    function get_data(q) {
        const data = progress[q.id] || {};
        if (!data["right"]) data["right"] = 0;
        if (!data["wrong"]) data["wrong"] = 0;
        if (!data["timestamp"]) data["timestamp"] = Date.now() - 10 * cooldown;
        return data;
    }

    function evaluate(q) {
        const data = get_data(q);

        return (1 - Math.random() ** 3) * (data["right"] ** 2 - data["wrong"])
            + cooldown / (1 + Date.now() - data["timestamp"])
            + 6 * Math.random() - 3;
    }

    function update_stats(q) {
        const seen = document.getElementById("seen");
        seen.max = Object.keys(questions).length;
        seen.value =
            (Object.keys(progress).length || 0) +
            (progress.hasOwnProperty(q.id) ? 0 : 1);
        seen.title = seen.innerText =
            `${seen.value} von ${seen.max}`;

	function adjust(meter) {
            meter.optimum = 0.95 * meter.max;
            meter.high = 0.8 * meter.max;
            meter.low = 0.5 * meter.max;
	}

        const correct = document.getElementById("correct");
	let max = 0, value = 0;
        for (const key in progress) {
            if (progress[key]["right"] > progress[key]["wrong"])
                value++;
            max++;
        }
	if (0 == max) {
	    correct.max = 1; correct.value = 0;
            correct.title = correct.innerText =
		`Es wurden noch Fragen beantwortet`;
	} else {
            correct.max = max;
            correct.value = value;
	    adjust(correct);
            correct.title = correct.innerText =
		`${correct.value} von ${correct.max}`;
	}

        const data = get_data(q);
        const success = document.getElementById("success");
	if (0 == data.right + data.wrong) {
	    success.max = 1; success.value = 0;
            success.title = success.innerText =
		`Diese Frage wurde noch nie beantwortet`;
	} else {
            success.max = data.right + data.wrong || 1;
            success.value = data.right;
	    adjust(success);
            success.title = success.innerText =
		`${success.value} von ${success.max}`;
	}
    }

    function remember(q, ok) {
        const data = get_data(q);

        if (ok) {
            data["right"]++;
        } else {
            data["wrong"]++;
        }
        data["timestamp"] = Date.now();

        // store in local storage
        progress[q.id] = data;
        window.localStorage.setItem(
	    ls_prefix + "progress",
	    JSON.stringify(progress));
    }

    function pick() {
        const qid = params.get("show");
        if (qid) {
            if (params.has("solution")) {
                state.add("answer");
            }
            const q = questions.find(q => q.id == qid);
            if (q) {
                return q;
            }
            console.error("Invalid ID: " + qid);
        }

        let choice = questions[0];
        let worst  = evaluate(choice);

        // FIXME: Replace this with a proper priority queue
        for (let i = 0; i < questions.length; i++) {
            const q = questions[i];
            let val = evaluate(q);

            if (val <= worst) {
                choice = q;
                worst = val;
            }
        }

        return choice;
    }

    // display the next next question
    function display(q) {
        const answers = document.getElementById("answers");
        const text = document.getElementById("text");
        const media = document.getElementById("media");
        const metadata = document.getElementById("metadata-data");
        const action = document.getElementById("action");

        // insert question
        text.innerHTML = q.question;

        // insert metadata
        metadata.innerText = q.source;

        // load image, if specified
        if (q.media) {
            media.style.display = (media.src = q.media) ? "block" : "none";
        } else {
            media.style.display = "none";
        }

        // try to ensure that the options appear in a different order,
        // unless a specific question was requested
        if (!params.has("show"))
            shuf(q.options);

        // remove the previous options, if any, and add the new ones
        while (answers.firstChild)
            answers.removeChild(answers.firstChild);
        opts = [];
        for (let i = 0; i < q.options.length; i++) {
            const oid = q.id + "_" + i;
            const o = q.options[i];
            const li = document.createElement("li");
            const input = document.createElement("input");
            const option = document.createElement("label");
            const answ = document.createElement("div");
            const comm = document.createElement("div");

            // prepare the option container
            option.classList.add("option");
            option.setAttribute("for", oid);

            // prepare checkbox
            input.type = q.multiple ? "checkbox" : "radio";
            input.setAttribute("id", oid);
            input.setAttribute("name", "answer");
            input.addEventListener("click", function (event) {
                state.add("tried");
            });
            input.disabled = params.has("solution");
            opts[i] = input;

            // insert answer
            answ.innerHTML = o.option;

            // insert (and hide) comment
            let fallback = "Falsch";
            switch (o.correct) {
            case true:
                comm.classList.add("correct");
                fallback = "Wahr";
                break;
            case null:
                comm.classList.add("maybe");
                fallback = "Unsicher";
                break;
            }
            comm.innerHTML = o.comment || fallback;
            comm.classList.add("comment");

            // assemble everything to be added to the <li>
            option.appendChild(input);
            option.appendChild(answ);
            li.appendChild(option);
            li.appendChild(comm);

            answers.appendChild(li);
        }

        // remember current question
        current = q;

        if (!params.has("solution")) {
            // reset the answer state
            state.remove("answer");
            state.remove("wrong");
            state.remove("right");
        }

        // display question metadata
        update_stats(q);

        // update report button
        let url = new URL(window.location);
        let usp = new URLSearchParams(url.search);
        usp.set("show", q.id);
        url.search = usp.toString();

        document.getElementById("report").href = create_gitlab_issue(
            `Problem mit der Frage: "${text.innerText}" (${q.source})`,
            `(Ersetze diese Klammern mit einer Erklärung des Problem.)

Siehe <${url.toString()}&solution=>.`);

        // update permalink
        document.getElementById("perma").href = "?" + usp.toString();
    }

    function submit() {
        let ok = true;

        // check all answers
        for (let i = 0; i < current.options.length; i++) {
            const checked = opts[i].checked;
            const correct = current.options[i].correct;

            if (correct != null && checked != correct) { // wrong answer
                ok = false;
            }

            opts[i].disabled = true;
        }

        // respond to result
        if (ok) {
            state.add("right");
        } else {
            state.add("wrong");
        }
        remember(current, ok);

        // update question metadata
        update_stats(current);

        // set answer mode
        state.add("answer");
        state.remove("tried");
        action.disabled = false;
    }

    // listen to keys
    document.addEventListener("keyup", function (event) {
        const action = document.getElementById("action");

        switch (event.key) {
            // shortcuts for first 10 options
        case "1": case "2": case "3": case "4": case "5":
        case "6": case "7": case "8": case "9": case "0": {
            const n = Number(event.key)-1;
            if (n in opts)
                opts[n].click();
            break;
        }

        case "Enter":               // shortcut for action button
            action.click();
            break;

        case "Escape":              // close info section
            document.documentElement.classList.remove("open");
            break;
        }
    });

    // setup action button
    action.addEventListener("click", function (event) {
        if (state.contains("answer")) {
            // remove any permalink
            if (params.get("show")) {
                window.location.search = "";
            } else {
                display(pick());
            }
        } else if (state.contains("tried")) {
            submit();
        }
    });

    display(pick());
}

window.addEventListener("load", function (event) {
    let quiz_url = params.get("quiz");
    if (!quiz_url) {
        const match = window.location.href.match(/\/(\w+)\.html$/);
        let quiz_name;
        if (match) {
            quiz_name = match[1];
        } else {
            quiz_name = "quiz";
        }
        quiz_url = `./${quiz_name}.json`;
    }

    // query json specification of quiz
    fetch(quiz_url).then(function (response) {
        const main = document.querySelector("main");

        function display_error(msg) {
            main.innerHTML = msg + `

<a class="shy" href="${create_gitlab_issue("Fehler während der Initialisierung", "(Ersetze diese Klammern mit einer Erklärung des Problem.)")}">Problem via GitLab melden</a>`;
            main.classList.add("broken");
        }

        if (response.status !== 200) {
            console.table(response);
            console.table(response.statusText);

            display_error(`<h1>Fehler beim Abrufanforderung der Quiz Daten</h1>

<pre>URL: <a href="${quiz_url}">${quiz_url}</a>
Status: <abbr title="${response.statusText}">${response.status}</abbr>
</pre>`);
        } else {
            response.json().then(function (quiz_data) {
                if (!(quiz_data instanceof Array)) {
                    display_error(`<h1>Ungültige Antwort</h1>
<p>
Es war erwartet, dass <code>${quiz_url}</code> eine Liste von Fragen aufgelöst wird, ergab aber stattdessen:
</p>
<pre>${quiz_data}</pre>`);
                    return;
                }

                if (quiz_data.length == 0) {
                    display_error(`<h1>Fragendatenbank Leer</h1>
<p>
Die Datenbank an Fragen konnte erfolgreich abgerufen werden, hat aber
keine Einträge enthalten.
</p>`);
                    return;
                }

                init(shuf(quiz_data));
            }).catch(function (error) {
                console.log(error);
                display_error(`<h1>Laufzeitfehler</h1>

<pre>${error}</pre>`);
            });
        }
    });

    document.getElementById("title").innerHTML = document.title = quiz_title;
    document.getElementById("desc").innerHTML = quiz_description;
});
