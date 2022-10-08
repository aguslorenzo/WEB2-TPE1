<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $view;
    private $model;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLoginForm(){
        $this->view->showLoginForm();
    }
    
    public function authenticateUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($password, $user->password)){
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;
            
            header ("Location: " . BASE_URL);
        }
        else {
            $this->view->showLoginForm("El usuario o la contraseña ingresado no exite.");
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}