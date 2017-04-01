<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class table extends Tag
{ 
    protected  $tag = 'table';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>