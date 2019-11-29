<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/var/www/html/run/public/../application/admin/view/project/supplement.html";i:1560850735;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/style.css">
<style>
    .file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
    .file-item .info{overflow: hidden;}
    .uploader-list{width: 100%; overflow: hidden;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>补充资料</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="supplement" id="supplement" method="post" action="supplement">
                        <input	type="hidden"	name="__token__"	value="<?php echo \think\Request::instance()->token(); ?>"	/>
                        <input	type="hidden"	name="pid"	value="<?php echo $pid; ?>"	/>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">托管平台 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="tgplatform_index" type="text" class="form-control" name="tgplatform[]" value="<?php echo $projectInfo['tgplatform']['0']; ?>" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="tgplatform_account" type="text" class="form-control" name="tgplatform[]" value="<?php echo $projectInfo['tgplatform']['1']; ?>" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="tgplatform_password" type="text" class="form-control" name="tgplatform[]" value="<?php echo $projectInfo['tgplatform']['2']; ?>" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">微信应用 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="wxapp_appid" type="text" class="form-control" name="wxapp[]" value="<?php echo $projectInfo['wxapp']['0']; ?>" placeholder="appid">
                            </div>
                            <div class="col-sm-3">
                                <input id="wxapp_secret" type="text" class="form-control" name="wxapp[]" value="<?php echo $projectInfo['wxapp']['1']; ?>" placeholder="AppSecret">
                            </div>
                            <div class="col-sm-3">
                                <input id="wxapp_package" type="text" class="form-control" name="wxapp[]" value="<?php echo $projectInfo['wxapp']['2']; ?>" placeholder="包名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">微信公众号 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="Wechat_account" type="text" class="form-control" name="wxpn[]" value="<?php echo $projectInfo['wxpn']['0']; ?>" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="Wechat_password" type="text" class="form-control" name="wxpn[]" value="<?php echo $projectInfo['wxpn']['0']; ?>" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">域名 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="yuming_index" type="text" class="form-control" name="yuming[]" value="<?php echo $projectInfo['wxpn']['0']; ?>" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="yuming_account" type="text" class="form-control" name="yuming[]" value="<?php echo $projectInfo['yuming']['1']; ?>" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="yuming_password" type="text" class="form-control" name="yuming[]" value="<?php echo $projectInfo['yuming']['2']; ?>" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">服务器 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="serverinfo_index" type="text" class="form-control" name="serverinfo[]" value="<?php echo $projectInfo['serverinfo']['0']; ?>" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="serverinfo_account" type="text" class="form-control" name="serverinfo[]" value="<?php echo $projectInfo['serverinfo']['1']; ?>" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="serverinfo_password" type="text" class="form-control" name="serverinfo[]" value="<?php echo $projectInfo['serverinfo']['2']; ?>" placeholder="密码">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                            </div>
                        </div>
                    </form>
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

<script type="text/javascript" src="/static/admin/webupload/webuploader.min.js"></script>

<script type="text/javascript">

    $(function(){
        $('#supplement').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            // if( '' == $.trim($('#name').val())){
            //     layer.msg('板块名不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
            //         layer.close(index);
            //     });
            //     return false;
            // }
            // if( '' == $.trim($('#title').val())){
            //     layer.msg('标题不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
            //         layer.close(index);
            //     });
            //     return false;
            // }
            // if( '' == $.trim($('#plate_describe').val())){
            //     layer.msg('描述不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
            //         layer.close(index);
            //     });
            //     return false;
            // }
        }

        function complete(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href="<?php echo url('index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }

    });


    //IOS开关样式配置
    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, {
        color: '#1AB394'
    });
    var config = {
        '.chosen-select': {},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }



</script>


</body>
</html>
