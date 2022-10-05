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
    case 'addPark':
        $parkController->addPark();
        break;
    case 'addProvince':
        $provinceController->addProvince();
        break;
    case 'deletePark':
        $id = $params[1];
        $parkController->deletePark($id);
        break;
    case 'deleteProvince':
        $id = $params[1];
        $provinceController->deleteProvince($id);
        break;
    case 'editPark':
        if(is_numeric($params[1])){
            $id = $params[1];
            $parkController->editPark($id);
        }
        else{
            $id = $params[2];
            $parkController->savePark($id);
        }
        break;    
    case 'savePark':
        $id = $params[1];
        $parkController->savePark($id);
        break;
    case 'editProvince':
        if(is_numeric($params[1])){
            $id = $params[1];
            $provinceController->editProvince($id);
        }
        else{
            $id = $params[2];
            $provinceController->saveProvince($id);
        }
        break;
    case 'saveProvince':
        $id = $params[1];
        $provinceController->saveProvince($id);
        break;
    default:
        echo('404 Page not found');
        break;
}