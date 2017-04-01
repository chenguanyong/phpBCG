<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class input extends Tag
{ 
   protected  $tag = 'input';
    public  $checked = null;
	public  $value = null;
    public  $type = null;
    public  $src = null;
    public function __construct(){
        parent::__construct();
        $this->checked = '#';
		$this->value = '#';
		$this->type = '#';
		$this->src = '#';	
    }
    protected function emptAttr($html){
        if(!empty($this->checked)){
            $html = $html . 'checked="' . $this->checked . '" ';
        }
        if(!empty($this->value)){
            $html = $html . 'value="' . $this->value . '" ';
        }
        if(!empty($this->type)){
            $html = $html . 'type="' . $this->type . '" ';
        }
        if(!empty($this->src)){
            $html = $html . 'src="' . $this->src . '" ';
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