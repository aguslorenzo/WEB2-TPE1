<?php
require_once './app/controllers/park.controller.php';
require_once './app/controllers/province.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'parks';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$parkController = new ParkController();
$provinceController = new ProvinceController();

switch ($params[0]) {
    case 'parks':
        $parkController->showParks();
        break;
    case 'provinces':
        $provinceController->showProvinces();
        break;
    case 'park':
        $id = $params[1];
        $parkController->getPark($id);
        break;
    case 'province':
        $id = $params[1];
        $provinceController->getParksByProvince($id);
        break;
    case 'add':
        $parkController->addPark();
        break;
    /* case 'delete':
        $parkController->deletePark();
        break; */
    default:
        echo('404 Page not found');
        break;
}