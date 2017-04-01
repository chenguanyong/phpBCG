<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class ul extends Tag
{ 
    protected  $tag = 'ul';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>