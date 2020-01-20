<?php
require "environment.php";

global $config;
$config = array();

if(ENVIRONMENT == "development") {
    define("BASE_URL", "http://localhost/php/twitter/");
    $config['dbname']="twitter";
    $config['host']="localhost";
    $config['dbuser']="root";
    $config['dbpass']="";
}else {
    define("BASE_URL", "http://localhost/php/twitter/");
    $config['dbname']="twitter";
    $config['host']="localhost";
    $config['dbuser']="root";
    $config['dbpass']="";
}