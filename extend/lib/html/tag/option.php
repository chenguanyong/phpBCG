<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class option extends Tag
{ 
    protected  $tag = 'option';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>