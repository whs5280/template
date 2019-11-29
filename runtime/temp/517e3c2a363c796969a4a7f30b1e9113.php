<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"/var/www/info_release/public/../application/admin_released/view/layout/user_data.html";i:1546401754;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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

<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-sm-12">

            <div class="ibox">
                <div class="ibox-title">
                    <h5>所有用户数据</h5>
                    <div class="ibox-tools">
                        <a href="#" onclick="addData(<?php echo $lid; ?>)" class="btn btn-primary btn-xs">创建新用户数据</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row m-b-sm m-t-sm">
                        <!--<div class="col-md-1">-->
                            <!--<button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>-->
                        <!--</div>-->
                        <form method="post" name="editUserData" id="editUserData" action="<?php echo url('userData'); ?>">
                        <div class="col-md-11">
                            <div class="input-group" style="padding-left: 50px;">
                                <input type="text" placeholder="请输入用户名" name="keyWord" class="input-sm form-control">
                                <input type="hidden" name="lid" value="<?php echo $lid; ?>">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="project-list">

                        <table class="table table-hover">
                            <tbody>
                            <?php if(!empty($template)): if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                <tr>
                                    <td class="project-status">
                                                <span ><?php echo $vo['username']; ?>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html"><?php echo $template['医生姓名']; ?></a>
                                        <a href="project_detail.html"><?php echo $template['护士姓名']; ?></a>
                                        <a href="project_detail.html"><?php echo $template['管家姓名']; ?></a>

                                        <br/>
                                        <a href="project_detail.html"><?php echo $vo['医生姓名']; ?></a>
                                        <a href="project_detail.html"><?php echo $vo['护士姓名']; ?></a>
                                        <a href="project_detail.html"><?php echo $vo['管家姓名']; ?></a>
                                    </td>
                                    <td class="project-completion">
                                        <!--<small>当前进度： 48%</small>-->
                                        <span><?php echo $template['科室编号']; ?></span>
                                        <br>
                                        <span><?php echo $vo['科室编号']; ?></span>
                                    </td>
                                    <td class="project-people">
                                        <a href="#"><img alt="image" class="img-circle" src="<?php echo $vo['医生图片']; ?>" onerror="this.src='/static/admin/images/head_default.gif'"/></a>
                                        <a href="#"><img alt="image" class="img-circle" src="<?php echo $vo['护士图片']; ?>" onerror="this.src='/static/admin/images/head_default.gif'"/></a>
                                        <a href="#"><img alt="image" class="img-circle" src="<?php echo $vo['管家图片']; ?>" onerror="this.src='/static/admin/images/head_default.gif'"/></a>

                                    </td>
                                    <td class="project-actions">
                                        <a href="#" onclick="editData(<?php echo $vo['id']; ?>,<?php echo $lid; ?>)" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 编辑 </a>
                                        <a href="#" onclick="delData(<?php echo $vo['id']; ?>,<?php echo $lid; ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 删除 </a>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; endif; endif; ?>
                            </tbody>
                        </table>
                    </div>
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


<!-- 自定义js -->
<script src="js/content.js?v=1.0.0"></script>


<script>
    $(document).ready(function(){

        $('#loading-example-btn').click(function () {
            btn = $(this);
            simpleLoad(btn, true)

            // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

            simpleLoad(btn, false)
        });
    });

    function simpleLoad(btn, state) {
        if (state) {
            btn.children().addClass('fa-spin');
            btn.contents().last().replaceWith(" Loading");
        } else {
            setTimeout(function () {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Refresh");
            }, 2000);
        }
    }

    function editData(id,lid) {
        // layer.open({
        //     type:2,
        //     area:['90%', '95%'],
        //     title:'编辑用户数据',
        //     maxmin: true,
        //     skin: 'layui-layer-demo', //加上边框
        //     content: "<?php echo url('editUserData'); ?>?id=" + id,
        // })
        window.location.href = "<?php echo url('editUserData'); ?>?id=" + id + '&lid=' + lid;
    }
    function addData(id) {
        // layer.open({
        //     type:2,
        //     area:['90%', '95%'],
        //     title:'添加用户数据',
        //     maxmin: true,
        //     skin: 'layui-layer-demo', //加上边框
        //     content: "<?php echo url('addUserData'); ?>?id=" + id,
        // })
        window.location.href = "<?php echo url('addUserData'); ?>?id=" + id;
    }
    function delData(id,lid) {
        var res = confirm('确定要删除吗？');
        if (res){
            window.location.href = "<?php echo url('delUserData'); ?>?id=" + id + '&lid=' + lid;
        }

    }
</script>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script><!--统计代码，可删除-->

</body>
</html>
