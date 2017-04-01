<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class p extends Tag
{ 
    protected  $tag = 'p';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>