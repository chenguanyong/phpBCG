<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class th extends Tag
{ 
    protected  $tag = 'th';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>