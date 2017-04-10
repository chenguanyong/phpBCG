<?php
namespace web\mode;

use think\Model;
class WidgetModel extends Model
{
    protected $table = "ce_widget";
    public function getWidgitByID($id){
       return $this->where("parentID",$id)->select();
        
    }
}

?>