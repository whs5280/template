<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/var/www/html/VacuumCup/public/../application/admin/view/goods/index.html";i:1567676355;s:65:"/var/www/html/VacuumCup/application/admin/view/public/header.html";i:1567676356;s:65:"/var/www/html/VacuumCup/application/admin/view/public/footer.html";i:1567676356;}*/ ?>
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
            <h5>商品列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                <div  class="col-sm-2" style="width: 100px">
                    <div class="input-group" >  
                        <a href="<?php echo url('addGoods'); ?>"><button class="btn btn-outline btn-primary" type="button">添加商品</button></a>
                    </div>
                </div>                                    
                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="商品名称/关键字/类型" />
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
            <div class="table-responsive example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th>ID</th>
                                <th>商品名称</th>
                                <th>类型</th>
                                <th>关键字</th>
                                <th>价格</th>
                                <th>库存</th>
                                <th>缩略图</th>
                                <!--<th>浏览量</th>-->
                                <th>状态</th>
                                <th>推送</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].id}}</td>
                                <td>{{d[i].name}}</td>
                                <td>
                                    {{# if(d[i].type_descr==null){ }}
                                        类型不存在
                                    {{# }else{ }}
                                        {{d[i].type_descr}}
                                    {{# } }}
                                </td>
                                <td>{{d[i].keyname}}</td>
                                <td>{{d[i].price}}</td>
                                <td>{{d[i].num}}</td>
                                <td><img id="img_data" class="img" height="80px" width="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="{{d[i].path}}"/></td>
                                <!--<td>{{d[i].browse_num}}</td>-->
                                <td>
                                    {{# if(d[i].is_up==1){ }}
                                        <a class="red" href="javascript:;" onclick="GoodsIsup({{d[i].id}});">
                                            <div id="zt{{d[i].id}}" ><span  class="label label-info ">上架</span></div>
                                        </a>
                                    {{# }else{ }}
                                        <a class="red" href="javascript:;" onclick="GoodsIsup({{d[i].id}});">
                                            <div id="zt{{d[i].id}}" ><span  class="label label-danger ">下架</span></div>
                                        </a>
                                    {{# } }}                               
                                </td>
                                <td>
                                    {{# if(d[i].is_push==1){ }}
                                    <a class="red" href="javascript:;" onclick="GoodsIspush({{d[i].id}},{{d[i].is_up}});">
                                        <div id="zt{{d[i].id}}" ><span class="label label-info ">已推送</span></div>
                                    </a>
                                    {{# }else{ }}
                                    <a class="red" href="javascript:;" onclick="GoodsIspush({{d[i].id}},{{d[i].is_up}});">
                                        <div id="zt{{d[i].id}}" ><span class="label label-danger ">未推送</span></div>
                                    </a>
                                    {{# } }}
                                </td>
                                <td>{{d[i].create_time}}</td>
                                <td>                                  
                                    <a href="javascript:;" onclick="editGoods({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                        <i class="fa fa-paste"></i> 编辑
                                    </a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="delGoods({{d[i].id}})" class="btn btn-danger btn-outline btn-xs">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>
                            </tr>
                            {{# } }}
                        </script>
                        <tbody id="list-content"></tbody>
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
        $.getJSON('<?php echo url("index"); ?>', {page: curr || 1,key:key}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画 
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
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

//编辑商品
function editGoods(id){
    location.href = './editGoods/id/'+id+'.html';
}

//删除商品
function delGoods(id){
    lunhui.confirm(id,'<?php echo url("delGoods"); ?>');
}

//商品上架状态
function GoodsIsup(id){
    lunhui.status(id,"<?php echo url('GoodsIsup'); ?>");
}

//商品是否推送
function  GoodsIspush(id,is_up){
    if( is_up == 0){
        layer.msg('请先上架商品',{icon:2,time:1500,shade: 0.1}, function(index){
            layer.close(index);

        });
        return false;
    }
    lunhui.status(id,"<?php echo url('GoodsIspush'); ?>")
}

</script>
</body>
</html>