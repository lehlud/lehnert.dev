<?php

function fill_js(string $js, array $params = []): string
{
    foreach ($params as $key => $value) {
        $js = str_replace('__' . $key . '__()', $value, $js);
    }

    return $js;
}
