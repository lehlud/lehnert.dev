<?php

require_once __DIR__ . "/lib/_index.php";

[$points, $edges, $sizes] = stars_random();

$blogs = Blog::getAll();
usort($blogs, function ($a, $b) {
    return strtotime($b->date) - strtotime($a->date);
});

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <title>lehnert.dev</title>

    <meta name="description" content="Welcome to my digital playground.">
    <meta name="keywords" content="Ludwig Lehnert,Nürnberg,Pegnitz,Nuremberg,Informatik,Computer,Copmuter Science" />

    <style>
        <?= default_styles() ?>
        <?= common_styles() ?>
        <?= stars_styles() ?>

        #stars-edges {
            z-index: 0;
        }

        #stars-container {
            z-index: 1;
        }

        main {
            color: white;
            pointer-events: none;
        }

        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            text-align: center;
            padding: 2rem;

        }

        h1 {
            font-size: 3.5rem;
            background: linear-gradient(90deg, #00ffff, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glow 3s ease-in-out infinite alternate;
        }

        p {
            font-size: 1.2rem;
            max-width: 600px;
            margin-top: 1rem;
            color: #ccc;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;

            pointer-events: auto;
        }

        .social-links a {
            padding: 0.75rem;
            font-size: 1rem;
            background: #00ffff;
            color: #1e1e2f;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            transition: background 0.3s ease;

            display: grid;
            place-items: center;
        }

        .social-links a:hover {
            background: #ff00ff;
            color: white;
        }

        .legal-links {
            margin-top: 1rem;
            display: flex;
            gap: 0.5rem;

            pointer-events: auto;
        }

        a {
            color: white;
        }

        a:hover {
            opacity: 0.8;
        }

        .blog-entries {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            gap: 1rem;
        }

        .blog-entry {
            width: min(90vw, 600px);
            background: rgba(32, 32, 54, 0.49);
            border-left: 4px solid #00ffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding: 1rem;
            backdrop-filter: blur(3px);
        }

        .blog-entry * {
            margin: 0;
        }

        .blog-entry a {
            pointer-events: auto;
        }


        @keyframes glow {
            from {
                text-shadow: 0 0 10px #00ffff;
            }

            to {
                text-shadow: 0 0 20px #ff00ff;
            }
        }
    </style>
</head>

<body>
    <?= stars_edges_svg($points, $edges) ?>

    <?= stars_container($points, $sizes) ?>

    <script>
        <?= stars_script($points, $edges, $sizes) ?>
    </script>

    <main style="position: relative; z-index: 2;">
        <div class="welcome">
            <h1>Hey, I'm Ludwig 🚀</h1>
            <p>Welcome to my digital playground.</p>

            <div class="social-links">
                <a target="_blank" href="https://instagram.com/lehlud">
                    <img src="/assets/instagram.svg" alt="" width="25" />
                </a>
                <a target="_blank" href="https://linkedin.com/in/ludwig-lehnert">
                    <img src="/assets/linkedin.svg" alt="" width="25" />
                </a>
                <a target="_blank" href="mailto:info@lehnert.dev">
                    <img src="/assets/email.svg" alt="" width="25" />
                </a>
                <a target="_blank" href="https://gitea.cloud.lehnert.dev/explore/repos">
                    <img src="/assets/git.svg" alt="" width="25" />
                </a>
                <a target="_blank" href="https://github.com/lehlud">
                    <img src="/assets/github.svg" alt="" width="25" />
                </a>
            </div>

            <div class="legal-links">
                <a href="/imprint">Imprint</a>
                <a href="/privacy">Privacy Policy</a>
            </div>
        </div>

        <div class="blog-entries">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-entry">
                    <h2><a href="/blog/<?= $blog->id ?>"><?= $blog->title ?></a></h2>
                    <p><?= $blog->formatDate() ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>