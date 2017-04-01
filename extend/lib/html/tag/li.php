<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class li extends Tag
{ 
    protected  $tag = 'li';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>