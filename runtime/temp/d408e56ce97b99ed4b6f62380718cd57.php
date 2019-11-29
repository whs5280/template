<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/var/www/info_release/public/../application/admin/view/device/look_info.html";i:1545731750;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<style type="text/css">
    html,body { height: 100%;margin: 0; padding: 0;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="row">
                <div style=" margin-right: 17px; margin-left: 23px;">
                    <button type="button" id="get_screenshot" class="btn btn-primary btn-sm btn-block"><i class="fa fa-certificate"></i> 获取设备截图</button>
                    <p style="text-align: center;display: none;" id="get_screenshot_loading"><i class="fa fa-spinner fa-pulse"></i> 获取中，请稍候...</p>
                </div>
            </div>
        </div>
        <div class="ibox-content" align="center">
            <div class="row">
                <div class="col-sm-6">
                    <img id="screenshot" src=""  onerror="this.src='/uploads/face/yulan.jpg'" width="90%" height="100%">
                </div>
                <div class="col-sm-6">
                    <h5>设备状态</h5>
                    <ul class="list-group">
                    </ul>
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
<script src="/static/admin/js/jquery-ui/jquery-ui.min.js"></script>
<script src="/static/admin/device/js/mqttws31.js" type="text/javascript"></script>
<script src="/static/admin/device/js/config.js" type="text/javascript"></script>
<script type="text/javascript">
    device_state();
    setInterval(device_state,10000);
    function device_state() {
        $.ajax({
            url:"<?php echo url('lookInfo'); ?>",
            type:"GET",
            dataType:"json",
            data:{'device_id':"<?php echo $data['device_id']; ?>"},
            success:function (data) {
                var create_time = timestampToTime(data.state.create_time);
                var mqtt_connection_state;
                if(data.state.mqtt_connection_state == 0){
                    mqtt_connection_state = '关闭';
                }else {
                    mqtt_connection_state = '开启';
                }
                $('.list-group').html(
                    "<li class='list-group-item'>设备ID：<span>"+data.state.device_id+"</span></li >\n" +
                    "<li class='list-group-item'>设备名称：<span>"+data.state.device_name+"</span></li >\n" +
                    "<li class='list-group-item'>MAC地址：<span>"+data.state.mac_address+"</span></li >\n" +
                    "<li class='list-group-item'>软件内部版本号：<span>"+data.state.software_inside_version+"</span></li >\n" +
                    "<li class='list-group-item'>软件外部版本号：<span>"+data.state.software_external_version+"</span></li >\n" +
                    "<li class='list-group-item'>当前是系统时间：<span>"+timestampToTime(data.state.current_system_time)+"</span></li >\n"+
                    "<li class='list-group-item'>最后一次更新时间：<span>"+timestampToTime(data.state.last_update_time/1000)+"</span></li >\n" +
                    "<li class='list-group-item'>最后一次启动程序时间：<span>"+timestampToTime(data.state.last_boot_program_time)+"</span></li >\n"+
                    "<li class='list-group-item'>SD卡剩余空间：<span>"+byteConvert(data.state.sd_card_remaining_space)+"</span></li >\n"+
                    "<li class='list-group-item'>磁盘空间：<span>"+byteConvert(data.state.disk_space)+"</span></li >\n" +
                    "<li class='list-group-item'>mqtt连接状态：<span>"+mqtt_connection_state+"</span></li>\n" +
                    "<li class='list-group-item'>内网IP地址：<span>"+data.state.intranet_ip+"</span></li >\n" +
                    "<li class='list-group-item'>外网IP地址：<span>"+data.state.external_network_ip+"</span></li >\n" +
                    "<li class='list-group-item'>系统版本：<span>"+data.state.system_version+"</span></li >\n" +
                    "<li class='list-group-item'>屏幕分辨率：<span>"+data.state.screen_resolution+"</span></li >\n" +
                    "<li class='list-group-item'>SDK版本：<span>"+data.state.sdk_version+"</span></li >\n" +
                    "<li class='list-group-item'>手机型号：<span>"+data.state.mobile_phone_model+"</span></li >\n" +
                    "<li class='list-group-item'>网络连接方式：<span>"+data.state.network_connection_mode+"</span></li >\n" +
                    "<li class='list-group-item'>读卡器USB连接状态：<span>"+data.state.card_reader_usb_connection_state+"</span></li >\n" +
                    "<li class='list-group-item'>当前使用的读卡器类型：<span>"+data.state.the_type_of_reader_currently_used+"</span></li >\n" +
                    "<li class='list-group-item'>设备是否有ROOT权限：<span>"+data.state.device_is_there_any_root+"</span></li >\n" +
                    "<li class='list-group-item'>NFC开启状态：<span>"+data.state.nfc_open_state+"</span></li >\n" +
                    "<li class='list-group-item'>当前节目：<span>"+data.state.layout+"</span></li >\n"+
                    "<li class='list-group-item'>创建时间：<span>"+create_time+"</span></li >\n"+
                    "<div class=\"user-button\">\n" +
                    "<div class=\"row\">\n" +
                    "</div>\n" +
                    "</div>");
            }
        });
    }
    function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = date.getDate() + ' ';
        var h = date.getHours() + ':';
        var m = date.getMinutes() + ':';
        var s = date.getSeconds();
        return Y+M+D+h+m+s;
    }
    var byteConvert = function(bytes) {
        if (isNaN(bytes)) {
            return '';
        }
        var symbols = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        var exp = Math.floor(Math.log(bytes)/Math.log(2));
        if (exp < 1) {
            exp = 0;
        }
        var i = Math.floor(exp / 10);
        bytes = bytes / Math.pow(2, 10 * i);

        if (bytes.toString().length > bytes.toFixed(2).toString().length) {
            bytes = bytes.toFixed(2);
        }
        return bytes + ' ' + symbols[i];
    };

    function is_show(id) {
        if($('.is-shou'+id).hasClass('beyond-hiding')){
            $('.is-shou'+id).removeClass('beyond-hiding');
        }else {
            $('.is-shou'+id).addClass('beyond-hiding')
        }
    }
</script>
<script>
    $("#get_screenshot").click(function () {
        $(this).hide();
        $("#get_screenshot_loading").show();
        var device_id = "<?php echo $data['device_id']; ?>";
        var modular_type = "<?php echo $data['modular_type']; ?>";
        var org_num = "<?php echo $data['org_num']; ?>";
        var param = {
            device_id : device_id,
            modular_type : modular_type,
            org_num : org_num,
        };
        var int = setInterval(function (index) {
            $.getJSON("<?php echo url('get_screenshot'); ?>",param,function (res) {
                console.log(res);
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000},function (index) {
                        $("#screenshot").attr('src',res.data);
                        $("#get_screenshot").show();
                        $("#get_screenshot_loading").hide();
                        clearInterval(int); //关闭设备debug成功，关闭实时请求
                        layer.close(index);
                    });
                }else {
                    layer.msg(res.msg,{icon:2,time:1500},function (index) {
                        $(this).show();
                        $("#get_screenshot_loading").hide();
                        layer.close(index);
                        clearInterval(int); //关闭设备debug成功，关闭实时请求
                    });
                    return false;
                }
                clearInterval(int);
            })
        },5000);

    })
</script>
</body>
