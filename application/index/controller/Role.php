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
    /**
     * [index 用户列表]
     * @return [type] [description]
     * @author
     */
    public function index()
    {       
         return $this->fetch('index'); //$password;
    }
    /**
     * [getRole 用户列表]
     * @return [type] [description]
     * @author
     */
     public function getRole(){
         //初始化请求
         $request = Request::instance();
          
         //获取请求参数
         $query_data = $request->param();
         $role = new RoleModel();
         $result = $role->getRole(["IsDelete"=>0,"CompanyID"=>$query_data["id"]],$query_data['iDisplayStart'],$query_data['iDisplayLength']);
         if($result == null){
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$result['length'],'recordsFiltered'=>$result['length'],'data'=>$result['data']],JSON_UNESCAPED_UNICODE);
     } 
     /**
      * [setRole 设置角色]
      * @return [type] [description]
      * @author
      */
     public function setRole(){
         
         $role = new RoleModel();
         //初始化请求
         $request = Request::instance();
         
         //获取请求参数
         $query_data = $request->param();
         
         switch($query_data['oper']){
             
             case 'add':{
                $addrol_array = array('RoleName' =>$query_data['RoleName'],'IsDelete'=>$query_data['IsDelete']); 
                $result = $role ->addRole($addrol_array);
                if($result == null){
                    return json_encode(array("code"=>0,"msg"=>"添加失败"),JSON_UNESCAPED_UNICODE);
                }else{
                    return json_encode(array("code"=>1,"msg"=>"添加成功"),JSON_UNESCAPED_UNICODE);
                }                
             }break;
             case 'edit':{
                  $addrol_array = array('RoleName' =>$query_data['RoleName'],'Css' =>$query_data['css'],'IsDelete'=>$query_data['IsDelete']);
                  $result = $role ->updateRole($addrol_array,$query_data["id"]);
                  if($result == null){
                      return json_encode(array("code"=>0,"msg"=>"修改失败"),JSON_UNESCAPED_UNICODE);
                  }else{
                      return json_encode(array("code"=>1,"msg"=>"修改成功"),JSON_UNESCAPED_UNICODE);
                  }                  
             }break;
             case 'del':{
               $result = $role ->deleRole($query_data['id']);
               if($result == null){
                   return json_encode(array("code"=>0,"msg"=>"删除失败"),JSON_UNESCAPED_UNICODE);
               }else{
                   return json_encode(array("code"=>1,"msg"=>"删除成功"),JSON_UNESCAPED_UNICODE);
               }
             }break;            
         } 
         return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
     }
     /**
      * [setRole 设置角色]
      * @return [type] [description]
      * @author
      */
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