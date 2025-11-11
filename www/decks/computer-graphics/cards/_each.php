<?php

$cardFile = $argv[1];

$_GET['deckId'] = basename(dirname(__DIR__));
$_GET['cardId'] = substr($cardFile, 0, -4);

require_once __DIR__.'/../../../../lib/layout/decks.card.php';

