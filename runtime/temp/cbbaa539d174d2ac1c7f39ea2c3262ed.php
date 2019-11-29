<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/var/www/html/run/public/../application/admin/view/project/work_time.html";i:1560588594;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
                    <h5>项目评工时</h5>
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
                    <form class="form-horizontal m-t" name="workTime" id="workTime" method="post" action="workTime">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目名称 ：</label>
                            <div class="input-group col-sm-4">
<!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['pname']; ?></label>-->
                                <input type="text" class="form-control" value="<?php echo $projectInfo['pname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">产品助理 ：</label>
                            <div class="input-group col-sm-4">
<!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['assit']; ?></label>-->
                                <input type="text" class="form-control" value="<?php echo $projectInfo['assit']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">合同开始日期 ：</label>
                            <div class="input-group col-sm-4">
<!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['htstarttime']; ?></label>-->
                                <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d',$projectInfo['htstarttime']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">合同截止日期 ：</label>
                            <div class="input-group col-sm-4">
<!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['htendtime']; ?></label>-->
                                <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d',$projectInfo['htendtime']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目启动日期 ：</label>
                            <div class="input-group col-sm-4">
                                <!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['htendtime']; ?></label>-->
                                <input type="text" class="form-control" id="start" name="starttime" value="<?php echo date('Y-m-d',$projectInfo['starttime']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目限定日期 ：</label>
                            <div class="input-group col-sm-4">
                                <!--                                <label class="col-sm-3 control-label" style="color: blue;"><?php echo $projectInfo['htendtime']; ?></label>-->
                                <input type="text" class="form-control" id="end" name="limitedtime" value="<?php echo date('Y-m-d',$projectInfo['limitedtime']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目类型 ：</label>
                            <div class="input-group col-sm-4">
                                <input id="type" type="text" class="form-control" name="type" value="<?php echo $projectInfo['type_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">需求文档 ：</label>
                            <div class="input-group col-sm-4">
<!--                                <input id="name" type="text" class="form-control" name="name" placeholder="请输入项目名称">-->
                                <label class="col-sm-3 control-label" style="color: blue;"><a href="/<?php echo $projectInfo['fileurl']; ?>" download="需求文档.txt">需求文档(下载)</a></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">包含游戏 ：</label>
                            <div class="input-group col-sm-4">
                                <input id="game" type="text" class="form-control" name="game" value="<?php echo $projectInfo['game']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">参考游戏 ：</label>
                            <div class="input-group col-sm-4">
                                <input id="consult_game" type="text" class="form-control" name="consult_game" value="<?php echo $projectInfo['consult_game']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">参考UI ：</label>
                            <div class="input-group col-sm-4">
                                <input id="gameUI" type="text" class="form-control" name="gameUI" value="<?php echo $projectInfo['gameUI']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">原型图 ：</label>
                            <div class="input-group col-sm-4">
                                <label class="col-sm-3 control-label" style="color: blue;"><a href="/<?php echo $projectInfo['prototype_img_url']; ?>">点击查看</a></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">备注 ：</label>
                            <div class="input-group col-sm-4">
                                <input id="remark" type="text" class="form-control" name="remark" value="<?php echo $projectInfo['remark']; ?>">
                            </div>
                        </div>
                        <input	type="hidden"	name="__token__"	value="<?php echo \think\Request::instance()->token(); ?>"	/>
                        <input	type="hidden"	name="pid"	value="<?php echo $projectInfo['pid']; ?>"	/>
                        <div class="hr-line-dashed"></div>
                        <?php if(!(empty($leaders) || (($leaders instanceof \think\Collection || $leaders instanceof \think\Paginator ) && $leaders->isEmpty()))): if(is_array($leaders) || $leaders instanceof \think\Collection || $leaders instanceof \think\Paginator): if( count($leaders)==0 ) : echo "" ;else: foreach($leaders as $key=>$vo): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">项目参与人 ：</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="<?php echo $vo['post']; ?> : <?php echo $vo['real_name']; ?>">
                                        <input type="hidden" name="userid[]" value="<?php echo $vo['userid']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="请填写工时(单位/小时)" name="planday[]" value="<?php echo $vo['planday']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
        $('#workTime').ajaxForm({
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
                    window.location.href = "<?php echo url('index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }



    });
    //动态添加参与人
    function addPer() {
        var users = $('#users').html();

        var html = '<div class="form-group"><label class="col-sm-3 control-label">项目参与人 ：</label><div class="col-sm-3">'+users+'</div><div class="col-sm-3"><a onclick="delPer(this)" class="layui-btn layui-btn-danger">减少一条</a></div></div>';
        $('#addPerson').append(html);
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
    //时间戳转字符形式
    function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = date.getDate() + ' ';
        var h = date.getHours() + ':';
        var m = date.getMinutes() + ':';
        var s = date.getSeconds();
        return Y+M+D;
        // return Y+M+D+h+m+s;
    }
</script>

</body>
</html>
