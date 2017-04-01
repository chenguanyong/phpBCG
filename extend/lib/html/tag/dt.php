<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class dt extends Tag
{ 
    protected  $tag = 'dt';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>