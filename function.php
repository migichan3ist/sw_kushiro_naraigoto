<?php
function dbConnect()
{
    $dsn = "mysql:dbname=character;host=localhost;charaset=utf8";
    $user = "root";
    $password = "";

    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}