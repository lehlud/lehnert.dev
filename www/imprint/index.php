<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <title>Imprint</title>

    <style>
        body {
            margin: 0;
            padding: 2rem;
            background-color: #000000;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1rem;
            line-height: 1.6;
            zoom: 0.9;
        }

        .prompt::before {
            content: "ludwig@laptop:~$ ";
            color: #00ff88;
        }

        a {
            color: #00ffff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .comment {
            color: #666;
            font-style: italic;
            margin-bottom: 0;
        }

        .comment+* {
            margin-top: 0;
        }

        .cursor {
            display: inline-block;
            color: white;
            background-color: white;
            animation: blink 1s steps(1) infinite;
            margin-left: 6px;
            user-select: none;
        }

        @keyframes blink {
            50% {
                color: transparent;
                background-color: transparent;
            }
        }
    </style>
</head>

<body>
    <div class="prompt">cat impressum.txt</div>

    <p class="comment"># Angaben gemäß §5 TMG</p>
    <p>Ludwig Lehnert<br>Zedernstr. 41<br>90441 Nürnberg</p>

    <p class="comment"># Kontaktdaten</p>
    <p>E-Mail: <a href="mailto:info@lehnert.dev">info@lehnert.dev</a></p>

    <p class="comment"># Verantwortlich für die Inhalte (§ 55 Abs. 2 RStV)</p>
    <p>Ludwig Lehnert<br>Gleiche Adresse wie oben</p>

    <p class="comment"># Haftungsausschluss</p>
    <p>Dies ist eine persönliche Webseite ohne kommerzielle Absichten.</p>

    <div class="prompt">cat imprint.txt</div>

    <p class="comment"># Legal info required by § 5 TMG</p>
    <p>Ludwig Lehnert<br>Zedernstr. 41<br>90441 Nuremberg<br>Germany</p>

    <p class="comment"># Contact details</p>
    <p>Email: <a href="mailto:info@lehnert.dev">info@lehnert.dev</a></p>

    <p class="comment"># Content responsibility (§ 55 Abs. 2 RStV)</p>
    <p>Ludwig Lehnert<br>Same address as above</p>

    <p class="comment"># Disclaimer</p>
    <p>This is a personal website with no commercial intent.</p>

    <div class="prompt"><a href="/">exit</a><span class="cursor">I</span></div>
</body>

</html>