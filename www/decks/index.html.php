<?php

require_once __DIR__ . '/../../lib/_index.php';

$decks = Deck::getAll();

?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decks – Spaced Repitition</title>

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <style>
        <?= default_styles() ?>
    </style>

    <script async src="/_static/js/mathjax-tex-mml-chtml.js"></script>
</head>
<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1>Decks</h1>
    <ul>
        <?php foreach ($decks as $deck) : ?>
            <li><a href="/decks/<?= $deck->id ?>/"><?= $deck->title() ?></a> (<?= $deck->getCardCount() ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>