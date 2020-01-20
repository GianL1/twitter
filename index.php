<?php
session_start();

require "vendor/autoload.php";
require "config.php";

$c = new Core\Core();
$c->run();