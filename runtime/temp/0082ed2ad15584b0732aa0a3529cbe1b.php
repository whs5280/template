<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/var/www/html/run1/public/../application/admin/view/project/change_person.html";i:1560419401;s:60:"/var/www/html/run1/application/admin/view/public/header.html";i:1539856994;s:60:"/var/www/html/run1/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
<!--bootstrap-table表格插件-->
<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet">
<body class="gray-bg">
<style type="text/css">
    .base{float: left; width: 100px;}
    .footable-row-detail-row{ margin: 5px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>变更人员\记录</h5>
        </div>
        <div class="ibox-content">


            <div class="example">
                <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                    <a href="#" onclick="addPerson(<?php echo $pid; ?>)" type="button" class="btn btn-outline btn-default">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </a>
                    <!--                    <button type="button" class="btn btn-outline btn-default" onclick="delMore()" style="margin-right: 8px;">-->
                    <!--                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除选中-->
                    <!--                    </button>-->
                    <div class="base">
                        <div class="col-sm-6">
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                </div>
                <table id="table" data-mobile-responsive="false"  data-mobile-responsive="false">
                </table>
                <div id="AjaxPage" class=""  style="text-align:right;"></div>
            </div>
        </div>
    </div>
</div>

</body>
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
<!-- Bootstrap table -->
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<!--Bootstrap table 封装-->
<script type="text/javascript" src="/static/admin_location/js/uad-bootsrap-table.js"></script>
<script type="text/javascript" src="/static/admin_location/js/uad-layer.js"></script>
<!-- Fancy box -->
<script src="/static/admin/js/plugins/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
    var table;
    $(function () {
        createTable();
        //主动触发高级过滤隐藏，因为一开始display：none的话，select-chosen无效
        $('.fa-chevron-up').trigger("click");
    });
    function refresh () {
        //固定列BUG，更新数据时，数据没有清空干净，手动清除
        $('.fixed-table-body-columns table tbody').html('');
        table.refresh();
    }

    function createTable () {
        //定义列
        var columns = [
             {
                field: 'post',
                title: '岗位',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 150px;margin: 0 auto;">'+row.post+'</div>'
                },
            }, {
                field: 'real_name',
                title: '人员',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 150px;margin: 0 auto;">'+row.real_name+'</div>'
                }
            }, {
                field: 'content',
                title: '负责内容',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 150px;margin: 0 auto;">'+row.content+'</div>'
                }
            },{
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '100px',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('changePerson'); ?>?pid="+<?php echo $pid; ?>, columns);

        //获取浏览器初始化页数
        var hashPage= (!window.location.hash) ? "#1" : window.location.hash;
        window.location.hash = hashPage;
        table.setPageNumber(hashPage.slice(1));//初始化页数
        table.setPageSize('<?php echo $pageSize; ?>');
        table.setSort('pid','desc');
        table.setSearchPlaceholder('关键字');
        table.setQueryParamsFunction(function (param) {
            var device_department_id = '1';
            var device_category_id = '1';
            var org_num = '1';
            var is_audit = '1';
            var temp = {
                device_department_id : device_department_id,
                device_category_id : device_category_id,
                org_num : org_num,
                is_audit : is_audit
            };
            console.log(temp);
            return $.extend(temp, param);
        });



        table.setOnLoadSuccess(function (data) {
            // console.log(data);
            var allpage = data.total/data.pageSize;
            //分页
            laypage({
                cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                pages:allpage,//总页数
                skip: true,//是否开启跳页
                skin: '#1AB5B7',//分页组件颜色
                curr: data.currPage || 1,
                groups: 3,//连续显示分页数
                jump: function(obj1, first){
                    if(!first){
                        window.location.hash= obj1.curr;//浏览器记录当前浏览页数
                        table.btInstance.bootstrapTable('selectPage', obj1.curr);
                    }
                }
            });
        });
        table.init();
    }

    /**
     * 操作列函数
     * @param value
     * @param row   当前行的数据
     * @param index 当前行数
     * @returns {string}
     */
    function operateFormatter(value, row, index) {

        var select = {
            '变更'      :   "change('" + row.id + "')",
            '删除'      :   'delPerson(' + row.id + ')',
        };
        var li_html = '';
        $.each(select,function (index, value) {
            if (value == '切割') {
                li_html += '<li class="divider"></li>';
            } else {
                li_html += '<li><a href="javascript:' + value + '">' + index + '</a></li>';
            }
        });
        var html = '<div class="btn-group">';
        html += '<i data-toggle="dropdown" class="btn glyphicon glyphicon-list" aria-hidden="true"></i>';
        html += '<ul class="dropdown-menu">';
        html += li_html;
        html += '</ul>';
        html += '</div>';
        return html;
    }

    <!--搜索按钮-->
    function search () {
        var status = $('#status').val();

        var param = {
            //silent: true,//静默加载数据
            query:{
                status  :   status,
            }
        };
        // console.log(param);
        //重新加载表格
        table.refresh(param);
    }
</script>
<script>
    /**
     * 添加设备
     */
    function add () {
        window.location.href = '<?php echo url("res/resAdd"); ?>';
    }

    /**
     * 删除一条设备
     */
    function delOne (id) {
        //ajax提交服务器操作
        uadlayer.confirmDelOne(id, '<?php echo url("device/delOne"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }

    /**
     * 采集数据页面
     */
    function mqttLog (id) {
        layer.open({
            type: 2,
            title: '实时状态',
            shadeClose: true,
            shade: 0.1,
            area: ['80%', '90%'],
            maxmin: true,
            content: '<?php echo url("device/mqttLog"); ?>?id=' + id //iframe的url
        });
    }

    /**
     * 删除多条设备
     */
    function delMore () {
        var data = table.btInstance.bootstrapTable('getAllSelections');//获取选中的行数据，空则返回空数组。
        if (data.length <= 0) {
            uadlayer.error('没有选中任何数据');
        }
        //将选中行的ID组成数组,再将数组元素（ID）用，拼接
        var ids = $.map(data, function (item, value) {
            return item.id;
        }).join(',');

        //ajax提交服务器操作
        uadlayer.confirmDelMore(ids, '<?php echo url("device/deviceDel"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }

    /**
     * 编辑设备
     */
    function edit (id) {
        window.location.href = '<?php echo url("device/deviceEdit"); ?>?id=' + id;
    }

    /*
    * 在线记录
    */
    function online (device_id) {
        layer.open({
            type: 2,
            title: '设备在线记录',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '70%'],
            content: '<?php echo url("onlineLog"); ?>?device_id=' + device_id //iframe的url
        });
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

    <!--下拉选择框添加搜索功能-->
    var config = {
        '.chosen-select': {search_contains: true},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    //添加人员操作
    function addPerson(pid) {
        layer.open({
            type: 2,
            title: '添加人员',
            shadeClose: true,
            // shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['1000px', '500px'],
            content: '<?php echo url("addPerson"); ?>?pid='+pid,
            end: function () {
                //页面刷新
                location.reload();
            }
        });
    }
    //变更操作
    function change(id) {
        layer.open({
            type: 2,
            title: '添加人员',
            shadeClose: true,
            // shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['1000px', '500px'],
            content: '<?php echo url("change"); ?>?id='+id,
            end: function () {
                //页面刷新
                location.reload();
            }
        });
    }
    //删除人员操作
    function delPerson(id) {
        $.get('<?php echo url("delPerson"); ?>?id='+id,function (data) {
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.reload();
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        })
    }

</script>
<script>
    //显示状态中文信息
    function showStatus(num) {
        var status = '';
        switch (num) {
            case 0:
                status = "待立项";
                break;
            case 1:
                status = "待开发";
                break;
            case 2:
                status = "开发中";
                break;
            case 3:
                status = "带交接";
                break;
            case 4:
                status = "已交接";
                break;
            case 5:
                status = "已完成";
                break;
        }
        return status;
    }
</script>
</html>