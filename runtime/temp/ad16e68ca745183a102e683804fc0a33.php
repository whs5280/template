<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/var/www/info_release/public/../application/admin/view/device_department/index.html";i:1545704734;s:63:"/var/www/info_release/application/admin/view/public/header.html";i:1539856994;s:63:"/var/www/info_release/application/admin/view/public/footer.html";i:1539856994;}*/ ?>
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
<link href="/static/admin/css/plugins/treeview/bootstrap-treeview.css" rel="stylesheet">
<body class="gray-bg">
<div class="row wrapper wrapper-content animated fadeInRight">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>组织部门管理</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div  class="col-sm-2" style="width: 100px">
                            <div class="input-group" >
                                <button type="button" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal">添加部门</button>
                            </div>
                        </div>
                        <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" id="key" class="form-control" name="key" value="" placeholder="输入需查询的名称" />
                                    <a href="javascript:;" onclick="getDepList()" class="input-group-btn">
                                        <span class="btn btn-primary"><i class="fa fa-search"></i> 搜索</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="example-wrap">
                    <div class="example">
                        <div class="ibox-content" style="min-height: 300px;">
                            <div id="treeview" class="test col-sm-4">

                            </div>
                            <div class="col-sm-8">
                                <form class="form-horizontal" name="edit" id="edit" method="post" action="<?php echo url('edit'); ?>">
                                    <input type="hidden" name="id" id="id" value="0">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">父级部门：</label>
                                        <div class="input-group col-sm-4">
                                            <select class="form-control m-b chosen-select" disabled name="pid" id="edit_pid">
                                                <option value="0">==顶级==</option>
                                                <?php echo $html; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">部门名称：</label>
                                        <div class="input-group col-sm-4">
                                            <input id="edit_name" type="text" class="form-control" name="name" placeholder="部门名称">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-5 col-sm-offset-3">
                                            <button class="btn btn-primary disabled" id="edit_save" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-primary" onclick="look_dept_device()"><i class="glyphicon glyphicon-eye-open"></i> 查看设备</a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-arrow-circle-left"></i> 返回</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover hidden">
                            <thead>
                            <tr class="long-tr">
                                <th>设备名称</th>
                                <th>设备id</th>
                                <th>部门</th>
                                <th>版本号</th>
                            </tr>
                            </thead>
                            <script id="list-template" type="text/html">
                                {{# for(var i=0;i<d.length;i++){  }}
                                <tr class="long-td">
                                    <td>{{d[i].device_name}}</td>
                                    <td>{{d[i].device_id}}</td>
                                    <td>{{d[i].department_name}}</td>
                                    <td>{{d[i].edition}}</td>
                                </tr>
                                {{# } }}
                            </script>
                            <tbody id="list-content"></tbody>
                        </table>
                        <!--<div id="AjaxPage" style="text-align: right;"></div>-->
                        <!--<div id="allpage" style=" text-align: right;"></div>-->
                    </div>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">添加部门</h3>
            </div>
            <form class="form-horizontal" name="add" id="add" method="post" action="<?php echo url('add'); ?>">
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">所属父级<span style="color: red;margin-left: 5px;">*</span></label>
                        <div class="col-sm-8">
                            <select name="pid" id="pid" class="form-control m-b chosen-select">

                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">部门名称<span style="color: red;margin-left: 5px;">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" placeholder="输入部门名称" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 保存</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> 关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/static/admin/js/plugins/treeview/bootstrap-treeview.js"></script>
<script type="text/javascript">
//    Ajaxpage(1,0);
    function Ajaxpage(curr,dep_id){
        var key=$('#key').val();
        $('#key').val(key);
        $.getJSON('<?php echo url("getDevice"); ?>', {page: curr || 1,key:key,dep_id:dep_id}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data.list==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data.list, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:data.allpage,//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 3,//连续显示分页数
                    jump: function(obj, first){
                        if(!first){
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第'+ obj.curr +'页，共'+ obj.pages +'页');
                    }
                });
            }
        });
    }

    getDepList();
    function getDepList() {
        var key=$('#key').val();
        $('#key').val(key);
        $.getJSON("<?php echo url('getData'); ?>",{key:key},function (jsonObj) {
            var jsona = [];
            console.log(jsonObj.dep_list);
            if(jsonObj.dep_list.length <= 0){
                $("#edit").hide();
            }
            for(var i=0;i<jsonObj.dep_list.length;i++){
                jsona.push(getJson(jsonObj.dep_list[i]));
            }

            $('#treeview').treeview({
                color: "#428bca",
                expandIcon: "glyphicon glyphicon-chevron-right",
                collapseIcon: "glyphicon glyphicon-chevron-down",
                showTags: true,
                selectable:false,
                multiSelect:true,
                showCheckbox: false,
                uncheckedIcon: "glyphicon glyphicon-unchecked",
                data: jsona,
                onNodeSelected:function(event, data) {
                    $("#edit_save").removeClass('disabled');
                    $("#id").val(data.id);
                    $("#edit_name").val(data.text);

                    $("#edit_pid").empty();
                    var html = "<option value='0'>==顶级==</option>";
                    html += "<?php echo $html; ?>";
                    $("#edit_pid").append(html);
                    $("#edit_pid").prop('disabled',true);
                    $("#edit_pid" + " option[value='" + data.pid + "']").attr('selected', 'selected');
                    $("#edit_pid").trigger("chosen:updated");
                    $("#edit_pid").chosen();


//                    var dep_id = data.id;
//                    Ajaxpage(1,dep_id);

                }

            });
        });
    }

    function getJson(data){
        var json1 = {};
        if(data.id){
            json1.id = data.id;
        }
        if(data.name){
            json1.text = data.name;
        }

        if(data.pid){
            json1.pid = data.pid;
        }

        if(data.son){
            var son = data.son;
            var sonJsonArr = [];
            for(var i=0;i<son.length;i++){
                var bb = getJson(son[i]);
                if(bb){
                    sonJsonArr.push(bb);
                }
            }
            json1.nodes = sonJsonArr;
            json1.tags = ['设备数：'+data.device_count,''+json1.nodes.length+''];
        }else{
            json1.tags = ['设备数：'+data.device_count,'0'];
        }
        return json1;
    }
    
    function look_dept_device() {
        var id = $("#id").val();
        layer.open({
            type: 2,
            title: '部门设备列表',
            shadeClose: true,
            shade: 0.1,
            area: ['80%', '90%'],
            maxmin: true,
            content: '<?php echo url("getDevice"); ?>?dep_id=' + id //iframe的url
        });
    }
</script>
<script>
    $(function(){
        $('#add').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#name').val())){
                layer.msg('部门名称不能为空',{icon:0,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }


        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1});
                return false;
            }
        }
        var html;
        html += '<option value="0">==默认顶级==</option>';
        html += "<?php echo $html; ?>";

        $("#pid").append(html);

        <!--当模态框对用户可见时触发（将等待 CSS 过渡效果完成）。-->
        $('#myModal').on('shown.bs.modal', function () {
            var config = {
                '.chosen-select': {search_contains: true},
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        })
    });

    $(function(){
        $('#edit').ajaxForm({
            beforeSubmit: edit_checkForm,
            success: edit_complete,
            dataType: 'json'
        });

        function edit_checkForm(){
            if( 0 == $.trim($('#id').val())){
                return false;
            }
            if( '' == $.trim($('#edit_name').val())){
                layer.msg('部门名称不能为空',{icon:0,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

        }


        function edit_complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1});
                return false;
            }
        }
    });


</script>