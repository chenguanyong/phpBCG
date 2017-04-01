<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class tr extends Tag
{ 
    protected  $tag = 'tr';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>