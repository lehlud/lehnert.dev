<?php

function default_styles()
{
    return file_get_contents(__DIR__ . '/css/default.css');
}

function common_styles()
{
    return file_get_contents(__DIR__ . '/css/common.css');
}