<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"C:\LMAP\wwwroot\run\public/../application/admin\view\we_chat_user\index.html";i:1556012882;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
<!--<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet">-->

<link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/static/app_info_release/admin/css/checkbox/demo/build.css">
<link type="text/css" rel="stylesheet" href="/static/app_info_release/admin/css/checkbox/bower_components/Font-Awesome/css/font-awesome.css">
<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>用户列表</h5>
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
                                <label class="control-label col-sm-6">账号:</label>
                                <div class="input-group col-sm-6">
                                    <input type="text" id="account" class="form-control" name="account"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">昵称:</label>
                                <div class="input-group col-sm-6">
                                    <input type="text" id="nickname" class="form-control" name="nickname"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">手机号码:</label>
                                <div class="input-group col-sm-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">邮箱:</label>
                                <div class="input-group col-sm-6">
                                    <input type="text" id="email" class="form-control" name="email"/>
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
                    <a href="<?php echo url('addUser'); ?>" type="button" class="btn btn-outline btn-default">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 新增
                    </a>
                    <button type="button" class="btn btn-outline btn-default" onclick="delMore()">
                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除选中
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
<!--<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.js"></script>-->
<script src="/static/app_info_release/admin/js/plugins/bootstrap-table/bootstrap-table.js"></script>
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
                field: 'nickname',
                title: '用户名称',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 150px;margin: 0 auto;">'+row.nickname+'</div>'
                },
            },  {
                field: 'account',
                title: '账号',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<div style="width: 150px;margin: 0 auto;">'+row.account+'</div>'
                },
            }, {
                field: 'head_img',
                title: '头像',
                align : 'center',
                sortable : true,
                formatter : function (value, row, index) {
                    return '<img src="'+row.head_img+'" onerror=\'this.src="/static/admin/images/head_default.gif"\' width="60px;">'
                },
                // visible : false,//false隐藏列项目。
            }, {
                field: 'status',
                title: '状态',
                align : 'center',
                formatter : function (value, row, index) {
                    if (row.status == '0') {
                        return '<div style="width: 80px;margin: 0 auto;"><a><span class="label label-danger">禁用</span></a></div>';
                    } else if (row.status == '1') {
                        return '<div style="width: 80px;margin: 0 auto;"><a><span class="label label-info">正常</span></a></div>';
                    }
                },
            }, {
                field: 'create_time',
                title: '创建时间',
                align : 'center',
                formatter : function (value, row, index) {
                    return '<div style="width: 125px;margin: 0 auto;">'+row.create_time+'</div>'
                },
                sortable : true,
            },  {
                field: 'operate',
                title: '操作',
                align : 'center',
                width : '100px',
                clickToSelect : false,//点击当前列不会触select选或radio
                formatter: operateFormatter //自定义方法，添加操作按钮
            },
        ];
        table = new BSTable('table', "<?php echo url('index'); ?>", columns);

        //获取浏览器初始化页数
        var hashPage= (!window.location.hash) ? "#1" : window.location.hash;
        window.location.hash = hashPage;
        table.setPageNumber(hashPage.slice(1));//初始化页数
        table.setPageSize('<?php echo $pageSize; ?>');
        table.setSort('id','desc');
        table.setSearchPlaceholder('关键字搜索');
        table.setQueryParamsFunction(function (param) {
            var temp = {
            };
            return $.extend(temp, param);
        });
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
            '编辑'      :   'edit(' + row.id + ')',
            '删除'      :   'delOne(' + row.id + ')',
            '私信信息'      :   'letter(' + row.id + ')',
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
        var account = $('#account').val();
        var nickname = $('#nickname').val();
        var mobile = $('#mobile').val();
        var email = $('#email').val();

        var param = {
            //silent: true,//静默加载数据
            query:{
                account  : account,
                nickname : nickname,
                mobile : mobile,
                email : email,
            }
        };
        console.log(param);
        //重新加载表格
        table.refresh(param);
    }
</script>
<script>
    /**
     * 添加设备日志
     */
    function add () {
        window.location.href = '<?php echo url("res/resAdd"); ?>';
    }

    /**
     * 删除一条客户信息
     */
    function delOne (id) {
        //ajax提交服务器操作
        uadlayer.confirmDelOne(id, '<?php echo url("delUser"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }

    /**
     * 删除多条设备日志
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
        uadlayer.confirmDelMore(ids, '<?php echo url("delMoreUser"); ?>', function (ajaxReturn) {
            if (ajaxReturn.code == 1) {
                uadlayer.success(ajaxReturn.msg);
                table.refresh();
            } else {
                uadlayer.error(ajaxReturn.msg);
            }
        });
    }

    /**
     * 编辑用户
     */
    function edit (id) {
        window.location.href = '<?php echo url("editUser"); ?>?id=' + id;
    }
    /**
     * 用户私信
     */
    function letter (id) {
        window.location.href = '<?php echo url("letter"); ?>?id=' + id;
    }
    /**
     * 采集数据页面
     */
    function mqttLog (id) {
        layer.open({
            type: 2,
            title: '实时日志',
            shadeClose: true,
            shade: 0.1,
            area: ['80%', '90%'],
            maxmin: true,
            content: '<?php echo url("device/mqttLog"); ?>?id=' + id //iframe的url
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