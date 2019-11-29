<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"/var/www/info_release/public/../application/admin_released/view/layout/add_user_data.html";i:1546405693;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;}*/ ?>
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
<link type="text/css" rel="stylesheet" href="/static/admin/layui/css/layui.css" />
<style>
    .inp:focus {
        outline:none;
        border: 1px solid #009688;
    }
</style>
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
<script src="/static/admin_released/builder/js/jquery.js"></script>
<script src="/static/admin_released/builder/js/bootstrap.min.js"></script>
<!-- Extra plugins -->
<script src="/static/admin_released/builder/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/static/admin_released/builder/js/dragslider.js"></script>
<script src="/static/admin_released/builder/js/google-code-prettify/prettify.js"></script>
<script src="/static/admin_released/builder/js/style-html.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<!-- Myslider Scripts -->
<script src="/static/admin_released/js/jquery.easing.1.3.min.js"></script>
<script src="/static/admin_released/js/jquery.myslider.min.js"></script>
<!-- MySlider Builder Scripts -->
<script src="/static/admin_released/builder/js/myslider.builder.min.js"></script>
<!-- Custom Scripts -->
<!-- <script src="../DataTables/js/jquery.dataTables.js"></script> -->
<script src="/static/admin_released/builder/js/uploadFileType.js"></script>
<script src="/static/admin_released/builder/js/myslider.builder.min.mycustom.js"></script>
<script src="/static/admin_released/js/jquery.qrcode.min.js"></script>
<script src="/static/admin_released/builder/js/uploadEditor.js"></script>
<script src="/static/admin_released/builder/js/pptFile.js"></script>
<script src="/static/admin_released/builder/js/mediaLibraryPaging.js"></script>
<script src="/static/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/static/admin/layui/layui.js"></script>

<body style="display: flex;justify-content: center;">
<div style="width:50%;display:inline-block;margin:50px 20px;top:0px;padding: 10px;position: absolute;box-sizing: border-box;">
    <!--<form id="uploadForm" enctype="multipart/form-data">-->

    <form method="post" name="addUserData" id="addUserData" action="<?php echo url('addUserData'); ?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">用户：</label>
            <div class="input-group col-sm-4">
                <!--<input id="distance" type="text" class="form-control" name="distance"  required="" aria-required="true" value="">-->
                <select class="form-control m-b chosen-select"  name="user_id" id="user_id">
                    <?php if(!empty($users)): if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): if( count($users)==0 ) : echo "" ;else: foreach($users as $key=>$vo): ?>
                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['username']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>
            </div>
        </div>

        <div class="bindingDataList" style="width:100%;display: inline-block;">
            <input type="hidden" name="layout_id" value="<?php echo $lid; ?>">
            <?php if(!empty($template)): if(is_array($template) || $template instanceof \think\Collection || $template instanceof \think\Paginator): $i = 0; $__LIST__ = $template;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="form-group" style="margin:20px 0;">
                <?php echo $key; ?>:<input class="inp" type="text" name="<?php echo $key; ?>" id="input_<?php echo $key; ?>" value="<?php echo $vo; ?>" style="width:40%;border-radius: 0;height: 32px;line-height: 32px;">
                <?php if(strpos($key,'图片') !== false): ?>
                <button type="button" name='<?php echo $key; ?>' class="layui-btn" id='<?php echo $key; ?>' style="margin-left: 10px;"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                <script>
                    layui.use('upload', function(){
                        var upload = layui.upload;
                        //执行实例
                        var uploadInst = upload.render({
                            elem: "#<?php echo $key; ?>" //绑定元素
                            ,url: "<?php echo url('upload/uploadOne'); ?>" //上传接口
                            ,done: function(res){
                                console.log(res);
                                if (res.code == 1){
                                    $("#input_<?php echo $key; ?>").val(res.data[0].path);
                                    layer.msg('上传成功！');

                                }
                            }
                            ,error: function(){
                                layer.msg('上传失败！');
                            }
                        });
                    });
                </script>
                <?php endif; ?>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-3" style="display: flex;justify-content: flex-end;">
                <button class="btn btn-primary" type="submit" style="padding: 10px 50px;font-size: 15px"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger" href="javascript:history.go(-1);" style="padding: 10px 50px;font-size: 15px"><i class="fa fa-close"></i> 返回</a>
            </div>
        </div>
    </form>


</div>

</body>

</html>
<script>
    $(function() {
        $('#addUserData').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){
            /*if( '' == $.trim($('#group_id').val())){
                layer.msg('请选择设备分类',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }*/
        }


        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){

                    window.location.href="<?php echo url('layout/userData'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:3000,shade: 0.1});
                return false;
            }
        }
    })
</script>
