<?php

require_once __DIR__ . "/../lib/_index.php";

$glossary = [
    'Taktik' => '
        \(T = (S_P, f_A, \Omega)\), wobei<br>
        [\(S_P\)]: Menge der Anweisungen des Trainers an die Spieler (Plan)<br>
        [\(f_A: S_P \mapsto \Omega \)]: Abbildung von Anweisungen auf Ausführungen \(\Omega\)<br>
        Dabei ist \(f_A\) linkstotal, jedoch nicht rechtseindeutig.
    ',
    'Individualtaktik' => 'Menge der taktischen Elemente, die Aktionen eines einzelnen Spielers betreffen.',
    'Mannschaftstaktik' => 'Menge der taktischen Elemente, die alle Spieler einer Mannschaft betreffen.',
    'Gruppentaktik' => 'Menge der taktischen Elemente, die Aktionen mehrerer Spieler, jedoch nicht die gesamte Mannschaft betreffen.',
    'Strategie' => 'Menge der über mehrere Spiele hinweg gleichbleibenden taktischen Elemente.',

    'Formation' => 'Richtline des Trainers zur Aufstellung der Mannschaft auf dem Feld.',
    'System' => 'Menge der taktischen Elemente, die die Ausführung einer Formation betreffen.',

    'Angreifer' => 'Mannschaft mit Ballbesitz.',
    'Verteidiger' => 'Mannschaft ohne Ballbesitz.',

    'Pressing' => 'Der Versuch, über mindestens einen Zweikampf den Ballbesitz zu erlangen.',
    'stellen (Aktion)' => 'Positioniert sich ein Verteidiger vor dem Ballführenden, ohne in einen Zweikampf zu gehen, so <i>stellt</i> er ihn.',

    'Mannorientierung' => 'Orientierung des Verteidigers an der Position der Angreifer.',
    'Raumorientierung' => 'Orientierung des Verteidigers an der Position seiner Mitspieler und der Position des Balls.',

    'Breite' => 'Horizontale Ausdehnung des Spielfeldes.',
    'Tiefe' => 'Vertikale Ausdehnung des Spielfeldes.',

    'Deckungsschatten' => 'Der nicht bespielbare Raum "hinter" einem Verteidiger.',
    'Verschieben' => 'Raumorientierte Bewegung der Verteidiger zur Neuausrichtung des Deckungsschattens.',

    'Passkanal' => 'Passweg, der durch mindestens zwei einzelne Pässe realisiert wird.',
    
    'Abwehrkette' => 'Positionierung der Verteidiger auf gleicher Tiefe und in äquidistantem Abstand zueinander.',

    'vertikale Kettenkonformität' => '
        Invertiertes Mittelmaß der absoluten Tiefendifferenz der Spieler einer Abwehrkette von der mittleren Tiefe der Abwehrkette.<br>
        \(\text{KKonf}_T = n \cdot (\sum_{i=1}^n |T_i - T_\varnothing|)^{-1}\), wobei<br>
        [\(n\)]: Anzahl der Spieler in der Abwehrkette<br>
        [\(T_i\)]: Tiefe des \(i\)-ten Spielers der Abwehrkette<br>
        [\(T_\varnothing = \frac{1}{n} \cdot \sum_{i=1}^n T_i\)]: mittlere Tiefe der Abwehrkette
    ',
    'horizontale Kettenkonformität' => '
        Invertiertes Mittelmaß der absoluten Differenz aus dem Abstand der Spieler einer Abwehrkette zueinander und dem Verhältnis aus Breite der Abwehrkette und Anzahl der Verteiger in der Abwehrkette.<br>
        \(\text{KKonf}_B = n \cdot (\sum_{i=1}^{n-1} |d_{B_\varnothing} - d_{B_{i,i+1}}|)^{-1}\), wobei<br>
        [\(n\)]: Anzahl der Spieler in der Abwehrkette<br>
        [\(d_{B_{i,j}}\)]: tatsächliche Breitendifferenz des \(i\)-ten und des \(j\)-ten Spielers der Abwehrkette<br>
        [\(d_{B_\varnothing} = \frac{B}{n}\)]: ideale Breitendifferenz zweier Spieler der Abwehrkette<br>
        [\(B\)]: Breite der Abwehrkette<br>
    ',
    'Kettenkonformität' => '
        Mittelmaß aus vertikaler und horizontaler Kettenkonformität.<br>
        \(\text{KKonf} = \frac{1}{2} (\text{KKonf}_T + \text{KKonf}_B)\)
    ',
    'Kettenkonform' => 'Übersteigt die Kettenkonformität einer Abwehrkette die Kettenkonformitätsschwelle, so steht sie <i>kettenkonform</i>.',

    'Kompaktheit' => '
        Invertiertes Mittelmaß der Abstände der Spieler einer Mannschaft zueinander.<br>
        \(\text{Komp} = n(n-1) \cdot (\sum_{i=2}^n \sum_{j=1}^{i-1} 2 d_{ij})^{-1} \), wobei<br>
        [\(n\)]: Anzahl der Spieler der Mannschaft auf dem Feld<br>
        [\(d_{ij}\)]: Abstand zwischen dem \(i\)-ten und dem \(j\)-ten Spieler der Mannschaft<br>
    ',
    'Kompakt' => 'Übersteigt die Kompaktheit einer Mannschaft die Kompaktheitsschwelle, so steht sie <i>kompakt</i>.',

    'Raumverknappung' => 'Verkleinerung des für den Gegner bespielbaren Raums.',

    'Schnittstelle' => 'Raum zwischen den Verteidigern einer Abwehrkette.',
    'Schnittstellenpass' => 'Pass durch die Schnittstelle einer Abwehrkette.',
    'Schnittstellenkanal' => 'Passkanal durch die Schnittstellen mehrerer Abwehrketten.',

    'Zwischenlinienraum' => 'Raum zwischen 2 Abwehrketten, in dem kein Verteidiger steht.',
    'Abwehrdreieck' => 'Verlässt ein Verteidiger die Abwehrkette in der Tiefe, so bildet er mit den zwei nähesten anderen Verteidigern der Abwehrkette ein <i>Abwehrdreieck</i>.',
]; 

?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">

    <title>Fußballtheorie: Übersicht</title>

    <style>
        <?= default_styles() ?>

        td, th {
            padding: 0.2em;
        }

        @media screen and (max-width: 650px) {
            tr, td, th {
                all: unset;
                display: block;
            }

            th {
                font-weight: bold;
            }

            tr {
                padding: 0.3em;
            }
        }

        tr:nth-child(even) {
            background-color: #e8e8e8;
        }

        table, tbody, tr {
            width: 100%;
        }
    </style>

    <script async src="/static/js/mathjax-tex-mml-chtml.js"></script>
</head>
<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h1>Übersicht der Fußballtheorie</h1>

    <h2>Glossar</h2>
    <table>
        <tbody>
            <?php foreach ($glossary as $key => $value) : ?>
                <tr id="<?= make_id($key) ?>">
                    <th><?= htmlspecialchars($key) ?></th>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Verteidiger-Referenzpunkte</h2>
    <table>
        <tbody>
            <tr>
                <th>Ball</th>
                <td>Position des Balls</td>
            </tr>
            <tr>
                <th>Raum</th>
                <td>Position des Verteidigers im Raum</td>
            </tr>
            <tr>
                <th>Mitspieler</th>
                <td>Position der Mitspieler des Verteidigers</td>
            </tr>
            <tr>
                <th>Angreifer</th>
                <td>Position der Angreifer</td>
            </tr>
        </tbody>
    </table>

    <h2>4-Phasen-Modell nach van Gaal</h2>
    <img src="/assets/misc/4-phasen-van-gaal.svg" style="width: 100%;">

    <footer>
        <p style="margin-top: 2em;">
            <a href="/imprint">Impressum</a>&nbsp;
            <a href="/privacy">Datenschutz</a>&nbsp;
            <a href="/sitemap.xml">Sitemap</a>&nbsp;
        </p>
    </footer>
</body>
</html>