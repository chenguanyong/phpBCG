<?php
namespace app\index\model;

use think\Model;
class AreaModel extends Model
{
    protected $table = "ce_city";
    public function getAreaList($id){
       return $this->where("parentID",$id)->select(); 
    }
    //判断是否父节点
    public function isParent($id){
        $result = $this->where("parentID",$id)->find();
        if($result == null){
            return false;
        }else{
            return true;
        }
    }
}

?>