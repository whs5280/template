<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/var/www/info_release/public/../application/admin_released/view/layout/index.html";i:1546845713;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<style type="text/css">
    .images {
        max-height: 80px;
        max-width: 100px;
    }
    table th {
        background-color: #F5F5F6;
    }
    .pagination{ display: none;}
    /*隐藏掉我们模型的checkbox*/
    /*.fixed-table-body{min-height: 900px;}*/
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h6>节目列表</h6>
        </div>
        <div class="ibox-content">
            <div class="example">
                <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                    <?php if(empty($roleData)): ?>
                        <button type="button" class="btn btn-outline btn-default" onclick="add()">
                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                        </button>
                    <?php endif; if(!empty($roleData) && $roleData['is_it_allowed_to_add_layout'] == 0): ?>
                    <button type="button" class="btn btn-outline btn-default" onclick="add()">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </button>
                    <?php endif; if(empty($roleData)): ?>
                    <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                    </button>
                    <?php endif; if(!empty($roleData) && $roleData['is_deletion_allowed_layout'] == 0): ?>
                    <button type="button" class="btn btn-outline btn-danger" onclick="del_all()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 批量删除
                    </button>
                    <?php endif; ?>
                </div>
                <table id="table" class="table table-condensed" data-mobile-responsive="true" data-mobile-responsive="true">
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
                showSelectTitle  : true,
                checkbox    : true,

            }, {
                field   : 'layout_id',
                title   : '编号',
                align   : 'center',
                sortable : true,//允许列进行排序。
                width   : '5%',
                visible : false,//false隐藏列项目。
            }, {
                field   : 'layout',
                title   : '节目名称',
                align   : 'center',
                width   :   '20%',
                sortable : true,
                editable : true,
                formatter : function(value, row, index){
                    if(row.id !== ''){
                        return "<a onclick='look("+row.id+")'>"+value+"</a>"
                    }
                },
            },{
                field   : 'group_name',
                title   : '所属节目组',
                align   : 'center',
                width   :   '10%',
            }, {
                field: 'username',
                title: '拥有者',
                align : 'center',
                width   :   '10%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'user_id',
                title: '权限',
                align : 'center',
                width   :   '7%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'size',
                title: '节目大小',
                align : 'center',
                width   :   '7%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'create_time',
                title: '创建时间',
                align : 'center',
                width   :   '7%',
                sortable : true,//允许列进行排序。
            }, {
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '8%',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('layout/index'); ?>", columns); //容器,url,列表列名
        table.setSort('id','desc'); //排序方式
        table.setPageSize('<?php echo $pageSize; ?>'); //页面显示条数
        table.setSearchPlaceholder('节目名称'); //搜索
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });
        table.setOnLoadSuccess(function (data) {
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
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"edit('" + id + "')\"><i class='glyphicon glyphicon-pencil'></i>编辑</button>";
        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"new_page('" + id + "')\"><i class='glyphicon glyphicon-eye-open'></i>预览</button>";
//        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"sendTask('" + id + "')\"><i class='glyphicon glyphicon-eye-open'></i>下发</button>";

//        result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"coppy('" + id + "')\"><i class='glyphicon glyphicon-book'></i>复制</button>";
        if("<?php echo $is_admin; ?>" == 1){
            result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-default' onclick=\"user_data('" + id + "')\"><i class='glyphicon glyphicon-asterisk'></i>用户数据</button>";

        }

        if(roleData == 0){
            result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"del('" + id + "')\"><i class='glyphicon glyphicon-trash'></i>删除</button>";
        }

        if(roleData !== 0 && roleData.is_deletion_allowed_layout == 0){
            result += "<button type='button' style='padding: 2px 5px; margin-bottom: 0;' class='btn btn-outline btn-danger' onclick=\"del('" + id + "')\"><i class='glyphicon glyphicon-trash'></i>删除</button>";

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
</script>
<script type="text/javascript">
    //添加跳转
    function add () {
        window.location.href = "<?php echo url('layout/layoutAdd'); ?>";
    }

    <!--编辑节目-->
    function edit(id){
        location.href = "<?php echo url('layout/layoutEdit'); ?>?id=" + id;
    }
//    下发任务
    function sendTask(id) {
        layer.open({
            type:2,
            area:['90%', '95%'],
            title:'下发任务',
            maxmin: true,
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('deviceList'); ?>?id=" + id,
        })
    }

    function Qx(id) {
        layer.open({
            type:2,
            area:['90%', '95%'],
            title:'节目权限',
            maxmin: true,
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('layoutQx'); ?>?id=" + id,
        })
    }
    <!--描述页面-->
    function new_page(id){
        window.open("<?php echo url('ProgramPreview/new_page'); ?>?id=" + id);
    }

    <!--删除单条节目-->
    function del(id){
        layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("layoutDel"); ?>', {'id' : id}, function(res){
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

    function user_data(id) {
        // layer.open({
        //     type:2,
        //     area:['90%', '95%'],
        //     title:'用户数据',
        //     maxmin: true,
        //     skin: 'layui-layer-demo', //加上边框
        //     content: "<?php echo url('userData'); ?>?id=" + id,
        // })
        window.location.href = "<?php echo url('userData'); ?>?id=" + id;
    }

    function look(id) {
        layer.open({
            type:2,
            area:['90%', '95%'],
            title:'预览节目',
            maxmin: true,
            skin: 'layui-layer-demo', //加上边框
            content: "<?php echo url('admin_released/ProgramPreview/new_page'); ?>?id=" + id,
        })
    }
    <!--复制-->
    function coppy(id){
        layer.open({
            type: 1,
            title: '输入新名称',
            skin: 'layui-layer-rim', //加上边框
            area: ['440px', '240px'], //宽高
            btn: ['保存', '取消'],
            content: '<form class="form-horizontal" name="editPosition" id="editPosition" method="post" action="<?php echo url('layout/coppy'); ?>">\n' +
            '                    <input type="hidden" name="id" id="id" value="' + id + '">\n' +
            '                    <div class="form-group">\n' +
            '                        <label class="col-sm-3 control-label" style="margin-left: 10px;">新节目名称：</label>\n' +
            '                        <div class="col-sm-8">\n' +
            '                            <input type="text" name="layout" id="layout" value="" placeholder="输入节目名称" class="form-control"/>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </form>',
            yes: function (index) {
                var layout = $("#layout").val();
                if(layout){
                    $.getJSON('<?php echo url("coppy"); ?>', {'id' : id,'layout':layout}, function(res){
                        if(res.code == 1){
                            layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                            table.refresh();
                        }else{
                            layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                        }
                    });
                    layer.close(index); //如果设定了yes回调，需进行手工关闭
                }else {
                    layer.msg('节目名称不能为空',{icon:5,time:1500});
                }
            }
        });
    }

    <!--批量删除节目-->
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
    $(function(){
        $('#editPosition').ajaxForm({
            beforeSubmit: checkForm2,
            success: complete,
            dataType: 'json'
        });
        function checkForm2(){
            if( '' == $.trim($('#layout').val())){
                layer.msg('请输入节目名称',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                alert(11);
                return false;
            }
        }
        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('layout/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1});
                return false;
            }
        }
    });
</script>
</body>