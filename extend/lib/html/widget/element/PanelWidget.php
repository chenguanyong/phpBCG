<?php
namespace lib\html\widget\element;

use lib\html\widget\Widget;
use lib\html\tag\div;
class PanelWidget extends Widget
{
    
    public function __construct(){
        parent::__construct();
    }
    //重画
    protected function draw(){
        $main = new div();
        $main->setCss($this->data[0]->css);
    }
}

?>