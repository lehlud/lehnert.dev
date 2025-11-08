<?php

require_once __DIR__ . '/../lib/_index.php';

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
            margin-top: 1.5em;
        }

        #reveal, #next {
            margin-top: 1em;
            padding: 0.5em;
            font-size: 1.2em;
        }
    </style>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1><?= $deck->title() ?></h1>

    <div>
        <div id="front"></div>
        <button id="reveal">Aufdecken</button>
        <div id="back"></div>
        <button id="next">Weiter</button>
    </div>

    <script>
        const deckId = <?= json_encode($deck->id) ?>;
        const cardIds = <?= json_encode($card_ids) ?>;

        const frontEl = document.getElementById('front');
        const revealEl = document.getElementById('reveal');
        const backEl = document.getElementById('back');
        const nextEl = document.getElementById('next');

        function hide(el) {
            el.style.display = 'none';
        }

        function unhide(el) {
            el.style.display = 'block';
        }

        async function getNextId() {
            return cardIds[Math.floor(Math.random() * cardIds.length)];
        }

        async function getCard(id) {
            const res = await fetch(`./card.php?deck=${deckId}&id=${id}`);
            return await res.json();
        }

        async function next() {
            hide(frontEl);
            hide(revealEl);
            hide(backEl);
            hide(nextEl);

            const nextId = await getNextId();
            const nextCard = await getCard(nextId);

            frontEl.innerHTML = nextCard.front;
            backEl.innerHTML = nextCard.back;

            unhide(frontEl);
            unhide(revealEl);
        }

        function reveal() {
            hide(revealEl);
            unhide(backEl);
            unhide(nextEl);
        }

        revealEl.addEventListener('click', reveal);
        nextEl.addEventListener('click', next);

        document.addEventListener('keydown', (e) => {
            if (e.code === 'Space') {
                e.preventDefault();

                if (revealEl.style.display === 'none') {
                    next();
                } else {
                    reveal();
                }
            }
        });

        next();
    </script>
</body>
</html>