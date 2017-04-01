<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class label extends Tag
{ 
    protected  $tag = 'label';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }	    
}

?>