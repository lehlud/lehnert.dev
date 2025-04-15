<?php

function get_svg($path)
{
    $svg = file_get_contents($path);

    if (str_starts_with($svg, '<?xml')) {
        $svg = preg_replace('/^\s*<\?xml[^>]+>\s*/', '', $svg);
    }

    return $svg;
}