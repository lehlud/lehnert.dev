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

    <style>
        <?= default_styles() ?>

        #front, #back {
            padding: 1.3em;
            border-radius: 0.8em;
            background-color: #f0f0f0;
        }

        #back {
            padding: 0.3em 1.3em 0.3em 1.3em;
            margin-top: 0.5em;
        }

        button {
            padding: 0.2em;
            font-size: 1em;
            margin: 0.35em;
        }
    </style>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1><?= $deck->title() ?></h1>

    <div>
        <div id="front"></div>
        <div id="back"></div>

        <button id="reveal">Aufdecken</button>

        <div id="next-buttons">
            <button id="false-answer">[q] Falsch</button>
            <button id="true-answer">[w] Gewusst</button>
        </div>
    </div>

    <script type="module">
        const deckId = <?= json_encode($deck->id) ?>;
        const cardIds = <?= json_encode($card_ids) ?>;

        let _cardScores = JSON.parse(localStorage['_cardScores'] || '{}');
        if (typeof _cardScores !== 'object') _cardScores = {};
        const saveScores = () => localStorage['_cardScores'] = JSON.stringify(_cardScores);

        const frontEl = document.getElementById('front');
        const revealEl = document.getElementById('reveal');
        const backEl = document.getElementById('back');
        const nextButtonsEl = document.getElementById('next-buttons');
        const falseAnswerEl = document.getElementById('false-answer');
        const trueAnswerEl = document.getElementById('true-answer');

        const hide = (el) => el.style.display = 'none';
        const unhide = (el) => el.style.display = 'block';
        const hidden = (el) => el.style.display === 'none';

        // init card scores
        cardIds.forEach(id => _cardScores[`${deckId}::${id}`] ||= 0);
        saveScores();

        const _boundScore = (score) => Math.max(0, Math.min(63/64, score ?? 0))
        const cardScore = (id) => _boundScore(_cardScores[`${deckId}::${id}`]);
        const setCardScore = (id, value) => _cardScores[`${deckId}::${id}`] = _boundScore(value);
        
        const recordFalse = (id) => setCardScore(id, cardScore(id) / 4);
        const recordTrue = (id) => {
            const prevScore = cardScore(id);
            setCardScore(id, cardScore(id) + (1 - cardScore(id)) / 2);
        };

        function getProbabilities() {
            const invScores = {};
            cardIds.forEach(id => invScores[id] = Math.pow(1 - cardScore(id), 3))

            const totalScore = Object.values(invScores).reduce((x, y) => x + y, 0);
            return Object.fromEntries(
                Object.entries(invScores).map(([key, value]) => [key, value / totalScore]),
            );
        }

        function pickNextCardId() {
            const probabilities = getProbabilities();

            const rand = Math.random();
            let cumulative = 0;
            for (const [id, prob] of Object.entries(probabilities)) {
                cumulative += prob;
                if (rand < cumulative) return id;
            }

            throw new Error('failed to pick card id');
        }

        async function getCard(id) {
            const res = await fetch(`./cards/${id}.htm`);
            const htm = await res.text();
            
            const [front, back] = htm.split('-----').map(s => s.trim());
            return { front, back };
        }

        let currentCardId;
        async function next() {
            hide(frontEl);
            hide(revealEl);
            hide(backEl);
            hide(nextButtonsEl);

            currentCardId = pickNextCardId();
            const nextCard = await getCard(currentCardId);

            frontEl.innerHTML = nextCard.front;
            backEl.innerHTML = nextCard.back;

            unhide(frontEl);
            unhide(revealEl);
        }

        revealEl.addEventListener('click', () => {
            hide(revealEl);
            unhide(backEl);
            unhide(nextButtonsEl);
        });

        falseAnswerEl.addEventListener('click', () => {
            hide(nextButtonsEl);

            recordFalse(currentCardId);
            saveScores();
            next();
        });

        trueAnswerEl.addEventListener('click', () => {
            hide(nextButtonsEl);

            recordTrue(currentCardId);
            saveScores();
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

            if (e.code === 'KeyW') {
                e.preventDefault();
                if (hidden(revealEl)) trueAnswerEl.click();
            }
        });

        next();

        window.logScores = () => console.log(Object.fromEntries(cardIds.map(id => [id, cardScore(id)])));
        window.logProbabilities = () => console.log(getProbabilities());
    </script>
</body>
</html>