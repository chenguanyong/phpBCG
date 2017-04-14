<?php
namespace app\web\controller;

use think\Controller;
use web\model\WidgetModel;
class Widget extends Controller
{
    public function index(){
       return $this->fetch("index");
    }
    public function ajaxGetWidget(){
        
        $widget = new WidgetModel();
        $resultWidget = $widget->getWidgitByID(0);
        if(count($resultWidget) == 0){
            return json_encode(array("code"=>0,"msg"=>"获取控件列表失败"));
        }
        $result = array();
        foreach($resultWidget as $value){
            $result["id"] = $value["ID"];
            $result["pId"] = $value["parentID"];
            $result["name"] = $value["name"];
            $result["drop"] = false;
        }
        if(count($result)==0){
            return json_encode(array("code"=>0,"msg"=>"获取控件列表失败"));            
        }else{
            return json_encode(array("code"=>1,"msg"=>"获取控件列表成功","data"=>$result),JSON_UNESCAPED_UNICODE);
        }
    }
}

?>