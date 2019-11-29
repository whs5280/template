<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\PHPTutorial\WWW\VacuumCup\public/../application/admin/view/goods/edit_goods.html";i:1564457455;s:70:"D:\PHPTutorial\WWW\VacuumCup\application\admin\view\public\header.html";i:1539856994;s:70:"D:\PHPTutorial\WWW\VacuumCup\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
                    <h5>编辑商品</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" name="Goods" id="edit_Goods" method="post" action="<?php echo url('editGoods'); ?>">
                        <input type="hidden" name="id" value="<?php echo $goods['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">商品名称：</label>
                            <div class="input-group col-sm-4">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $goods['name']; ?>" placeholder="请输入商品名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">缩略图：</label>
                            <div class="input-group col-sm-4">
                                <input type="hidden" id="data_photo" name="path" >
                                <div id="fileList" class="uploader-list" style="float:right"></div>
                                <div id="imgPicker" style="float:left">选择图片</div>
                                <img id="img_data" class="img" height="80px" width="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/uploads/goods/<?php echo $goods['path']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">类型：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control m-b chosen-select" name="type_id" value="<?php echo $goods['descr']; ?>" id="type_id">
                                    <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['type_descr']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">关键字：</label>
                            <div class="input-group col-sm-4">
                                <input id="keyname" type="text" class="form-control" name="keyname" value="<?php echo $goods['keyname']; ?>" placeholder="请输入关键字">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">价格：</label>
                            <div class="input-group col-sm-4">
                                <input id="price" type="price" class="form-control" name="price" value="<?php echo $goods['price']; ?>" placeholder="请输入价格">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">库存：</label>
                            <div class="input-group col-sm-4">
                                <input id="num" type="number" class="form-control" name="num" value="<?php echo $goods['num']; ?>" placeholder="请输入库存">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">商品状态：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_up' value="1" <?php if($goods['is_up'] == 1): ?>checked<?php endif; ?>/>上架&nbsp;&nbsp;
                                    <input type="radio" name='is_up' value="0" <?php if($goods['is_up'] == 0): ?>checked<?php endif; ?>/>下架&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否推送：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_push' value="1" <?php if($goods['is_push'] == 1): ?>checked<?php endif; ?>/>推送&nbsp;&nbsp;
                                    <input type="radio" name='is_push' value="0" <?php if($goods['is_push'] == 0): ?>checked<?php endif; ?>/>不推送&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">会员组：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<select class="form-control m-b chosen-select" name="group_id" id="group_id">-->
                                    <!--<option value="">==请选择会员组==</option>-->
                                    <!--<?php if(!empty($group)): ?>-->
                                        <!--<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): if( count($group)==0 ) : echo "" ;else: foreach($group as $key=>$vo): ?>-->
                                            <!--<option value="<?php echo $vo['id']; ?>" <?php if($member['group_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['group_name']; ?></option>-->
                                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                    <!--<?php endif; ?>-->
                                <!--</select>-->
                            <!--</div>-->
                        <!--</div>-->

                        <!--<div class="hr-line-dashed"></div>-->
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">头像：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<input type="hidden" id="data_photo" name="head_img" value="{.head_img}">-->
                                <!--<div id="fileList" class="uploader-list" style="float:right"></div>-->
                                <!--<div id="imgPicker" style="float:left">选择头像</div>-->
                                <!--<img id="img_data" class="img-circle" height="80px" width="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/uploads/face/{.head_img}" onerror="this.src='/static/admin/images/head_default.gif'"/>-->
                            <!--</div>-->
                        <!--</div>-->
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
        server: "<?php echo url('Upload/uploadGoods'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#data_photo").val(data._raw);
            $("#img_data").attr('src', '/uploads/goods/' + data._raw).show();
        }
    });

    uploader.on( 'fileQueued', function( file ) {
        $list.html( '<div id="' + file.id + '" class="item">' +
            '<h4 class="info">' + file.name + '</h4>' +
            '<p class="state">正在上传...</p>' +
        '</div>' );
    });

    // 文件上传成功
    uploader.on( 'uploadSuccess', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传成功！');
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错!');
    });

    //提交
    $(function(){
        $('#edit_Goods').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#name').val())){
                layer.msg('请输入商品名称',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

            if( '' == $.trim($('#type_id').val())){
                layer.msg('请选择类型',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

            if( '' == $.trim($('#keyname').val())){
                layer.msg('请输入关键字',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#price').val())){
                layer.msg('请输入关键字',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#num').val())){
                layer.msg('请输入关键字',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '/static/admin/images/bg.png' == $.trim($('#img_data').attr('src'))){
                layer.msg('请选择图片',{icon:2,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('Goods/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
                return false;
            }
        }
    });

    var config = {
        '.chosen-select': {search_contains:true},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

</script>
</body>