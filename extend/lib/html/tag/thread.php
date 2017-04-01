<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class thread extends Tag
{ 
    protected  $tag = 'thread';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>