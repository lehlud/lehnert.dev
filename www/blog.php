<?php

require_once __DIR__ . '/lib/_index.php';

$id = $_GET['id'];

$blog = Blog::get($id);
if ($blog === null) {
    $_GET['code'] = 404;
    require __DIR__ . '/error.php';
    exit;
}

$rand_imprint = mt_rand() % 6;
$rand_privacy = mt_rand() % 6;
$rand_comments = mt_rand() % 6;
$rand_send_comment = mt_rand() % 5;

function is_external_url(string $url): bool
{
    return str_starts_with($url, 'http');
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <meta name="keywords" content="ludwig lehnert,blog,<?= join(",", $blog->keywords()) ?>">

    <title><?= $blog->title() ?></title>

    <style>
        html,
        body {
            min-height: max(100%, 100vh);
            background: white;
        }

        body {
            width: min(100%, 800px);
            margin: auto;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            position: relative;
            width: 100%;
            aspect-ratio:
                <?= $blog->width() ?>
                /
                <?= $blog->height() ?>
            ;
        }

        .content img {
            display: block;
            width: 100%;
            height: auto;
        }

        .bookmarks {
            z-index: -1;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .bookmarks * {
            position: absolute;
            height: 10px;
            width: 100%;
        }

        .urls {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .urls a {
            position: absolute;
        }

        .urls a img {
            position: absolute;
            top: 0;
        }

        .urls a:hover {
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

        .legal-links {
            display: flex;
            justify-content: space-between;
        }

        .legal-links svg {
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
        <div class="content">
            <?php foreach ($blog->files() as $file): ?>
                <img src="/blog/<?= $blog->id ?>/<?= $file ?>">
            <?php endforeach; ?>
        </div>

        <div class="bookmarks">
            <?php foreach ($blog->bookmarks() as $bm): ?>
                <div id="<?= $bm['id'] ?>" style="top: <?= 100 * $bm['offset'] / $blog->height() ?>%;"></div>
            <?php endforeach; ?>
        </div>

        <div class="urls">
            <?php foreach ($blog->urls() as $url): ?>
                <a href="<?= $url['href'] ?>" <?php if (is_external_url($url['href']))
                      echo 'target="_blank"'; ?> style="
                        top: <?= 100 * $url['offset'][1] / $blog->height() ?>%;
                        left: <?= 100 * $url['offset'][0] / $blog->width() ?>%;
                        width: <?= 100 * $url['dimensions'][0] / $blog->width() ?>%;">
                    <img src="/blog/<?= $blog->id ?>/<?= $url['src'] ?>" style="width: 100%; height: auto;">
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <div style="height: 100px"></div>

    <footer>
        <div class="send-comment">
            <?= get_svg(__DIR__ . "/assets/blog/send-comment$rand_send_comment.svg") ?>
        </div>

        <div style="height: 100px"></div>

        <div class="legal-links">
            <?= get_svg(__DIR__ . "/assets/blog/imprint$rand_imprint.svg") ?>
            <?= get_svg(__DIR__ . "/assets/blog/privacy$rand_privacy.svg") ?>
        </div>
    </footer>

    <div style="height: 100px"></div>
</body>

</html>