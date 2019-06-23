<?php

ini_set('display_errors', 'on');
ini_set('track_errors', 'on');
ini_set('html_errors', 'on');
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

$ambiente = "dial";

switch ($ambiente) {
    case "local":
        require  "index-local.php";
        break;
    case "dial":
        require "index-dial.php";
        break;
}