<?php
namespace app\index\controller;
use think\controller;
use think\View;
use think\Session;
use app\index\model\DepartmentModel;
use think\Request;
use app\common\controller\Base;
use think\Db;
class Department extends Base
{
    public function index(){
        $view = new View();
        return $view->fetch('index'); //$password;
        
    }
    //获取部门列表
    public function getDeparList(){
        $view = new View();
        //初始化请求
        $request = Request::instance();
         
        //获取请求参数
        $query_data = $request->param();
        
        //var_dump($query_data);
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        
        $username = Session::get("UserName");
        
        $menudata = new DepartmentModel();
        $ParentID =$query_data['id'];
        $result = $menudata->getDeparParentID($ParentID);
        //var_dump($result);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    //获取部门列表
    public function ajaxGetDepart(){
        $id = input("post.id");
        if($id == null){
            $id = 0;
        }
        $depart = new DepartmentModel();
        $result = $depart->getDepartByParentID($id);
        //var_dump($result);exit();
        $new_result = array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['ParentID'];
            $new_result[$k]['name']=$v['ShortName'];
            $new_result[$k]['nocheck']=false;
            $new_result[$k]['drag']=false;
            $new_result[$k]['isParent']=self::isParent($v['ID']);
        }
        if(count($new_result) == 0){
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
        else{
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
    }
    public function isParent($id){
        return Db::name("department")->where("ParentID",$id)->select()==null?false:true;
    }
}

?>