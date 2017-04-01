<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class button extends Tag
{ 
    protected  $tag = 'button';
	//重画
    public function reDraw(){
        return parent::draw();
    }
    public function __construct(){
        parent::__construct();             
    }	
    
}

?>