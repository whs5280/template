<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/var/www/ZUAD_info_release/public/../application/admin_released/view/layout/edit_user_data.html";i:1546402268;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/bootstrap.css">
    <!-- Interface styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/jquery-ui-1.10.3.custom.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.builder.css" />
    <!-- Google prettify -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/js/google-code-prettify/prettify.css" />
    <!-- MySlider styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.animations.min.css" />
    <!-- Items styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.items.css" id='myslider-items-css' />
    <!-- Custom style -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.builder.mycustom.css">
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.animations.min.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.min.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.items.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/animate.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin/layui/css/layui.css" />
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <style>
        .inp:focus {
            outline:none;
            border: 1px solid red;
        }
    </style>
</head>
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
<script src="/static/admin/layer/layer.js"></script>

<body style="display: flex;justify-content: center;background-color: white;">
<div style="width:50%;display:inline-block;margin:0 20px;top:0px;padding: 10px;position: absolute;box-sizing: border-box;">
    <!--<form id="uploadForm" enctype="multipart/form-data">-->

    <form method="post" name="editUserData" id="editUserData" action="<?php echo url('editUserData'); ?>">
        <div class="bindingDataList" style="width:100%;display: inline-block;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="lid" value="<?php echo $lid; ?>">
            <!--<div class="input-group col-sm-4">-->
                <!--<input id="device_name" type="text" class="form-control" name="device_name" required="" placeholder="请输入设备名" value="3层319室">-->
            <!--</div>-->

            <?php if(!empty($data)): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="form-group" style="margin: 20px 0;">
                <?php echo $key; ?>：<input class="inp" type="text" name="<?php echo $key; ?>" id="input_<?php echo $key; ?>" value="<?php echo $vo; ?>" style="width:50%;border-radius: 0;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(strpos($key,'图片') !== false): ?>
                <button type="button" name='<?php echo $key; ?>' class="layui-btn" id='<?php echo $key; ?>'><i class="layui-icon">&#xe67c;</i>上传图片</button>
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
            <div class="col-sm-4 col-sm-offset-3" style="text-align: center;">
                <button class="btn btn-success" type="submit" style="padding: 10px 50px;font-size: 15px"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger" href="javascript:history.go(-1);" style="padding: 10px 50px;font-size: 5px;"><i class="fa fa-close"></i> 返回</a>
            </div>
        </div>
    </form>


</div>


<script>
    $(function() {
        $('#editUserData').ajaxForm({
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
</body>

</html>