<?php
namespace app\index\controller;
use think\controller;
use think\Session;
use think\Request;
use app\common\controller\Base;
use lib\html\tag\input;
use app\index\model\MenuModel;
use lib\html\BuildMenuHtml;

class Menu extends Base
{
    public function index()
    { 
        return $this->fetch('menu'); //$password;
    }
    
    //通过父id获取菜单
    public function getMenu(){
        
        //初始化请求
        $request = Request::instance();
        //获取请求参数
        $query_data = $request->param();
        //var_dump($query_data);
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
            return $this->fetch('Login/login');
        }
        $username = Session::get("UserName");
        $menudata = new MenuModel();
        $ParentID =$query_data['id'];
        $result = $menudata->getMenuParentID($ParentID);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    //获取菜单
    public function getMenuInfo(){
        $request = Request::instance();
        //获取请求参数
        $query_data = $request->param();
        $menudata = new MenuModel();
        $menuinfo = $menudata ->getData(['MenuID'=>$query_data['menuID']]);
        if($menuinfo == null){
            return json_encode(array('0'));
        }else{
            return json_encode($menuinfo,JSON_UNESCAPED_UNICODE);            
        }
    }
   /**
     * [add 添加菜单ajax]
     * @return [type] [description]
     * @author
     */
    public function add(){
        if(request()->isAjax()){
            $key = input("post.");
            if(is_array($key)){
               return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            $menu = new MenuModel();
            $result = $menu->addMenu($key);
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
           return $this->fetch("index");
        }
    }
   /**
     * [dele 删除菜单]
     * @return [type] [description]
     * @author
     */
    public function dele(){
        if(request()->isAjax()){
            $key = input("post.");
            if($key == 0){
                return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            $menu = new MenuModel();
            $result = $menu->deleMenu($key);//删除菜单
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
            return $this->fetch("index");
        }
    }
    /**
     * [update 更新菜单]
     * @return [type] [description]
     * @author
     */
    public function update(){
        if(request()->isAjax()){
            $key = input("post.");
            //var_dump($key);
            if(!is_array($key)){
                return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            if(isset($key["IsDelete"])){
                
                $key["IsDelete"] = $key["IsDelete"] == "on"?1:0;
            }
            if(isset($key["IsDelete"])){
            
                $key["Flag"] = $key["Flag"] == "on"?1:0;
            }
            $menu = new MenuModel();
            $id= 0;
            $id = $key['id'];
            unset($key['id']);
            $result = $menu->updateMenu($key,$id);//删除菜单
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
            return $this->fetch("index");
        }       
    }
    /**
     * [ajaxGetMenu 获取菜单]
     * @return [type] [description]
     * @author
     */
    public function ajaxGetMenu(){
        if(request()->isAjax()){
          $roleID = Session::get("RoleID"); 
          if($roleID == null){
              return json_encode(array("code"=>0,"msg"=>"获取角色ID失败"),JSON_UNESCAPED_UNICODE);
          } 
          $id = input('id');
          if(!is_numeric($id)){
              return json_encode(array("code"=>0,"msg"=>"输入id无效"),JSON_UNESCAPED_UNICODE);
          }
          $page = input('page');
          if(!is_numeric($page)){
              return json_encode(array("code"=>0,"msg"=>"输入页码无效"),JSON_UNESCAPED_UNICODE);
          }
          $num = input('num');
          if(!is_numeric($num)){
              return json_encode(array("code"=>0,"msg"=>"输入页码容量无效"),JSON_UNESCAPED_UNICODE);
          }
          $menu = new MenuModel();
          $map = array("ce_menu.IsDelete"=>0);
          $result = $menu ->getMenuByID($roleID, $id, $map, $page, $num);

          if($result == null){
              return json_encode(array("code"=>0,"msg"=>"抱歉没有数据"),JSON_UNESCAPED_UNICODE);
          }
          $data = array();
          $datapc = array();
          foreach($result["data"] as $value){
              $temp = array();
              $temp[]=array('title'=>$value['MenuName'],'css'=>$value['css']);
              $temp[]=array('title'=>$value['URL'],'css'=>$value['css']);
              $temp[]=array('title'=>$value['css'],'css'=>$value['css']);
              $temp[]=array('title'=>$value['IsDelete'],'css'=>$value['css']);
              $data[]=$temp;
              $datapctemp = array("data_id"=>$value['MenuID'],"data_pid"=>$value['ParentID']);
              $datapc[] = $datapctemp; 
          }  
            return  json_encode(array("code"=>1,"msg"=>"成功","data"=>$data,"datapc"=>$datapc),JSON_UNESCAPED_UNICODE);
        }else{
            return  json_encode(array("code"=>0,"msg"=>"不是ajax请求"),JSON_UNESCAPED_UNICODE);
        }
        
    }
    /**
     * [ajaxGetMenu 获取子菜单]
     * @return [type] [description]
     * @author
     */
    public function ajaxGetChildMenu(){
        
        if(request()->isAjax()){
            $roleID = Session::get("RoleID");
            if($roleID == null){
                return json_encode(array("code"=>0,"msg"=>"获取角色ID失败"),JSON_UNESCAPED_UNICODE);
            }
            $id = input('post.id');
            if(!is_numeric($id)){
                return json_encode(array("code"=>0,"msg"=>"输入id无效"),JSON_UNESCAPED_UNICODE);
            }
            $menu = new MenuModel();
            $map = array("ce_menu.IsDelete"=>0);
            $result = $menu ->getChildMenuByID($roleID, $id);
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"抱歉没有数据"),JSON_UNESCAPED_UNICODE);
            }
            $data = array();
            $datapc = array();
            foreach($result as $value){
                $temp = array();
                $temp[]=array('title'=>$value['MenuName'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['URL'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['css'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['IsDelete'],'css'=>$value['css']);
                $data[]=$temp;
                $datapctemp = array("data_id"=>$value['MenuID'],"data_pid"=>$value['ParentID']);
                $datapc = $datapctemp;
            }
            return  json_encode(array("code"=>1,"msg"=>"成功","data"=>$data,"datapc"=>$datapc),JSON_UNESCAPED_UNICODE);
        }else{
            return  json_encode(array("code"=>0,"msg"=>"不是ajax请求"),JSON_UNESCAPED_UNICODE);
        }
    }
}


?>