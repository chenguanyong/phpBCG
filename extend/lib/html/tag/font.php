<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class font extends Tag
{ 
    protected  $tag = 'font';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }	
    
}

?>