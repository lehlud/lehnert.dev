<?php

require_once __DIR__ . '/../_index.php';

if (!isset($_GET['id'])) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}

$id = $_GET['id'];
$deck = Deck::get($id);

if (!$deck) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

$card_ids = $deck->getCardIds();

?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deck: <?= $deck->title() ?></title>

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <style>
        <?= default_styles() ?>

        #front img, #back img {
            width: 100%;
            height: auto;

            max-height: 60vh;
            object-fit: contain;

            display: block;
        }

        #front, #back, #next-buttons {
            padding: 0.8em;
        }

        #back {
            padding: 0.3em 0.8em 0.3em 0.8em;
            margin-top: 1em;
        }

        button {
            padding: 0.2em;
            font-size: 1em;
            margin-right: 0.35em;
        }

        #reveal {
            margin-top: 1em;
            margin-left: 0.8em;
        }

        hr {
            opacity: 0.7;
        }
    </style>


<?php if ($deck->requireKatex()) : ?>
    <link rel="stylesheet" href="/_static/katex/katex.min.css">
    <script defer src="/_static/katex/katex.min.js"></script>
    <script defer src="/_static/katex/contrib/auto-render.min.js"></script>
<?php endif; ?>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1><?= $deck->title() ?></h1>

    <div>
        <div id="front">
            <noscript>
                <h3>He! Ohne JavaScript läuft hier nichts!</h3>
            </noscript>
        </div>
        <hr>
        <div id="back"></div>

        <button id="reveal">[␣] Aufdecken</button>

        <div id="next-buttons">
            <button id="false-answer">[q] Falsch</button>
            <button id="true-answer">[␣] Gewusst</button>
        </div>
    </div>

    <script type="module">
        import { cyrb128, sfc32, stepping } from '/_static/pseudo-random.mjs';

        const deckId = <?= json_encode($deck->id) ?>;
        const cardIds = <?= json_encode($card_ids) ?>;

        // init seedable pseudo random number generator
        const seed = cyrb128(deckId);
        const rand = stepping(sfc32(seed[0], seed[1], seed[2], seed[3]));
        {
            const initialRandCount = parseInt(localStorage[`_randCount:${deckId}`] || 'asdf');
            if (!isNaN(initialRandCount)) {
                for (let i = 0; i < initialRandCount; i++) rand();
            }
        }
        const saveRandCount = () => localStorage[`_randCount:${deckId}`] = rand.steps().toString();
        // wrapper to avoid excessive init iterations
        const nextRand = () => {
            if (rand.steps() > 500) rand.reset();

            if (rand.steps() === 0) {
                for (let i = 0; i < 20; i++) rand();
            }

            return rand();
        };

        // init card scores
        let _cardScores = JSON.parse(localStorage[`_cardScores:${deckId}`] || '{}');
        if (typeof _cardScores !== 'object') _cardScores = {};
        Object.keys(_cardScores).filter(id => !cardIds.includes(id)).forEach(id => delete _cardScores[id]);
        cardIds.forEach(id => _cardScores[id] ||= 0);
        const saveScores = () => localStorage[`_cardScores:${deckId}`] = JSON.stringify(_cardScores);

        // re-init last card id
        let avoidCardIds = JSON.parse(localStorage[`_avoidCards:${deckId}`] || '[]');
        if (!Array.isArray(avoidCardIds)) avoidCardIds = [];
        if (avoidCardIds.length > 2) avoidCardIds = avoidCardIds.slice(-2);
        const addAvoidCardId = (id) => avoidCardIds = id ? [...avoidCardIds, id].slice(-2) : avoidCardIds;
        const saveAvoidCardIds = () => localStorage[`_avoidCards:${deckId}`] = JSON.stringify(avoidCardIds);

        const saveState = () => {
            saveRandCount();
            saveScores();
            saveAvoidCardIds();
        };

        const _boundScore = (score) => Math.max(0, Math.min(63/64, score ?? 0))
        const cardScore = (id) => _boundScore(_cardScores[id]);
        const setCardScore = (id, value) => _cardScores[id] = _boundScore(value);
        
        const recordFalse = (id) => setCardScore(id, 1/128 + cardScore(id) / 4);
        const recordTrue = (id) => {
            const prevScore = cardScore(id);
            setCardScore(id, cardScore(id) + (1 - cardScore(id)) / 2);
        };

        function getProbabilities(_cardIds = cardIds) {
            const invScores = {};
            _cardIds.forEach(id => invScores[id] = Math.pow(1 - cardScore(id), 2))

            const totalScore = Object.values(invScores).reduce((x, y) => x + y, 0);
            return Object.fromEntries(
                Object.entries(invScores).map(([key, value]) => [key, value / totalScore]),
            );
        }

        /**
         * Pick a next card id.
         * 
         * The return value may never equal the values specified in `avoidIds`.
         * 
         * For unseen cards (score = 0), the lexicographically coming first
         * of them is chosen.
         * This is good for introduction purposes and deterministic behaviour.
         */
        function pickNextCardId(avoidIds = []) {
            const availableCardIds = new Set(cardIds);
            const unseenCardIds = new Set();

            // limit to a circle of 10 "new" cards ("new" != "unseen")
            let newCardCount = 0;
            for (const cardId of [...cardIds].toSorted()) {
                if (cardScore(cardId) > 0.7) continue;

                newCardCount += 1;
                if (newCardCount > 10) availableCardIds.delete(cardId);
                if (!cardScore(cardId)) unseenCardIds.add(cardId);
            }

            let probabilities = getProbabilities([...availableCardIds]);

            if (unseenCardIds.size) {
                probabilities['___unseen'] = 0;
                for (const cardId of unseenCardIds) {
                    if (cardId in probabilities) {
                        probabilities['___unseen'] += probabilities[cardId];
                        delete probabilities[cardId];
                    }
                }
            }

            // sorting is just to make things 100% deterministic
            probabilities = Object.entries(probabilities).sort(
                ([aKey], [bKey]) => aKey.localeCompare(bKey),
            );

            const choose = () => {
                const randValue = nextRand();
                let cumulative = 0;
                for (const [id, prob] of probabilities) {
                    cumulative += prob;
                    if (randValue < cumulative) return id;
                }
            };

            let chosen;
            do {
                chosen = choose();
            } while (avoidIds.includes(chosen));

            if (chosen === '___unseen') {
                // sort to make things 100% deterministic (just like above)
                const sortedUnseen = [...unseenCardIds].toSorted();

<?php if ($deck->randomizeOrder()) : ?>
                const randCopy = rand.copy();
                return sortedUnseen.at(Math.floor(randCopy() * sortedUnseen.length));
<?php else : ?>
                return sortedUnseen.at(0);
<?php endif; ?>
            }

            return chosen;
        }

        const frontEl = document.getElementById('front');
        const revealEl = document.getElementById('reveal');
        const backEl = document.getElementById('back');
        const nextButtonsEl = document.getElementById('next-buttons');
        const falseAnswerEl = document.getElementById('false-answer');
        const trueAnswerEl = document.getElementById('true-answer');

        const hide = (el) => el.style.display = 'none';
        const unhide = (el) => el.style.display = 'block';
        const hidden = (el) => el.style.display === 'none';

        async function getCard(id) {
            const res = await fetch(`./cards/${id}.htm`);
            const htm = await res.text();
            
            const [front, back] = htm.split('-----').map(s => s.trim());
            return { front, back };
        }

        let currentCardId = null;
        async function next() {
            hide(frontEl);
            hide(revealEl);
            hide(backEl);
            hide(nextButtonsEl);

            currentCardId = pickNextCardId(avoidCardIds);
            const nextCard = await getCard(currentCardId);

            frontEl.innerHTML = nextCard.front;
            backEl.innerHTML = nextCard.back;

<?php if ($deck->requireKatex()) : ?>
            [frontEl, backEl].forEach(el => window.renderMathInElement(el, {
                delimiters: [
                    {left: "$$", right: "$$", display: true},
                    {left: "$", right: "$", display: false}
                ],
            }));
<?php endif; ?>

            unhide(frontEl);
            unhide(revealEl);
        }

        revealEl.addEventListener('click', () => {
            hide(revealEl);
            unhide(backEl);
            unhide(nextButtonsEl);
        });

        falseAnswerEl.addEventListener('click', async () => {
            hide(nextButtonsEl);

            recordFalse(currentCardId);
            addAvoidCardId(currentCardId);
            saveState();
            next();
        });

        trueAnswerEl.addEventListener('click', () => {
            hide(nextButtonsEl);

            recordTrue(currentCardId);
            addAvoidCardId(currentCardId);
            saveState();
            next();
        });

        document.addEventListener('keydown', (e) => {
            if (e.code === 'Space') {
                e.preventDefault();
                if (hidden(revealEl)) trueAnswerEl.click();
                else revealEl.click();
            }

            if (e.code === 'KeyQ') {
                e.preventDefault();
                if (hidden(revealEl)) falseAnswerEl.click();
            }
        });

        next();

        window.logScores = () => console.log(Object.fromEntries(cardIds.map(id => [id, cardScore(id)])));
        window.logProbabilities = () => console.log(getProbabilities());
    </script>
</body>
</html>
