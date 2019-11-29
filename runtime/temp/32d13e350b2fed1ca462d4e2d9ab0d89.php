<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/var/www/ZUAD_info_release/public/../application/admin/view/device/index.html";i:1546326636;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/header.html";i:1539856994;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
            <h5>设备列表</h5>
        </div>
        <div class="ibox-content">
            <div class="hr-line-dashed"></div>
            <div class="example">
                <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                    <?php if(empty($roleData)): ?>
                    <button type="button" class="btn btn-outline btn-default" onclick="add()">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </button>
                    <?php endif; if(!empty($roleData) && $roleData['is_it_allowed_to_add_device'] == 0): ?>
                    <button type="button" class="btn btn-outline btn-default" onclick="add()">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </button>
                    <?php endif; ?>

                    <button type="button" class="btn btn-outline btn-default" onclick="choiceRestart()">
                        <i class="glyphicon glyphicon-repeat" aria-hidden="true"></i> 选择重启
                    </button>

                    <?php if(empty($roleData)): ?>
                    <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                    </button>
                    <?php endif; if(!empty($roleData) && $roleData['is_deletion_allowed_device'] == 0): ?>
                    <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                    </button>
                    <?php endif; ?>
                </div>
                <table id="table" data-mobile-responsive="true" data-mobile-responsive="true" class="table table-striped">
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
<script type="text/javascript">
    var table;
    var uid;
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
                width   : '3%',
                showSelectTitle    : true,
                checkbox    : true,
            }, {
                field   : 'id',
                title   : 'ID',
                align   : 'center',
                sortable : true,//允许列进行排序。
                width   : '4%',
                visible : false,//false隐藏列项目。
            }, {
                field   : 'device_id',
                title   : '设备ID',
                align   : 'center',
                width   :   '10%',
                sortable : true,
                visible : false,//false隐藏列项目。
            },{
                field   : 'device_name',
                title   : '设备名称',
                align   : 'center',
                width   :   '12%',
                sortable : true,//允许列进行排序。
            },{
                field   : 'tab',
                title   : '标签',
                align   : 'center',
                width   :   '10%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'layout',
                title: '默认节目',
                align : 'center',
                width   :   '10%',
                formatter : function (value, row, index) {
                    return "<a onclick='new_page("+row.layout_id+")'>"+value+"</a>"
                },
                sortable : true,//允许列进行排序。
                clickToSelect : false,//点击当前列不会触select选或radio
            }, {
                field: 'last_time',
                title: '最后连接时间',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="margin: 0 auto;">'+row.last_time.last_time+'</div>';
                },
                width : '6%',
            }, {
                field: 'is_live',
                title: '是否在线',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    if (row.last_time.is_live == 1) {
                        return '<div style="margin: 0 auto;"><span class="label label-success">在线</span></div>';
                    } else {
                        return '<div style="margin: 0 auto;"><span class="label label-danger">离线</span></div>';
                    }
                },
                width  :  '6%',
            }, {
                field: 'edition',
                title: '版本号',
                align : 'center',
                width   :   '5%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'edition',
                title: '设备状态信息',
                align : 'center',
                width   :   '5%',
                formatter : function (value, row, index) {
                    return '<button type="button" class="btn btn-outline btn-default" onclick="lookDeviceInfo('+row.id+')">\n' +
                                '<i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i> 设备信息\n' +
                             '</button>'
                },
                clickToSelect : false,//点击当前列不会触select选或radio
            }, {
                field: 'client_address',
                title: '客户端地址',
                align : 'center',
                width   :   '10%',
                visible : false,//false隐藏列项目。
                sortable : true,//允许列进行排序。
            }, {
                field: 'create_time',
                title: '创建时间',
                align : 'center',
                width   :   '6%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'operate',
                title: '功能按钮',
                align : 'center',
                width : '10%',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            }
        ];
        table = new BSTable('table', "<?php echo url('device/index'); ?>", columns); //容器,url,列表列名
        table.setSort('tab','desc'); //排序方式
        table.setPageSize('<?php echo $pageSize; ?>'); //页面显示条数
        table.setSearchPlaceholder('设备名称'); //搜索
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });
        table.setOnLoadSuccess(function (data) {
             console.log(data);
            uid = data.uid;
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

    var roleData = <?php echo $roleData; ?>;

    //操作列
    function operateFormatter(value, row, index) {
        var id = row.id;
        var result = "";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"deviceEdit('" + id + "')\" title='编辑'><i class='glyphicon glyphicon-pencil'></i>编辑</button>";

        if(roleData == 0){
            result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"deviceDel('" + id + "')\" title='删除'><i class='glyphicon glyphicon-trash'></i>删除</button>";
        }

        if(roleData !== 0 && roleData.is_deletion_allowed_device == 0){
            result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"deviceDel('" + id + "')\" title='删除'><i class='glyphicon glyphicon-trash'></i>删除</button>";
        }
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

    function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = date.getDate() + ' ';
        var h = date.getHours() + ':';
        var m = date.getMinutes() + ':';
        var s = date.getSeconds();
        return Y+M+D+h+m+s;
    }

    //添加跳转
    function add () {
        window.location.href = "<?php echo url('device/deviceAdd'); ?>";
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
        var device_ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ","; //取出选中行id
            device_ids += rows[i]['device_id'] + ",";
        }
        ids = ids.substring(0, ids.length - 1);//删除最后一个逗号
        device_ids = device_ids.substring(0, device_ids.length - 1);//删除最后一个逗号

        layer.confirm('确认删除已选记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_more"); ?>', {'ids' : ids,"device_ids":device_ids}, function(res){
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
    //编辑设备
    function deviceEdit(id){
        location.href = './deviceEdit/id/'+id+'.html';
    }
    <!--删除单条-->
    function deviceDel(id){
        layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("deviceDel"); ?>', {'id' : id}, function(res){
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
    //选择附件
    function addLayout (id) {
        $('#role').removeClass('hidden');
        //页面层
        layer.open({
            type: 2,
            area:['80%', '90%'],
            title:'为设备添加附件',
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('getDevice'); ?>&id=" + id,

            cancel: function(){
                $('#role').addClass('hidden');
            },
        });
    }
    function new_page(id) {
        layer.open({
            type:2,
            area:['70%', '75%'],
            title:'预览节目',
            maxmin: true,
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('admin_released/ProgramPreview/new_page'); ?>?id=" + id,
        })
    }
    function new_pages() {
        layer.msg('暂时不支持节目组预览',{icon:5});
    }
    function lookDeviceInfo(id){
        layer.open({
            type:2,
            title:'设备运行状态及相关信息',
            area:['65%','95%;'],
            content:'<?php echo url("lookInfo"); ?>?id=' + id
        });
    }
    function setLayout() {
        var rows = $("#table").bootstrapTable('getSelections');//获取已选中的记录
        if (rows.length== 0) {
            layer.msg("请先选择设备!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['id'] + ","; //取出选中行id
        }
        ids = ids.substring(0, ids.length - 1);//删除最后一个逗号

        if(ids == ''){
            layer.msg('请选择设备',{time:1500});
        }else{
            var state = 1;
            $.getJSON('<?php echo url("checkDevice"); ?>', {'ids' : ids}, function(res){
                if(res.code == 1){
                    //页面层
                    layer.open({
                        type: 2,
                        area:['80%', '90%'],
                        title:'为设备分配节目',
                        skin: 'layui-layer-demo', //加上边框
                        content: "<?php echo url('setLayout'); ?>?ids=" + ids
                    });
                }else {
                    layer.msg(res.msg,{time:3000});
                }
            });


        }
    }
    function choiceRestart() {
        //获取所有被选中的记录
        var rows = $("#table").bootstrapTable('getSelections');//获取已选中的记录
        if (rows.length== 0) {
            layer.msg("请先选择要重启的记录!",{icon:2,time:1500,shade: 0.1});
            return;
        }
        var ids = '';
        for (var i = 0; i < rows.length; i++) {
            ids += rows[i]['device_id'] + ","; //取出选中行id
        }
        ids = ids.substring(0, ids.length - 1);//删除最后一个逗号
        console.log(ids);
        layer.confirm('确定要重启已选设备吗', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("choiceRestart"); ?>', {'ids' : ids}, function(res){
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