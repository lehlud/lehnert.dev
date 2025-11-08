<?php

require_once __DIR__ . '/lib/_index.php';

if (!isset($_GET['id'])) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}

$id = $_GET['id'];

$blog = Blog::get($id);
if ($blog === null) {
    $_GET['code'] = 404;
    require __DIR__ . '/error.php';
    exit;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">

    <meta name="keywords" content="Ludwig Lehnert,Blog,<?= join(",", $blog->keywords()) ?>">

    <title><?= $blog->title() ?></title>

    <style>
        <?= default_styles() ?>
    </style>

    <script async src="/static/js/mathjax-tex-mml-chtml.js"></script>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <?= $blog->transcript_html() ?>

    <footer style="margin-top: 2rem;">
        <p>
            <a href="/imprint">Imprint</a>&nbsp;
            <a href="/privacy">Privacy Policy</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>
    </footer>
</body>

</html>