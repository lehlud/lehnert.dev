<?php

require_once __DIR__ . "/../lib/_index.php";

$links = [
    'Informatik' => [
        'Programmiersprachen' => [
            'Learn X in Y minutes;;Kurzüberblicke über alle bekannteren Programmiersprachen' => 'https://learnxinyminutes.com/',
            'C' => [
                'Linux Manpages Online' => 'https://man.cx/',
                'Coroutines in C' => 'https://www.chiark.greenend.org.uk/~sgtatham/coroutines.html',
            ],
            'Go' => [
                'Go Tutorials' => 'https://go.dev/doc/tutorial/',
            ],
            'Prolog' => [
                'The Power of Prolog' => 'https://www.metalevel.at/prolog',
                'Efficient Prolog: A Practical Guide' => 'https://www.researchgate.net/publication/2820431_Efficient_Prolog_A_Practical_Guide',
                'The Art of Prolog' => 'https://mitpress.mit.edu/9780262691635/the-art-of-prolog/',
            ],
        ],
        'Competitive Programming' => [
            'Starting Competitive Programming - Steps and Mistakes' => 'https://youtu.be/bVKHRtafgPc',
            'Antti Laaksonen: Competitive Programmer’s Handbook' => 'https://cses.fi/book/book.pdf',
            'Algorithms for Competitive Programming' => 'https://cp-algorithms.com/',
        ],
        'Forensik/Dateisysteme' => [
            'B. Carrier: File System Forensic Analysis' => 'https://raw.githubusercontent.com/Urinx/Books/master/Forensic/File%20System%20Forensic%20Analysis.pdf',
        ],
        'Compiler' => [
            'Michael I. Schwartzbach: Lecture Notes on Static Analysis' => 'https://lara.epfl.ch/w/_media/sav08:schwartzbach.pdf',
            'Mapping High Level Constructs to LLVM IR' => 'https://mapping-high-level-constructs-to-llvm-ir.readthedocs.io',
            'godbolt.org Compiler Explorer' => 'https://godbolt.org/',
            'dogbolt.org Decompiler Explorer' => 'https://dogbolt.org/',
            'System V ABI' => 'https://refspecs.linuxbase.org/elf/x86_64-abi-0.99.pdf',
        ],
        'Fuzzing' => [
            'AFL' => 'https://github.com/google/AFL',
            'AFL++' => 'https://github.com/AFLplusplus/AFLplusplus',
            'OSS-Fuzz' => 'https://github.com/google/oss-fuzz',
            'WinAFL;;Windows-Port von AFL' => 'https://github.com/googleprojectzero/winafl',
            'DynamoRIO;;Standard-Instrumentierung für WinAFL' => 'https://dynamorio.org/',
        ],
        'Medizinische Informatik' => [

        ],
        'Nicht kategorisiert' => [
            'homematic bidcos default aes key (November 2014)' => 'https://pastebin.com/eiDnuS8N',
            'Michael Gernoth: Dissecting HomeMatic AES' => 'https://git.zerfleddert.de/hmcfgusb/AES/',
        ],
    ],
    'Software' => [
        'Notizen/Annotation' => [
            'Xournal++;;handgeschriebene Notizen &amp; PDF-Annotationen' => 'https://github.com/xournalpp/xournalpp',
            'Stylus Labs Write;;handgeschriebene Notizen' => 'https://github.com/styluslabs/Write',
        ],
        'Editor' => [
            'Vim' => 'https://www.vim.org/',
            'Helix Editor;;multimodaler Editor, kann mehr als <code>vim</code>' => 'https://github.com/helix-editor/helix',
        ],
        'Self-Hosting' => [
            'Stalwart;;OSS E-Mail- &amp; Kollaborationsserver' => 'https://github.com/stalwartlabs/stalwart',
            'Vaultwarden;;alternative OSS-Implementierung der Bitwarden API' => 'https://github.com/dani-garcia/vaultwarden',
            'Z-Push;;Exchange-Active-Sync (EAS) Proxy' => 'https://z-push.org/',
        ],
        'Web-Apps' => [
            'Haikei;;damit kann man coole <a href="https://en.wikipedia.org/wiki/SVG">SVG</a>-Muster generieren' => 'https://app.haikei.app/',
            'JWT Debugger;;mit <a href="https://en.wikipedia.org/wiki/JSON_Web_Token">JWT</a>s rumspielen' => 'https://www.jwt.io/',
        ],
        'nicht-Chromium-basierte Browser' => [
            '_' => '
                Es ist wichtig, nicht-Chromium-basierte Browser wie Firefox zu verwenden,
                um das Machtmonopol von Google auf die Entwicklung der Web-Standards einzudämmen;
                z.B. sind Chrome, Edge, Opera (GX), Vivaldi und Brave alles Chromium-basierte
                Browser.
            ',
            'Firefox;;Gecko' => 'https://firefox.com/',
            'Tor Browser;;einfacher Zugang Tor-Netzwerk ("Darknet")' => 'https://www.torproject.org/download/',
            'Safari;;WebKit' => 'https://www.apple.com/safari/',
            'Epiphany/GNOME Web;;WebKitGTK' => 'https://apps.gnome.org/Epiphany/',
        ],
        'Firefox-Erweiterungen' => [
            'uBlock Origin;;Werbe-Blocker' => 'https://ublockorigin.com/',
            'NoScript;;JavaScript-Blocker' => 'https://noscript.net/',
        ],
    ],
    'Fußballtheorie' => [
        // 'Glossar;;von mir selbst erstellt' => '/fussballtheorie/glossar',
        'DFB-Akademie – Taktik & Spielanalyse;;Kurze Infos über Studien zu Einzelthemen' => 'https://www.dfb-akademie.de/taktik-spielanalyse/-/id-11008483/',
    ],
    'Lesenswerte Bücher' => [
        '_' => '
            Man könnte vielleicht vermuten, dass hier einfach alle Bücher stehen, die ich
            überhaupt jemals gelesen habe, tatsächlich sind hier aber nur die Bücher aufgelistet,
            die ich wirklich für lesenswert halte.
        ',
        'Der Schlüssel zum Spiel – Wie moderner Fußball funktioniert;;Tobias Escher' => 'https://www.rowohlt.de/buch/tobias-escher-der-schluessel-zum-spiel-9783499001987',
        'Geschichte eines Deutschen;;Sebastian Haffner' => 'https://de.wikipedia.org/wiki/Geschichte_eines_Deutschen',
        'Ein MANN, Ein BUCH;;Eduard Augustin, Philipp V. Keisenberg, Christian Zaschke' => 'https://www.penguin.de/buecher/ein-mann-ein-buch/taschenbuch/9783442471829',
        'Die Wertformel;;Dr. Julian Hosp' => 'https://www.m-vg.de/finanzbuchverlag/shop/article/24991-die-wertformel/',
        'No Place to Hide;;Glenn Greenwald' => 'https://en.wikipedia.org/wiki/No_Place_to_Hide_%28Greenwald_book%29',
        'Anleitung zur Selbstüberlistung;;Prof. Dr. Christian Rieck' => 'https://www.m-vg.de/yes/shop/article/24155-anleitung-zur-selbstueberlistung/',
    ],
    'Musik(theorie)' => [
        'Musipedia;;Musik-Wiki (und -Suchmaschine)' => 'https://www.musipedia.org/',
        'Musiktheorie-Quiz für D1 (Bronze)' => 'https://linus-gnan.de/musiktheorie/',
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

function link_name(string $name, string $url) {
    if (str_ends_with($url, '.pdf')) {
        $name = "[PDF] $name";
    } else if (str_contains($url, 'github.com')) {
        $name = "[GitHub] $name";
    } else if (str_contains($url, 'pastebin.')) {
        $name = "[PasteBin] $name";
    } else if (str_contains($url, "youtube.") || str_contains($url, "youtu.be")) {
        $name = "[YouTube] $name";
    }

    return htmlspecialchars($name);
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

    if (array_key_exists('_', $links)) {
        $html = $links['_'];
        $links = [...$links];
        unset($links['_']);
    }

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
            [$name, $desc] = [...explode(';;', $name), null];

            $link_html = "<a href=\"" . htmlspecialchars($target) . "\">" . link_name($name, $target) . "</a>";
            if ($desc) {
                $link_html = $link_html . " – $desc";
            }

            $html = $html . "<li>$link_html</li>\n";
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
<html lang="de">
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
        Hier findest du Links, die ich nützlich oder interessant finde und deshalb
        einfach irgendwo abspeichern wollte, sodass ich sie jederzeit wiederfinden
        kann.
    </p>

    <h2>Inhaltsverzeichnis</h2>
    <?= toc_html($links) ?>

    <?= links_html($links) ?>

    <footer>
        <p style="margin-top: 2em;">
            <a href="/imprint">Impressum</a>&nbsp;
            <a href="/privacy">Datenschutz</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>
    </footer>
</body>
</html>