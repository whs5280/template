<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/var/www/info_release/public/../application/admin/view/indexpage/index.html";i:1539857002;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<style>
    table{
        table-layout: fixed;
    }
</style>
<body class="gray-bg ">


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
<script src="/static/admin/js/jquery.leoweather.min.js"></script>
<script language="JavaScript">
    /*function myrefresh()
    {
        window.location.reload();
    }
    setTimeout('myrefresh()',5000); //指定5秒刷新一次*/

    layui.use(['form', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date1'
        });
        laydate.render({
            elem: '#date2'
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            /*layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            });*/
            $.getJSON('<?php echo url("ajaxGetData"); ?>',{'data':data.field} ,function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                    $("#num").text(res.data.data);
                    return false;
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            return false;
        });
    });
</script>
</body>