<?php

require_once __DIR__ . '/lib/_index.php';

$id = (int) $_GET['id'];

$blog = Blog::get($id);
if ($blog === null) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}

$svgs = $blog->getSVGs();

$rand_imprint = mt_rand() % 6;
$rand_privacy = mt_rand() % 6;
$rand_comments = mt_rand() % 6;
$rand_send_comment = mt_rand() % 5;

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <base target="_blank">

    <meta name="keywords" content="ludwig lehnert,blog,<?= join(",", $blog->keywords) ?>">

    <title><?= $blog->title ?></title>

    <style>
        html,
        body {
            min-height: max(100%, 100vh);
            background: white;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        main>* {
            display: block;
            width: min(100vw, 1000px);
            height: auto;
        }

        svg .hyperref {
            cursor: pointer;
        }

        svg .hyperref:hover {
            opacity: 0.6;
        }

        .send-comment {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .send-comment svg {
            max-height: 3rem;
            height: 7vw;
            min-height: 1.5rem;
            width: auto;
        }

        .bottom-links {
            display: flex;
            justify-content: space-between;
        }

        .bottom-links svg {
            max-height: 4rem;
            height: 10vw;
            min-height: 2rem;
            width: auto;
            padding: 0 2rem 0 2rem;
        }
    </style>
</head>

<body>
    <main>
        <?php foreach ($svgs as $svg): ?>
            <?= $svg ?>
        <?php endforeach; ?>

        <div class="send-comment">
            <?= get_svg(__DIR__ . "/assets/blog/send-comment$rand_send_comment.svg") ?>
        </div>

        <div style="height: 100px"></div>

        <div class="bottom-links">
            <?= get_svg(__DIR__ . "/assets/blog/imprint$rand_imprint.svg") ?>
            <?= get_svg(__DIR__ . "/assets/blog/privacy$rand_privacy.svg") ?>
        </div>

        <div style="height: 100px"></div>
    </main>

</body>

</html>