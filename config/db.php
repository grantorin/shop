<?php
/**
 * DB configs
 */

$dblocation = "127.0.0.1";
$dbname = "shop";
$dbuser = "root";
$dbpass = "";

// Link to DB connect or false
global $db;
$db = mysqli_connect($dblocation, $dbuser, $dbpass);

if(!$db) {
    echo "MySQL connection Error";
    exit();
}

// DB connect
mysqli_set_charset($db,'utf8');

if(!mysqli_select_db($db, $dbname)) {
    echo "DB: $dbname connection Error";
    exit();
}