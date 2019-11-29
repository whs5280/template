<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"C:\LMAP\wwwroot\run\public/../application/admin\view\indexpage\index.html";i:1556295844;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\header.html";i:1539856994;s:61:"C:\LMAP\wwwroot\run\application\admin\view\public\footer.html";i:1551516328;}*/ ?>
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
    table{
        table-layout: fixed;
    }
</style>
<body class="gray-bg " style="background-color: white">
<!-- 上方tab -->
<div class="row">
    <div class="col-sm-12" style="height: 200px;width: 50%;">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">日</span>-->
                <h5>用户</h5>
            </div>
            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayNewUserCount">0</h1>
                    <small>今日新增</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="UserCount">0</h1>
                    <small>总用户数</small>
                </div>
            </div>

            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayActiveCount">0</h1>
                    <small>今天日活跃数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="noActiveCount">0</h1>
                    <small>无活跃数(30天以上)</small>
                </div>
            </div>

        </div>
    </div>

    <div class="col-sm-12" style="height: 200px;width: 50%;">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">日</span>-->
                <h5>新闻统计</h5>
            </div>
            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayNewsCount">0</h1>
                    <small>今日新增新闻数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="newsCount">0</h1>
                    <small>总新闻数</small>
                </div>
            </div>

            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayNewsCommentCount">0</h1>
                    <small>今日新增评论数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="newsCommentCount">0</h1>
                    <small>总评论数</small>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-12" style="height: 200px;width: 50%;">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">日</span>-->
                <h5>帖子统计</h5>
            </div>
            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayPostCount">0</h1>
                    <small>今日新增帖子数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="postCount">0</h1>
                    <small>总帖子数</small>
                </div>
            </div>

            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="todayPostCommentCount">0</h1>
                    <small>今日新增评论数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="postCommentCount">0</h1>
                    <small>总评论数</small>
                </div>
            </div>

            <!--</div>-->
        </div>
    </div>


    <div class="col-sm-12" style="height: 200px;width: 50%;">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">日</span>-->
                <h5>日志</h5>
            </div>
            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="failLogCount">0</h1>
                    <small>今日严重错误数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="logCount">0</h1>
                    <small>今日日志总数</small>
                </div>
            </div>

            <div style="float: left;width: 50%;height: 140px;border: 1px solid #e7eaec">
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="addLogCount">0</h1>
                    <small>今日新增数</small>
                </div>
                <div class="ibox-content" style="height: 50%">
                    <h1 class="no-margins" id="logsCount">0</h1>
                    <small>总数</small>
                </div>
            </div>

        </div>
    </div>

    <div style="overflow: auto;width: 1300px;margin: 0 auto;padding: 0;background-color: white;">
        <div id="container" style="width: 1300px;height: 600px;padding: 0;margin: 0;background-color: white;margin-top: 30px"></div>
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