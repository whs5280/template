<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"/var/www/html/run/public/../application/admin/view/plan/add_plan.html";i:1560820527;s:59:"/var/www/html/run/application/admin/view/public/header.html";i:1539856994;s:59:"/var/www/html/run/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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
<!--bootstrap-table表格插件-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

</head>

<style>
    *{
        margin: 0;
        padding: 0;
    }
    p {
        margin: 0;
    }
    .top {
        border-bottom: 1px solid #ccc;
        display: flex;
        justify-content: space-between;
        padding: 15px;
        align-items: center;
    }
    .table-box {
        height: 400px;
        overflow-y: auto;
    }
    .table-item {
        padding: 5px;
    }
    .padding-default {
        padding: 15px 0;
    }

    .table-condensed>tbody>tr>td {
        padding: 10px;
    }
</style>

<body>
<div>
    <div class="top">
        <h4>每日计划</h4>
        <div>
            <button class="btn btn-default" type="submit">返回</button>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-hover table-condensed border">
                        <tr>
                            <td class="col-lg-3 col-md-3 col-sm-3">项目/序号</td>
                            <td class="col-lg-5 col-md-5 col-sm-5">简述</td>
                            <td class="col-lg-3 col-md-3 col-sm-3">工时</td>
                            <td class="col-lg-3 col-md-3 col-sm-3">反馈时间</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row table-box">
                <?php if(!(empty($projectInfo) || (($projectInfo instanceof \think\Collection || $projectInfo instanceof \think\Paginator ) && $projectInfo->isEmpty()))): if(is_array($projectInfo) || $projectInfo instanceof \think\Collection || $projectInfo instanceof \think\Paginator): if( count($projectInfo)==0 ) : echo "" ;else: foreach($projectInfo as $key=>$vo): ?>
                <div class="table-item">
                    <div class="col-lg-12 col-md-12 col-sm-12">项目</div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-hover table-condensed border">
                            <tr id="projectList" label="project" onclick="includePlan(this,<?php echo $vo['pid']; ?>)">
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo $vo['pname']; ?></td>
                                <td class="col-lg-5 col-md-5 col-sm-5"><?php echo $vo['status']; ?></td>
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo $vo['planday']; ?></td>
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo date('Y-m-d H:i',$vo['submissiontime']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; if(!(empty($feedbackInfo) || (($feedbackInfo instanceof \think\Collection || $feedbackInfo instanceof \think\Paginator ) && $feedbackInfo->isEmpty()))): if(is_array($feedbackInfo) || $feedbackInfo instanceof \think\Collection || $feedbackInfo instanceof \think\Paginator): if( count($feedbackInfo)==0 ) : echo "" ;else: foreach($feedbackInfo as $key=>$vo): ?>
                <div class="table-item">
                    <div class="col-lg-12 col-md-12 col-sm-12"><?php echo $key; ?></div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-hover table-condensed border">
                            <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): if( count($vo)==0 ) : echo "" ;else: foreach($vo as $key=>$v1): ?>
                            <tr id="feedbackList" label="feedback" onclick="includePlan(this,<?php echo $v1['ppid']; ?>)">
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo $v1['num']; ?></td>
                                <td class="col-lg-5 col-md-5 col-sm-5"><?php echo $v1['tech_remark']; ?></td>
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo $v1['planday']; ?></td>
                                <td class="col-lg-3 col-md-3 col-sm-3"><?php echo date('Y-m-d H:i',$v1['createtime']); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 padding-default">
                    <input type="hidden" id="planType" value="">
                    <input type="hidden" id="pid" value="">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">项目名：</div>
                        <div id="pname" class="col-lg-9 col-md-9 col-sm-9"></div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 padding-default">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">反馈序号：</div>
                        <div id="num" class="col-lg-9 col-md-9 col-sm-9">
                            V11
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 padding-default">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">反馈时间：</div>
                        <div id="feedbackTime" class="col-lg-9 col-md-9 col-sm-9">
                            1999-99-99
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 padding-default">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">内容：</div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <textarea name="" id="content" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 padding-default">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">附件：</div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
<!--                            <input type="file" name="" id="file">-->
                            <a id="file" href="" download=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 padding-default">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 text-right">工时：</div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input id="workTime" name="planday" type="text">
                        </div>
                    </div>
                </div>

                <div class="text-center padding-default" >
                    <button class="btn btn-default" onclick="add()" type="button">列入计划</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 padding-default">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <table id="planTable" class="table table-condensed">
                <?php if(!(empty($planInfo) || (($planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator ) && $planInfo->isEmpty()))):                     $start = 9;
                    $end = 10;
                if(is_array($planInfo) || $planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator): if( count($planInfo)==0 ) : echo "" ;else: foreach($planInfo as $key=>$vo):                     for($i=0;$i<$vo['planday'];$i++){
                        $content = '';
                        if(isset($vo['pid'])){
                            $content = $vo['pname'];
                        }else{
                            $content = $vo['pname'].' - '.$vo['num'];
                        }
                        echo '<tr><td width="200px" class="active">'.($start).':00 - '.($end).':00</td><td class="success">'.$content.'</td></tr>';
                        $start += 1;
                        $end += 1;
                    }
                endforeach; endif; else: echo "" ;endif; endif; ?>
<!--                <tr>-->
<!--                    <td width="200px" class="active">09:00 - 10:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">10:00 - 11:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">11:00 - 12:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">13:00 - 14:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">13:00 - 14:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">15:00 - 16:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">16:00 - 17:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="active">17:00 - 18:00</td>-->
<!--                    <td class="success">...</td>-->
<!--                </tr>-->
            </table>
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
<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap table -->
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<!--Bootstrap table 封装-->
<script type="text/javascript" src="/static/admin_location/js/uad-bootsrap-table.js"></script>
<script type="text/javascript" src="/static/admin_location/js/uad-layer.js"></script>
<!-- Fancy box -->
<script src="/static/admin/js/plugins/fancybox/jquery.fancybox.js"></script>
<script>
    //列入计划
    function includePlan(obj,id) {
        var label = $(obj).attr('label');
        console.log(label);
        console.log(id);
        if (label == 'project'){
                $.get('<?php echo url("findProject"); ?>?id='+id,function (res) {
                    console.log(res);
                    if (res.code == 1){
                        //数据渲染
                        $("#pname").html(res.data.pname);
                        $("#num").html(res.data.pname);
                        $("#content").html(res.data.remark);
                        $("#feedbackTime").html(timestampToTime(res.data.submissiontime));
                        $("#file").html('');
                        $("#file").attr('href','');
                        $("#file").attr('download','');
                        if (res.data.fileurl != '') {
                            $("#file").html('附件(点击下载)');
                            $("#file").attr('href','/'+res.data.fileurl);
                            $("#file").attr('download','附件.txt');
                        }
                        $('#pid').val(res.data.pid);
                        $('#planType').val(1);
                    }
                })
        } else {
            $.get('<?php echo url("findFeedback"); ?>?id='+id,function (res) {
                if (res.code == 1){
                    //数据渲染
                    $("#pname").html(res.data.pname);
                    $("#num").html(res.data.num);
                    $("#content").html(res.data.tech_remark);
                    $("#feedbackTime").html(timestampToTime(res.data.createtime));
                    $("#file").html('');
                    $("#file").attr('href','');
                    $("#file").attr('download','');
                    if (res.data.fileurl) {
                        $("#file").html('附件(点击下载)');
                        $("#file").attr('href','/'+res.data.fileurl);
                        $("#file").attr('download','附件.txt');
                    }
                    $('#pid').val(res.data.ppid);
                    $('#planType').val(2);
                }
            })
        }
    }
    //添加计划
    function add() {
        var workTime = $('#workTime').val();
        var pname = $('#pname').html();
        var num = $('#num').html();
        var planType = $('#planType').val();
        var id = $('#pid').val();
        var obj = $('.success');
        var length = obj.length;
        // alert(workTime+length);
        if (workTime && pname != ''){
            if ((parseInt(workTime)+parseInt(length))<=8){
                $.get('<?php echo url("doAddPlan"); ?>?planType='+planType+'&planday='+workTime+'&id='+id,function (res) {
                    if (res.code == 1){
                        layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                            workTime = Math.ceil(workTime);
                            var i = 1;
                            var html = '';
                            var start = 9+length;
                            var end = 10+length;
                            for (i=1;i<=workTime;i++){
                                start += 1;
                                end += 1;
                                if (planType != 1){
                                    html += '<tr><td width="200px" class="active">'+start+':00 - '+end+':00</td><td class="success">'+pname+' - '+num+'</td></tr>';
                                }else {
                                    html += '<tr><td width="200px" class="active">'+start+':00 - '+end+':00</td><td class="success">'+pname+'</td></tr>';
                                }
                            }
                            $('#planTable').append(html);
                        });
                    }
                })
            }else {
                alert('已超出今天的计划时间！');
            }

        }
    }
    //时间戳转字符形式
    function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = date.getDate() + ' ';
        var h = date.getHours() + ':';
        var m = date.getMinutes() + ':';
        var s = date.getSeconds();
        // return Y+M+D;
        return Y+M+D+h+m+s;
    }
</script>
</html>