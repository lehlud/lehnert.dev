<?php

require_once __DIR__ . "/../lib/_index.php";

$links = [
    'Informatik' => [
        'Programmiersprachen' => [
            'Learn X in Y minutes' => 'https://learnxinyminutes.com/',
            'Prolog' => [
                'The Power of Prolog' => 'https://www.metalevel.at/prolog',
                'Efficient Prolog: A Practical Guide' => 'https://www.researchgate.net/publication/2820431_Efficient_Prolog_A_Practical_Guide',
                'The Art of Prolog' => 'https://mitpress.mit.edu/9780262691635/the-art-of-prolog/',
            ],
        ],
        'Forensik' => [
            'B. Carrier: File System Forensic Analysis' => 'https://raw.githubusercontent.com/Urinx/Books/master/Forensic/File%20System%20Forensic%20Analysis.pdf',
        ],
        'Compiler' => [
            'Michael I. Schwartzbach: Lecture Notes on Static Analysis' => 'https://lara.epfl.ch/w/_media/sav08:schwartzbach.pdf',
            'godbolt.org Compiler Explorer' => 'https://godbolt.org/',
            'dogbolt.org Decompiler Explorer' => 'https://dogbolt.org/',
        ],
        'Nicht kategorisiert' => [
            'PasteBin: homematic bidcos default aes key (November 2014)' => 'https://pastebin.com/eiDnuS8N',
            'Michael Gernoth: Dissecting HomeMatic AES' => 'https://git.zerfleddert.de/hmcfgusb/AES/',
        ],
    ],
    'Musik(theorie)' => [
        'Musiktheorie-Quiz fuer D1 (Bronze)' => 'https://linus-gnan.de/musiktheorie/',
    ],
    'Lesenswerte Buecher' => [
        'Der Schlüssel zum Spiel – Wie moderner Fußball funktioniert von Tobias Escher' => 'https://www.rowohlt.de/buch/tobias-escher-der-schluessel-zum-spiel-9783499001987',
        'Geschichte eines Deutschen von Sebastian Haffner' => 'https://de.wikipedia.org/wiki/Geschichte_eines_Deutschen',
        'Ein MANN, Ein BUCH von Eduard Augustin, Philipp V. Keisenberg, Christian Zaschke' => 'https://www.penguin.de/buecher/ein-mann-ein-buch/taschenbuch/9783442471829',
        'Die Wertformel von Dr. Julian Hosp' => 'https://www.m-vg.de/finanzbuchverlag/shop/article/24991-die-wertformel/',
        'No Place to Hide von Glenn Greenwald' => 'https://en.wikipedia.org/wiki/No_Place_to_Hide_%28Greenwald_book%29',
        'Anleitung zur Selbstüberlistung von Prof. Dr. Christian Rieck' => 'https://www.m-vg.de/yes/shop/article/24155-anleitung-zur-selbstueberlistung/',
    ],
    'Software' => [
        '[GitHub] Stylus Labs Write' => 'https://github.com/styluslabs/Write',
        '[GitHub] Helix Editor' => 'https://github.com/helix-editor/helix',
        '[GitHub] Stalwart Mail Server' => 'https://github.com/stalwartlabs/stalwart',
    ],
    'Andere Linksammlungen' => [
        'Linksammlung von Philip KALUĐERČIĆ' => 'https://wwwcip.cs.fau.de/~oj14ozun/links.html',
    ],
];

function path_id(array $path): string {
    $id = strtolower(join("_", $path));

    $id = preg_replace("/\s+/", "-", $id);

    $id = str_replace("ü", "ue", $id);
    $id = str_replace("ö", "oe", $id);
    $id = str_replace("ä", "ae", $id);
    $id = str_replace("ß", "ss", $id);

    $id = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $id);

    return $id;
}

function toc_html(array $links, array $path = []): string {
    $subcategories = [];
    foreach ($links as $name => $value) {
        if (is_array($value) && count($value) > 0) {
            $subcategories[$name] = $value;
        }
    }

    if (count($subcategories) <= 0) return '';

    $html = "<ul>\n";

    foreach ($links as $name => $value) {
        if (!is_array($value) || count($value) <= 0) continue;

        $catpath = [...$path, $name];
        $id = path_id($catpath);

        $html = $html . "<li><a href=\"#$id\">". htmlspecialchars($name) ."</a></li>\n";
        $html = $html . toc_html($value, $catpath);
    }

    return $html . "</ul>\n";
}

function links_html(array $links, array $path = []): string {
    $depth = count($path);

    $html = '';

    $direct_links = [];
    $subcategories = [];
    foreach ($links as $name => $value) {
        if (is_array($value)) {
            if (count($value)) $subcategories[$name] = $value;
        }
        else $direct_links[$name] = $value;
    }

    if (count($direct_links) > 0) {
        $html = $html . "<ul>\n";
        foreach ($direct_links as $name => $target) {
            $html = $html . "<li><a href=\"" . htmlspecialchars($target) . "\">" . htmlspecialchars($name) . "</a></li>\n";
        }
        $html = $html . "</ul>\n";
    }

    foreach ($subcategories as $name => $links) {
        $catpath = [...$path, $name];
        $id = path_id($catpath);

        $h_el = "h" . ($depth + 2);
        $title = htmlspecialchars($name);

        $html = $html . "<$h_el id=\"$id\">$title</$h_el>\n";
        $html = $html . links_html($links, $catpath) . "\n";
    }

    return $html;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sammlung interessanter Links</title>

    <style>
        <?= default_styles() ?>
    </style>
</head>
<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1>Sammlung interessanter Links</h1>

    <p>
        Hier findest du Links, die ich nuetzlich oder interessant finde und deshalb
        einfach irgendwo abspeichern wollte, sodass ich sie jederzeit wiederfinden
        kann.
    </p>

    <h2>Inhaltsverzeichnis</h2>
    <?= toc_html($links) ?>

    <?= links_html($links) ?>

    <p style="margin-top: 2em;">
        <a href="/imprint">Imprint</a>&nbsp;
        <a href="/privacy">Privacy Policy</a>&nbsp;
        <a href="/sitemap.xml">Sitemap</a>&nbsp;
    </p>
</body>
</html>