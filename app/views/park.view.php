<?php
require_once('./libreries/smarty/libs/Smarty.class.php');

class ParkView {
    private $smarty;
    
    public function __construct(){
        $this->smarty = new Smarty();
    }

    function showParks($parks, $provinces){
        $this->smarty->assign('parks', $parks);
        $this->smarty->assign('provinces', $provinces);
        $this->smarty->display('park.list.tpl');
    }

    function showPark($park, $provinceName, $error=null){
        $this->smarty->assign('park', $park);
        $this->smarty->assign('provinceName', $provinceName);

        if ($error!=null){
            $this->smarty->assign('error', $error);
        }

        $this->smarty->display('park.card.tpl');

    }

    function editPark($id, $provinces){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('provinces', $provinces);
        $this->smarty->display('park.edit.tpl');
    }

    function showError($message){
        $this->smarty->assign('error', $message);
        $this->smarty->display('error.tpl');
    }
}