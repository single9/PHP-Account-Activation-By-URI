<?php
require('class/class.MySQL.php');

// Your activation program location url
define('ACT_URL', 'http://localhost/');
// Set table name
define('DB_TABLE', 'users');
// Set your database
$db = new MySQL('DB_NAME', 'DB_USER', 'DB_PASSWORD');

// Set encode
mysql_query("SET NAMES utf8");


?>