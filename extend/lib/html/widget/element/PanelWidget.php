<?php
namespace lib\html\widget\element;

use lib\html\widget\Widget;
use lib\html\tag\div;
use lib\html\tag\ul;
use lib\html\tag\i;
use lib\html\tag\a;
use lib\html\tag\li;
class PanelWidget extends Widget
{
    
    public function __construct(){
        parent::__construct();
    }
    //重画
    protected function draw(){
        $pane = $this->data;
        $main = new div();
        $main->id = $pane->id;
        $main->setCss($pane->css);
        $ul = new ul();
        $ul->setCss("nav nav-tabs");
        $ul->id = " ";
        $childArray = $pane->child;//子数据
        $tabcontent = new div();//主要内容
        $licontent = "";
        $divcontent = "";
        if(is_array($childArray)){
            $count = count($childArray);

            for($i=0;$i < $count;$i++){
                
                $li = new li();
                $a = new a();
                $i = new i();
                $a->setCss($childArray[$i]->css);
                $a->href=$childArray[$i]->href;
                $i->setCss($childArray[$i]->iconClass);//标题前面的icon
                $a->content = $childArray[$i]->content.$i->reDraw();
                $a_temp_cont = $a->reDraw();
                
                $li->content =  $a_temp_cont;

                
                $child_child = $childArray[$i]->child;
                $tempdiv = new div();
                $tempdiv->setCss($childArray[$i]->contentcss);
                $tempdiv->content = $childArray[$i]->content;//子内容
                $tempdiv_cont = $tempdiv->reDraw();
                $tabcontent->content = $tabcontent->content.$tempdiv_cont;
                if(is_array($child_child)){
                    $acount = count($child_child);
                    $child_ul = new ul();
                    $child_ul->setCss("dropdown-menu dropdown-info");//下拉菜单
                    
                    for($a = 0;$a<$acount;$a++){
                        
                        $child_li = new li();
                        $child_a = new a();
                        $child_i = new i();
                        $child_a->setAttr(['data-toggle'=>"tab"]);
                        $child_a->href = $child_child->href;
                        $child_i->setCss($child_child->iconClass);
                        $child_a->content = $child_child->content.$child_i->reDraw();
                        $child_li->content = $child_a->reDraw();
                        $child_ul->content = $child_ul->content . $child_li->reDraw();
                        
                        
                        $child_div = new div();
                        $child_div->id=$child_div->href;
                        $child_div->setCss("tab-pane fade in");
                        $child_div->content = $child_child->content;
                        $child_div_cont = $child_div->reDraw();
                        $tabcontent->content = $tabcontent->content.$child_div_cont;

                    }
                    $li->content = $li->content . $child_ul->reDraw();
                    $li_temp_cont = $li->reDraw();
                    $licontent = $licontent . $li_temp_cont;
                    
                    
                }
                
            }
        }
        $ul->content=$licontent;
        $main->content = $ul->reDraw() . $tabcontent->reDraw();
        return $main->reDraw();
    }
}

?>