<?php
require_once('./libreries/smarty/libs/Smarty.class.php');
class ParkView {
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
    }
    function showParks($parks){
        $this->smarty->assign('parks', $parks);
        $this->smarty->display('park.list.tpl');
    }

    function showPark($park, $provinceName){
        $this->smarty->assign('park', $park);
        $this->smarty->assign('provinceName', $provinceName);
        $this->smarty->display('park.card.tpl');

    }
}