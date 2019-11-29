<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/var/www/run/public/../application/admin/view/bugatti_forum/post_details.html";i:1551686408;s:54:"/var/www/run/application/admin/view/public/header.html";i:1539856994;s:54:"/var/www/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
        <div class="col-sm-6" style="width: 100%">
            <div class="ibox ">
                <div class="ibox-content text-center">
                    <h3 class="m-b-xxs"><?php echo $post_info['title']; ?></h3>
                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_info['id']; ?>">
                </div>
            </div>
            <div class="social-feed-separated">

                <div class="social-avatar">
                    <a href="">
                        <img alt="image" src="/static/admin/img/a5.jpg">

                    </a>
                </div>

                <div class="social-feed-box">

                    <div class="pull-right social-action dropdown">
                        <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu m-t-xs">
                            <li><a id="editPost" href="#">编辑帖子</a></li>
                            <li><a id="delPost" href="#">删除帖子</a></li>
                        </ul>
                    </div>
                    <div class="social-avatar">
                        <a href="#">
                            <?php echo $user_info['username']; ?>
                        </a>
                        <small class="text-muted"><?php echo $post_info['add_time']; ?></small>
                    </div>
                    <div class="social-body">
                        <p>
                            <?php echo $post_info['content']; ?>
                        </p>
                        <img src="/static/admin/img/p2.jpg" class="img-responsive">
                        <img src="/static/admin/img/p2.jpg" class="img-responsive">
                        <div class="btn-group">
                            <button id="good" style="color: red;" class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> 赞(<?php echo $post_info['good']; ?>)</button>
                            <button id="bad" class="btn btn-white btn-xs"><i class="fa fa-thumbs-down"></i> 踩(<?php echo $post_info['bad']; ?>)</button>
                            <button id="comment" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> 评论</button>
                            <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
                        </div>
                    </div>
                    <div class="social-footer">
                        <div id="comment_input" class="social-comment" style="display: block">
                            <a href="" class="pull-left">
                                <img alt="image" src="/static/admin/img/a3.jpg">
                            </a>
                            <div class="media-body">
                                <textarea id="comment_content" class="form-control" placeholder="填写评论..."></textarea>
                                <button id="comment_button" class="btn btn-outline btn-success  dim" style="top: 5px;" type="button">提交</button>
                            </div>

                        </div>


                        <!--<div class="social-comment">-->
                            <!--<a href="" class="pull-left">-->
                                <!--<img alt="image" src="/static/admin/img/a3.jpg">-->
                            <!--</a>-->
                            <!--<div class="media-body">-->
                                <!--<a href="#">-->
                                    <!--尤小右-->
                                <!--</a> 图表展示、数据可视化是前端领域一个麻烦且重要的事情，这里推荐了11个JS图表库，各取所需吧-->
                                <!--<br/>-->
                                <!--<a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26</a> - -->
                                <!--<small class="text-muted">8月18日</small>-->
                            <!--</div>-->
                        <!--</div>-->

                        <?php if(is_array($comments_info) || $comments_info instanceof \think\Collection || $comments_info instanceof \think\Paginator): if( count($comments_info)==0 ) : echo "" ;else: foreach($comments_info as $key=>$v): ?>
                        <div class="social-comment">
                            <a href="" class="pull-left">
                                <img alt="image" src="/static/admin/img/a4.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <?php echo $v['username']; ?>
                                </a> <?php echo $v['content']; ?>
                                <br/>
                                <a href="#" onclick="commentGood(this,<?php echo $v['id']; ?>)" class="small"><i class="fa fa-thumbs-up"></i> <?php echo $v['good']; ?></a>
                                <a href="#" onclick="commentBad(this,<?php echo $v['id']; ?>)" class="small"><i class="fa fa-thumbs-down"></i> <?php echo $v['bad']; ?></a> -
                                <small class="text-muted"><?php echo $v['add_time']; ?></small>
                                -- <button onclick="commentComent(this,<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"> 回复(<?php echo $v['comment_comment_num']; ?>)</button>
                                <button onclick="submitCommentComment(this,<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> 评论</button>
                                <button onclick="delComment(this,<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"><i class="fa fa-trash"></i> 删除</button>
                            </div>

                            <!--<div class="social-comment">-->
                                <!--<a href="" class="pull-left">-->
                                    <!--<img alt="image" src="/static/admin/img/a7.jpg">-->
                                <!--</a>-->
                                <!--<div class="media-body">-->
                                    <!--<a href="#">-->
                                        <!--尤小右-->
                                    <!--</a> 用checkbox + CSS 也能玩出来很多花样，来看看这些有趣的例子吧！-->
                                    <!--<br/>-->
                                    <!--<a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11</a> - -->
                                    <!--<small class="text-muted">8月18日</small>-->
                                <!--</div>-->
                                <!---->
                            <!--</div>-->

                            <!--<div class="social-comment">-->
                                <!--<a href="" class="pull-left">-->
                                    <!--<img alt="image" src="/static/admin/img/a8.jpg">-->
                                <!--</a>-->
                                <!--<div class="media-body">-->
                                    <!--<textarea class="form-control" placeholder="填写评论..."></textarea>-->
                                <!--</div>-->
                            <!--</div>-->

                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>

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
<script>
    //弹出和隐藏评论窗口
    $("#comment").click(function () {
        var display = $("#comment_input").css('display');
        if (display == 'none'){
            $("#comment_input").css('display','block');
        }else {
            $("#comment_input").css('display','none');
        }

    });
    
    //帖子点赞操作
    $("#good").click(function () {
        var post_id = $("#post_id").val();
        $.ajax({
            url:"<?php echo url('goodPost'); ?>?post_id="+post_id+"&type=good",
            dateType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var str = '<i class="fa fa-thumbs-up"></i> 赞('+data.data+')';
                        $("#good").html(str);
                    });
                } else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
    });
    //帖子点踩操作
    $("#bad").click(function () {
        var post_id = $("#post_id").val();
        $.ajax({
            url:"<?php echo url('goodPost'); ?>?post_id="+post_id+"&type=bad",
            dateType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var str = '<i class="fa fa-thumbs-down"></i> 踩('+data.data+')';
                        $("#bad").html(str);
                    });
                } else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
    });

    $("#delPost").click(function () {
        layer.confirm('确认删除此帖子吗?', {icon: 3, title:'提示'}, function(index){
            var post_id = <?php echo $post_info['id']; ?>;
            $.ajax({
                url:"<?php echo url('delPost'); ?>?post_id="+post_id,
                dataType:"json",
                success:function (data) {
                    if (data.code == 1){
                        layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                            window.location.href = "<?php echo url('BugattiForum/index'); ?>";
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
    });
    //评论点赞操作
    function commentGood(obj,id){
        var comment_id = id;
        $.ajax({
            url:"<?php echo url('commentGood'); ?>?comment_id="+comment_id+'&type=good',
            dataType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var str = '<i class="fa fa-thumbs-up"></i> '+data.data;
                        $(obj).html(str);
                    });
                }else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        })
    }

    //评论点赞操作
    function commentBad(obj,id){
        var comment_id = id;
        $.ajax({
            url:"<?php echo url('commentGood'); ?>?comment_id="+comment_id+'&type=bad',
            dataType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var str = '<i class="fa fa-thumbs-down"></i> '+data.data;
                        $(obj).html(str);
                    });
                }else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        })
    }
    //提交评论
    $("#comment_button").click(function () {
        var post_id = $("#post_id").val();
        var comment_content = $("#comment_content").val();
        $.ajax({
            url:"<?php echo url('comment'); ?>?post_id="+post_id,
            type:"POST",
            data:{comment_content:comment_content},
            dataType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var username = "<?php echo $user_info['username']; ?>";
                        var time = getNowFormatDate();
                        var comment = '<div class="social-comment"><a href="" class="pull-left"><img alt="image" src="/static/admin/img/a7.jpg"></a><div class="media-body"><a href="#">'+username+'</a> '+comment_content+'<br/><small class="text-muted">'+time+'</small></div></div>';
                        $("#comment_input").after(comment);
                        $("#comment_input").css('display','none');

                    });
                } else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
    });

    var OEnum = 1;
    //查看回复评论操作
    function commentComent(obj,comment_id){
        // if (OEnum == 1){
        if ($("div[name='comment_comment_"+comment_id+"']").length > 0){
            $("div[name='comment_comment_"+comment_id+"']").remove();
        } else {
            $.ajax({
                url:"<?php echo url('commentComment'); ?>?comment_id="+comment_id,
                dataType: "json",
                success:function (res) {
                    var str = '';
                    $.each(res,function (k,v) {
                        str += '<div name="comment_comment_'+comment_id+'" class="social-comment"><a href="" class="pull-left"><img alt="image" src="/static/admin/img/a7.jpg"></a><div class="media-body"><a href="#">'+v.username+'</a> '+v.content+'<br/><a href="#" onclick="commentGood(this,'+v.id+')" class="small"><i style="color: red" class="fa fa-thumbs-up"></i> '+v.good+'</a><a href="#" onclick="commentBad(this,'+v.id+')" class="small"><i class="fa fa-thumbs-down"></i> '+v.bad+'</a> -<small class="text-muted">'+v.add_time+'</small> -- <button onclick="commentComent(this,'+v.id+')" class="btn btn-white btn-xs"> 回复('+v.comment_comment_num+')</button><button onclick="submitCommentComment(this,'+v.id+')" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> 评论</button><button onclick="delComment(this,'+v.id+')" class="btn btn-white btn-xs"><i class="fa fa-trash"></i> 删除</button></div></div>'
                    })
                    $(obj).parent().after(str);
                    // OEnum ++;
                    // $(obj).attr("onClick","");
                }
            });
        }

            // OEnum = 2;
        // } else {

            // OEnum = 1;
        // }



    }

    //展示评论的评论按钮
    function submitCommentComment(obj,comment_id){
        // $(obj).parent().parent().first().after();
        if ($("div[name='comment_comment_input_"+comment_id+"']").length > 0) {
            $("div[name='comment_comment_input_"+comment_id+"']").remove();
        }else {
            var str = '<div name="comment_comment_input_'+comment_id+'" class="social-comment"><a href="" class="pull-left"><img alt="image" src="/static/admin/img/a8.jpg"></a><div class="media-body"><textarea name="comment_comment_content_'+comment_id+'" class="form-control" placeholder="填写评论..."></textarea><button id="comment_comment_button" class="btn btn-outline btn-success  dim" onclick="releaseCommentComment('+comment_id+')" style="top: 5px;" type="button">提交</button></div></div>';
            $(obj).parent().first().after(str);
        }
    }
    //提交评论的评论
    function releaseCommentComment(comment_id) {
        var post_id = $("#post_id").val();
        var comment_content = $("textarea[name='comment_comment_content_"+comment_id+"']").val();
        // console.log(comment_id);
        // console.log(post_id);

        $.ajax({
            url:"<?php echo url('releaseCommentComment'); ?>?comment_id="+comment_id+"&post_id="+post_id,
            type:"POST",
            data:{comment_content:comment_content},
            dataType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        var username = "<?php echo $user_info['username']; ?>";
                        var time = getNowFormatDate();
                        var comment = '<div class="social-comment"><a href="" class="pull-left"><img alt="image" src="/static/admin/img/a7.jpg"></a><div class="media-body"><a href="#">'+username+'</a> '+comment_content+'<br/><small class="text-muted">'+time+'</small></div></div>';
                        $("#comment_comment_button").parent().parent().parent().append(comment);
                        $("#comment_comment_button").parent().parent().remove();

                    });
                } else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
    }

    //删除评论操作
    function delComment(obj,id) {
        var comment_id = id;
        $.ajax({
            url:"<?php echo url('delComment'); ?>?comment_id="+comment_id,
            dataType:"json",
            success:function (data) {
                if (data.code == 1){
                    layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        $(obj).parent().parent().remove();
                    });
                }else {
                    layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        })
    }

//获取当前常规时间格式
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
        return currentdate;
    }
</script>
</body>
</html>