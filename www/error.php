<?php

require_once __DIR__ . '/lib/_index.php';

$code = 500;

if (isset($_GET['code'])) {
    $code = (int) $_GET['code'];
}

$msg = '🪐 Unknown error! Something went wrong in the fabric of spacetime.';
$action = 'Stabilize systems';

$dest = $_SERVER['REQUEST_URI'] ?? '/';


switch ($code) {
    case 400:
        $msg = '🛰️ Bad request! Your signal got scrambled mid-transmission—packet lost in space.';
        $action = 'Resend request';
        break;

    case 401:
        $msg = '🔒 Unauthorized! You need proper credentials to dock with this system.';
        $action = 'Initiate login';
        $dest = '/login';
        break;

    case 403:
        $msg = '🚫 Forbidden! This space sector is read-only for your clearance level.';
        $action = 'Return to ship';
        $dest = '/';
        break;

    case 404:
        $msg = '🛸 Page not found! It might’ve been abducted or deleted by rogue AIs.';
        $action = 'Beam me back';
        $dest = '/';
        break;

    case 500:
        $msg = '💥 System failure! The mainframe just had a meltdown and is crying in binary 😢 (01001100...).';
        $action = 'Reboot core';
        break;

    case 501:
        $msg = '🧪 Not implemented! This function is still in alpha testing on Mars.';
        $action = 'Go back safely';
        break;

    case 502:
        $msg = '🌐 Bad gateway! The relay between galaxies misrouted your request.';
        $action = 'Retry transmission';
        break;

    case 503:
        $msg = '☕ Offline! Our servers are recharging on the dark side of the moon.';
        $action = 'Check back soon';
        break;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <title>Oops!</title>

    <style>
        <?= default_styles() ?>
        <?= common_styles() ?>

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            color: white;
            text-align: center;
            font-family: "Inter", sans-serif;
            overflow: hidden;
        }

        h1 {
            font-size: 6rem;
            margin: 0;
            background: linear-gradient(90deg, #ff0066, #00ffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glitch 2s infinite;
        }

        p {
            font-size: 1.25rem;
            margin: 1rem 0 2rem;
            color: #ccc;
            max-width: 600px;
        }

        .btn {
            text-decoration: none;
            background: #00ffff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 999px;
            font-size: 1rem;
            color: #1e1e2f;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #ff0066;
            color: white;
        }
    </style>
</head>

<body>
    <main>
        <h1><?= $code ?></h1>

        <p><?= $msg ?></p>

        <a class="btn" href="<?= $dest ?>"><?= $action ?></a>
    </main>

</body>

</html>