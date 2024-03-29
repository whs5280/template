<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/var/www/html/VacuumCup/public/../application/admin/view/admin/index.html";i:1567676354;s:65:"/var/www/html/VacuumCup/application/admin/view/public/header.html";i:1567676356;s:65:"/var/www/html/VacuumCup/application/admin/view/public/footer.html";i:1567676356;}*/ ?>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>用户列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                <div  class="col-sm-2" style="width: 100px">
                    <div class="input-group" >  
                        <a href="<?php echo url('adminAdd'); ?>"><button class="btn btn-outline btn-primary" type="button">添加用户</button></a>
                    </div>
                </div>                                            
                <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="输入需查询的用户名" />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button>
                            </span>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>

            <div class="example-wrap">
            <div class="example">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="long-tr">
                        <th>ID</th>
                        <th>管理员名称</th>
                        <th>头像</th>
                        <th>管理员角色</th>
                        <th>登录次数</th>
                        <th>上次登录ip</th>
                        <th>上次登录时间</th>
                        <th>真实姓名</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <script id="list-template" type="text/html">
                        {{# for(var i=0;i<d.length;i++){  }}

                        <tr class="long-td">
                            <td>{{d[i].id}}</td>
                            <td>{{d[i].username}}</td>
                            <td>
                                <img src="/uploads/face/{{d[i].portrait}}" class="img-circle" style="width:35px;height:35px" onerror="this.src='/static/admin/images/head_default.gif'"/>
                            </td>
                            <td>{{d[i].title}}</td>
                            <td>{{d[i].loginnum}}</td>
                            <td>{{d[i].last_login_ip}}</td>
                            <td>{{d[i].last_login_time}}</td>
                            <td>{{d[i].real_name}}</td>
                            <td>
                                {{# if(d[i].id!==1){ }}
                                {{# if(d[i].status==1){ }}
                                <a class="red" href="javascript:;" onclick="admin_state({{d[i].id}});">
                                    <div id="zt1{{d[i].id}}"><span class="label label-info">开启</span></div>
                                </a>
                                {{# }else{ }}
                                <a class="red" href="javascript:;" onclick="admin_state({{d[i].id}});">
                                    <div id="zt1{{d[i].id}}"><span class="label label-danger">禁用</span></div>
                                </a>
                                {{# } }}
                                {{# } }}
                            </td>
                            <td>
                                {{# if(d[i].id!==1){ }}
                                <a href="javascript:;" onclick="adminEdit({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                    <i class="fa fa-paste"></i> 编辑</a>&nbsp;&nbsp;
                                <a href="javascript:;" onclick="adminDel({{d[i].id}})" class="btn btn-danger btn-outline btn-xs">
                                    <i class="fa fa-trash-o"></i> 删除</a>
                                {{# } }}
                            </td>
                        </tr>
                        {{# } }}
                    </script>
                    <tbody id="list-content">

                    </tbody>
                </table>
                <div id="AjaxPage" style=" text-align: right;"></div>
                <div id="allpage" style=" text-align: right;"></div>
            </div>
        </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
</div>

<!-- 加载动画 -->
<div class="spiner-example">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
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
    //laypage分页
    Ajaxpage();
    function Ajaxpage(curr){
        var key=$('#key').val();
        $.getJSON('<?php echo url("admin/index"); ?>', {page: curr || 1,key:key}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画 
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
                console.log(data);
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:'<?php echo $allpage; ?>',//总页数
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

//编辑用户
function adminEdit(id){
    location.href = './adminEdit/id/'+id+'.html';
}

//删除用户
function adminDel(id){
    lunhui.confirm(id,'<?php echo url("adminDel"); ?>');
}

//用户状态
function admin_state(id){
    lunhui.status(id,'<?php echo url("admin_state"); ?>');
}

</script>
</body>
</html>