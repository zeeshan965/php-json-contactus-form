<?php

use Php\JsonContactusForm\Controller\FormController;

require_once './vendor/autoload.php';
require_once './loader.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$obj = new FormController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj->post($_POST);
} else {
    $obj();
}