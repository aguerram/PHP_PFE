<?php
$env = array(
    "link" => "/pfe/",
    "storage" => "/pfe/storage/",
    "key"=>"ZADqsdq**++62..@DrewxZE342++-*/5865sdf++665fezfdsf5sdqsd",
    //Database
    "db_host" => "localhost",
    "db_user" => "root",
    "db_password" => "",
    "db_name" => "bd_pfe"
);

$protected_routes = ["tdb","settings"];

function route($link)
{
    global $env;
    return $env['link'] . "?route=" . $link;
}

function api($link)
{
    global $env;
    return $env['link'] . "api/" . $link . ".php";
}
function assets($link)
{
    global $env;
    return $env['link'] . "assets/" . $link;
}
function Encrypt($message)
{
    global $env;
    $key = $env['key'];
    $str = openssl_encrypt($message,"RC4",$key);
    $str = str_replace("=", "_", $str);
    return $str;
}

function Decrypt($encrypted)
{
    global $env;
    $key = $env['key'];
    $str = str_replace("_", "=", $encrypted);
    $str = openssl_decrypt($str,"RC4",$key);
    return $str;
}