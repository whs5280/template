<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/var/www/ZUAD_info_release/public/../application/admin/view/role/data_qx.html";i:1545832526;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/header.html";i:1539856994;s:68:"/var/www/ZUAD_info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
﻿<!DOCTYPE html>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="min-height: 450px; padding-top: 20px;">
                    <form class="form-horizontal" name="setDataQx" id="setDataQx" method="post" action="<?php echo url('setDataQx'); ?>">
                        <input name="id" type="hidden" value="<?php echo $roleData['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">设备分配类型<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='distribution_type' <?php if($roleData['distribution_type'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>单台/多台&nbsp;&nbsp;
                                    <input type="radio" name='distribution_type' <?php if($roleData['distribution_type'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />部门
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="checkType0">
                            <label class="col-sm-3 control-label">允许操作的设备<span style="color: red;margin-left: 5px;">*</span></label>
                            <div class="input-group col-sm-4">
                                <select data-placeholder="请选择设备" id="device_ids" name="device_ids[]" class="chosen-select" multiple style="width:350px;">
                                    <?php if(!empty($allDevice)): if(is_array($allDevice) || $allDevice instanceof \think\Collection || $allDevice instanceof \think\Paginator): if( count($allDevice)==0 ) : echo "" ;else: foreach($allDevice as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>" hassubinfo="true" class="list-group-item">id：<?php echo $vo['device_id']; ?>&nbsp;,&nbsp;名称：<?php echo $vo['device_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                                <span class="col-sm-8" style="color: red">Ctrl+鼠标左键（多选）</span>
                            </div>
                        </div>
                        <div class="form-group" id="checkType1">
                            <label class="col-sm-3 control-label">选择部门<span style="color: red;margin-left: 5px;">*</span></label>
                            <div class="input-group col-sm-4">
                                <select data-placeholder="请选择部门" id="device_department_id" name="device_department_id" class="chosen-select" style="width:350px;">
                                    <?php echo $html; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否允许更改节目布局<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='are_layout_changes_allowed' <?php if($roleData['are_layout_changes_allowed'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>是&nbsp;&nbsp;
                                    <input type="radio" name='are_layout_changes_allowed' <?php if($roleData['are_layout_changes_allowed'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />否
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否允许添加节目<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_it_allowed_to_add_layout' <?php if($roleData['is_it_allowed_to_add_layout'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_it_allowed_to_add_layout' <?php if($roleData['is_it_allowed_to_add_layout'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />否
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否允许删除节目<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_deletion_allowed_layout' <?php if($roleData['is_deletion_allowed_layout'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_deletion_allowed_layout' <?php if($roleData['is_deletion_allowed_layout'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />否
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否允许添加设备<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_it_allowed_to_add_device' <?php if($roleData['is_it_allowed_to_add_device'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_it_allowed_to_add_device' <?php if($roleData['is_it_allowed_to_add_device'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />否
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否允许删除设备<span style="color: red;margin-left: 5px;">*</span>：</label>
                            <div class="col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_deletion_allowed_device' <?php if($roleData['is_deletion_allowed_device'] == '0'): ?> checked="checked"<?php endif; ?> value="0"/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_deletion_allowed_device' <?php if($roleData['is_deletion_allowed_device'] == '1'): ?> checked="checked"<?php endif; ?>value="1" />否
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                            </div>
                        </div>
                    </form>
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
<script type="text/javascript">
    $(function(){
        $('#setDataQx').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){

        }


        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('role/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
                return false;
            }
        }

    });

    $("input:radio[name='distribution_type']").on('ifChecked', function(event){
        var value = $(this).val();
        if(value == 0){
            $("#checkType0").show();
            $("#checkType1").hide();

        }

        if(value == 1){
            $("#checkType0").hide();
            $("#checkType1").show();
        }
    });


    //IOS开关样式配置
    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, {
        color: '#1AB394'
    });
    var config = {
        '.chosen-select': {},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

</script>

<script language="javascript">
    // 多选 select 数据初始化
    function chose_mult_set_ini(select, values) {
        var arr = values.split(',');
        var length = arr.length;
        var value = '';
        for (i = 0; i < length; i++) {
            value = arr[i];
            $(select + " option[value='" + value + "']").attr('selected', 'selected');
        }
        $(select).trigger("chosen:updated");
    }

    $(document).ready(function () {
        var type = "<?php echo $roleData['distribution_type']; ?>";
        if(type == 0){
            $("#checkType1").hide();
        }else {
            $("#checkType0").hide();
        }
        // 如果要初始化已选中的项，需要在调用chosen()函数之前调用chose_mult_set_ini()函数
        // 设置<select>的<option>属性selected='selected'，这样chosen()函数被调用时，相应项会显示在框中
        chose_mult_set_ini('#device_group_ids', "<?php echo $roleData['device_group_ids']; ?>");
        chose_mult_set_ini('#device_ids', "<?php echo $roleData['device_ids']; ?>");

        //初始化
        $("#device_ids").chosen();
        $("#device_group_ids").chosen();
    });
</script>
</body>
</html>
