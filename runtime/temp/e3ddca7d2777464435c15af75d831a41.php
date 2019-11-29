<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/var/www/ZUAD_info_release/public/../application/admin/view/device/device_edit.html";i:1547023658;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/header.html";i:1539856994;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
                    <h5>编辑设备</h5>
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
                    <form class="form-horizontal" name="deviceEdit" id="deviceEdit" method="post" action="<?php echo url('deviceEdit'); ?>">
                        <input type="hidden" name="id" value="<?php echo $device['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">设备id：</label>
                            <div class="input-group col-sm-4">
                                <input id="device_id" type="text" disabled class="form-control" name="device_id" required="" placeholder="请输入设备id" value="<?php echo $device['device_id']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">设备名：</label>
                            <div class="input-group col-sm-4">
                                <input id="device_name" type="text" class="form-control" name="device_name" required="" placeholder="请输入设备名" value="<?php echo $device['device_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">设备标签：</label>
                            <div class="input-group col-sm-4">
                                <input id="tab" type="text" class="form-control" name="tab" placeholder="请输入设备排序标签"value="<?php echo $device['tab']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">选择节目：</label>
                            <div class="input-group col-sm-4" style="float: left;">
                                <!--<input id="distance" type="text" class="form-control" name="distance"  required="" aria-required="true" value="">-->
                                <select class="form-control m-b chosen-select"  name="layout_id" id="layout_id">
                                    <!--<optgroup label="组合选择">-->
                                        <!--<?php if(!empty($layout_group)): ?>-->
                                        <!--<?php if(is_array($layout_group) || $layout_group instanceof \think\Collection || $layout_group instanceof \think\Paginator): if( count($layout_group)==0 ) : echo "" ;else: foreach($layout_group as $key=>$vo): ?>-->
                                        <!--<option value="group_<?php echo $vo['id']; ?>" <?php if($device['program_group_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['group_name']; ?></option>-->
                                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                        <!--<?php endif; ?>-->
                                    <!--</optgroup>-->
                                    <optgroup label="节目选择">
                                        <?php if(!empty($layout)): if(is_array($layout) || $layout instanceof \think\Collection || $layout instanceof \think\Paginator): if( count($layout)==0 ) : echo "" ;else: foreach($layout as $key=>$vo): ?>
                                        <option value="layout_<?php echo $vo['id']; ?>" <?php if($device['layout_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['layout']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">设备组：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<select class="form-control m-b chosen-select"  name="device_group_id" id="device_group_id">-->
                                    <!--<?php if(!empty($group_list)): ?>-->
                                    <!--<?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): if( count($group_list)==0 ) : echo "" ;else: foreach($group_list as $key=>$vo): ?>-->
                                    <!--<option value="<?php echo $vo['id']; ?>" <?php if($device['device_group_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>-->
                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                    <!--<?php endif; ?>-->
                                <!--</select>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">设备部门：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control m-b chosen-select"  name="device_department_id" id="device_department_id">
                                    <option value="">==选择部门==</option>
                                    <?php echo $html; ?>
                                </select>
                            </div>
                        </div>
                        <!--<div class="hr-line-dashed"></div>-->
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">状态：</label>-->
                            <!--<div class="col-sm-6">-->
                                <!--<div class="radio i-checks">-->
                                    <!--<input type="radio" name='is_del' value="0" <?php if($device['is_del'] == 0): ?>checked<?php endif; ?>/>正常-->
                                    <!--<input type="radio" name='is_del' value="1" <?php if($device['is_del'] == 1): ?>checked<?php endif; ?>/>禁用&nbsp;&nbsp;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述：</label>
                            <div class="input-group col-sm-4">
                                <input id="remark" type="text" class="form-control" name="remark" placeholder="请输入设备描述" value="<?php echo $device['remark']; ?>">
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
        server: "<?php echo url('Upload/uploadface'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#data_photo").val(data._raw);
            $("#img_data").attr('src', '/uploads/face/' + data._raw).show();
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
        $('#deviceEdit').ajaxForm({
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
                    window.location.href="<?php echo url('device/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:3000,shade: 0.1});
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
    };
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

</script>
</body>
