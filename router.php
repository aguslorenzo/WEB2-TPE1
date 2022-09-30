<?php
require_once './app/controllers/park.controller.php';
require_once './templates/form.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$parkController = new ParkController();

switch ($params[0]) {
    case 'list':
        $parkController->showParks();
        break;
    case 'add':
        $parkController->addPark();
        break;
    default:
        echo('404 Page not found');
        break;
}