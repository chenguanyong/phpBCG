<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class dl extends Tag
{ 
    protected  $tag = 'dl';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }	    
}

?>