<?php
namespace app\index\controller;
use think\controller;
use think\View;
use think\Session;
use think\Request;
use app\common\controller\Base;
use app\index\model\RoleModel;
class Role extends Base
{
    public function index()
    {        $view = new View();
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
            
            return $view->fetch('Login/login');            
        }
        $username = Session::get("UserName");

         return $view->fetch('index'); //$password;
    }
    
     public function getRole(){
         //初始化请求
         $request = Request::instance();
          
         //获取请求参数
         $query_data = $request->param();
         
         //var_dump($query_data);
         //exit;
         //$role = new \app\index\mode\Role($query_data['page'],$query_data['rows']);
         $role = new RoleModel();
         $result = $role->getRole($query_data['page'],$query_data['rows']);
         
         return json_encode($result, JSON_UNESCAPED_UNICODE);
     } 
     
     public function setRole(){
         
         $role = new RoleModel();
         //初始化请求
         $request = Request::instance();
         
         //获取请求参数
         $query_data = $request->param();
         
         switch($query_data['oper']){
             
             case 'add':{
                $addrol_array = array('RoleName' =>$query_data['角色名'],'IsDelete'=>$query_data['是否删除']); 
                $role ->addRole($addrol_array);
                 
             }break;
             case 'edit':{
                 
                 $addrol_array = array('RoleName' =>$query_data['角色名'],'IsDelete'=>$query_data['是否删除'],'RoleID'=>$query_data['角色ID']);
                  $role ->updateRole($addrol_array);
                 
             }break;
             case 'del':{
                
                 $role ->deleRole($query_data['id']);
                 
                 
             }break;            
             
         }    
         
     }
     
     public function getRoleList(){

          
         $result = RoleModel::column('RoleID','RoleName');

        $back_array = array();
        $int_array = 0;
        foreach ($result as $key=>$value){
           // echo $key;
            $back_array[$int_array]=array('title'=>$key,'id'=>$value);
            $int_array++;
        }
    
        return json_encode($back_array, JSON_UNESCAPED_UNICODE);
     }
     
     
}

?>