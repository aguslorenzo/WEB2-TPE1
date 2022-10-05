<?php
require_once('./libreries/smarty/libs/Smarty.class.php');
class ProvinceView {
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showProvinces($provinces){
        $this->smarty->assign('provinces', $provinces);
        $this->smarty->display('province.list.tpl');
    }

    public function showParks($parks, $province){
        $this->smarty->assign('parks', $parks);
        $this->smarty->assign('province', $province);
        $this->smarty->display('province.parks.list.tpl'); 
    }

    function editProvince($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('province.edit.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}