<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class dd extends Tag
{ 
    protected  $tag = 'dd';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>