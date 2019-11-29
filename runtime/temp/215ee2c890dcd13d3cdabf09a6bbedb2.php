<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/var/www/info_release/public/../application/admin/view/device_group/index.html";i:1539857006;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<body class="gray-bg">
<style>
    .images {
        max-height: 80px;
        max-width: 100px;
    }
    table th {
        background-color: #ededee;
    }
    .pagination{ display: none;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>设备组管理</h5>
        </div>
        <div class="ibox-content">
            <div class="example-wrap">
                <div class="example">
                    <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                        <button type="button" class="btn btn-outline btn-default" onclick="add()">
                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                        </button>
                        <button type="button" class="btn btn-outline btn-default" onclick="choiceRestart(2)">
                            <i class="glyphicon glyphicon-lock" aria-hidden="true"></i> 选择重启
                        </button>
                        <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                            <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                        </button>
                    </div>
                    <table id="table" data-mobile-responsive="true" data-mobile-responsive="true">
                    </table>
                    <div id="AjaxPage" style=" text-align: right;"></div>
                    <div id="allpage" style=" text-align: right;"></div>
                </div>
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
<script type="text/javascript">
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
                width   : '4%',
                showSelectTitle    : true,
                checkbox    : true,

            }, {
                field   : 'id',
                title   : '编号',
                align   : 'center',
                sortable : true,//允许列进行排序。
                width   : '5%',
                visible : false,//false隐藏列项目。
            }, {
                field   : 'group_name',
                title   : '设备组名称',
                align   : 'center',
                width   :   '20%',
                sortable : true,
                editable : true,
            },{
                field   : 'deviceList',
                title   : '已选设备',
                align   : 'center',
                width   :   '10%',
            }, {
                field: 'layoutList',
                title: '已选节目/节目组',
                align : 'center',
                width   :   '10%',
            }, {
                field: 'position_name',
                title: '区域',
                align : 'center',
                width   :   '7%',
            }, {
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '15%',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('index'); ?>", columns); //容器,url,列表列名
        table.setSort('id','desc'); //排序方式
        table.setPageSize('<?php echo $pageSize; ?>'); //页面显示条数
        table.setSearchPlaceholder('设备组名称'); //搜索
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });
        table.setOnLoadSuccess(function (data) {
            //console.log(data);
            var curr = 5;
            var allpage = data.allPage;
            //分页
            laypage({
                cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                pages: allpage,//总页数
                skip: true,//是否开启跳页
                skin: '#1AB5B7',//分页组件颜色
                curr: data.currPage || 1,
                groups: 3,//连续显示分页数
                jump: function(obj1, first){
                    if(!first){
                        table.btInstance.bootstrapTable('selectPage', obj1.curr);
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
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"edit('" + id + "')\"><i class='glyphicon glyphicon-pencil'></i>编辑</button>";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"addDevice('" + id + "')\"><i class='glyphicon glyphicon-eye-open'></i>选择设备和节目</button>";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"deviceDel('" + id + "')\"><i class='glyphicon glyphicon-trash'></i>删除</button>";

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
</script>
<script type="text/javascript">
    //编辑设备
    function add(){
        location.href = './deviceGroupAdd.html';
    }
    //编辑设备
    function edit(id){
        location.href = './deviceGroupEdit/id/'+id+'.html';
    }

    //删除设备
    function deviceDel(id){
        lunhui.confirm(id,'<?php echo url("DeviceGroupDel"); ?>');
        layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("DeviceGroupDel"); ?>', {'id' : id}, function(res){
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
    <!--批量删除-->
    function del_all(){
        //获取所有被选中的记录
        var rows = $("#table").bootstrapTable('getSelections');//获取已选中的记录
        if (rows.length== 0) {
            layer.msg("请先选择要删除的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ","; //取出选中行id
        }
        ids = ids.substring(0, ids.length - 1);//删除最后一个逗号

        layer.confirm('确认删除已选记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_all"); ?>', {'ids' : ids}, function(res){
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
    //设备组状态
    function device_state(id){
        lunhui.status(id,'<?php echo url("device_group_status"); ?>');
    }

    //添加设备到设备组
    function addDevice (id) {
        //页面层
        layer.open({
            type: 2,
            area:['80%', '90%'],
            title:'添加设备到设备组合',
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('getDevice'); ?>?ids=" + id
        });

    }
    function choiceRestart(state) {
        //获取所有被选中的记录
        var rows = $("#table").bootstrapTable('getSelections');//获取已选中的记录
        if (rows.length== 0) {
            layer.msg("请先选择要重启的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ","; //取出选中行id
        }
        ids = ids.substring(0, ids.length - 1);//删除最后一个逗号
        if(state == 1){
            var msg = '确定要待机已选设备吗？'
        }else {
            var msg = '确定要重启已选设备吗？'
        }
        layer.confirm(msg, {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("choiceRestart"); ?>', {'ids' : ids,'state':state}, function(res){
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
</script>
</body>