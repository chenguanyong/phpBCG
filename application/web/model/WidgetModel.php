<?php
namespace app\web\model;

use think\Model;
class WidgetModel extends Model
{
    protected $table = "ce_widget";
    public function getWidgitByID($id){
       return $this->where(["parentID"=>$id,"IsDelete"=>0])->select();
    }
}

?>