<?php
namespace app\common\controller;
use think\Controller;
class Base extends Controller
{
    public function _initialize(){
        
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
    }
}

?>