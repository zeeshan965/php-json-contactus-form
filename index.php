<?php

use src\Controller\FormController;

require_once './vendor/autoload.php';
require_once './loader.php';

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

$json_file = __DIR__ . '/form.json';
$obj = new FormController($json_file);
$obj();