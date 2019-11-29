<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/var/www/info_release/public/../application/admin_released/view/layout_group/index.html";i:1539857014;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!--bootstrap-table表格插件-->
    <!--<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">-->
    <link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/static/admin/layui/css/layui.css" />
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    </style>
</head>
<link type="text/css" rel="stylesheet" href="/static/admin/css/checkbox/demo/build.css">
<link type="text/css" rel="stylesheet" href="/static/admin/css/checkbox/bower_components/Font-Awesome/css/font-awesome.css">
<style>
    .images {
        max-height: 80px;
        max-width: 100px;
    }
    table th {
        background-color: #F5F5F6;
    }
    .pagination{ display: none;}
    /*.fixed-table-body{min-height: 900px;}*/
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>节目组列表</h5>
        </div>
        <div class="ibox-content">

            <div class="hr-line-dashed"></div>

            <div class="example">
                <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                    <button type="button" class="btn btn-outline btn-default" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </button>
                    <!--<button type="button" class="btn btn-outline btn-default" onclick="del_all_invalid()">
                        <i class="glyphicon glyphicon-lock" aria-hidden="true"></i> 批量作废
                    </button>-->
                    <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                    </button>
                </div>
                <table id="table" data-mobile-responsive="true"  data-mobile-responsive="true" style="table-layout:fixed">
                </table>
                <div id="AjaxPage" style=" text-align: right;"></div>
                <div id="allpage" style=" text-align: right;"></div>
            </div>
        </div>
    </div>
</div>

<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/static/admin/js/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="/static/admin/js/jquery.form.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<script src="/static/admin/js/laypage/laypage.js"></script>
<script src="/static/admin/js/laytpl/laytpl.js"></script>
<script src="/static/admin/js/lunhui.js"></script>
<script src="/static/admin/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<!--<script src="/static/admin/js/zuad-layer.js"></script>-->
<script type="text/javascript" src="/static/zclip/clipboard.min.js"></script>

<!-- Bootstrap table -->
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>

<script>
    $(document).ready(function(){
        $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})
    });
</script>
<script type="text/javascript" src="/static/admin/js/RH-bootsrap-table1.js"></script>
<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">添加节目组</h3>
            </div>
            <form class="form-horizontal" name="addGroup" id="addGroup" method="post" action="<?php echo url('layoutGroup/addGroup'); ?>">
                <div class="ibox-content">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">节目组名称</label>
                        <div class="col-sm-8">
                            <input type="text" name="group_name" id="group_name" placeholder="输入节目组名称" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">状&nbsp;态</label>
                        <div class="col-sm-6">
                            <div class="radio i-checks">
                                <input type="radio" name='status' value="0" checked="checked"/>开启&nbsp;&nbsp;
                                <input type="radio" name='status' value="1" />关闭
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 保存</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> 关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var index = '';
    <!--添加节目组-->
    function add () {
        // location.href = "<?php echo url('layoutGroup/addGroup'); ?>";
        $('#addGroup').removeClass('hidden');
        //页面层
        index = layer.open({
            type: 1,
            area:['60%', '80%'],
            title:'添加节目组',
            skin: 'layui-layer-demo', //加上边框
            content: $('#addGroup'),

            cancel: function(){
                $('#addGroup').addClass('hidden');
            },
        });
    }
    $(function(){
        $('#addGroup').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });
        function checkForm(){
            if( '' == $.trim($('#group_name').val())){
                layer.msg('请输入节目组名称',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }
        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('layoutGroup/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1});
                return false;
            }
        }
    });
    <!--编辑节目组-->
    function edit(id){
        //获取所有被选中的记录
        /*var rows = $("#table").bootstrapTable('getSelections');//获取已选中的记录
        if (rows.length== 0) {
            layer.msg("请先选择要编辑的的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        if (rows.length>1) {
            layer.msg("只能选择一条记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var id = '';
        for (var i = 0; i < rows.length; i++) {
            id = rows[i]['id']; //取出选中行id
        }*/
        location.href = "<?php echo url('layoutGroup/editGroup'); ?>&id=" + id;
    }
    var table;
    $(function () {
        createTable();
    });

    function selectPage () {
        table.selectPage(3);
    }

    function  refresh() {
        //固定列BUG，更新数据时，数据没有清空干净，手动清除
        $('.fixed-table-body-columns table tbody').html('');
        table.refresh();
    }

    function createTable () {
        //定义列
        var columns = [
            {
                field   : 'checkbox',
                align   : 'center',
                width   : '50px',
                showSelectTitle    : true,
                checkbox    : true,
            }, {
                field   : 'id',
                title   : '编号',
                align   : 'center',
                sortable : true,//允许列进行排序。
                width   : '8%',
                visible : true,//false隐藏列项目。
            }, {
                field   : 'group_name',
                title   : '节目组名称',
                align   : 'center',
                width   :   '20%',
                sortable : true,
            }, {
                field: 'layout_name',
                title: '内设节目',
                align : 'center',
                visible : true,//false隐藏列项目。
                width   :   '70%',
                formatter : function(value, row, index){
                    if(row.id !== ''){
                        return "<span id='checkAll'data-toggle='tooltip' title="+value+">"+value+"</span>"
                    }
                },
                clickToSelect : false,//点击当前列不会触select选或radio
                cellStyle : {
                    css:{"overflow":"hidden","white-space":"nowrap","text-overflow":"ellipsis"}
                },

            }, {
                field: 'create_time',
                title: '创建时间',
                align : 'center',
                width   :   '10%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '20%',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('layoutGroup/index'); ?>", columns); //容器,url,列表列名
        table.setSort('id','desc'); //排序方式
        table.setSearchPlaceholder('节目组名称') //搜索
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });
        table.setOnLoadSuccess(function (data) {
            var curr = 5;
            var allPage = data.allPage;
            console.log(data);
            //分页
            laypage({
                cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                pages:allPage,//总页数
                skip: true,//是否开启跳页
                skin: '#1AB5B7',//分页组件颜色
                curr: data.currPage || 1,
                groups: 3,//连续显示分页数
                jump: function(obj, first){
                    if(!first){
                        table.btInstance.bootstrapTable('selectPage', obj.curr);
                    }
                }
            });
        });
        table.init();
    }
    //操作列
    function operateFormatter(value, row, index) {
        var id = row.id;
        var result = "";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"edit('" + id + "')\" title='编辑'><i class='glyphicon glyphicon-pencil'></i>编辑</button>";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"addLayout('" + id + "')\" title='预览'><i class='glyphicon glyphicon-link'></i>节目</button>"
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"del('" + id + "')\" title='删除'><i class='glyphicon glyphicon-trash'></i>删除</button>";

        return result;
    }

    <!--搜索按钮-->
    function search () {
        var key = $('#key').val();
        var param = {
            //silent: true,//静默加载数据
            query:{
                key:key
            }
        };
        //重新加载表格
        table.refresh(param);
    }

    <!--软删除节目组-->
    function invalid(id){
        lunhui.confirm(id,'<?php echo url("layouGroupInvalid"); ?>');
        layer.confirm('确认作废此条记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("layouGroupInvalid"); ?>', {'id' : id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                    table.refresh();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    }

    <!--删除节目组-->
    function del(id){
        lunhui.confirm(id,'<?php echo url("layoutGroupDel"); ?>');
        layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("layoutGroupDel"); ?>', {'id' : id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                    table.refresh();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    }
    //添加节目到节目组
    function addLayout (id) {
        //页面层
        layer.open({
            type: 2,
            area:['80%', '90%'],
            title:'添加节目到节目组合',
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('getLayout'); ?>&id=" + id,

            cancel: function(){
                $('#role').addClass('hidden');
            },
        });
    }

    <!--批量删除节目-->
    function del_all(){
        //获取所有被选中的记录
        var rows = $("#table").bootstrapTable('getSelections');
        if (rows.length== 0) {
            layer.msg("请先选择要删除的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ",";
        }
        ids = ids.substring(0, ids.length - 1);

        layer.confirm('确认删除已选记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_all_layout"); ?>', {'ids' : ids}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                    table.refresh();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    }

    <!--批量软删除删除节目-->
    function del_all_invalid(){
        //获取所有被选中的记录
        var rows = $("#table").bootstrapTable('getSelections');
        if (rows.length== 0) {
            layer.msg("请先选择要作废的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ",";
        }
        ids = ids.substring(0, ids.length - 1);

        layer.confirm('确认作废已选记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_all_invalid"); ?>', {'ids' : ids}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                    table.refresh();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    }

    $(function () { $("#checkAll").tooltip('toggle');});
</script>
</body>