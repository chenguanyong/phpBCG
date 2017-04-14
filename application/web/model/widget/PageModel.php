<?php
namespace app\web\model\widget;

use think\Model;
class PageModel extends Model
{
    protected $table = "ce_pagehtml";
    public function getPageByID($id){
        return $this->where(["parentID"=>$id,"IsDelete"=>0])->select();
    }
}

?>