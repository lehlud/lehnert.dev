<?php

function make_id(string $str): string {
    $str = strtolower($str);
    $str = preg_replace("/\s+/", "-", $str);

    $str = str_replace("ü", "ue", $str);
    $str = str_replace("ö", "oe", $str);
    $str = str_replace("ä", "ae", $str);
    $str = str_replace("ß", "ss", $str);

    $id = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $str);

    return $id;
}
