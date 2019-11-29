<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/var/www/html/run/public/../application/admin/view/we_chat/index_img_list.html";i:1554723144;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
                    <h5>微信小程序首页轮播图</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="indexImgList" id="indexImgList" method="post" action="indexImgList">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="test2">多图片上传</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览图：
                                <div class="layui-upload-list" id="demo2">
                                    <?php if(is_array($index_img_list) || $index_img_list instanceof \think\Collection || $index_img_list instanceof \think\Paginator): if( count($index_img_list)==0 ) : echo "" ;else: foreach($index_img_list as $k=>$v): ?>
                                    <img src="/<?php echo $v['img_url']; ?>" alt="" class="layui-upload-img">
                                    <a class="btn btn-danger" onclick="delImg(this,<?php echo $k; ?>)" href="#"><i class="fa fa-close"></i> 删除</a>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </blockquote>
                        </div>
                        <input type="hidden" name="index_img_list" id="index_img_list" value="<?php echo $index_img_str; ?>">
                        <input type="hidden" name="index_img_size" id="index_img_size" value="<?php echo $index_img_size; ?>">
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
        $('#indexImgList').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            // if( '' == $.trim($('#title').val())){
            //     layer.msg('标题不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
            //         layer.close(index);
            //     });
            //     return false;
            // }

        }

        function complete(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href="<?php echo url('indexImgList'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }


        layui.use('upload', function(){
            var $ = layui.jquery
                ,upload = layui.upload;


            //多图片上传
            upload.render({
                elem: '#test2'
                ,url: "<?php echo url('admin/Upload/uploadWechatIndexImg'); ?>"
                ,multiple: true
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                        var img_str = $("#index_img_list").val();
                        var arr = img_str.split(',');
                        var num = arr.length;
                        num = num - 1;
                        $('#demo2').append(' <a class="btn btn-danger" onclick="delImg(this,'+num+')" href="#"><i class="fa fa-close"></i> 删除</a>')
                    });
                }
                ,done: function(res){
                    //上传完毕
                    var index_img_list = $("#index_img_list").val();
                    var index_img_size = $("#index_img_size").val();
                    index_img_list += res.data.url + ',';
                    index_img_size += res.data.size + ',';
                    $("#index_img_list").val(index_img_list);
                    $("#index_img_size").val(index_img_size);
                    console.log(res);
                }
            });
        })
    });
    function delImg(obj,index) {
        var img_str = $("#index_img_list").val();
        var size_str = $("#index_img_size").val();
        var img_arr = img_str.split(',');
        var size_arr = size_str.split(',');
        img_arr.splice(index, 1);
        size_arr.splice(index, 1);
        var str1 = img_arr.join(',');
        var str2 = size_arr.join(',');
        // str += ',';
        // console.log(str);
        // var a = img_str.replace('/'+str+'/','');
        // console.log(a);
        $("#index_img_list").val(str1);
        $("#index_img_size").val(str2);
        $(obj).prev().remove();
        $(obj).remove();
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
</body>
</html>
