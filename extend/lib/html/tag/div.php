<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class div extends Tag
{ 
    protected  $tag = 'div';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>