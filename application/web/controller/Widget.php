<?php
namespace app\web\controller;

use think\Controller;
class Widget extends Controller
{
    public function index(){
       return $this->fetch("index");
    }
}

?>