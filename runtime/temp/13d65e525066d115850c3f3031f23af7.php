<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"C:\LMAP\wwwroot\run\public/../application/admin\view\porsche_news\index.html";i:1556353332;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标签：</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="search_label" id="search_label" value="<?php echo $search_label; ?>">
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
                            <button class="btn btn-primary" type="submit">确定</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
            <a href="<?php echo url('addNews'); ?>"><button class="btn btn-info  dim btn-large-dim btn-outline" style="width:100%;height: 50px;font-size: 20px;" type="button">添加新闻</button></a>
        <div class="col-lg-12" id="news_list">
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
                                <br>
                                <?php if($v['status'] == 1): ?>
                                <span class="label label-info">正常</span>
                                <?php else: ?>
                                <span class="label label-danger">禁用</span>
                                <?php endif; ?>

                                <br><br>
                                <div> <i class="fa fa-comments-o"> </i> <?php echo $v['comment_num']; ?> 评论 </div>
                                <i class="fa fa-eye"> </i> <?php echo $v['browse']; ?> 浏览

                                <br><br>
                                <button onclick="editNews(<?php echo $v['id']; ?>)" class="btn btn-white btn-xs"><i class="fa fa-edit"></i> 修改</button>

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

<div id="page"></div>
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
    layui.use(['laypage', 'layer'], function() {
        var laypage = layui.laypage
            , layer = layui.layer;
        //总页数大于页码总数
        laypage.render({
            elem: 'page'
            , count: <?php echo $page_total; ?> //数据总数
            ,limit:<?php echo $pageSize; ?>
            , jump: function (obj,first) {
                if(!first){
                    console.log(obj)
                    var title = $("#search_title").val();
                    var label = $("#search_label").val();
                    var start_date = $("#start").val();
                    var end_date = $("#end").val();
                    $.ajax({
                        url:"<?php echo url('index'); ?>?title=" + title + "&label=" + label + "&start=" + start_date + "&end=" + end_date,
                        type:"POST",
                        data:{page:obj.curr},
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
                                str += '<div class="ibox"><div class="ibox-content"><a href="#" id="title" onclick="details('+v.id+')" class="btn-link"><h2>'+v.title+'</h2></a><div class="small m-b-xs"><strong>'+v.real_name+'</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> '+v.add_time+'</span></div><p>'+v.subheading+'</p><div class="row"><div class="col-md-6"><h5>标签：</h5><button class="btn btn-primary btn-xs" type="button">'+v.label+'</button></div><div class="col-md-6"><div class="small text-right"><h5>状态：</h5><br>'+status_str+'<br><br><div> <i class="fa fa-comments-o"> </i> '+v.comment_num+' 评论 </div><i class="fa fa-eye"> </i> '+v.browse+' 浏览<br><br><button onclick="editNews('+v.id+')" class="btn btn-white btn-xs"><i class="fa fa-edit"></i> 修改</button><button onclick="delNews('+v.id+')" class="btn btn-white btn-xs"><i class="fa fa-trash"></i> 删除</button></div></div></div></div></div>'
                            })
                            // str += '<div class="forum-item active"><div class="row"><div class="col-sm-9"><div class="forum-icon"><i class="fa fa-shield"></i></div><a href="forum_post.html" class="forum-item-title">'+res.title+'</a><div class="forum-sub-title">'+res.title+'</div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.browse+'</span><div><small>浏览</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.good+'</span><div><small>赞</small></div></div><div class="col-sm-1 forum-info"><span class="views-number">'+res.bad+'</span><div><small>踩</small></div></div></div></div></div>'
                            $("#news_list").html(str);
                        }
                    })
                }

            }
        });
    })
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

    //修改新闻
    function editNews(news_id) {
        window.location.href = "<?php echo url('editNews'); ?>?news_id="+news_id;
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
