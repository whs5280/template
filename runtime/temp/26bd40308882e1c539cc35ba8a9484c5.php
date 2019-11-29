<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/var/www/html/run1/public/../application/admin/view/project/add_project.html";i:1560910204;s:60:"/var/www/html/run1/application/admin/view/public/header.html";i:1539856994;s:60:"/var/www/html/run1/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
                    <h5>添加项目</h5>
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
                    <form class="form-horizontal m-t" name="addProject" id="addProject" method="post" action="addProject">
                        <input	type="hidden"	name="__token__"	value="<?php echo \think\Request::instance()->token(); ?>"	/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目名称 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <input id="pname" type="text" class="form-control" name="pname" placeholder="请输入项目名称">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">产品助理 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control" name="assit" id="assit">
                                    <option value="0">无</option>
                                    <?php if(!(empty($adminInfo) || (($adminInfo instanceof \think\Collection || $adminInfo instanceof \think\Paginator ) && $adminInfo->isEmpty()))): if(is_array($adminInfo) || $adminInfo instanceof \think\Collection || $adminInfo instanceof \think\Paginator): if( count($adminInfo)==0 ) : echo "" ;else: foreach($adminInfo as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['post']; ?> : <?php echo $vo['real_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">合同始\末时间 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <input placeholder="开始日期" class="form-control layer-date" name="htstarttime" id="start" value="">
                                <input placeholder="结束日期" class="form-control layer-date" name="htendtime" id="end" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目类型 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control" name="type" id="project_type">
                                    <?php if(!(empty($typeInfo) || (($typeInfo instanceof \think\Collection || $typeInfo instanceof \think\Paginator ) && $typeInfo->isEmpty()))): if(is_array($typeInfo) || $typeInfo instanceof \think\Collection || $typeInfo instanceof \think\Paginator): if( count($typeInfo)==0 ) : echo "" ;else: foreach($typeInfo as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">需求文档 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <button type="button" class="layui-btn" id="file_upload"><i class="layui-icon"></i>上传文件</button>
                                <input type="hidden" id="file_upload_hidden" name="fileurl" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">包含游戏 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <input id="game" type="text" class="form-control" name="game" placeholder="请输入内容">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">参考游戏 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <input id="consult_game" type="text" class="form-control" name="consult_game" placeholder="请输入内容">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">参考UI <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <input id="gameUI" type="text" class="form-control" name="gameUI" placeholder="请输入内容">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">原型图 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="prototype_img">上传图片</button><input class="layui-upload-file" type="file" accept="" name="file">
                                    <div class="layui-upload-list">
                                        <img class="layui-upload-img" id="demo1">
                                        <p id="demoText"></p>
                                    </div>
                                    <input type="hidden" id="prototype_img_hidden" name="prototype_img_url" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">托管平台 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="tgplatform_index" type="text" class="form-control" name="tgplatform_index" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="tgplatform_account" type="text" class="form-control" name="tgplatform_account" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="tgplatform_password" type="text" class="form-control" name="tgplatform_password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">微信应用 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="wxapp_appid" type="text" class="form-control" name="wxapp_appid" placeholder="appid">
                            </div>
                            <div class="col-sm-3">
                                <input id="wxapp_secret" type="text" class="form-control" name="wxapp_secret" placeholder="AppSecret">
                            </div>
                            <div class="col-sm-3">
                                <input id="wxapp_package" type="text" class="form-control" name="wxapp_package" placeholder="包名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">微信公众号 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="Wechat_account" type="text" class="form-control" name="Wechat_account" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="Wechat_password" type="text" class="form-control" name="Wechat_password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">域名 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="yuming_index" type="text" class="form-control" name="yuming_index" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="yuming_account" type="text" class="form-control" name="yuming_account" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="yuming_password" type="text" class="form-control" name="yuming_password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">服务器 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3">
                                <input id="serverinfo_index" type="text" class="form-control" name="serverinfo_index" placeholder="首页">
                            </div>
                            <div class="col-sm-3">
                                <input id="serverinfo_account" type="text" class="form-control" name="serverinfo_account" placeholder="账号">
                            </div>
                            <div class="col-sm-3">
                                <input id="serverinfo_password" type="text" class="form-control" name="serverinfo_password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">备注 <span style="color: red">*</span>：</label>
                            <div class="input-group col-sm-4">
                                <textarea id="remark" name="remark" rows="10" cols="100" placeholder="请输入内容"></textarea>
                            </div>
                        </div>
<!--                        <div class="hr-line-dashed"></div>-->
<!--                        <div class="form-group">-->
<!--                            <label class="col-sm-3 control-label">排序：</label>-->
<!--                            <div class="input-group col-sm-4">-->
<!--                                <input id="sort" type="number" class="form-control" name="sort" placeholder="请输入排序">-->
<!--                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 决定顺序</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="hr-line-dashed"></div>-->
<!--                        <div class="form-group">-->
<!--                            <label class="col-sm-3 control-label">状&nbsp;态：</label>-->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="radio i-checks">-->
<!--                                    <input type="radio" name='status' value="1" checked="checked"/>开启&nbsp;&nbsp;-->
<!--                                    <input type="radio" name='status' value="0" />禁用-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
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
        $('#addProject').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#pname').val())){
                layer.msg('项目名称不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#start').val())){
                layer.msg('合同开始时间不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#end').val())){
                layer.msg('合同结束时间不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#file_upload_hidden').val())){
                layer.msg('需求文档不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
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
<script>
    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD hh:mm:ss',
        // min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function (datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD hh:mm:ss',
        // min: laydate.now(),
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: false,
        choose: function (datas) {
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
</script>
<script>
    layui.use('upload', function() {

            var $ = layui.jquery
                , upload = layui.upload;
        //指定允许上传的文件类型
        upload.render({
            elem: '#file_upload'
            ,url: '<?php echo url("Upload/uploadNeedsFile"); ?>'
            ,accept: 'file' //普通文件
            ,done: function(res){
                console.log(res)
                if(res.code == 1){
                    layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        $('#file_upload_hidden').val(res.data.url);
                    });
                }else{
                    layer.msg(res.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#prototype_img'
            ,url: '<?php echo url("Upload/uploadPrototypeImg"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code < 0){
                    return layer.msg('上传失败');
                }
                //上传成功
                if(res.code == 1){
                    layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        $('#prototype_img_hidden').val(res.data.url);
                    });
                }else{
                    layer.msg(res.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
    })
</script>
</body>
</html>
