<?php
namespace app\index\controller;

use think\Controller;
class Log extends Controller
{
    public function index(){
       return $this->fetch();
    }
}

?>