<?php

require_once __DIR__ . '/../_index.php';

if (!isset($_GET['id'])) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}

$id = $_GET['id'];

$blog = Blog::get($id);
if ($blog === null) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <meta name="keywords" content="Ludwig Lehnert,Blog,<?= join(",", $blog->keywords()) ?>">

    <title><?= $blog->title() ?></title>

    <style>
        <?= default_styles() ?>
    </style>

    <link rel="stylesheet" href="/_static/katex/katex.min.css">
    <script defer src="/_static/katex/katex.min.js"></script>
    <script defer src="/_static/katex/contrib/auto-render.min.js"></script>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <?= $blog->transcript_html() ?>

    <footer style="margin-top: 2rem;">
        <p>
            <a href="/imprint.html">Imprint</a>&nbsp;
            <a href="/privacy.html">Privacy Policy</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>
    </footer>

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