<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class tbody extends Tag
{ 
    protected  $tag = 'tbody';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>