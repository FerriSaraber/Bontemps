<?php

//variables

$debug = 1;
$db = array(
    "dbname" => "bontemps",
    "username" => "root",
    "password" => "",
    "host" => "localhost",
    "port" => "3306"
);

//
        
require_once("functions.php");
setlocale(LC_ALL, 'nl_NL');

/*
    Error reporting.
*/
if($debug == 0){
    error_reporting(0);
}
else {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set("log_errors", 1);
}

/* Database check */
$mysqli = new mysqli($db[host], $db[username], $db[password], $db[dbname]);
 
if (!$mysqli->set_charset("utf8")) {
} 

// check connection
if ($mysqli->connect_error) {
    trigger_error('Data faal' . $mysqli->connect_error, E_USER_ERROR);
}


?> 