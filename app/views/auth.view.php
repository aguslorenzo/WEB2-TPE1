<?php
require_once './libreries/smarty/libs/Smarty.class.php';

class AuthView {
    private $smarty;
    public function __construct (){
        $this->smarty = new Smarty();
    }
    function showLoginForm($error = null){
        $this->smarty->assign("error", $error);
        $this->smarty->display('login.form.tpl');
    }

}