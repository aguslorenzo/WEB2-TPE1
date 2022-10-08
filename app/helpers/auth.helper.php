<?php

class AuthHelper {
//verifica q el user este loggeado
    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    } 
}
