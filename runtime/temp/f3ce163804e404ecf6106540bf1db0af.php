<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/var/www/html/run/public/../application/admin/view/feedback/add_feedback.html";i:1560567235;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
                    <h5>添加反馈</h5>
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
                    <form class="form-horizontal m-t" name="addFeedback" id="addFeedback" method="post" action="addFeedback">
                        <input	type="hidden"	name="__token__"	value="<?php echo \think\Request::instance()->token(); ?>"	/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目名称 <span style="color: red">*</span>：</label>
                            <div class="col-sm-3" id="users">
                                <select class="form-control" name="pid">
                                    <option value="0">请选择项目</option>
                                    <?php if(!(empty($projects) || (($projects instanceof \think\Collection || $projects instanceof \think\Paginator ) && $projects->isEmpty()))): if(is_array($projects) || $projects instanceof \think\Collection || $projects instanceof \think\Paginator): if( count($projects)==0 ) : echo "" ;else: foreach($projects as $key=>$vo): ?>
                                    <option value="<?php echo $vo['pid']; ?>" <?php if($pid==$vo['pid']): ?> selected<?php endif; ?>><?php echo $vo['pname']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <a onclick="Add()" class="layui-btn">加多一条</a>
                            </div>
                        </div>
                        <input type="hidden" id="file_upload_hidden" name="fileurl" value="">
<!--                        <input type="hidden" class="UI_img_hidden" name="UI_img_url" value="">-->
                        <div id="feedback">
                            <div id="_feedback">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">序号 <span style="color: red">*</span>：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="num" type="text" class="form-control" name="num[]" placeholder="请输入内容">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">类型 <span style="color: red">*</span>：</label>
                                    <div class="input-group col-sm-4">
                                        <select class="form-control" name="type[]" id="project_type">
                                            <option value="0">待定</option>
                                            <option value="1">需求</option>
                                            <option value="2">优化</option>
                                            <option value="3">问题</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">内容 <span style="color: red">*</span>：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="f_content" type="text" class="form-control" name="tech_remark[]" placeholder="请输入内容">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">附件 <span style="color: red">*</span>：</label>
                                    <div class="input-group col-sm-4">
                                        <button type="button" class="layui-btn file_upload" id="test0" name="file_upload" ><i class="layui-icon"></i>上传文件(双击)</button>
                                        <!--                                    <button type="button" class="layui-btn file_upload" onclick="aaa(this)" name="file_upload" ><i class="layui-icon"></i>上传文件(双击)</button>-->
                                    </div>
                                </div>
                                <!--                                <input type="file">-->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">UI <span style="color: red">*</span>：</label>
                                    <div class="input-group col-sm-4">
                                        <div class="col-sm-10">
                                            <input type="radio" class="UI" name="UI0" value="1" checked>有
                                            <input type="radio" class="UI" name="UI0" value="0">否
                                        </div>
                                    </div>
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

    $(function(){
        $('#addFeedback').ajaxForm({
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
    //动态添加反馈
    function addFee() {
        var html = $('#feedback').html();

        // var html = '<div class="form-group"><label class="col-sm-3 control-label">项目参与人 ：</label><div class="col-sm-3">'+users+'</div><div class="col-sm-3"><a onclick="delPer(this)" class="layui-btn layui-btn-danger">减少一条</a></div></div>';
        $('#feedback').append(html);
    }
    //动态减少参与人
    function delPer(obj) {
        $(obj).parent().parent().remove();
    }

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
        var sort = 1;
        layui.use('upload', function() {
            var $ = layui.jquery
                , upload = layui.upload;
            fileUpload("#test0")
            function fileUpload(id){
                //指定允许上传的文件类型
                upload.render({
                    elem: id
                    // elem: obj
                    ,url: '<?php echo url("Upload/uploadFeedbackFile"); ?>'
                    ,accept: 'file' //普通文件
                    ,done: function(res){
                        console.log(res)
                        if(res.code == 1){
                            layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                                layer.close(index);
                                var urlStr = $('input[name="fileurl"]').val();
                                urlStr += id+'-'+ res.data.url + ',';
                                $('input[name="fileurl"]').val(urlStr);

                            });
                        }else{
                            layer.msg(res.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                                layer.close(index);
                            });
                            return false;
                        }
                    }
                });
            }

            window.Add = function() {
                var recoder = $("#_feedback").clone();
                console.log(recoder)
                recoder.find(".layui-btn").attr("id", "test" + sort + "");
                recoder.find(".UI").attr("name", "UI" + sort + "");
                // recoder.find(".layui-upload-list").empty();
                $("#feedback").append(recoder);
                fileUpload("#test" + sort + "")
                sort++;
            }
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#UI_img'
                ,url: '<?php echo url("Upload/uploadUIImg"); ?>'
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
                            var imgStr = $('input[name="UI_img_url"]').val();
                            imgStr += res.data.url + ',';
                            $('input[name="UI_img_url"]').val(imgStr);
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
<script>

</script>
</body>
</html>
