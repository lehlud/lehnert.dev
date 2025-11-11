<?php

require_once __DIR__ . "/../lib/_index.php";

$blogs = Blog::getAll();
usort($blogs, function ($a, $b) {
    return strtotime($b->date()) - strtotime($a->date());
});

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <title>Personal Homepage of Ludwig Lehnert</title>
    <meta name="keywords" content="Ludwig,Ludwig Lehnert,Nürnberg,Pegnitz,Nuremberg,Informatik,Computer,Copmuter Science,FAU,Friedrich Alexander Universität,Erlangen" />

    <style>
        <?= default_styles() ?>
        
        <?= common_styles() ?>

        .social-links>* {
            padding: 0.25rem;
            display: grid;
            place-items: center;
        }

        .social-links>*:hover {
            opacity: 0.5;
        }

        .social-links img {
            width: 1.5rem;
        }

        td {
            padding: 0;
        }
    </style>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1 style="margin-top: 0.5rem; font-size: 2.2em;">
        Hey, I'm <u>Ludwig</u>
    </h1>

    <p>
        I work at <a target="_blank" href="https://siemens-healthineers.com">Siemens Healthineers</a>
        &amp; at <a target="_blank" href="https://stuck-lehnert.de">our family business</a>.
        <br>
        I study computer science at
        <a target="_blank" href="https://fau.de">FAU Erlangen</a>.
    </p>

    <p>
        I like skiing and
        <a target="_blank" href="https://www.fcn.de/">football</a>.
        <br>
        I am a member of <a target="_blank" href="https://www.tv-eibach03.de/">TV Eibach 03</a>
        and <a target="_blank" href="https://www.alpenverein-erlangen.de/">DAV Erlangen</a>.
    </p>

    <p>
        You can find my
        <a target="_blank" href="https://en.wikipedia.org/wiki/Pretty_Good_Privacy">OpenPGP</a> Key
        <a target="_blank" href="https://keys.openpgp.org/search?q=ludwig%40lehnert.dev">here</a>.
    </p>

    <h2 style="margin-bottom: 0;">Content</h2>
    <ul style="margin-top: 0.5em;">
        <li><a href="/links.html">Linksammlung</a></li>
        <li><a href="/tools/">Tools</a></li>
        <li><a href="/decks/">Decks</a></li>
    </ul>

    <h2 style="margin-bottom: 0;"><span class="none">Handwritten </span>Blog</h2>
    <a href="/rss.xml" style="font-size: 0.8em;">RSS Feed</a>

    <?php foreach ($blogs as $blog): ?>
        <h3 style="margin-top: 0.4rem; margin-bottom: 0;">
            <a href="/blog/<?= $blog->id ?>/"><?= $blog->title() ?></a>
        </h3>
        <p style="margin: 0;"><?= $blog->formatDate() ?></p>
    <?php endforeach; ?>

    <h3 style="margin-bottom: 0;">Social Links</h3>
    <div class="social-links" style="display: flex; gap: 0.75rem;">
        <a target="_blank" href="https://instagram.com/lehlud">
            <img src="/_assets/instagram.svg" alt="Instagram" />
        </a>
        <a target="_blank" href="https://linkedin.com/in/ludwig-lehnert">
            <img src="/_assets/linkedin.svg" alt="LinkedIn" />
        </a>
        <a target="_blank" href="https://github.com/lehlud">
            <img src="/_assets/github.svg" alt="GitHub" />
        </a>
        <a target="_blank" href="https://gitea.cloud.lehnert.dev/explore/repos">
            <img src="/_assets/git.svg" alt="Gitea" />
        </a>
    </div>

    <footer>
        <p>
            <a href="/imprint.html">Imprint</a>&nbsp;
            <a href="/privacy.html">Privacy Policy</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>

        <p>&copy; <?= date("Y") ?> Ludwig Lehnert</p>

        <!-- SEO Tags -->
        <h1 class="none">Ludwig Lehnert</h1>
        <h2 class="none">Computer Science/Informatik</h2>
        <h2 class="none">Nürnberg/Nuremberg/Erlangen</h2>
        <p class="none">This is the personal homepage of Ludwig Lehnert</p>
    </footer>
</body>

</html>
