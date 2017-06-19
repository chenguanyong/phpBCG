<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\index\model\ConfModel;
class Sysconf extends Base
{
    public function index(){
        return $this->fetch("index");
    }
    public function saveConf(){
        $confData = input("post.");
        $conf = new ConfModel();
        $result = $conf->updateConfig($confData);
        if($result == null){
            return json(array("code"=>0,"msg"=>"保存失败"));
        }else{
            return json(array("code"=>1,"msg"=>"保存成功"));
        }
    }
}

?>