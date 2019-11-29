<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"C:\LMAP\wwwroot\run\public/../application/admin\view\mc_laren_news\details.html";i:1556292054;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
<body>

<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">

                    <div class="ibox-content">

                        <div class="pull-right">

                            <button class="btn btn-white btn-xs" type="button"><?php echo $news_info['real_name']; ?></button>
                            <button class="btn btn-white btn-xs" type="button"><?php echo $news_info['label']; ?></button>

                        </div>
                        <div class="text-center article-title">
                            <h1>
                                <?php echo $news_info['title']; ?>
                            </h1>
                            <h3>
                                <?php echo $news_info['subheading']; ?>
                            </h3>
                        </div>
                        <div><?php echo $news_info['content']; ?></div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">

                                <h2>评论：</h2>
                                <?php if(is_array($news_comments) || $news_comments instanceof \think\Collection || $news_comments instanceof \think\Paginator): if( count($news_comments)==0 ) : echo "" ;else: foreach($news_comments as $key=>$v): ?>
                                <div class="social-feed-box">
                                    <div class="social-avatar">
                                        <a href="" class="pull-left">
                                            <img alt="image" src="<?php echo $v['head_img']; ?>">
                                        </a>
                                        <div class="media-body">
                                            <a href="#">
                                                <?php echo $v['nickname']; ?>
                                            </a>
                                            <small class="text-muted"><?php echo date('Y-m-d H:i:s',$v['add_time']); ?></small>
                                        </div>
                                    </div>
                                    <div class="social-body">
                                        <p>
                                            <?php echo $v['content']; ?>
                                        </p>

                                    </div>
                                    <button onclick="newsComment(this,<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"> 回复(<?php echo $v['rep_num']; ?>)</button>
                                    <button class="btn btn-white btn-xs"> 赞(<?php echo $v['good']; ?>)</button>
                                    <button class="btn btn-white btn-xs"> 踩(<?php echo $v['bad']; ?>)</button>
                                    <button onclick="delComment(this,<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"> 删除</button>
                                    <!--<button type="button" onclick="delComment(this,<?php echo $v['id']; ?>)" class="btn btn-outline btn-danger">删除</button>-->
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
<script>
    //删除一条新闻评论
    function delComment(obj,comment_id) {
        layer.confirm('确认删除此评论吗?', {icon: 3, title:'提示'}, function(index){
            $.ajax({
                url:"<?php echo url('delComment'); ?>?comment_id="+comment_id,
                dataType:"json",
                success:function (data) {
                    if (data.code == 1){
                        layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                            $(obj).parent().remove();
                        });
                    }else {
                        layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        return false;
                    }
                }
            })
        })
    }

    function newsComment(obj,comment_id) {
        window.location.href = "<?php echo url('newsComment'); ?>?comment_id="+comment_id;
    }
</script>