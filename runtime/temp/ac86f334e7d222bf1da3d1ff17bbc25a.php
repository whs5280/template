<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/var/www/html/run/public/../application/admin/view/lamborghini_forum/index.html";i:1554781196;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
                <form method="get" class="form-horizontal" action="<?php echo url('index'); ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题：</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="search_title" id="search_title" value="<?php echo $search_title; ?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">时间/日期范围：</label>
                        <div class="col-sm-10">
                            <input placeholder="开始日期" class="form-control layer-date" name="start" id="start" value="<?php echo $start; ?>">
                            <input placeholder="结束日期" class="form-control layer-date" name="end" id="end" value="<?php echo $end; ?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" onclick="search_post()" type="submit">确定</button>
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
                            <h2>欢迎来到<?php echo $brand_info['name']; ?>论坛</h2>
                            <span><?php echo $brand_info['title']; ?></span><br>
                            <span>你可以自由选择你感兴趣的话题。</span>
                        </div>
                    </div>

                            <div class="ibox-content forum-container">
                                <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                                    <ul id="plate" class="layui-tab-title">
                                        <?php if(is_array($plates_info) || $plates_info instanceof \think\Collection || $plates_info instanceof \think\Paginator): if( count($plates_info)==0 ) : echo "" ;else: foreach($plates_info as $key=>$v): ?>
                                        <!--<li class="layui-this">主板</li>-->
                                        <li><?php echo $v['name']; ?></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                    <div id="posts_content" class="layui-tab-content" style="height: 100%;">
                                        <!--<div class="layui-tab-item layui-show">-->
                                        <?php if(is_array($plates_info) || $plates_info instanceof \think\Collection || $plates_info instanceof \think\Paginator): if( count($plates_info)==0 ) : echo "" ;else: foreach($plates_info as $key=>$v): ?>
                                        <div class="layui-tab-item">
                                            <div>
                                                <a href="<?php echo url('releasePost'); ?>?plate_id=<?php echo $v['id']; ?>"><button class="btn btn-outline btn-danger  dim " id="post" type="button">发布帖子</button></a>
                                                <!--<div class="forum-title">-->
                                                    <!--<div class="pull-right forum-desc">-->
                                                        <samll>总帖子数： <?php echo $v['post_total']; ?></samll>
                                                    <!--</div>-->
                                                <!--</div>-->
                                                <div id="plate_<?php echo $v['id']; ?>">
                                                    <?php if(is_array($v['posts_info']) || $v['posts_info'] instanceof \think\Collection || $v['posts_info'] instanceof \think\Paginator): if( count($v['posts_info'])==0 ) : echo "" ;else: foreach($v['posts_info'] as $key=>$v1): ?>
                                                    <div class="forum-item active">
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <div class="forum-icon">
                                                                    <i class="fa fa-comments-o"></i>
                                                                </div>
                                                                <a href="<?php echo url('postDetails'); ?>?post_id=<?php echo $v1['id']; ?>" class="forum-item-title"><?php echo $v1['title']; ?></a>
                                                                <div class="forum-sub-title">于<?php echo $v1['update_time']; ?>发布</div>
                                                            </div>
                                                            <div class="col-sm-1 forum-info">
                                                                <?php if($v1['status'] == 1): ?>
                                                                <span class="label label-info">正常</span>
                                                                <?php else: ?>
                                                                <span class="label label-danger">禁用</span>
                                                                <?php endif; ?>
                                                                <div>
                                                                    <small>状态</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 forum-info">
                                                            <span class="views-number">
                                                                <?php echo $v1['comment_num']; ?>
                                                            </span>
                                                                <div>
                                                                    <small>评论</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 forum-info">
                                                            <span class="views-number">
                                                                <?php echo $v1['browse']; ?>
                                                            </span>
                                                                <div>
                                                                    <small>浏览</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 forum-info">
                                                            <span class="views-number">
                                                                <?php echo $v1['good']; ?>
                                                            </span>
                                                                <div>
                                                                    <small>赞</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 forum-info">
                                                            <span class="views-number">
                                                                <?php echo $v1['bad']; ?>
                                                            </span>
                                                                <div>
                                                                    <small>踩</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                                <div id="paging<?php echo $v['id']; ?>" name="page" post_total="<?php echo $v['post_total']; ?>" plate_id="<?php echo $v['id']; ?>"></div>
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
    $("#plate li:first").attr('class','layui-this');
    $("#posts_content div:first").attr('class','layui-tab-item layui-show');
    //分页
    layui.use(['laypage', 'layer'], function() {
        var laypage = layui.laypage
            , layer = layui.layer;

        //总页数大于页码总数
        $("div[name='page']").each(function () {
            // console.log($(this).attr('id'));
            var id = $(this).attr('id');
            var post_total = $(this).attr('post_total');
            var plate_id = $(this).attr('plate_id');
            var url = 'postDetails';
            laypage.render({
                elem: id
                ,count: post_total //数据总数
                ,limit:<?php echo $limit; ?>
                ,jump: function(obj,first){
                    if(!first){
                        console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                        console.log(obj.limit); //得到每页显示的条数
                        var str = "";
                        var title = $("#search_title").val();
                        var start_date = $("#start").val();
                        var end_date = $("#end").val();
                        $.ajax({
                            url:"<?php echo url('index'); ?>?title=" + title + "&start=" + start_date + "&end=" + end_date,
                            type:"POST",
                            data:{page:obj.curr,plate_id:plate_id},
                            dataType:"json",
                            success:function (res) {
                                console.log(res)
                                var str = '';

                                $.each(res,function (k,v) {
                                    var status_str = '';
                                    if (v.status == 1){
                                        status_str = '<span class="label label-info">正常</span>';
                                    }else {
                                        status_str = '<span class="label label-danger">禁用</span>';
                                    }
                                    console.log(v);
                                    str += '<div class="forum-item active"><div class="row"><div class="col-sm-9"><div class="forum-icon"><i class="fa fa-comments-o"></i></div><a href="'+"<?php echo url('postDetails'); ?>?post_id="+v.id+'" class="forum-item-title">'+v.title+'</a><div class="forum-sub-title">于'+v.update_time+'发布</div></div><div class="col-sm-1 forum-info"><span class="views-number">'+status_str+'</span><div><small>状态</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+v.comment_num+'</span><div><small>评论</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+v.browse+'</span><div><small>浏览</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+v.good+'</span><div><small>赞</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+v.bad+'</span><div><small>踩</small></div></div></div></div></div>'
                                })
                                // str += '<div class="forum-item active"><div class="row"><div class="col-sm-9"><div class="forum-icon"><i class="fa fa-shield"></i></div><a href="forum_post.html" class="forum-item-title">'+res.title+'</a><div class="forum-sub-title">'+res.title+'</div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.browse+'</span><div><small>浏览</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.good+'</span><div><small>赞</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.bad+'</span><div><small>踩</small></div></div></div></div></div>'
                                $("#plate_"+plate_id).html(str);
                            }
                        })
                    }
                }
            });
        })
    });
    //搜索
    function search_post() {
        var title = $("#search_title").val();
        var start_date = $("#start").val();
        var end_date = $("#end").val();
        console.log("<?php echo url('index'); ?>?title=" + title + "&sstart_date=" + start_date + "&end_date=" + end_date);
        // window.location.href = "<?php echo url('index'); ?>?title=" + title + "&sstart_date=" + start_date + "&end_date=" + end_date;
    }
</script>

<script>
    layui.use('element', function() {
        var $ = layui.jquery
            , element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        //触发事件
        var active = {
            tabAdd: function () {
                //新增一个Tab项
                element.tabAdd('demo', {
                    title: '新选项' + (Math.random() * 1000 | 0) //用于演示
                    , content: '内容' + (Math.random() * 1000 | 0)
                    , id: new Date().getTime() //实际使用一般是规定好的id，这里以时间戳模拟下
                })
            }
        }
    })
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
</body>