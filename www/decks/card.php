<?php

require_once __DIR__ . '/../lib/_index.php';

$deckId = $_GET['deck'];
$id = $_GET['id'];

$deck = Deck::get($deckId);
if (!$deck) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

$card = $deck->getCard($id);
if (!$card) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

header('Content-Type: application/json');

echo json_encode([
    'front' => $card->front_html,
    'back' => $card->back_html,
]);