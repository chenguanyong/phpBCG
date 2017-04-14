<?php
namespace app\web\controller\WebDesign;

use app\common\controller\Base;
use app\web\model\widget\PageModel;
class Page extends Base
{
    public function ajaxGetPage(){
        $id = input("post.id");
        if($id == null){
            $id = 0;
        }
        $page = new PageModel();
        $result = $page->getPageByID($id);
        //var_dump($result);exit;
        $new_result = array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            // $new_result[$k]['iconSkin']=$v['class'];//drag:false
            if($v['parentID'] == 0){
                $new_result[$k]['isParent']=true;
                $new_result[$k]['drag']=false;
            }else{
                $new_result[$k]['isParent']=false;
            }
            $new_result[$k]['nocheck']=false;
            // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
            // $new_result[$k]['target'] = 'list_currency';
        }
        if(count($new_result) == 0){
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
        else{
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
    }
}

?>