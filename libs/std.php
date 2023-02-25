<?php

// --[ string utils ]---------------------------------------------------------------------------------------------------
function is_blank($value)
{
    return !isset($value) || trim($value) === '';
}

// --[ html utils ]-----------------------------------------------------------------------------------------------------
function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function redirect_to($location)
{
    header("Location: " . WWW_ROOT . '/' . $location);
    exit;
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
