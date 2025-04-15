<?php

require_once __DIR__ . '/../lib/_index.php';

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    <title>Privacy Policy</title>

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
            font-family: "Inter", sans-serif;
            text-align: center;
            padding: 2rem;
        }

        h1 {
            font-size: 2.5rem;
            background: linear-gradient(90deg, #00ffff, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            animation: glitch 2s infinite;
        }

        .legal-section {
            text-align: left;
            max-width: 700px;
            margin: 2rem auto;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid #00ffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .legal-section p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #ccc;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <main>
        <h1>Impressum<br />Imprint</h1>
        <div class="legal-section">
            <p><b>Angaben gemäß § 5 TMG:</b></p>
            <p>
                Ludwig Lehnert <br />
                Zedernstr. 41 <br />
                90441 Nürnberg <br />
                Deutschland
            </p>
            <p>
                <b>Kontakt:</b> <br />
                <!-- Telefon: [Ihre Telefonnummer] <br /> -->
                E-Mail: info@lehnert.dev
            </p>
        </div>
    </main>

</body>

</html>