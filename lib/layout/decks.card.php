<?php

require_once __DIR__ . '/../_index.php';

if (!isset($_GET['deckId']) || !isset($_GET['cardId'])) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}

$deckId = $_GET['deckId'];
$cardId = $_GET['cardId'];

$deck = Deck::get($deckId);
if (!$deck) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

$card = $deck->getCard($cardId);
if (!$card) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

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

        #front, #back {
            padding: 0.8em;
        }

        #back {
            padding: 0.3em 0.8em 0.3em 0.8em;
            margin-top: 1em;
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
            <?= $card->front_html ?>
        </div>

        <hr>

        <div id="back">
            <?= $card->back_html ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderMathInElement(document.body, {
                delimiters: [
                    {left: "$$", right: "$$", display: true},
                    {left: "$", right: "$", display: false}
                ]
            });
        });
    </script>
</body>
</html>