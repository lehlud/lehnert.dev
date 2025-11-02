<?php

require_once __DIR__ . "/lib/_index.php";

$blogs = Blog::getAll();
usort($blogs, function ($a, $b) {
    return strtotime($b->date()) - strtotime($a->date());
});

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <title>lehnert.dev</title>
    <meta name="keywords" content="Ludwig,Ludwig Lehnert,Nürnberg,Pegnitz,Nuremberg,Informatik,Computer,Copmuter Science,FAU,Friedrich Alexander Universität,Erlangen" />

    <style>
        <?= default_styles() ?><?= common_styles() ?>

        body {
            font-size: 1.5rem;
        }

        @media screen and (max-width: 1100px) {
            body {
                font-size: 1.4rem;
            }
        }

        @media screen and (max-width: 700px) {
            body {
                font-size: 1.3rem;
            }
        }

        @media screen and (max-width: 550px) {
            body {
                font-size: 1.15rem;
            }
        }

        .social-links>* {
            padding: 0.25rem;
            display: grid;
            place-items: center;
        }

        .social-links img {
            width: 2rem;
        }

        .social-links>*:hover {
            background-color: lightgray;
            border-radius: 0.5rem;
        }
    </style>
</head>

<body style="max-width: 800px; margin: 0 auto 0 auto; padding: 16px;">
    <h1>Hey, I'm Ludwig</h1>

    <div style="margin-top: 2rem; display: flex; gap: 0.5rem;">
        <div style="display: flex; flex-direction: column; align-items: end;">
            <span>I work at</span>
            <span>&amp; at</span>
        </div>
        <div style="display: flex; flex-direction: column">
            <span><a target="_blank" href="https://siemens-healthineers.com">Siemens Healthineers</a></span>
            <span><a target="_blank" href="https://stuck-lehnert.de">our family business</a>.</span>
        </div>
    </div>

    <p style="margin-top: 0.8rem;">
        I study computer science at
        <a target="_blank" href="https://fau.de">FAU Erlangen</a>.
    </p>

    <p style="margin-top: 1rem;">
        I like skiing and
        <a target="_blank" href="https://www.fcn.de/">football</a>.
    </p>

    <div style="margin-top: 0.6rem; display: flex; gap: 0.5rem;">
        <div style="display: flex; flex-direction: column; align-items: end;">
            <span>I am a member of</span>
            <span>and</span>
        </div>
        <div style="display: flex; flex-direction: column">
            <span><a target="_blank" href="https://www.tv-eibach03.de/">TV Eibach 03</a></span>
            <span><a target="_blank" href="https://www.alpenverein-erlangen.de/">DAV Erlangen</a>.</span>
        </div>
    </div>

    <p style="margin-top: 2rem;">
        Here's my
        <a target="_blank" href="https://keys.openpgp.org/search?q=ludwig%40lehnert.dev">OpenPGP Key</a>.
    </p>

    <h3 style="margin-top: 2rem;">Social Links</h3>
    <div class="social-links" style="display: flex; gap: 0.75rem;">
        <a target="_blank" href="https://instagram.com/lehlud">
            <img src="/assets/instagram.svg" alt="Instagram" />
        </a>
        <a target="_blank" href="https://linkedin.com/in/ludwig-lehnert">
            <img src="/assets/linkedin.svg" alt="LinkedIn" />
        </a>
        <a target="_blank" href="https://github.com/lehlud">
            <img src="/assets/github.svg" alt="GitHub" />
        </a>
        <a target="_blank" href="https://gitea.cloud.lehnert.dev/explore/repos">
            <img src="/assets/git.svg" alt="Gitea" />
        </a>
    </div>

    <div style="margin-top: 2rem; display: flex; gap: 0.7rem;">
        <a href="/imprint">Imprint</a>
        <a href="/privacy">Privacy Policy</a>
        <a href="/sitemap.xml">Sitemap</a>
    </div>

    <h2 style="margin-top: 2rem;"><span class="none">Handwritten </span>Blog</h2>

    <?php foreach ($blogs as $blog): ?>
        <h3 style="margin-top: 0.4rem;"><a href="/blog/<?= $blog->id ?>"><?= $blog->title() ?></a></h3>
        <p><?= $blog->formatDate() ?></p>
    <?php endforeach; ?>

    <!-- SEO Tags -->
    <h1 class="none">Ludwig Lehnert</h1>
</body>

</html>