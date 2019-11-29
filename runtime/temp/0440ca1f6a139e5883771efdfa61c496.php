<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"/var/www/html/run1/public/../application/admin/view/plan/day_plan.html";i:1561016564;s:60:"/var/www/html/run1/application/admin/view/public/header.html";i:1539856994;s:60:"/var/www/html/run1/application/admin/view/public/footer.html";i:1551516328;}*/ ?>
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

<title>计划</title>
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
        <h4>计划</h4>
        <div>
            <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">插入事务</button>
            <button class="btn btn-default" type="button" onclick="addPlan()">填写计划</button>
        </div>
    </div>
</div>


<!-- 插入事务 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">插入事务</h4>
            </div>
            <div class="modal-body">
                <div class="row padding-default">
                    <div class="col-lg-4 col-md-4 text-right" style="line-height: 35px;">项目名称：</div>
                    <div class="col-lg-8 col-md-8">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                请选择
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">项目一</a></li>
                                <li><a href="#">项目二</a></li>
                                <li><a href="#">项目三</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row padding-default">
                    <div class="col-lg-4 col-md-4 text-right" style="line-height: 35px;">业务员：</div>
                    <div class="col-lg-8 col-md-8">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                请选择
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">业务员一</a></li>
                                <li><a href="#">业务员二</a></li>
                                <li><a href="#">业务员三</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row padding-default">
                    <div class="col-lg-4 col-md-4 col-sm-4 text-right" >类型：</div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 需求
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 优化
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 问题
                        </label>
                    </div>
                </div>
                <div class="row padding-default">
                    <div class="col-lg-4 col-md-4 col-sm-4 text-right" >预估工时：</div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text">
                    </div>
                </div>
                <div class="row padding-default">
                    <div class="col-lg-4 col-md-4 col-sm-4 text-right" >预估工时：</div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <textarea name="" id="" cols="30" rows="6"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">确定</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <input type="hidden" id="plan_id" value="">
                <input type="hidden" id="finish_time" value="">
                <div class="col-lg-4 col-md-4 col-sm-4 text-right">项目名:</div>
                <div id="pname" class="col-lg-8 col-md-8 col-sm-8"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-right">反馈时间：</div>
                <div class="col-lg-8 col-md-8 col-sm-8" id="feedbackTime"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-right">反馈序号：</div>
                <div class="col-lg-8 col-md-8 col-sm-8" id="num"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-right">评估时间：</div>
                <div class="col-lg-8 col-md-8 col-sm-8" id="assessTime"></div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 padding-default">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 text-right">内容：</div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <p id="content"></p>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 padding-default">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 text-right">附件：</div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <a id="file" href=""></a>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 padding-default">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 text-right">计划工时：</div>
                <div class="col-lg-10 col-md-10 col-sm-10" id="planday"></div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-right">实时工时：</div>
                <div class="col-lg-8 col-md-8 col-sm-8" id="real_planday">0</div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6  col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 text-right"><button class="btn btn-default" id="start" onclick="start(this)" type="button">开始</button></div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-right"><button class="btn btn-default" id="finish" onclick="finish(this)" type="button">完成</button></div>
            </div>
        </div>



        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">当天计划</div>
                <div class="col-lg-12 col-md-12 text-right" id="now_date"></div>
                <div class="col-lg-12 col-md-12">
                    <table class="table table-condensed">
                        <?php if(!(empty($planInfo) || (($planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator ) && $planInfo->isEmpty()))):                             $start = 9;
                            $end = 10;
                        if(is_array($planInfo) || $planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator): if( count($planInfo)==0 ) : echo "" ;else: foreach($planInfo as $key=>$vo):                             $tip = true;
                            for($i=0;$i<$vo['planday'];$i++){
                            $planday = $vo['planday'];
                            $content = '';
                            $plan_id = $vo['id'];
                            $finishtime = $vo['finishtime'];
                            if(isset($vo['pid'])){
                                $content = $vo['pname'];
                                $label = 'project';
                                $id = $vo['pid'];
                            }else{
                                $content = $vo['pname'].' - '.$vo['num'];
                                $label = 'feedback';
                                $id = $vo['ppid'];
                            }
                            echo '<tr><td width="200px" class="active">'.($start).':00 - '.($end).':00</td>';
                            if($tip){
                                echo '<td rowspan="'.$vo['planday'].'" label="'.$label.'" onclick="findPlan(this,'.$id.','.$planday.','.$vo['real_planday'].','.$plan_id.','.$finishtime.')" class="success">'.$content.'</td></tr>';

                            }
                            $start += 1;
                            $end += 1;
                            $tip = false;
                        }
                        endforeach; endif; else: echo "" ;endif; endif; ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 padding-default">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">实际工作</div>
                <div class="col-lg-12 col-md-12 text-right" id="real_date"></div>
                <div class="col-lg-12 col-md-12">
                    <table class="table table-condensed">
                        <?php if(!(empty($planInfo) || (($planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator ) && $planInfo->isEmpty()))):                             $start = 9;
                            $end = 10;
                            $planInfo = array_sort($planInfo,'finishtime');
                        if(is_array($planInfo) || $planInfo instanceof \think\Collection || $planInfo instanceof \think\Paginator): if( count($planInfo)==0 ) : echo "" ;else: foreach($planInfo as $key=>$vo):                             $tip = true;
                            for($i=0;$i<$vo['planday'];$i++){
                            $planday = $vo['planday'];
                            $content = '';
                            if($vo['finishtime'] == 0){
                                $content = '未执行计划';
                            }else{
                                if(isset($vo['ppid'])){
                                    $content = '已完成该计划'.'--('.$vo['pname'].'~'.$vo['num'].')';
                                }else{
                                    $content = '已完成该计划'.'--('.$vo['pname'].')';
                                }
                                echo '<tr><td width="120px" class="active">'.($start).':00 - '.($end).':00</td>';
                                if($tip){
                                    echo '<td rowspan="'.$vo['planday'].'" class="success">'.$content.'</td></tr>';

                                }
                                $start += 1;
                                $end += 1;
                                $tip = false;
                            }


                        }
                        endforeach; endif; else: echo "" ;endif; endif; ?>
                    </table>
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
    $(function () {
        $("#now_date").html(timestampToTime(Date.parse(new Date())/1000));
        $("#real_date").html(timestampToTime(Date.parse(new Date())/1000));
    })
    function addPlan() {
        window.location.href = "<?php echo url('addPlan'); ?>";
    }

    function findPlan(obj,id,planday,real_planday,plan_id,finish_time) {
        // alert(real_planday);
        var label = $(obj).attr('label');
        $("#plan_id").val(plan_id);
        $("#finish_time").val(finish_time);
        $("#real_planday").html(real_planday);
        if (label == 'project'){
            $.get('<?php echo url("findProject"); ?>?id='+id,function (res) {
                console.log(res);
                if (res.code == 1){
                    //数据渲染
                    $("#pname").html(res.data.pname);
                    $("#num").html(res.data.pname);
                    $("#content").html(res.data.remark);
                    $("#planday").html(planday);
                    $("#feedbackTime").html(timestampToTime(res.data.createtime));
                    $("#assessTime").html(timestampToTime(res.data.submissiontime));
                    $("#file").html('无');
                    $("#file").attr('href','#');
                    // $("#file").attr('download','');
                    if (res.data.fileurl != '') {
                        $("#file").html('附件(点击下载)');
                        $("#file").attr('href','/'+res.data.fileurl);
                        $("#file").attr('download','附件.txt');
                    }
                    $('#start').attr('planType',1);
                    $('#start').attr('p_id',res.data.pid);
                    $('#finish').attr('planType',1);
                    $('#finish').attr('p_id',res.data.pid);
                    $('#finish').attr('plan_id',res.data.id);
                }
            })
        } else {
            $.get('<?php echo url("findFeedback"); ?>?id='+id,function (res) {
                console.log(res);
                if (res.code == 1){
                    //数据渲染
                    $("#pname").html(res.data.pname);
                    $("#num").html(res.data.num);
                    $("#content").html(res.data.tech_remark);
                    $("#planday").html(planday);
                    $("#feedbackTime").html(timestampToTime(res.data.createtime));
                    $("#assessTime").html(timestampToTime(res.data.finish_date));
                    $("#file").html('无');
                    $("#file").attr('href','#');
                    // $("#file").attr('download','');
                    if (res.data.fileurl) {
                        $("#file").html('附件(点击下载)');
                        $("#file").attr('href','/'+res.data.fileurl);
                        $("#file").attr('download','附件.txt');
                    }
                    $('#start').attr('planType',2);
                    $('#start').attr('p_id',res.data.ppid);
                    $('#finish').attr('planType',2);
                    $('#finish').attr('p_id',res.data.ppid);
                    $('#finish').attr('plan_id',res.data.id);
                }
            })
        }
    }

    //开始标志
    // var isStart = false;

    function start(obj) {
        console.log($(obj));
        var planType = $(obj).attr('planType');
        var p_id = $(obj).attr('p_id');
        var plan_id = $("#plan_id").val();
        var finish_time = $("#finish_time").val();
        if (finish_time == 0){
            $.get('<?php echo url("start"); ?>?planType='+planType+'&id='+p_id+'&pland_id='+plan_id,function (res) {
                if (res.code == 1){
                    layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        window.isStart = planType+'-'+p_id;

                    });
                }else {
                    layer.msg(res.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            })
        }else {
            layer.msg('已完成的计划不能重新开始哦！', {icon: 5,time:1500,shade: 0.1}, function(index){
                layer.close(index);
            });
        }

        return false;

    }

    function finish(obj) {
        console.log($(obj));
        var planType = $(obj).attr('planType');
        var p_id = $(obj).attr('p_id');
        var plan_id = $("#plan_id").val();
        // if (window.isStart == planType+'-'+p_id) {
            $.get('<?php echo url("finish"); ?>?planType='+planType+'&id='+p_id+'&plan_id='+plan_id,function (res) {
                if (res.code == 1){
                    layer.msg(res.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                        window.location.reload();
                    });
                }
            })
        // }

    }
    //时间戳转字符形式
    function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + ' ';
        var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
        var m = (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
        var s = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
        // return Y+M+D;
        return Y+M+D+h+m+s;
    }
</script>
</html>