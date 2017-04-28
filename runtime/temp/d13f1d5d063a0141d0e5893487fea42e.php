<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\f\phpace\public/../application/index\view\role\index.html";i:1493372370;}*/ ?>
<title>角色管理</title>
<div class="row" style="margin:0px;">
  <div class="col-xs-3" style="border:#000 0px solid; padding:2px">
    <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">部门列表</h4>
        </div>

        <div class="widget-body" style="font-size:10px; height:700px; overflow:auto">
          <div class="widget-main" style="font-size:10px;overflow:auto">
            <div id="usertreeview" class="tree" style="font-size:8px; width:100%; sScrollX:auto;sScrollY:auto"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default col-xs-9" style="border:#000 0px solid; padding:2px">
    <!-- div.table-responsive -->

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-xs-5">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">归属公司</label>

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">@</span> <input type="text" class="form-contro3" placeholder="Username" aria-describedby="basic-addon1" />
            </div>
          </div>

          <div class="col-xs-5">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">归属部门</label>

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">@</span> <input type="text" class="form-contro3" placeholder="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
        </div>
      </div>
    </div><!-- div.dataTables_borderWrap -->

    <div class="row">
      <div class="col-xs-5">
        <div class="clearfix">
          <button class="btn btn-sm btn-primary" data-type='3' data-toggle="modal" data-target="#myModal" data-whatever="修改角色">修改</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="新增角色">添加</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='2' data-whatever="删除角色">删除</button>
        </div>
      </div>

      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
    </div>

    <div style="clear:both">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="font-size:10px;">
       <thead>
          <tr>
            <th style="width:5%"><label class="pos-rel"><input type="checkbox" class="ace" /> </label></th>


            <th style="width:10%">position</th>

            <th style="width:8%">office</th>

            <th style="width:10%">start_date</th>
            <th style="width:10%"></th>
            <th style="width:10%">salary</th>
			<th style="width:1%">salaryL</th>
            <th style="width:20%"></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<ifrome name="dd"></ifrome>
<!-- ff -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal"  id="submitform" role="form" >
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" > 菜单名: </label>

										<div for="RoleName" class="col-sm-8">
											<input type="text" id="RoleName" name="RoleName" placeholder="Username" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 样式: </label>

										<div for="css" class="col-sm-8">
											<input type="text" id="css" name="Css" placeholder="Text Field" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 状态: </label>

										<div for="IsDelete" class="col-sm-8">
													<label>
														<input id="IsDelete"  name="IsDelete" class="ace ace-switch ace-switch-4" type="checkbox">
														<span class="lbl"></span>
													</label>
										</div>
									</div>
							      	<div class="modal-footer">
      										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
     										<button type="submit" id="submitbutton" class="btn btn-primary">确定</button>
    								</div>
								</form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- 结束模态框 -->
<div class="col-sm-6">
  <div id="dialog-message" class="hide">
    <p>您确定要删除该用户？</p>
  </div><!-- #dialog-message -->
  <!-- #dialog-confirm -->
</div>

<div id="dialog" title="提示信息" style='display:none'>
  <p>请先选中一行！</p>
</div>

<div id="dialog_delete" title="提示信息" style='display:none'>
  <p>确定要删除！</p>
</div>
<script>

$(function ()
{
	$.validator.setDefaults({
	    submitHandler: function() {
	        //$('#myModal').modal('hide');
	        var id = $("#submitbutton").attr("data-id");
	      	var IsDelete = $("#IsDelete").is(":checked");
	      	var type = $("#submitbutton").attr("data-type");
	      	if(IsDelete == true){
	      		IsDelete = 1;
	      	}else{
	      		IsDelete = 0;
	      	}
	      	var oper = null;
	      	if(type ==3 ){
	      		oper = "edit";
	      	}else {
	      		oper = "add";
	      	}
	      	alert(IsDelete);
	      	alert(id);
	      	alert(oper);
	        $.post('http://lnbei.com/index.php/index/Role/setRole',
	        {
	        	RoleName : $('#RoleName').val(),
	        	css : $('#css').val(),
	        	IsDelete : IsDelete,
	            id:id,
	            oper:oper
	        }, function (data)
	        {
	            if(data.code == 1){
	            	 $('#myModal').modal('hide');
	            	alert(data.msg);
	            }else{
	            	alert(data.msg);
	            }
	         
	        }, 'Json');
	
	    }
	});

	  $("#submitform").validate({
		    rules: {
		    	RoleName: {
		        required: true,
		      },
		      Css: {
		        required: true,
		      },
		    },
		    messages: {
		    	MenuName: {
		        required: "请输入角色名",
		      },
		      Css: {
		        required: "请输入样式",
		      },
		    }
		});


    //construct the data source object to be used by tree
    var remoteUrl = '<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Department/getDeparList';

    var remoteDateSource = function (options, callback){
        var parent_id = null;
        if ('type' in options && options['type'] == 'folder')
        {

            if ('additionalParameters' in options && 'children' in options.additionalParameters)
            {
                parent_id = options.additionalParameters['id'];
            }
        }
        if (!('text' in options || 'type' in options))
        {
            parent_id = 0; //load first level data
        }
        if (parent_id !== null)
        {
            $.ajax(
            {
                url : remoteUrl,
                data : 'id=' + parent_id,
                type : 'POST',
                dataType : 'json',
                success : function (response)
                {
                    if (response.status == "OK")
                        callback(
                        {
                            data : response.data
                        }
                        )
                },
                error : function (response)
                {
                    //console.log(response);
                }
            }
            )
        }
    }

    $('#myModal2').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            //modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-footer .btn.btn-primary').attr('data-id', recipient);
    }
    )
    $('#usertreeview').ace_tree(
    {
        dataSource : remoteDateSource,
        loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
        'open-icon' : 'ace-icon fa fa-folder-open',
        'close-icon' : 'ace-icon fa fa-folder',
        'itemSelect' : true,
        'folderSelect' : true,
        'multiSelect' : false,
        'selected-icon' : null,
        'unselected-icon' : null,
        'folder-open-icon' : 'ace-icon tree-plus',
        'folder-close-icon' : 'ace-icon tree-minus',

    }
    );
    $('#treeviewserch').ace_tree(
    {
        dataSource : remoteDateSource,
        loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
        'open-icon' : 'ace-icon fa fa-folder-open',
        'close-icon' : 'ace-icon fa fa-folder',
        'itemSelect' : true,
        'folderSelect' : true,
        'multiSelect' : false,
        'selected-icon' : null,
        'unselected-icon' : null,
        'folder-open-icon' : 'ace-icon tree-plus',
        'folder-close-icon' : 'ace-icon tree-minus',

    }
    );

    //show selected items inside a modal
    $('#submit-button').on('click', function ()
    {
        var output = '';
        var items = $('#usertreeview').tree('selectedItems');
        for (var i in items)
            if (items.hasOwnProperty(i))
            {
                var item = items[i];
                output += item.additionalParameters['id'] + ":" + item.text + "\n";
            }

        $('#modal-tree-items').modal('show');
        $('#tree-value').css(
        {
            'width' : '98%',
            'height' : '200px'
        }
        ).val(output);

    }
    );

    if (location.protocol == 'file:')
        alert("For retrieving data from server, you should access this page using a webserver.");
}
);


$('#usertreeview').on('selected.fu.tree', function (e){

    var items = $('#usertreeview').tree('selectedItems');
    //alert(items[0].additionalParameters['id']);

}
);

//override dialog's title function to allow for HTML titles
$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype,{
        _title : function (title)
        {
            var $title = this.options.title || '&nbsp;'
                if (("title_html" in this.options) && this.options.title_html == true)
                    title.html($title);
                else
                    title.text($title);
        }
    }
    ));

$("#id-btn-dialog1").on('click', function (e)
{
    e.preventDefault();

    var dialog = $("#dialog-message").removeClass('hide').dialog(
        {
            modal : true,
            title : "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i>警告信息</h4></div>",
            title_html : true,
            buttons : [
                {
                    text : "Cancel",
                    "class" : "btn btn-minier",
                    click : function ()
                    {
                        $(this).dialog("close");
                    }
                },
                {
                    text : "OK",
                    "class" : "btn btn-primary btn-minier",
                    click : function ()
                    {
                        $(this).dialog("close");
                    }
                }
            ]
        }
        );

}
);

var scripts = [null, "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables/media/js/jquery.dataTables.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/dataTables.buttons.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.flash.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.html5.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.print.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.colVis.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-select/js/dataTables.select.js", null]
$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
{
    //inline scripts related to this page
    jQuery(function ($)
    {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            .DataTable(
            {

                "columns" : [
                    {
                        "data" : "",
                        "orderable" : false,
                    },
                    {
                        "data" : "RoleName",
                        "title" : "角色名",
                        "orderable" : false,
                    },
                    {
                        "data" : "IsDelete",
                        "title" : "状态",
                        "orderable" : false,
                    },
                    {
                        "data" : "Css",
                        "title" : "样式",
                        "orderable" : false,
                    },
                    {
                        "data" : "DatetimeCreated",
                        "title" : "创建时间",
                        "orderable" : false,
                    },
                    {
                        "data" : "DatetimeUpdated",
                        "title" : "更新时间",
                        "orderable" : false,
                    },
                    {
                        "data" : "ID",
                        "title" : "ID",
                        "orderable" : false,
                    },

                    {
                        "data" : ""
                    }
                ],
                "columnDefs" : [
                    {
                        "orderable" : false,
                        "targets" : 0,
                        "data" : null,
                        "defaultContent" : "<label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>"
                    },
                    {
                        "orderable" : false,
                        "targets" : 7,
                        "data" : null,
                        "defaultContent" : "<a data-type='1' data-whatever='修改角色' class='btn btn-success btn-xs'><i class='fa fa-edit'></i> 修改</a><a  data-type='1' data-whatever='删除角色' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> 删除</a>"
                    },
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                      },

                ],

                "drawCallback" : function (settings)  {},
                "language" :
                {
                    "lengthMenu" : "每页 _MENU_ 条记录",
                    "zeroRecords" : "没有找到记录",
                    "info" : "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
                    "infoEmpty" : "无记录",
                    "infoFiltered" : "(从 _MAX_ 条记录过滤)"
                },
                "oPaginate" :
                {
                    "sFirst" : "首页",
                    "sPrevious" : " 上一页 ",
                    "sNext" : " 下一页 ",
                    "sLast" : " 尾页 "
                },

                "bProcessing" : true,
                "bServerSide" : true,
                "sAjaxSource" : "<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Role/getRole?id=0",
            }
            );
        $('#usertreeview')
        .on('selected.fu.tree', function (e)
        {
            var items = $('#usertreeview').tree('selectedItems');
            var url = "<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Role/getRole?id=" + items[0].additionalParameters['id'];
            myTable.ajax.url(url).load();

        }
        );
        $('#treeviewserch').on('selected.fu.tree', function (e)
        {

            var items = $('#treeviewserch').tree('selectedItems');

            //alert(items[0].text);
            $('[data-tree]').attr('data-tree', items[0].text).attr('data-value', items[0].additionalParameters['id']);

        }
        );
        $('[data-tree]').on('click', function ()
        {
            $('#myModal2').modal('hide');
            var id = $('#depart').attr('data-id');

            $(id).val($('#depart').attr('data-tree'))
            .attr('data-companyID', $('#depart').attr('data-value'));
            //alert(id);
            //

        }
        );
  
        $('#myModal').on('show.bs.modal', function (event)
        {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var type = button.data('type');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            if (type == 1)
            {
            	$("#submitbutton").attr("data-type",'1');
                return;
            }


            var checked_count = $('#dynamic-table tbody').find('[data-checked=1]').toArray().length;
            if (checked_count == 0)
            {
                $('#myModal').modal('hide');
                $("#dialog").dialog(
                {
                    modal : true,
                    dialogClass : "no-close",
                    buttons : [
                        {
                            text : "OK",
                            click : function ()
                            {
                                $(this).dialog("close");
                            }
                        }
                    ]
                }
                );
                return false;
            }
            else
            {	
                var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                var d = myTable.row(mytables).data();
            if (type == 2)
            {

                $('#myModal').modal('hide');
                $("#dialog_delete").dialog(
                {
                    modal : true,
                    dialogClass : "no-close",
                    buttons : [
                        {
                            text : "取消",
                            click : function ()
                            {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text : "确定",
                            click : function ()  {
                            	$(this).dialog("close");
                                $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Role/setRole',
                                        {
                                            id:d.ID,
                                            oper:"del"
                                        }, function (data)
                                        {
                                            if(data.code == 1){
                                            	
                                            	alert(data.msg);
                                            	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove()
                                                .draw();
                                            }else{
                                            	alert(data.msg);
                                            }

                                        }, 'Json');
                            }
                        }
                    ]
                }
                );
                return false;
            }
            	$("#submitbutton").attr("data-type",'3');
                $("#submitbutton").attr("data-id",d.ID);
                $('#RoleName').val(d.RoleName); //获取归属公司id和值
                $('#css').val(d.Css); //获取归属公司id和值
                if(d.IsDelete == 0){
                	$("#IsDelete").prop("checked",false);
                }else{
                	$("#IsDelete").prop("checked",true);
                }
            }
        });


        $('#dynamic-table tbody').on('click', 'td .btn.btn-success.btn-xs', function ()
        {
        	$("#submitbutton").attr("data-type",'3');
            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            $("#submitbutton").attr("data-id",d.ID);
            $('#RoleName').val(d.RoleName); //获取归属公司id和值
            $('#css').val(d.Css); //获取归属公司id和值
            if(d.IsDelete == 0){
            	$("#IsDelete").prop("checked",false);
            }else{
            	$("#IsDelete").prop("checked",true);
            }
            $('#myModal').modal('show');
        });
        $('#dynamic-table tbody').on('click', '.btn.btn-danger.btn-xs', function ()
        {

            $("#dialog_delete").dialog(
            {
                modal : true,
                dialogClass : "no-close",
                buttons : [
                    {
                        text : "取消",
                        click : function ()
                        {
                            $(this).dialog("close");
                        }
                    },
                    {
                        text : "确定",
                        click : function ()  {
                        	$(this).dialog("close");
                            var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                            var d = myTable.row(mytables).data();
                            $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Role/setRole',
                                    {
                                        id:d.ID,
                                        oper:"del"
                                        
                                    }, function (data)
                                    {
                                        if(data.code == 1){
                                        	
                                        	alert(data.msg);
                                        	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove().draw(false);
                                        }else{
                                        	alert(data.msg);
                                        }

                                    }, 'Json');
                        }
                    }
                ]
            });
        });
        $('#dynamic-table tbody').on('click', 'tr', function ()
        {
            if ($(this).hasClass('selected'))
            {
                $(this).removeClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false).attr('data-checked', 0); ;
                //$(this).find('input:checkbox').prop('checked', false);
            }
            else
            {
                myTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false);
                $('#dynamic-table tbody').find('input:checkbox').attr('data-checked', 0);
                $(this).find('input:checkbox').prop('checked', true).attr('data-checked', 1); ;
            }
        });

        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function ()
        {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function ()
            {
                var row = this;
                if (th_checked)
                    myTable.row(row).select();
                else
                    myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]', function ()
	        {
	            var row = $(this).closest('tr').get(0);
	            if (this.checked)
	                myTable.row(row).deselect();
	            else
	                myTable.row(row).select();
	        }
        );

        $(document).on('click', '#dynamic-table .dropdown-toggle', function (e)
	        {
	            e.stopImmediatePropagation();
	            e.stopPropagation();
	            e.preventDefault();
	        }
        );

	});



    });


</script>