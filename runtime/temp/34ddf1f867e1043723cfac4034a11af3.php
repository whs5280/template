<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"C:\LMAP\wwwroot\run\public/../application/admin\view\ferrari_news\index.html";i:1552530413;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
            <a href="<?php echo url('addNews'); ?>"><button class="btn btn-info  dim btn-large-dim btn-outline" style="width:100%;height: 50px;font-size: 20px;" type="button">添加新闻</button></a>
        <div class="col-lg-12">
            <?php if(is_array($news_list) || $news_list instanceof \think\Collection || $news_list instanceof \think\Paginator): if( count($news_list)==0 ) : echo "" ;else: foreach($news_list as $key=>$v): ?>
            <div class="ibox">
                <div class="ibox-content">
                    <a href="#" id="title" onclick="details(<?php echo $v['id']; ?>)" class="btn-link">
                        <h2>
                            <?php echo $v['title']; ?>
                        </h2>
                    </a>
                    <div class="small m-b-xs">
                        <strong><?php echo $v['real_name']; ?></strong> <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date('Y-m-d H:i:s',$v['add_time']); ?></span>
                    </div>
                    <p>
                        <?php echo $v['subheading']; ?>
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>标签：</h5>
                            <button class="btn btn-primary btn-xs" type="button"><?php echo $v['label']; ?></button>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-right">
                                <h5>状态：</h5>
                                <div> <i class="fa fa-comments-o"> </i> <?php echo $v['comment_num']; ?> 评论 </div>
                                <i class="fa fa-eye"> </i> <?php echo $v['browse']; ?> 浏览
                                <br><br>
                                <button onclick="delNews(<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"><i class="fa fa-trash"></i> 删除</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
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
    function details(news_id) {
        window.location.href = "<?php echo url('details'); ?>?news_id="+news_id;
    }
    function delNews(news_id) {
        layer.confirm('确认删除此新闻吗?', {icon: 3, title:'提示'}, function(index){
            $.ajax({
                url:"<?php echo url('delNews'); ?>?news_id="+news_id,
                dataType:"json",
                success:function (data) {
                    if (data.code == 1){
                        layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                            window.location.href = "<?php echo url('index'); ?>";
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
</script>
