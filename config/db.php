<?php
/**
 * DB configs
 */

$dbhost = "127.0.0.1";
$dbname = "shop";
$dbuser = "root";
$dbpass = "";

global $db;

$db = null;

try {
	// Link to DB connect or false
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$db->exec("set names utf8");
}
catch(PDOException $e)
{
	echo 'Connection failed: ' . $e->getMessage();
}
