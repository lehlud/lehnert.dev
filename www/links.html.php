<?php

require_once __DIR__ . "/../lib/_index.php";

$links = [
    'Informatik' => [
        'Programmiersprachen' => [
            'Learn X in Y minutes;;Kurzüberblicke für alle bekannteren Programmiersprachen' => 'https://learnxinyminutes.com/',
            'C' => [
                'man.cx;;Online Linux Man-Pages' => 'https://man.cx/',
                'Coroutines in C;;asynchronen C-Code richtig aufbauen' => 'https://www.chiark.greenend.org.uk/~sgtatham/coroutines.html',
                'Beispiel Fork-Bombe;;auf meiner CIP-Seite' => 'https://wwwcip.cs.fau.de/~at69yvos/',
            ],
            'Dart' => [
                '_' => '
                    <a href="https://en.wikipedia.org/wiki/Dart_(programming_language)">Dart</a> ist eine
                    recht unbekannte Programmiersprache, die aber eigentlich ganz cool ist, weil sie viele
                    <a href="https://en.wikipedia.org/wiki/Object-oriented_programming">OOP</a>-Konzepte aus
                    Java übernimmt und erweitert. Ein großer Vorteil von Dart gegenüber Java ist, dass es
                    nach JavaScript, <a href="https://en.wikipedia.org/wiki/WebAssembly">WASM</a> sowie zu
                    nativen Maschinencode kompiliert werden kann. Alternativ kann es aber auch in der
                    Dart VM <a href="https://en.wikipedia.org/wiki/Just-in-time_compilation">Just-in-Time</a>
                    ausgeführt werden.
                ',
                'DartPad;;Online-Entwicklungsumgebung' => 'https://dartpad.dev/',
            ],
            'Go' => [
                'Go Tutorials;;Einführung und häufige Use Cases' => 'https://go.dev/doc/tutorial/',
                'Go Playground;;Online-Entwicklungsumgebung' => 'https://go.dev/play/',
            ],
            'Java' => [
                'MOOC Java Programming Course;;von der Uni Helsinki' => 'https://java-programming.mooc.fi/',
            ],
            'Java-/TypeScript' => [
                'MDN JavaScript Guides' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript#javascript_guides',
                'TypeScript Handbook;;offizielles TypeScript-Handbuch' => 'https://www.typescriptlang.org/docs/handbook/intro.html',
                'Can I use;;Browser-Support-Checker für alle erdenklichen Features' => 'https://caniuse.com/',
                'Sate of JS;;jährliche Umfragen über das JavaScript-Ökosystem' => 'https://stateofjs.com/',
            ],
            'Prolog' => [
                'The Power of Prolog' => 'https://www.metalevel.at/prolog',
                'A Tour of Prolog' => 'https://youtu.be/8XUutFBbUrg',
                'Efficient Prolog: A Practical Guide' => 'https://www.researchgate.net/publication/2820431_Efficient_Prolog_A_Practical_Guide',
                'The Art of Prolog' => 'https://mitpress.mit.edu/9780262691635/the-art-of-prolog/',
            ],
        ],
        'Algorithmik' => [
            'Introduction to Algorithms;;Thomas Cormen et al. (<a href="/backup/edutechlearners.com/download/Introduction_to_algorithms-3rd%20Edition.pdf">Backup</a>)' => 'https://edutechlearners.com/download/Introduction_to_algorithms-3rd%20Edition.pdf',
        ],
        'Competitive Programming' => [
            'Algorithms for Competitive Programming' => 'https://cp-algorithms.com/',
            'Competitive Programmer’s Handbook;;Antti Laaksonen (<a href="/backup/cses.fi/book/book.pdf">Backup</a>)' => 'https://cses.fi/book/book.pdf',
            'Starting Competitive Programming - Steps and Mistakes' => 'https://youtu.be/bVKHRtafgPc',
        ],
        'Forensik/Dateisysteme' => [
            'File System Forensic Analysis;;Brian Carrier (<a href="/backup/raw.githubusercontent.com/Urinx/Books/master/Forensic/File%20System%20Forensic%20Analysis.pdf">Backup</a>)' => 'https://raw.githubusercontent.com/Urinx/Books/master/Forensic/File%20System%20Forensic%20Analysis.pdf',
        ],
        'Compiler' => [
            'Lecture Notes on Static Analysis;;Michael I. Schwartzbach (<a href="/backup/lara.epfl.ch/w/_media/sav08:schwartzbach.pdf">Backup</a>)' => 'https://lara.epfl.ch/w/_media/sav08:schwartzbach.pdf',
            'Mapping High Level Constructs to LLVM IR' => 'https://mapping-high-level-constructs-to-llvm-ir.readthedocs.io',
            'godbolt.org Compiler Explorer' => 'https://godbolt.org/',
            'dogbolt.org Decompiler Explorer' => 'https://dogbolt.org/',
            'System V ABI' => 'https://refspecs.linuxbase.org/elf/x86_64-abi-0.99.pdf',
        ],
        'Fuzzing' => [
            'Miller, Frederiksen, So: Study of the Reliability of UNIX Utilities' => 'https://dl.acm.org/doi/pdf/10.1145/96267.96279',
            'AFL' => 'https://github.com/google/AFL',
            'AFL++' => 'https://github.com/AFLplusplus/AFLplusplus',
            'OSS-Fuzz' => 'https://github.com/google/oss-fuzz',
            'WinAFL;;Windows-Port von AFL' => 'https://github.com/googleprojectzero/winafl',
            'DynamoRIO;;Standard-Instrumentierung für WinAFL' => 'https://dynamorio.org/',
        ],
        'Systemprogrammierung' => [
            'SP1 Quiz;;von Philip KALUĐERČIĆ (<a href="/backup/wwwcip.cs.fau.de/~oj14ozun/sp1/quiz/">Backup</a>)' => 'https://wwwcip.cs.fau.de/~oj14ozun/sp1/quiz/',
            'SP2 Quiz;;von Philip KALUĐERČIĆ (<a href="/backup/wwwcip.cs.fau.de/~oj14ozun/sp2/quiz/">Backup</a>)' => 'https://wwwcip.cs.fau.de/~oj14ozun/sp2/quiz/',
        ],
        'Signalverarbeitung' => [
            'Nyquist-Shannon-Abtasttheorem' => 'https://en.wikipedia.org/wiki/Nyquist%E2%80%93Shannon_sampling_theorem'
        ],
        'Medizinische Informatik' => [

        ],
        'LaTeX' => [
            'Modern Latex;;Matt Kline (<a href="/backup/assets.bitbashing.io/modern-latex.pdf">Backup</a>)' => 'https://assets.bitbashing.io/modern-latex.pdf',
            'Detexify;;Erkennung gezeichneter LaTeX-Symbole' => 'https://detexify.kirelabs.org/classify.html',
        ],
        'Nicht kategorisiert' => [
            'homematic bidcos default aes key (November 2014)' => 'https://pastebin.com/eiDnuS8N',
            'Michael Gernoth: Dissecting HomeMatic AES' => 'https://git.zerfleddert.de/hmcfgusb/AES/',
        ],
    ],
    'Alternative Netzwerke' => [
        'Tor-Netzwerk' => [
            '_' => '
                Why should people care about surveillance?
                <blockquote>
                    <i>Edward Snowden:</i>
                    Because even if you\'re not doing anything wrong, you\'re being watched and recorded.
                </blockquote>

                Das <a href="https://en.wikipedia.org/wiki/Tor_(network)">Tor-Netzwerk</a>
                (in den Medien auch "Darknet" oder "Darkweb") ist ein Werkzeug gegen
                Überwachung und Zensur und für Anonymität im Internet. Zusätzlich zu den Funktionen zur
                Verbesserung der Privätsphäre bietet das Tor-Netzwerk noch einen weiteren Vorteil:
                es können sog. Hidden Services bereitgestellt werden, die außerhalb des Tor-Netwerks (also
                im "Clear Web") nicht erreichbar sind und ohne unverhältmäßig großen Aufwand nicht zensiert
                bzw. Zwangsabgeschaltet werden können.
            ',
            'DNM Bible;;Leitfaden für das Nicht-Erwischt-Werden' => 'https://darknetbible.info/',
            'Tor Browser;;Firefox-basierter Browser für das Tor-Netzwerk' => 'https://www.torproject.org/download/',
            'tor.taxi;;Sammlung aktueller Onion-Links für gängige Seiten' => 'https://tor.taxi/',
        ],
        'Usenet' => [
            '_' => '
                Das <a href="https://en.wikipedia.org/wiki/Usenet">Usenet</a> ist im Prinzip
                ein dezentrales Forum, das datenpersistent ist und Nutzern Anonymität gewährleisten kann
                (wenn sie sich bestimmt verhalten). Es war in den 90er Jahren besonders populär, heute
                wird es eigentlich nur noch für den Austausch von Dateien (mitunter auch nicht-lizensiert,
                z.B. Filme &amp; Serien) verwendet.
            ',
            'r/usenet Wiki' => 'https://www.reddit.com/r/usenet/wiki/index/',
            'Usenet Starter Guide' => 'https://www.reddit.com/r/usenet/comments/18q7r0f/usenet_starter_guide/',
        ],
    ],
    'Software' => [
        'Notizen/Annotation' => [
            'Xournal++;;handgeschriebene Notizen &amp; PDF-Annotationen' => 'https://github.com/xournalpp/xournalpp',
            'Stylus Labs Write;;handgeschriebene Notizen' => 'https://github.com/styluslabs/Write',
        ],
        'Editor' => [
            'Vim' => 'https://www.vim.org/',
            'Emacs' => 'https://www.gnu.org/software/emacs/',
            'Helix Editor;;multimodaler Editor, kann mehr als <code>vim</code>' => 'https://github.com/helix-editor/helix',
            'Visual Studio Code;;einfach zu benutzender, modular erweiterbarer GUI-Editor' => 'https://code.visualstudio.com/',
            'Zed;;VSCode-Alternative, geschrieben in <code>rust</code>' => 'https://zed.dev/',
        ],
        'Self-Hosting' => [
            'Coolify;;containerisierte Apps bequem selber hosten' => 'https://coolify.io/',
            'Nextcloud;;OSS-Alternative zu Google Drive/OneDrive' => 'https://nextcloud.com/',
            'SyncThing;;Sync-Server für Dateien/Verzeichnisse' => 'https://syncthing.net/',
            'Stalwart;;OSS E-Mail- &amp; Kollaborationsserver' => 'https://github.com/stalwartlabs/stalwart',
            'Vaultwarden;;alternative OSS-Implementierung zu Bitwarden' => 'https://github.com/dani-garcia/vaultwarden',
            'Z-Push;;Exchange-Active-Sync (EAS) Proxy' => 'https://z-push.org/',
        ],
        'Web-Apps' => [
            'Haikei;;damit kann man coole <a href="https://en.wikipedia.org/wiki/SVG">SVG</a>-Muster generieren' => 'https://app.haikei.app/',
            'JWT Debugger;;mit <a href="https://en.wikipedia.org/wiki/JSON_Web_Token">JWT</a>s rumspielen' => 'https://www.jwt.io/',
            'CyberChef;;mit Encodings rumspielen' => 'https://cyberchef.org/',
            'JSFuck;;JavaScript Obfuscation-Tool' => 'https://jsfuck.com/',
            'Mermaid Live;;Interaktive Umgebung für die Erstellung von <a href="https://mermaid.js.org/">Mermaid</a>-Diagrammen' => 'https://mermaid.live/edit',
        ],
        'nicht-Chromium-basierte Browser' => [
            '_' => '
                Es ist wichtig, nicht-Chromium-basierte Browser wie Firefox zu verwenden,
                um das Machtmonopol von Google auf die Entwicklung der Web-Standards einzudämmen;
                Chrome, Edge, Opera (GX), Vivaldi und Brave sind alle Beispiele für Chromium-basierte
                Browser.
            ',
            'Firefox;;Gecko' => 'https://firefox.com/',
            'Safari;;WebKit' => 'https://www.apple.com/safari/',
            'Epiphany/GNOME Web;;WebKitGTK' => 'https://apps.gnome.org/Epiphany/',
        ],
        'Firefox-Erweiterungen' => [
            'uBlock Origin;;Werbe-Blocker' => 'https://ublockorigin.com/',
            'NoScript;;JavaScript-Blocker' => 'https://noscript.net/',
            'ClearURLs;;entfernt Tracking-Info aus URLs' => 'https://addons.mozilla.org/en-US/firefox/addon/clearurls/',
        ],
    ],
    'Fußballtheorie' => [
        'Übersicht;;noch Work in Progress' => '/fussballtheorie/uebersicht.html',
        'DFB-Akademie – Taktik & Spielanalyse;;Kurze Infos über Studien zu Einzelthemen' => 'https://www.dfb-akademie.de/taktik-spielanalyse/-/id-11008483/',
    ],
    'Kommunikation' => [
        'PARA-Framework' => '/kb/kommunikation/PARA.html',
    ],
    'Lesenswerte Bücher' => [
        '_' => '
            Man könnte vielleicht vermuten, dass hier einfach alle Bücher stehen, die ich
            überhaupt jemals gelesen habe, tatsächlich sind hier aber nur diejenigen Bücher aufgelistet,
            die ich wirklich für lesenswert halte.
        ',
        'Der Schlüssel zum Spiel – Wie moderner Fußball funktioniert;;Tobias Escher' => 'https://www.rowohlt.de/buch/tobias-escher-der-schluessel-zum-spiel-9783499001987',
        'Geschichte eines Deutschen;;Sebastian Haffner' => 'https://de.wikipedia.org/wiki/Geschichte_eines_Deutschen',
        'Ein MANN, Ein BUCH;;Eduard Augustin, Philipp V. Keisenberg, Christian Zaschke' => 'https://www.penguin.de/buecher/ein-mann-ein-buch/taschenbuch/9783442471829',
        'No Place to Hide;;Glenn Greenwald' => 'https://en.wikipedia.org/wiki/No_Place_to_Hide_%28Greenwald_book%29',
        'Anleitung zur Selbstüberlistung;;Prof. Dr. Christian Rieck' => 'https://www.m-vg.de/yes/shop/article/24155-anleitung-zur-selbstueberlistung/',
        'The Pirate Book;;Nicolas Maigret &amp; Maria Roszkowska (<a href="/backup/thepiratebook.net/wp-content/uploads/The_Pirate_Book.pdf">Backup</a>)' => 'https://thepiratebook.net/wp-content/uploads/The_Pirate_Book.pdf',
    ],
    'Musik(theorie)' => [
        'Musipedia;;Musik-Wiki (und -Suchmaschine)' => 'https://www.musipedia.org/',
        'Musiktheorie-Quiz für D1 (Bronze)' => 'https://linus-gnan.de/musiktheorie/',
    ],
    'Andere Linksammlungen' => [
        'Linksammlung von Philip KALUĐERČIĆ;;(<a href="/backup/wwwcip.cs.fau.de/~oj14ozun/links.html">Backup</a>)' => 'https://wwwcip.cs.fau.de/~oj14ozun/links.html',
        'Linksammlung des BKA' => 'https://www.bka.de/DE/IhreSicherheit/WichtigeLinks/wichtigelinks_node.html',
        'BSI Home-Office Check' => 'https://www.bsi.bund.de/SharedDocs/Downloads/DE/BSI/Cyber-Sicherheit/Themen/checkliste-home-office_linkliste.pdf?__blob=publicationFile&v=5',
    ],
];

function path_id(array $path): string {
    $id = join("_", $path);
    return make_id($id);
}

function link_name(string $name, string $url) {
    [$url_without_query] = explode('?', $url);

    if (str_ends_with($url_without_query, '.pdf')) {
        $name = "[PDF] $name";
    } else if (str_contains($url, 'github.com')) {
        $name = "[GitHub] $name";
    } else if (str_contains($url, 'pastebin.')) {
        $name = "[PasteBin] $name";
    } else if (str_contains($url, 'reddit.')) {
        $name = "[Reddit] $name";
    } else if (str_contains($url, "youtube.") || str_contains($url, "youtu.be")) {
        $name = "[YouTube] $name";
    } else if (str_contains($url, "wikipedia.") || str_contains($url, "youtu.be")) {
        $name = "[Wiki] $name";
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
        $html = '<p>' . $links['_'] . "</p>\n";
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
    <title>Linksammlung</title>

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <style>
        <?= default_styles() ?>
    </style>
</head>
<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1>Linksammlung</h1>

    <p>
        Hier findest du Links, die ich nützlich oder interessant finde und deshalb
        einfach irgendwo abspeichern wollte, damit ich sie jederzeit wiederfinden
        kann.
    </p>

    <h2>Inhaltsverzeichnis</h2>
    <?= toc_html($links) ?>

    <?= links_html($links) ?>

    <footer>
        <p style="margin-top: 2em;">
            <a href="/imprint.html">Impressum</a>&nbsp;
            <a href="/privacy.html">Datenschutz</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>
    </footer>
</body>
</html>
