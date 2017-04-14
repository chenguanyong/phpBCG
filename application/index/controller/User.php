<?php
namespace app\index\controller;
use think\controller;
use app\index\model\User_mode;
use think\View;
use think\Session;
use think\Request;
use app\common\controller\Base;


class User extends Base
{
    public function index(){
        $view = new View();
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        return $view->fetch('index');
    }
    //通过部门id获取用户
    public function getUserByDepartID(){

        //初始化请求
        $request = Request::instance();
       // var_dump($request);
       // exit;
        //获取请求参数
        $query_data = $request->param();
        
        $user = new User_mode(); 
        $user_array = $user->getUserByDeparID(1,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($user_array == null){
            
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$user_array['length'],'recordsFiltered'=>$user_array['length'],'data'=>$user_array['data']],JSON_UNESCAPED_UNICODE);
    }
    
    public function editUser(){
         if(request()->isAjax()){
            //初始化请求
            $request = Request::instance();
            //获取请求参数
            $query_data = $request->param();
            //var_dump($query_data);
            //exit();
            
            $data = array("UserName"=>$query_data["loginName"],"Names"=>$query_data["name"],"PassWord"=>md5(trim($query_data["newPassword"])),"DepartmentID"=>$query_data["officeNameID"],"companyID"=>$query_data["companyID"],"phone"=>$query_data["phone"],"moblie"=>$query_data["mobile"],"IsDelete"=>$query_data["loginFlag"]);
            $datainfo = array("bz"=>$query_data["remarks"],"email"=>$query_data["email"],"workID"=>$query_data["noID"]);
            $user = new User_mode();
            if($query_data["type"] == 1){
                
                $result = $user->addUser($data,$datainfo);
            }else if($query_data["type"] == 3){
                $id=$query_data["id"];
                $result = $user->updateUser($data,$id);
                $datainfo['ID'] = $id;
                Db::name("userinfo")->update($datainfo);
                return $result;
            }
            return $result;
         }
        return $this->fetch();
    }
    //删除用户
    public function deleUser(){
        $id = input("post.id");
        $user = new User_mode();
       return $user->dele($id);
        
    }
    //用户中心
    public function userProfile(){
        $view = new View();
        
        return $view->fetch('profile');
    }
    //时间线
    public function timeline(){
        
        $view = new View();
        
        return $view->fetch('timeline');
    }
}

?>