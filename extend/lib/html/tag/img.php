<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class img extends Tag
{ 
   protected  $tag = 'img';
    public  $src = null;
    public function __construct(){
        parent::__construct();
        $this->src = '#';
    }
    protected function emptAttr($html){
        if(!empty($this->src)){
            $html = $html . 'src="' . $this->href . '" ';
        }
		return $html;
    }
    //重画
    public function reDraw(){
        $html = parent::start();
        $html = parent::attr($html);
        $html = self::emptAttr($html);
        $html = parent::onEvent($html);
        $html = parent::emptOnEvent($html);
        $html = parent::content($html);
        $html = parent::end($html);
        return $html;
    }    
}

?>