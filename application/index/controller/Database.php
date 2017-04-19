<?php
namespace app\index\controller;


use think\Controller;
class Database extends Controller
{
    public function index(){
        
        return $this->fetch("index");
    }
}

?>