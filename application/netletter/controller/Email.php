<?php
namespace app\netletter\controller;

use app\common\controller\Base;
use app\netletter\model\EmailModel;
use app\netletter\model\EnclosureModel;
class Email extends Base
{
    //首页获取Email
    public function index(){
       $companyID = input("companyID");//部门id
       $cityID = input("cityID");//城市id
       $emailType = input("type");//邮箱类型ID
       $page = input("page");
       $num = input("num");
       $keyword = input("keyword");//关键字
       if($cityID == null || $companyID == null){
               return $this->fetch("index");
       }
       $where = array();
       $where["CompanyID"] = $companyID;
       $where["CityID"] = $cityID;
       if($page == null){
           $page = 1;
       }
       if($num == null){
           $num = 10;
       }
       if($emailType == null){
           $emailType = 1;
       }
       $where["Type"] = $emailType;
       if($keyword != null){
          $where["Title"] = ['like',$keyword]; 
       }
       $email = new EmailModel();
       $count = $email->getEmailCount($where);
       $list = $email->getEmailList($where, $page, $num);
       $allPage = ceil($count/$num);
       if(input("page")){
           $newdata = ["data"=>$list,"page"=>["allpage"=>$allPage,"curr"=>$page]];
           return json($newdata);
       }
       return $this->fetch("index");
    }
    //添加邮件
    public function addEmail(){
        if(request()->isAjax()){
            $data = input("post.");
            $email = new EmailModel();
            $result = $email->addEmail($data);
            if($result == null){
                return json(array("code"=>0,"msg"=>"邮件添加失败"));
            }else{
                return json(array("code"=>1,"msg"=>"邮件添加成功"));
            }
        }   
        
    }
    //发送邮件
    public function sendEmail(){
        if(request()->isAjax()){
            $data = input("post.");
            $email = new EmailModel();
            $result = $email->addEmail($data);
            if($result == null){
                return json(array("code"=>0,"msg"=>"邮件发送失败"));
            }else{
                return json(array("code"=>1,"msg"=>"邮件发送成功"));
            }
        }        
    }
    //更新邮件
    public function updateEmail(){
        if(request()->isAjax()){
            $data = input("post.");
            $emaildata = array();
            $id = $data["id"];
            unset($data["id"]);
            foreach($data as $key=>$value){
                if($value != ""){
                    $emaildata[$key]=$value;
                }
            }
            $email = new EmailModel();
            $result = $email->updateEmail($data,$id);
            if($result == null){
                return json(array("code"=>0,"msg"=>"邮件发送失败"));
            }else{
                return json(array("code"=>1,"msg"=>"邮件发送成功"));
            }
        }
    }    
    //删除邮件
    public function deleEmail(){
        if(request()->isAjax()){
            $id = input("post.id");
            $email = new EmailModel();
            $result = $email->deleEmail($id);
            if($result == null){
                return json(array("code"=>0,"msg"=>"邮件删除失败"));
            }else{
                return json(array("code"=>1,"msg"=>"邮件删除成功"));
            }
        }
    }
    //批量删除邮件
    public function deleEmailAll(){
        if(request()->isAjax()){
            $data = input("post.data");
            $email = new EmailModel();
            $dataArray = explode(',', $data);
            $emaildata = array();
            foreach($dataArray as $key => $value){
                $emaildata[$key]["IsDelete"] = 1;
                $emaildata[$key]["ID"] = $value;
            }
            $result = $email->deleEmail($emaildata);
            if($result == null){
                return json(array("code"=>0,"msg"=>"邮件删除失败"));
            }else{
                return json(array("code"=>1,"msg"=>"邮件删除成功"));
            }
        }        
    }
    //获取一个Email详细信息
    public function getOneEmail(){
        if(request()->isAjax()){
            $emailid = input("id");
            $email = new EmailModel();
            $result = $email->getEmailbyID($emailid);
            $enclosure = new EnclosureModel();
            $enclosureResult = $enclosure->getEnclosureByEmailID($emailid);
            $resultarray = array();
            $resultarray=$result;
            if($enclosureResult != null){
                $image = array();
                $file = array();
                foreach ($enclosureResult as $key=>$value){
                    switch($value["Type"]){
                        case 0:{$image[]=$value;}break;//图片
                        case 1:{$file[]=$value;}break;//文件
                        case 2:{}break;//未知
                    }                    
                }
                $resultarray["EnclosureFile"] = $file;
                $resultarray["EnclosureImage"] = $image;
                $resultarray["EnclosureTile"]="(有" . (count($file)+count($image)) . "个附件)";
            }
            if($result == null){
                return json(array("code"=>0,"msg"=>"无该邮件","data"=>""));
            }else{
                return json(array("code"=>1,"msg"=>"获取成功","data"=>$resultarray));
            }
        }
        
    }
}

?>