<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/var/www/ZUAD_info_release/public/../application/admin/view/bugatti_forum/index.html";i:1550654378;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/header.html";i:1539856994;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<link rel="shortcut icon" href="favicon.ico">
<link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="/static/admin/css/animate.css" rel="stylesheet">
<link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
<body class="gray-bg">
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>筛选条件 <small>请按左边向下的箭头</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="form_basic.html#">选项1</a>
                        </li>
                        <li><a href="form_basic.html#">选项2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题：</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">时间/日期范围：</label>
                        <div class="col-sm-10">
                            <input placeholder="开始日期" class="form-control layer-date" id="start">
                            <input placeholder="结束日期" class="form-control layer-date" id="end">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">确定</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content m-b-sm border-bottom">
                        <div class="p-xs">
                            <div class="pull-left m-r-md">
                                <i class="fa fa-globe text-navy mid-icon"></i>
                            </div>
                            <h2>欢迎来到布加迪板块</h2>
                            <span>你可以自由选择你感兴趣的话题。</span>
                        </div>
                    </div>

                    <div class="ibox-content forum-container">

                        <div class="forum-title">
                            <div class="pull-right forum-desc">
                                <samll>总帖子数： 320,800</samll>
                            </div>
                            <h3>主版</h3>
                            <button class="btn btn-outline btn-danger  dim " type="button" style="color: white">发布帖子</button>
                        </div>

                        <div class="forum-item active">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-shield"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">课程问答</a>
                                    <div class="forum-sub-title">【官方活动】非你“慕”属——你是慕课网的真爱“粉”吗？</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            1216
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            368
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            140
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">课程问答</a>
                                    <div class="forum-sub-title">与notification的区别？</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            890
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            120
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            154
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item active">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">技术分享</a>
                                    <div class="forum-sub-title">请问怎样对一个点拉伸或者改变其形状</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            680
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            124
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            61
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">活动建议</a>
                                    <div class="forum-sub-title">帮我看一下我哪里错了 为什么不能弹出窗口</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            1450
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            652
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            572
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="forum-title">
                            <div class="pull-right forum-desc">
                                <samll>总贴子数：17,800,600</samll>
                            </div>
                            <h3>副版</h3>
                        </div>

                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">
                                        请问怎样对一个点拉伸或者改变其形状 </a>
                                    <div class="forum-sub-title">我最开始也这样，给你个建议哈，别硬背html标签了，知道并理解这个标签怎么用就行。然后把CSS看完并理解。</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            1516
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            238
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            180
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-bomb"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">为什么$james1=$james这个语句在程序结束的时候没有调用析构函数释放$james1占用的资源</a>
                                    <div class="forum-sub-title">匹配任意内容 find /etc/home -name "*" 显示目录/etc/home下的所有文件? 匹配任意一个字符 find /etc/home -name "c?" </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            1766
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            321
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            42
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-bookmark"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">什么情况下可以用x86急速器？</a>
                                    <div class="forum-sub-title">林子大了什么鸟都有啊。楼主如果认为这位鹏哥讲的不好，应该指出来哪里讲的不好，并且把你觉的更好的讲课方案拿出来分享</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            765
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            90
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            11
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-ambulance"></i>
                                    </div>
                                    <a href="forum_post.html" class="forum-item-title">localhost访问出错</a>
                                    <div class="forum-sub-title">1.作用Linux系统中grep命令是一种强大的文本搜索工具，它能使用正则表达式搜索文本，并把匹 配的行打印出来。grep全称是Global Regular Expression Print，表示全局正则表达式版本，它的使用权限是所有用户。</div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            2550
                                        </span>
                                    <div>
                                        <small>浏览</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            122
                                        </span>
                                    <div>
                                        <small>话题</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            92
                                        </span>
                                    <div>
                                        <small>帖子</small>
                                    </div>
                                </div>
                            </div>
                        </div>

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
<!-- 全局js -->
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>



<!-- Peity -->
<script src="/static/admin/js/plugins/peity/jquery.peity.min.js"></script>

<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>


<!--<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>-->
<!--统计代码，可删除-->
<script>
    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY/MM/DD hh:mm:ss',
        min: laydate.now(), //设定最小日期为当前日期
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
        format: 'YYYY/MM/DD hh:mm:ss',
        min: laydate.now(),
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
</body>