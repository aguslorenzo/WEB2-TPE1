<?php
require_once './app/controllers/park.controller.php';
require_once './app/controllers/province.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'parks';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showLoginForm();
        break;
    case 'authenticate':
        $authController = new AuthController();
        $authController->authenticateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'parks':
        $parkController = new ParkController();
        $parkController->showParks();
        break;
    case 'provinces':
        $provinceController = new ProvinceController();
        $provinceController->showProvinces();
        break;
    case 'park':
        $parkController = new ParkController();
        $id = $params[1];
        $parkController->getPark($id);
        break;
    case 'province':
        $provinceController = new ProvinceController();
        $id = $params[1];
        $provinceController->getParksByProvince($id);
        break;
    case 'addPark':
        $parkController = new ParkController();
        $parkController->addPark();
        break;
    case 'addProvince':
        $provinceController = new ProvinceController();
        $provinceController->addProvince();
        break;
    case 'deletePark':
        $parkController = new ParkController();
        $id = $params[1];
        $parkController->deletePark($id);
        break;
    case 'deleteProvince':
        $provinceController = new ProvinceController();
        $id = $params[1];
        $provinceController->deleteProvince($id);
        break;
    case 'editPark':
        $parkController = new ParkController();
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
        $parkController = new ParkController();
        $id = $params[1];
        $parkController->savePark($id);
        break;
    case 'editProvince':
        $provinceController = new ProvinceController();
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
        $provinceController = new ProvinceController();
        $id = $params[1];
        $provinceController->saveProvince($id);
        break;
    default:
        echo('404 Page not found');
        break;
}