<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/var/www/ZUAD_info_release/public/../application/admin/view/task/index.html";i:1545837682;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/header.html";i:1539856994;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<!--<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">-->
<link type="text/css" rel="stylesheet" href="/static/app_info_release/admin/css/checkbox/demo/build.css">
<link type="text/css" rel="stylesheet" href="/static/app_info_release/admin/css/checkbox/bower_components/Font-Awesome/css/font-awesome.css">
<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet">
<style>
    .footable-row-detail-name {
        font-weight: 800;
    }
</style>
<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>任务列表</h5>
        </div>
        <div class="ibox-content">
            <!--高级过滤@开始-->
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>高级过滤</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row form-horizontal">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-6">任务名称:</label>
                                <div class="input-group col-sm-6">
                                    <select class="form-control chosen-select" name="task_name" id="task_name">
                                        <option value="" selected>全部</option>
                                        <?php foreach($taskNameList as $taskName): ?>
                                        <option value="<?php echo $taskName; ?>"><?php echo $taskName; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">任务描述:</label>
                                <div class="input-group col-sm-6">
                                    <select class="form-control chosen-select" name="task_remark" id="task_remark">
                                        <option value="" selected>全部</option>
                                        <?php foreach($taskRemarkList as $taskRemark): ?>
                                        <option value="<?php echo $taskRemark; ?>"><?php echo $taskRemark; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-5">
                                    <button class="btn btn-primary" type="button" onclick="search()">
                                        <i class="fa fa-search"></i> 搜索
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-danger" type="reset">
                                        <i class="fa fa-recycle"></i> 清空
                                    </button>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--高级过滤@结束-->
            <div class="hr-line-dashed"></div>

            <div class="example">
                <div class="btn-group hidden-xs" id="tableToolbar" role="group">
                    <button type="button" class="btn btn-outline btn-default" onclick="delMore()">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> 删除选中
                    </button>
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
                field   : 'checkbox',
                align   : 'center',
                showSelectTitle    : true,
                checkbox    : true,
                width   : '50px',
                visible : true,//false隐藏列项目。
            }, {
                field: 'task_num',
                title: '任务编号',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 120px;margin: 0 auto;">'+row.task_num+'</div>'
                },
            }, {
                field: 'task_name',
                title: '任务名称',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 100px;margin: 0 auto;">'+row.task_name+'</div>'
                },
            }, {
                field: 'task_remark',
                title: '任务描述',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 100px;margin: 0 auto;">'+row.task_remark+'</div>'
                },
            }, {
                field: 'device_id',
                title: '任务对象',
                align : 'center',
                formatter : function (value, row, index) {
                    return '<div style="width: 120px;margin: 0 auto;">'+row.device_id+'</div>'
                },
                sortable : true,
            }, {
                field: 'status',
                title: '任务状态',
                align : 'center',
                formatter : function (value, row, index) {
                    var html = '<div style="width: 80px;margin: 0 auto;">';
                    if (row.status == 0) {
                        return '<span class="label label-warning">待执行</span>';
                    } else if (row.status == 1) {
                        return '<span class="label label-info">执行中</span>';
                    } else if (row.status == 2) {
                        return '<span class="label label-default">任务取消</span>';
                    } else if (row.status == 3) {
                        return '<span class="label label-success">任务成功</span>';
                    } else if (row.status == 4) {
                        return '<span class="label label-danger">任务失败</span>';
                    }
                    html += '</div>'

                },
                sortable : true,
            }, {
                field   : 'create_time',
                title   : '创建时间',
                align   : 'center',
                formatter : function (value, row, index) {
                    return '<div style="width: 70px;margin: 0 auto;">'+row.create_time+'</div>';
                },
            }, {
                field   : 'execute_time',
                title   : '执行时间',
                align   : 'center',
                formatter : function (value, row, index) {
                    return '<div style="width: 70px;margin: 0 auto;">'+row.execute_time+'</div>';
                },
            }, {
                field   : 'result_time',
                title   : '回馈时间',
                align   : 'center',
                formatter : function (value, row, index) {
                    return '<div style="width: 70px;margin: 0 auto;">'+row.result_time+'</div>';
                },
            }, {
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '100px',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('task/index'); ?>", columns);
        table.setPageSize('<?php echo $pageSize; ?>');
        table.setSort('create_time','desc');
        table.setSearchPlaceholder('任务名称');
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });

        //展示详情数据
        table.setDetailFormatter(function (index, row) {
            /*var task_content = row.task_content;
            task_content = jQuery.parseJSON(task_content);*/
            var html = '';
            html += '<div class="footable-row-detail-row">';
            html += '<div class="footable-row-detail-name">任务内容：</div>';
            html += '<div class="footable-row-detail-value">' + row.task_content + '</div>';
            html += '</div>';
            return html;
        });

        //获取数据成功的回调
        table.setOnLoadSuccess(function (data) {
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
            '删除'      :   'del(' + row.id + ')',
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
        var task_name = $('#task_name').val();
        var task_remark = $('#task_remark').val();

        var param = {
            //silent: true,//静默加载数据
            query:{
                task_name  :   task_name,
                task_remark  :   task_remark,
            }
        };
        console.log(param);
        //重新加载表格
        table.refresh(param);
    }
</script>
<script>
    /**
     * 删除一条任务
     */
    function delOne (id) {
        //ajax提交服务器操作
        uadlayer.confirmDelOne(id, '<?php echo url("task/taskDel"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }

    /**
     * 创建任务
     */
    function addTask() {
        window.location.href="<?php echo url('addTask'); ?>";
    }

    /**
     * 删除多条任务
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
        uadlayer.confirmDelMore(ids, '<?php echo url("task/taskDel"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }


    <!--下拉选择框添加搜索功能-->
    var config = {
        '.chosen-select': {search_contains: true},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>

</html>