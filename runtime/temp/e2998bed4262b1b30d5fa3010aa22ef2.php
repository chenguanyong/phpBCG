<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\f\phpace\public/../application/web\view\index\design.html";i:1492354592;}*/ ?>
<title>Timeline - Ace Admin</title>
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/css/zTreeStyle/zTreeStyle.css" />	
<div class="row">
	<div class="col-xs-2" style="margin:0px; padding:0px; padding-right:3px;">
		<div class="widget-box widget-color-blue2">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller">页面列表</h4>
			</div>
			<div class="widget-body" style="height:270px;">
				<div class="widget-main padding-8" style="max-height:270px;overflow:auto">
					<ul id="pageTree" class="ztree" ></ul>
				</div>
			</div>
		</div>
		<div class="widget-box widget-color-blue2" >
			<div class="widget-header" style="height:15px">
				<h5 class="widget-title lighter smaller">控件列表</h5>
			</div>
	
			<div class="widget-body" style="height:250px; ">
				<div class="widget-main padding-8" style="max-height:250px;overflow:auto">
					<ul id="widgetTree" class="ztree" ></ul>
				</div>
			</div>
		</div>		
	</div>	
	<div class="col-xs-10" style="margin:0px; padding:0px">
			<div class="main-content " style="margin:0px; padding:0px 0px" >
					<div class="widget-box ui-sortable-handle" id="widget-box-1">
							<div class="widget-header">
									<h5 class="widget-title">设计面板</h5>
									<!-- #section:custom/widget-box.toolbar -->
										<div class="widget-toolbar">
											<div class="widget-menu">
												<a href="#" data-action="settings" data-toggle="dropdown">
													<i class="ace-icon fa fa-bars"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
													<li>
														<a data-toggle="tab" href="#dropdown1">Option#1</a>
													</li>
										
													<li>
														<a data-toggle="tab" href="#dropdown2">Option#2</a>
													</li>
												</ul>
											</div>
										
											<a href="#" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>
										
											<a href="#" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>
										
											<a href="#" data-action="collapse">
												<i class="ace-icon fa fa-chevron-up"></i>
											</a>
										
											<a href="#" data-action="close">
												<i class="ace-icon fa fa-times"></i>
											</a>
										</div>
							
							<!-- /section:custom/widget-box.toolbar -->
							</div>
					
							<div class="widget-body" id="page_main" style="height:570px; background-color:#ffffff">

								<div id="draggable" class="ui-widget-content">
								  <p>Drag me around</p>
								  
								</div>
								
							</div>
					</div>								
			</div>
	</div>

</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  测试
</button>
<div id="dd">sdsfsd</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">对象属性</h4>
      </div>
      <div class="modal-body" style="padding:1px">
        <table class="table table-bordered table-striped" style="margin:0px">
														<tbody>
															<tr class="active ">
																<td class="width-15">名称:</td>
																<td class="width-35">
																		<input type="text" id="name" placeholder="请输入名称" class="col-xs-12 col-sm-12">
																</td>
																<td class="width-15">背景颜色:</td>
																<td class="width-35">
																		
																		<div class="btn-group">
																		<input type="text" id="backgroudcolor" value="#668899"  class="col-xs-9 col-sm-9 colorwell">
												<a data-toggle="dropdown" class="btn btn-success dropdown-toggle col-xs-2 col-sm-2" style="padding:4px;" aria-expanded="false">
													<span class="ace-icon fa fa-caret-down icon-on-right"></span>
												</a>

												<div class="dropdown-menu dropdown-default">
													<div id="picker" ></div>
													 <script type="text/javascript" charset="utf-8">
													  $(document).ready(function() {
													    //$('#demo').hide();
													    var f = $.farbtastic('#picker');
													    var p = $('#picker').css('opacity', 1);
													    var selected;
													    $('.colorwell')
													      .each(function () { f.linkTo(this);  });
													 
													  });
													 </script>
												</div>
											</div>
																</td>
																
															</tr>
															<tr class="success">
																<td class="width-15">宽度:</td>
																<td class="width-35">
																		<div class="input-group"><input type="text" id="spinner_width" class="spinbox-input form-control text-center"></div>
																</td>
																<td class="width-15">高度:</td>
																<td class="width-35">
																		<div class="input-group"><input type="text" id="spinner_height" class="spinbox-input form-control text-center"></div>
																</td>
															</tr>
															 <tr class="active">
																<td class="width-15">数据表</td>
																<td class="width-35">
																<select class="form-control" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
																<option value="AZ">Arizona</option>
																<option value="AR">Arkansas</option>
																<option value="CA">California</option>
																<option value="CO">Colorado</option>
																<option value="CT">Connecticut</option>
																<option value="DE">Delaware</option>
																<option value="FL">Florida</option>
																<option value="GA">Georgia</option>
																<option value="HI">Hawaii</option>
																<option value="ID">Idaho</option>
																<option value="IL">Illinois</option>
																<option value="IN">Indiana</option>
																<option value="IA">Iowa</option>
																<option value="KS">Kansas</option>
																<option value="KY">Kentucky</option>
																<option value="LA">Louisiana</option>
																<option value="ME">Maine</option>
																<option value="MD">Maryland</option>
																<option value="MA">Massachusetts</option>
																<option value="MI">Michigan</option>
																<option value="MN">Minnesota</option>
																<option value="MS">Mississippi</option>
																<option value="MO">Missouri</option>
																<option value="MT">Montana</option>
																<option value="NE">Nebraska</option>
																<option value="NV">Nevada</option>
																<option value="NH">New Hampshire</option>
																<option value="NJ">New Jersey</option>
																<option value="NM">New Mexico</option>
																<option value="NY">New York</option>
																<option value="NC">North Carolina</option>
																<option value="ND">North Dakota</option>
																<option value="OH">Ohio</option>
																<option value="OK">Oklahoma</option>
																<option value="OR">Oregon</option>
																<option value="PA">Pennsylvania</option>
																<option value="RI">Rhode Island</option>
																<option value="SC">South Carolina</option>
																<option value="SD">South Dakota</option>
																<option value="TN">Tennessee</option>
																<option value="TX">Texas</option>
																<option value="UT">Utah</option>
																<option value="VT">Vermont</option>
																<option value="VA">Virginia</option>
																<option value="WA">Washington</option>
																<option value="WV">West Virginia</option>
																<option value="WI">Wisconsin</option>
																<option value="WY">Wyoming</option>
															</select>
																</td>
																<td class="width-15">条件1：</td>
																<td class="width-35">
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																</td>
															</tr >
																 <tr class="success">
																<td class="width-15">条件2:</td>
																<td class="width-35">
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																																		
																</td>
																<td class="width-15">条件3:</td>
																<td class="width-35">
																		
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																
																</td>
																
															</tr>
															 <tr class="active">
																<td class="width-15">标题:</td>

																<td class="width-35">
																		<input type="text" id="form-field-1" placeholder="Username" class="col-xs-12 col-sm-12">
																</td>

																<td class="width-15">是否显示</td>

																<td class="width-35">
																		<div class="col-xs-3">
																			<label>
																				<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
																				<span class="lbl"></span>
																			</label>
																		</div>
																</td>
																
															</tr>
														 <tr class="success">
																<td class="width-15">主题</td>

																<td class="width-35">
															<select class="col-xs-12 col-sm-12"  id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
																</td>

																<td class="width-15">数据容量</td>

																<td class="width-35">
																			<div class="input-group"><input type="text" id="spinner3" class="spinbox-input form-control text-center"></div>																		
																</td>
																
															</tr>
														</tbody>
													</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>							
								
<script>
  ( function() {
	var setting = {
			data: {
				simpleData: {
					enable: true
				}
			},
			async: {
				enable: true,
				url:"../web/WebDesign.Page/ajaxGetPage",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":"zTreeAsyncTest"},
				dataFilter: filter
			}
		};
	var widgetsetting = {
			edit: {
				enable: true,
				showRemoveBtn: false,
				showRenameBtn: false,
				drag: {
					isCopy: false,
					isMove: true,
					prev: true,
					next: true,
					inner: false
				}
			},
			check: {
				enable: false
			},
			callback: {
				beforeDrag: beforeDrag,
				beforeDrop: beforeDrop
			},
			async: {
				enable: true,
				url:"../web/WebDesign.Widget/ajaxGetWidget",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":"zTreeAsyncTest"},
				dataFilter: filter
			}
		};
		function filter(treeId, parentNode, childNodes) {
			if (!childNodes) return null;
			for (var i=0, l=childNodes.length; i<l; i++) {
				childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
			}
			return childNodes;
		}

		function beforeDrag(treeId, treeNodes) {
			//var treeObj = $.fn.zTree.getZTreeObj("widgetTree");
			//var node = treeObj.getNodeByTId("tree_10");
				var id= treeNodes[0].tId;
				$( "#"+id ).draggable();
			    $( "#page_main" ).droppable({
			        drop: function( event, ui ) {
			          //alert(treeId);
						$("#"+id).removeClass("ui-draggable");
						$("#"+id).removeClass("ui-draggable-handle");
						$("#"+id).attr("style","0");
						console.log("dsfsd");
			        }
			      });
			return true;
		}
		function beforeDrop(treeId, treeNodes, targetNode, moveType) {
		alert("df");
			return ;
		}
		$(document).ready(function(){
			$.fn.zTree.init($("#pageTree"), setting);
			$.fn.zTree.init($("#widgetTree"), widgetsetting);
			//zTree.setting.edit.drag.prev = false;$("#pageTree")
			//zTree.setting.edit.drag.inner = false;
			//zTree.setting.edit.drag.next = false;
		});    
  } )();
  function ajaxSocket(obj){
	  
	  $.post(url,data,succes,"json");
  }
  
	var scripts = [null,"<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery-ui.custom/jquery-ui.custom.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqueryui-touch-punch/jquery.ui.touch-punch.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/chosen/chosen.jquery.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/fuelux/js/spinbox.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-timepicker/js/bootstrap-timepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/moment/moment.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-daterangepicker/daterangepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery-knob/js/jquery.knob.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/autosize/dist/autosize.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery-inputlimiter/jquery.inputlimiter.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery.maskedinput/dist/jquery.maskedinput.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/bootstrap-tag/bootstrap-tag.js", null]
	$('.page-content-area').ace_ajax('loadScripts', scripts, function() {
	  //inline scripts related to this page
		 jQuery(function($) {
			 $('#spinner_height').ace_spinner({value:0,min:0,max:12,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			 $('#spinner_width').ace_spinner({value:0,min:0,max:12,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'}); 
			 $('#spinner3').ace_spinner({value:0,min:0,max:30,step:2, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
		 });
	  
	});
	/**
	处理向服务器请求控件的请求
	
	*/
	
(function ($){
	
	function movegetwidght(){
		
		var html = $("#main_page").html();
		$.post("../lskdfj",{id:"widghtid",html:html,type:0},function (data){
			
			
			
		},"json");
	}
	var obj = {
			id:null,//控件的id
			html:null,//已有的html内容
			type:0//操作类型
			
	};
})(jQuery);	
</script>							
								