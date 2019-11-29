<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"C:\LMAP\wwwroot\run\public/../application/admin\view\we_chat_user\letter.html";i:1556265686;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
<div class="wrapper wrapper-content  animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">

            <div class="ibox chat-view">

                <div class="ibox-title">
                    <small class="pull-right text-muted"></small> 聊天窗口
                </div>


                <div class="ibox-content">

                    <div class="row">

                        <div class="col-md-9 ">
                            <div class="chat-discussion" id="letter-details">
                                <!--<div class="chat-message">-->
                                    <!--<img class="message-avatar" src="img/a1.jpg" alt="">-->
                                    <!--<div class="message">-->
                                        <!--<a class="message-author" href="#"> 颜文字君</a>-->
                                        <!--<span class="message-date"> 2015-02-02 18:39:23 </span>-->
                                        <!--<span class="message-content">-->
											<!--H+ 是个好框架g-->
                                            <!--</span>-->
                                    <!--</div>-->
                                <!--</div>-->


                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="chat-users">


                                <div class="users-list">
                                    <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): if( count($user_list)==0 ) : echo "" ;else: foreach($user_list as $key=>$v): ?>
                                    <div class="chat-user" onclick="letter_details(<?php echo $v['id']; ?>)">
                                        <img class="chat-avatar" src="<?php echo $v['head_img']; ?>" alt="">
                                        <div class="chat-user-name">
                                            <a href="#"><?php echo $v['nickname']; ?></a>
                                        </div>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


</div>


<script>
    function letter_details(id) {
        $.ajax({
            url:"<?php echo url('letterDetails'); ?>?id=" + id,
            dataType:"json",
            success:function (res) {
                console.log(res)
                var str = '';

                $.each(res,function (k,v) {
                    str += '<div class="chat-message"><img class="message-avatar" src="'+v.head_img+'" alt=""><div class="message"><a class="message-author" href="#"> '+v.nickname+'</a><span class="message-date"> '+v.addtime+' </span><span class="message-content">'+v.content+'</span><button onclick="delLetter(this,'+v.id+')" class="btn btn-white btn-xs"><i class="fa fa-trash"></i> 删除</button></div></div>';
                })
                // str += '<div class="forum-item active"><div class="row"><div class="col-sm-9"><div class="forum-icon"><i class="fa fa-shield"></i></div><a href="forum_post.html" class="forum-item-title">'+res.title+'</a><div class="forum-sub-title">'+res.title+'</div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.browse+'</span><div><small>浏览</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.good+'</span><div><small>赞</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.bad+'</span><div><small>踩</small></div></div></div></div></div>'
                $("#letter-details").html(str);
            }
        })
    }
    function delLetter(obj,id) {
        layer.confirm('确认删除此条私信吗?', {icon: 3, title:'提示'}, function(index){
            $.ajax({
                url:"<?php echo url('delLetter'); ?>?id=" + id,
                dataType:"json",
                success:function (res) {
                    if (res.code == 1) {
                        layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                            $(obj).parent().parent().remove();
                        });
                    }else {
                        layer.msg(res.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        return false;
                    }

                }
            })
        })

    }
</script>
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


</html>