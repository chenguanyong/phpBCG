<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Controller;
use think\View;
use think\Validate;
use app\index\model\UserModel;
use think\Db;
class Login extends Controller{
    
    //验证登陆规则
    protected $rule_login = [
        'UserName' => '[A-Z,a-z,0-9,_]{0,10}',
        'PassWord' => '[A-Z,a-z,0-9,_,@,\.]{0,10}',
        
    ];
    //验证修改密码规则
    protected $rule_fix_password = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
    //验证注册规则
    protected $rule_register = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
   public  function index() {
       
       //初始化请求
       $request = Request::instance();
       
       //获取请求参数
       $query_data = $request->param();
       //var_dump($query_data);
       $data_array = explode('-', $query_data['data']);
       
       if(count($data_array) < 1){ return json_encode(array("res" =>'0')); }
       
       $validate = new Validate($this->rule_login);
       
       $flog = $validate->check([array("UserName"=>$data_array[0], "PassWord"=>$data_array[1])]);
       
       if(!$flog){
          // echo $validate->getError();
           return json_encode(array("res" =>'0'));           
       }
       //初始化模型
       $user = new UserModel();
       $user_object = $user->getAllUserData($data_array[0]);
       $username = $user_object->getAttr('UserName');
       $password = $user_object->getAttr("PassWord");
       $UserID = $user_object->getAttr("UserID");
       $CompanyID = $user_object->getAttr("CompanyID");
       $DepartmentID = $user_object->getAttr("DepartmentID");
       $CityID = $user_object->getAttr("CityID");
       $postpassword = md5($data_array[1]); 
       if($password != $postpassword){
           
           return json_encode(array("res" =>'0'));
       }
       Session::set("UserName", $username);
       Session::set("UserID", $UserID);
       Session::set("CompanyID", $UserID);
       Session::set("DepartmentID", $UserID);
       Session::set("CityID", $UserID);
       $roleID = Db::table("ce_role_user")->where("UserID",$UserID)->find();
       Session::set("RoleID",$roleID['RoleID']);
       return json_encode(array("res" =>'1'));
    }
    
    //退出
    public function loginOut(){
        Session::clear();
        return $this->fetch('login');
    }
}