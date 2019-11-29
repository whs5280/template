<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"C:\LMAP\wwwroot\run\public/../application/admin\view\bugatti\edit.html";i:1553605321;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
                    <h5>编辑品牌信息</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" name="add_member" id="add_member" method="post" action="<?php echo url('edit'); ?>">
                        <input	type="hidden"	name="__token__"	value="<?php echo \think\Request::instance()->token(); ?>"	/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">品牌名：</label>
                            <div class="input-group col-sm-4">
                                <input id="name" type="text" class="form-control" readonly="readonly" name="name" value="<?php echo $brand_info['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">品牌标题：</label>
                            <div class="input-group col-sm-4">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo $brand_info['title']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">品牌介绍：</label>
                            <div class="input-group col-sm-4">
                                <textarea name="introduce" rows="10" cols="80">
                                    <?php echo $brand_info['introduce']; ?>
                                </textarea>
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">品牌logo：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<input type="hidden" id="data_photo" name="logo_url" >-->
                                <!--<div id="fileList" class="uploader-list" style="float:right"></div>-->
                                <!--<div id="imgPicker" style="float:left">选择logo</div>-->
                                <!--<img id="img_data" class="img-circle" width="200px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/uploads/face/<?php echo $brand_info['logo_url']; ?>"/>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">logo上传：</label>
                            <div class="input-group col-sm-4">
                                <input type="hidden" id="brand_img" name="logo_url" value="<?php echo $brand_info['logo_url']; ?>">
                                <div id="fileList" class="uploader-list" style="float:right"></div>
                                <div id="imgPicker" style="float:left">选择图片</div>
                                <img id="img_data" class="img-circle" height="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/<?php echo $brand_info['logo_url']; ?>"/>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">品牌状态：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='status' value="1" <?php if($brand_info['status'] == 1): ?> checked="checked"<?php endif; ?>/>启用&nbsp;&nbsp;
                                    <input type="radio" name='status' value="0" <?php if($brand_info['status'] == 0): ?> checked="checked"<?php endif; ?>/>禁用&nbsp;&nbsp;
                                </div>
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
    var $list = $('#fileList');
    //上传图片,初始化WebUploader
    var uploader = WebUploader.create({

        auto: true,// 选完文件后，是否自动上传。
        swf: '/static/admin/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('Upload/uploadBrandImg'); ?>",// 文件接收服务端。
        duplicate :false,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。
        fileVal : 'file',

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data,response) {
        }
    });

    uploader.on( 'fileQueued', function( file ) {
        $list.html( '<div id="' + file.id + '" class="item">' +
            '<h4 class="info">' + file.name + '</h4>' +
            '<p class="state">正在上传...</p>' +
            '</div>' );
    });

    // 文件上传成功
    uploader.on( 'uploadSuccess', function( file ,data) {
        if(data.code == 1){
            $("#brand_img").val(data.data);
            $("#img_data").attr('src', '/' + data.data).show();
            $( '#'+file.id ).find('p.state').text('上传成功！');
        }else{
            $( '#'+file.id ).find('p.state').text('上传出错!'+data.msg);
        }
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错!');
    });

    //提交
    $(function(){
        $('#add_member').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#name').val())){
                layer.msg('请输入名称',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

            if( '' == $.trim($('#title').val())){
                layer.msg('请输入品牌标题',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }


        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
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
        '.chosen-select': {search_contains: true},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>


<script>
    $(document).ready(function(){
        //change 事件
        $('#org_num').change(function(){
            var org_num = chose_get_value('#org_num');
            $.getJSON("<?php echo url('getOrgModularList'); ?>",{"org_num":org_num},function (res) {
                var html = '';
                if(res.length >= 1){
                    for(var j=0;j<res.length;j++)
                        html += "<option value='"+res[j].id+"'>"+res[j].name+"</option>";
                }
                $('#default_modular').empty();
                $('#org_modular').removeClass('hidden');
                $('#default_modular').append(html);
                chose_get_ini('#default_modular');
                var config = {
                    '.chosen-select': {},

                    '.chosen-select-width': {
                        width: "383px"
                    }
                };
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }
            })
        });
    });
    function chose_get_ini(select){

        $(select).trigger("chosen:updated");
    }
    //select value获取
    function chose_get_value(select){
        return $(select).val();
    }
</script>
</body>