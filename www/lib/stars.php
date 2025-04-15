<?php

require_once __DIR__ . '/_index.php';

function random_float()
{
    return mt_rand() / mt_getrandmax();
}

function choose_random(array $a)
{
    return $a[mt_rand() % count($a)];
}


function new_edges()
{
    return [];
}

function has_edge(array $edges, array $edge)
{
    foreach ($edges as $e) {
        if ($e[0] === $edge[0] && $e[1] === $edge[1])
            return true;
        if ($e[1] === $edge[0] && $e[0] === $edge[1])
            return true;
    }

    return false;
}

function add_edge(array &$edges, array $edge)
{
    if (has_edge($edges, $edge))
        return;

    array_push($edges, $edge);
}


function stars_distance(array $a, array $b)
{
    return sqrt(pow($a[0] - $b[0], 2) + pow($a[1] - $b[1], 2)) / sqrt(2);
}

function stars_random(int $amount = 50)
{
    $indices = range(0, $amount - 1);

    $points = array_map(function () {
        return [
            round(max(0.02, min(0.98, random_float())), 3),
            round(max(0.02, min(0.98, random_float())), 3),
        ];
    }, $indices);

    $sizes = array_map(function () {
        return round(0.5 + random_float() * 1.2, 3);
    }, $indices);

    $edges = new_edges();

    foreach ($indices as $i) {
        $choosable = $indices;
        usort($choosable, function ($a, $b) use ($points, $i) {
            $cmp = stars_distance($points[$i], $points[$a]) - stars_distance($points[$i], $points[$b]);
            if ($cmp < 0)
                return -1;
            if ($cmp > 0)
                return 1;
            return 0;
        });

        $choosable = array_slice($choosable, 0, 10);

        $max = 2 + mt_rand() % 2;
        for ($j = 0; $j < $max; $j++) {
            $o = $i;

            $iter = 0;
            while ($o === $i || has_edge($edges, [$i, $o])) {
                $o = choose_random($choosable);
                if ($iter++ > 100)
                    break;
            }

            if ($iter <= 100)
                add_edge($edges, [$i, $o]);
        }
    }

    return [$points, $edges, $sizes];
}

function stars_container(array $points, array $sizes)
{
    $html = '<div id="stars-container" aria-hidden="true">';

    $count = count($points);
    for ($i = 0; $i < $count; $i++) {
        $width = 'max(' . $sizes[$i] . 'vw, ' . $sizes[$i] . 'vh)';
        $left = ($points[$i][0] * 100) . 'vw';
        $top = ($points[$i][1] * 100) . 'vh';
        $html .= "<img src=\"/assets/star.svg\" style=\"position: absolute; width: $width; left: $left; top: $top; translate: -50% -50%;\" />";
    }

    $html .= '</div>';
    return $html;
}

function stars_edges_svg(array $points, array $edges)
{
    $html = '<svg id="stars-edges" aria-hidden="true">';

    foreach ($edges as [$a, $b]) {
        if ($a > $b) {
            $tmp = $a;
            $a = $b;
            $b = $tmp;
        }

        [$x1, $y1] = $points[$a];
        [$x2, $y2] = $points[$b];

        $x1 *= 100;
        $y1 *= 100;
        $x2 *= 100;
        $y2 *= 100;

        $html .= "<line id=\"$a-$b\" x1=\"$x1%\" y1=\"$y1%\" x2=\"$x2%\" y2=\"$y2%\" stroke=\"white\" stroke-width=\"1.5\" opacity=\"0\" />";
    }

    $html .= '</svg>';
    return $html;
}



function stars_script(array $points, array $edges, array $sizes)
{
    $js = file_get_contents(__DIR__ . '/js/stars.js');

    return fill_js($js, [
        'INDICES' => json_encode(range(0, count($points) - 1)),
        'POINTS' => json_encode($points),
        'EDGES' => json_encode($edges),
        'SIZES' => json_encode($sizes),
    ]);
}

function stars_styles()
{
    return file_get_contents(__DIR__ . '/css/stars.css');
}
