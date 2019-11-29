<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/var/www/html/run1/public/../application/admin/view/indexpage/index1.html";i:1561009846;s:60:"/var/www/html/run1/application/admin/view/public/header.html";i:1539856994;s:60:"/var/www/html/run1/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
<style>
    .user_img{
        height: 32px;
        display: flex;
        flex-direction:column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
</style>
<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-sm-12">
            <!--待开发项目-->
            <div class="col-sm-4">
                <div class="ibox-title">
                    <h5>待开发项目</h5>
                    <div class="ibox-tools">
                        <span class="btn btn-primary btn-xs">(<?php echo count($notStartProject); ?>)</span>
                    </div>
                </div>
                <div class="ibox-content">


                    <div class="project-list">

                        <table class="table table-hover">
                            <tbody>
                            <?php if(!(empty($notStartProject) || (($notStartProject instanceof \think\Collection || $notStartProject instanceof \think\Paginator ) && $notStartProject->isEmpty()))): if(is_array($notStartProject) || $notStartProject instanceof \think\Collection || $notStartProject instanceof \think\Paginator): if( count($notStartProject)==0 ) : echo "" ;else: foreach($notStartProject as $key=>$vo): ?>
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary"><?php echo $vo['status']; ?></span></td>
                                <td class="project-title">
                                    <a href="project_detail.html"><?php echo $vo['pname']; ?></a>
                                    <br/>
                                    <small>启动时间 : <?php echo date("Y-m-d",$vo['starttime']); ?></small>
                                    <br>
                                    <small>限定时间 : <?php echo date("Y-m-d",$vo['limitedtime']); ?></small>
                                </td>
                                <td class="project-completion">
                                    <small>业务员： <?php echo $vo['real_name']; ?></small>
<!--                                    <div class="progress progress-mini">-->
<!--                                        <div style="width: 48%;" class="progress-bar"></div>-->
<!--                                    </div>-->
                                </td>
                                <td class="project-people">
                                    <?php if(!(empty($vo['users']) || (($vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator ) && $vo['users']->isEmpty()))): if(is_array($vo['users']) || $vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator): if( count($vo['users'])==0 ) : echo "" ;else: foreach($vo['users'] as $key=>$v1): ?>
                                    <div class="user_img" style="display:inline-block">
                                        <img alt="image" class="img-circle" src="/uploads/face/<?php echo $v1['portrait']; ?>" onerror='this.src="/static/admin/images/head_default.gif"'>
                                        <p><small><?php echo $v1['real_name']; ?></small></p>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </td>
<!--                                <td class="project-actions">-->
<!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>-->
<!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>-->
<!--                                </td>-->
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--开发中项目-->
            <div class="col-sm-4">
                <div class="ibox-title">
                    <h5>开发中项目</h5>
                    <div class="ibox-tools">
                        <span class="btn btn-primary btn-xs">(<?php echo count($startingProject); ?>)</span>
                    </div>
                </div>
                <div class="ibox-content">


                    <div class="project-list">

                        <table class="table table-hover">
                            <tbody>
                            <?php if(!(empty($startingProject) || (($startingProject instanceof \think\Collection || $startingProject instanceof \think\Paginator ) && $startingProject->isEmpty()))): if(is_array($startingProject) || $startingProject instanceof \think\Collection || $startingProject instanceof \think\Paginator): if( count($startingProject)==0 ) : echo "" ;else: foreach($startingProject as $key=>$vo): ?>
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary"><?php echo $vo['status']; ?></span></td>
                                <td class="project-title">
                                    <a href="project_detail.html"><?php echo $vo['pname']; ?></a>
                                    <br/>
                                    <small>启动时间 : <?php echo date("Y-m-d",$vo['starttime']); ?></small>
                                    <br>
                                    <small>限定时间 : <?php echo date("Y-m-d",$vo['limitedtime']); ?></small>
                                </td>
                                <td class="project-completion">
                                    <small>业务员： <?php echo $vo['real_name']; ?></small>
                                    <!--                                    <div class="progress progress-mini">-->
                                    <!--                                        <div style="width: 48%;" class="progress-bar"></div>-->
                                    <!--                                    </div>-->
                                </td>
                                <td class="project-people">
                                    <?php if(!(empty($vo['users']) || (($vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator ) && $vo['users']->isEmpty()))): if(is_array($vo['users']) || $vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator): if( count($vo['users'])==0 ) : echo "" ;else: foreach($vo['users'] as $key=>$v1): ?>
                                    <div class="user_img" style="display:inline-block">
                                        <img alt="image" class="img-circle" src="/uploads/face/<?php echo $v1['portrait']; ?>" onerror='this.src="/static/admin/images/head_default.gif"'>
                                        <p><small><?php echo $v1['real_name']; ?></small></p>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </td>
                                <!--                                <td class="project-actions">-->
                                <!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>-->
                                <!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>-->
                                <!--                                </td>-->
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--完成开发项目-->
            <div class="col-sm-4">
                <div class="ibox-title">
                    <h5>完成开发项目</h5>
                    <div class="ibox-tools">
                        <span class="btn btn-primary btn-xs">(<?php echo count($finishProject); ?>)</span>
                    </div>
                </div>
                <div class="ibox-content">


                    <div class="project-list">

                        <table class="table table-hover">
                            <tbody>
                            <?php if(!(empty($finishProject) || (($finishProject instanceof \think\Collection || $finishProject instanceof \think\Paginator ) && $finishProject->isEmpty()))): if(is_array($finishProject) || $finishProject instanceof \think\Collection || $finishProject instanceof \think\Paginator): if( count($finishProject)==0 ) : echo "" ;else: foreach($finishProject as $key=>$vo): ?>
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary"><?php echo $vo['status']; ?></span></td>
                                <td class="project-title">
                                    <a href="project_detail.html"><?php echo $vo['pname']; ?></a>
                                    <br/>
                                    <small>启动时间 : <?php echo date("Y-m-d",$vo['starttime']); ?></small>
                                    <br>
                                    <small>限定时间 : <?php echo date("Y-m-d",$vo['limitedtime']); ?></small>
                                    <br>
                                    <small>完成开发时间 : <?php echo date("Y-m-d",$vo['finishtime']); ?></small>
                                </td>
                                <td class="project-completion">
                                    <small>业务员： <?php echo $vo['real_name']; ?></small>
                                    <!--                                    <div class="progress progress-mini">-->
                                    <!--                                        <div style="width: 48%;" class="progress-bar"></div>-->
                                    <!--                                    </div>-->
                                </td>
                                <td class="project-people">
                                    <?php if(!(empty($vo['users']) || (($vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator ) && $vo['users']->isEmpty()))): if(is_array($vo['users']) || $vo['users'] instanceof \think\Collection || $vo['users'] instanceof \think\Paginator): if( count($vo['users'])==0 ) : echo "" ;else: foreach($vo['users'] as $key=>$v1): ?>
                                    <div class="user_img" style="display:inline-block">
                                        <img alt="image" class="img-circle" src="/uploads/face/<?php echo $v1['portrait']; ?>" onerror='this.src="/static/admin/images/head_default.gif"'>
                                        <p><small><?php echo $v1['real_name']; ?></small></p>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </td>
                                <!--                                <td class="project-actions">-->
                                <!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>-->
                                <!--                                    <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>-->
                                <!--                                </td>-->
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--&lt;!&ndash; 全局js &ndash;&gt;-->
<!--<script src="js/jquery.min.js?v=2.1.4"></script>-->
<!--<script src="js/bootstrap.min.js?v=3.3.6"></script>-->


<!--&lt;!&ndash; 自定义js &ndash;&gt;-->
<!--<script src="js/content.js?v=1.0.0"></script>-->


<script>
    $(document).ready(function(){

        $('#loading-example-btn').click(function () {
            btn = $(this);
            simpleLoad(btn, true)

            // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

            simpleLoad(btn, false)
        });
    });

    function simpleLoad(btn, state) {
        if (state) {
            btn.children().addClass('fa-spin');
            btn.contents().last().replaceWith(" Loading");
        } else {
            setTimeout(function () {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Refresh");
            }, 2000);
        }
    }
</script>

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
<script src="/static/admin/js/jquery.leoweather.min.js"></script>
<script type="text/javascript" src="/static/admin/js/highcharts/highcharts.src.js"></script>
<script type="text/javascript" src="/static/admin/js/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="/static/admin/js/highcharts/exporting.js"></script>
<script language="JavaScript">
    $(function () {
        $.ajax({
            url:"<?php echo url('indexPage'); ?>",
            dataType:"json",
            success:function (res) {
                console.log(res);
                //用户相关的
                $("#todayNewUserCount").text(res.todayNewUserCount);
                $("#UserCount").text(res.UserCount);
                $("#todayActiveCount").text(res.todayActiveCount);
                $("#noActiveCount").text(res.noActiveCount);
                //新闻相关的
                $("#todayNewsCount").text(res.todayNewsCount);
                $("#newsCount").text(res.newsCount);
                $("#todayNewsCommentCount").text(res.todayNewsCommentCount);
                $("#newsCommentCount").text(res.newsCommentCount);
                //帖子相关的
                $("#todayPostCount").text(res.todayPostCount);
                $("#postCount").text(res.postCount);
                $("#todayPostCommentCount").text(res.todayPostCommentCount);
                $("#postCommentCount").text(res.postCommentCount);
                //日志相关的
                $("#failLogCount").text(res.failLogCount);
                $("#logCount").text(res.logCount);
                $("#addLogCount").text(res.logCount);
                $("#logsCount").text(res.logsCount);
                //3D柱状图
                var brand_list = res.brand_list;
                var data_list = res.data_list;
                var chart = Highcharts.chart('container',{
                    chart: {
                        type: 'column',
                        margin: 75,
                        options3d: {
                            enabled: true,
                            alpha: 10,
                            beta: 25,
                            depth: 70,
                            viewDistance: 100,      // 视图距离，它对于计算角度影响在柱图和散列图非常重要。此值不能用于3D的饼图
                            frame: {                // Frame框架，3D图包含柱的面板，我们以X ,Y，Z的坐标系来理解，X轴与 Z轴所形成
                                // 的面为bottom，Y轴与Z轴所形成的面为side，X轴与Y轴所形成的面为back，bottom、
                                // side、back的属性一样，其中size为感官理解的厚度，color为面板颜色
                                bottom: {
                                    size: 10
                                },
                                side: {
                                    size: 1,
                                    color: 'transparent'
                                },
                                back: {
                                    size: 1,
                                    color: 'transparent'
                                }
                            }
                        },
                    },
                    title: {
                        text: '各品牌论坛具体数量柱状图'
                    },
                    subtitle: {
                        text: null
                    },
                    plotOptions: {
                        column: {
                            depth: 25
                        }
                    },
                    xAxis: {
                        categories: brand_list
                    },
                    yAxis: {
                        title: {
                            text: '数量'
                        }
                    },
                    series: data_list
                });

            }
        })
    })
    // function refresh()
    // {
    //     window.location.reload();
    // }
    // setTimeout('refresh()',5000); //指定5秒刷新一次

</script>
</body>