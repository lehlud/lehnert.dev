<?php

require_once __DIR__ . '/lib/_index.php';

$id = (int) $_GET['id'];
$path = __DIR__ . "/blog/$id.svg";
if (!file_exists($path)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}

$svg = file_get_contents($path);
if (str_starts_with($svg, '<?xml')) {
    $svg = preg_replace('/^\s*<\?xml[^>]+>\s*/', '', $svg);
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <base target="_blank">

    <title>Blog</title>

    <style>
        html,
        body {
            min-height: max(100%, 100vh);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            display: flex;
            justify-content: center;
        }

        main>svg {
            width: min(95vw, 1000px);
            height: auto;
        }

        main>svg a {
            cursor: pointer;
        }

        main>svg a:hover {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <main>
        <?= $svg ?>
    </main>

</body>

</html>