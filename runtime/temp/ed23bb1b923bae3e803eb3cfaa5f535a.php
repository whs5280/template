<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/var/www/info_release/public/../application/admin_released/view/layout/layout_edit.html";i:1546844178;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>编辑作品</title>
    <meta name="description" content="UAD Builder">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/bootstrap.css">
    <!-- Interface styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/jquery-ui-1.10.3.custom.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.builder.css" />
    <!-- Google prettify -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/js/google-code-prettify/prettify.css" />
    <!-- MySlider styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.animations.min.css" />
    <!-- Items styles -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.items.css" id='myslider-items-css' />
    <!-- Custom style -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.builder.mycustom.css">
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.animations.min.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/css/myslider.min.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/myslider.items.mycustom.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/animate.min.css" />
    <link type="text/css" rel="stylesheet" href="/static/admin/layui/css/layui.css" />
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <!-- <link href="../css/plugins/jquery.dataTables.css" rel="stylesheet"> -->
    <!-- <link href="../DataTables/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <style>
        .divFlex{
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #ccc;
        }
        .divpadding{
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .dropdown-menu>li>a, .dropdown-menu>li>.dd-item {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 20px;
            color: #333;
            white-space: nowrap;
            cursor: pointer;
        }
        /*禁止点击*/
        /*		.pointerEvents-none{
                        pointer-events: none;
                }
                .pointerEvents-auto{
                        pointer-events: auto;
                }*/
        .pointerEvents{
            pointer-events: none;
        }
        .form-group {
            display: flex;
            /*justify-content: flex-end;*/
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="span2 divFlex">
        <!--<div>
            <a href="#" class="btn btn-info" id="upload-files">上传文件</a> &nbsp;
        </div> -->
        <div class="divpadding">
            <fieldset class="preview-slider" data-title="页面预览">
                <button class="btn btn-warning preview hidden" style="padding: 4px 30px;">预览</button>
                <div class="muted text-center">未检测到插件</div>
            </fieldset>
        </div>
        <div class="divpadding">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-info dropdown-toggle pointerEvents">
                    添加物件 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" id="add-image">图片</a>
                    </li>
                    <li>
                        <a href="#" id="add-text">文字</a>
                    </li>
                    <li>
                        <a href="#" id="add-block">色块</a>
                    </li>
                    <li>
                        <a href="#" id="add-video">视频</a>
                    </li>
                    <li>
                        <a href="#" id="add-audio">音频</a>
                    </li>
                    <li>
                        <a href="#" id="add-marquee">走马灯</a>
                    </li>
                    <li>
                        <a href="#" id="add-pdf">PDF文档</a>
                    </li>
                    <li>
                        <a href="#" id="add-word">Word文档</a>
                    </li>
                    <li>
                        <a href="#" id="add-ppt">PPT文档</a>
                    </li>
                    <!-- <li>
                        <a href="#" id="add-countDown">倒计时</a>
                    </li> -->
                    <!--  <li>
                         <a href="#" id="add-pagelink">页面跳转按钮</a>
                     </li> -->
                    <li>
                        <a href="#" id="add-webbrowser">浏览器</a>
                    </li>
                    <li>
                        <a href="#" id="add-clock">时钟</a>
                    </li>
                    <li>
                        <a href="#" id="add-qrcode">二维码</a>
                    </li>
                    <!-- <li>
                        <a href="#" id="add-printtext">打印文字</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="span3 divFlex">
        <div class="divpadding">
            <span style="position: relative; top: -5px;">页面尺寸：</span>
            <input type="text" class="span1 pointerEvents" placeholder="宽度" id="slider-width" value="1920" />
            x
            <input type="text" class="span1 pointerEvents" placeholder="高度" id="slider-height" value="1080" />
        </div class="divpadding">
        <div>
            <span style="position: relative; top: -5px;left:-4px;">预置页面尺寸：</span>
            <select id="selectpagesize" class="span1 pointerEvents" style="width:126px;">
                <option value="">选择</option>
                <optgroup label="横屏">
                    <option value="1920x1080">1920x1080</option>
                    <option value="1366x768">1366x768</option>
                    <option value="1280x720">1280x720</option>
                </optgroup>
                <optgroup label="竖屏">
                    <option value="1080x1920">1080x1920</option>
                    <option value="768x1366">768x1366</option>
                    <option value="720x1280">720x1280</option>
                </optgroup>

            </select>
        </div>
    </div>
    <div class="span3 divFlex">
        <div class="divpadding" style="padding-bottom: 0;">
            <label for="in-from">
                <span style="position: relative; top: -5px;left:-4px;">动画效果</span>
                <select id="in-from" class="input-small effect-list pointerEvents" data-bind='from'></select>
            </label>
        </div>
        <div>
            <label for="in-during">
                <span style="position: relative; top: -5px;left:-4px;">持续时间(秒)</span>
                <input id="in-during" type="number" value="1" placeholder="(s)" class="input-mini pointerEvents" data-bind='during' data-trigger="focusout">
            </label>
        </div>
    </div>
    <div class="span3 divFlex">
        <div class="divpadding" style="padding-bottom: 0;">
            <span>背景设置：</span>
            <!-- <div id="bg-image" class="btn btn-changeimage">
                选择背景
            </div> -->
            <div class="btn btn-changeimage pointerEvents" style="position: relative;">
                选择背景<input id="bg-image" type="file" name="file" type="file" accept="image/*" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>

            <div class="imagechange-preview" style="display: none;"></div>
            <a title=""
               data-id="#pover-bgimage"
               data-placement="bottom"
               data-toggle="popover"
               class="btn pointerEvents"
               href="#"
               data-original-title="设置"><em class="icon-cog"></em></a>
        </div>
        <div class="divpadding">
            <span style="position: relative; top: -5px;">对齐工具：</span>
            <div class="input-append">
                <input type="text" id="grid-size" class="pointerEvents" style="width: 40px;" value="30">
                <div class="btn-group pointerEvents">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="dd-item no-bubble">
                                        <span class="checkbox">
                                            <input type="checkbox" id="snap-grid" />对齐到网格
                                        </span>
                            </div>
                        </li>
                        <li>
                            <div class="dd-item no-bubble">
                                        <span class="checkbox">
                                            <input type="checkbox" id="snap-item" />对齐到元素
                                        </span>
                            </div>
                        </li>
                        <li>
                            <div class="dd-item no-bubble">
                                        <span class="checkbox">
                                            <input type="checkbox" id="show-grid" />显示网格
                                        </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /btn-group -->
            </div>
        </div>
    </div>
    <div class="span2 divFlex" style="border:none;">
        <div class="divpadding">
            <button class="btn btn-success" id="generate" onclick="isSave(this)" style="padding:4px 30px;">
                保存
            </button>
        </div>
        <div class="divpadding">
            <button class="btn btn-success" id="signOut" style="padding:4px 30px;">
                退出
            </button>
        </div>

    </div>
    <!--<div class="span2 divFlex" style="border:none;">-->
        <!--<div class="divpadding">-->
            <!--<button class="btn btn-success" id="release" style="padding: 4px 30px;">-->
                <!--发布-->
            <!--</button>-->
        <!--</div>-->
    <!--</div>-->
</div>
<div class="wp" style="position: relative;left:0;">
    <div class="container tabs" style="display: flex;justify-content: stretch;">
        <div style="width: 180px;height: 50px;display: flex;justify-content: center;align-items: center;">
            <div class="spanitemleft" style="margin: 0px -10px;padding: 10px;">
                <a href="#" class="btn pointerEvents" id="add-slide">新建内页</a> &nbsp;
            </div>
            <div class="spanitemleft" style="margin: 0px -10px;padding: 10px;">
                <a href="#" class="btn pointerEvents" id="remove-slide">删除内页</a>  &nbsp;
            </div>
        </div>
        <div style="width: 1000px;">
            <ul class="nav nav-tabs sortable" id="slide-tabs">
                <!-- Slide tabs will be created here -->
            </ul>
        </div>

    </div>
    <div class="container slider" style="width:100%;white-space: nowrap;overflow-x: auto;position: relative;">
        <!-- The slider -->
        <div class="tab-content pointerEvents" id="slide-content" style="border: 10px solid #cecece;display: inline-block;">
            <!-- Slide content with elements will be created here -->
        </div>
        <div  style="width:auto;display:none;margin:0 20px;top:0px;border:1px solid #ccc;padding: 10px;position: absolute;box-sizing: border-box;">
            <!--<form id="uploadForm" enctype="multipart/form-data">-->
                <div class="bindingDataList" style="width:auto;display: inline-block;">

                </div>
            <!--</form>-->
            <div style="width:400px;display: block;margin:0 30px;padding: 10px;margin-left: -10px;margin-top: 50px;">
                <select data-placeholder="请选择设备" id="device_ids" name="device_ids[]" class="chosen-select" multiple style="width:370px;">
                    <?php if(!empty($devices)): if(is_array($devices) || $devices instanceof \think\Collection || $devices instanceof \think\Paginator): if( count($devices)==0 ) : echo "" ;else: foreach($devices as $key=>$vo): ?>
                    <option value="<?php echo $vo['id']; ?>" hassubinfo="true" <?php if($vo['id'] == $did): ?>selected<?php endif; ?> class="list-group-item">id：<?php echo $vo['device_id']; ?>&nbsp;,&nbsp;名称：<?php echo $vo['device_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>
            </div>
            <div style="width:500px;display: block;margin:0 30px;padding: 10px;">
                <button class="btn btn-success" onclick="isSave(this)" id="sendTask" style="margin-top: 20px;width: 370px;margin-left: -40px;">
                    下发节目
                </button>

            </div>
        </div>
        <div style="position: absolute;left:850px;top: 0px;">


        </div>

        <!-- Image popover content -->
        <div id="pover-image" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <!-- <div class="btn btn-changeimage">
                选择图片
            </div> -->

            <div class="btn btn-changeimage" style="position: relative;">
                选择图片<input id="avatarSlect" type="file" multiple="multiple" accept="image/*" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>
            <div class="btn mediaLibrary" data-type="image" style="">
                媒体库
            </div>
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">间隔时间：</span>
                <input type="number" min="0" max="500000" value="2" placeholder="(s)" class="span1" data-bind='imgswitchingTime' />秒
            </div>
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">图片数量：</span>
                <input type="text" value="0" readonly class="numberOfUploadedFiles" style="margin-bottom:10px;margin-right:5px;width: 20px;" />张
            </div>
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">切换效果：</span>
                <select class="span1 input-small" data-bind='intraAreaAnimationOptions'>
                    <option values="no-effect">无动画</option>
                    <option values="rollIn">滚入</option>
                    <option values="zoomIn">放大</option>
                    <option values="slideInRight">右滑动</option>
                    <option values="slideInLeft">左滑动</option>
                    <option values="slideInDown">上滑入</option>
                    <option values="slideInUp">下滑入</option>
                    <option values="rotateInUpRight">向上向右旋转</option>
                    <option values="rotateInUpLeft">向上向左旋转</option>
                </select>
            </div>
            <!-- <p><span>001</span>张</p> -->
            <ul class="selectable" style="width: 95%;max-height: 200px;overflow-y:auto;overflow-x: hidden;"></ul>

            <div class="imagechange-preview" style="display: none;"></div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- Text popover content -->

        <div id="pover-text" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label>内容</label>
            <textarea class="span2" data-bind='content' data-trigger="input"></textarea>

            <label class="control-label">文字颜色</label>
            <div class="controls">
                <!-- <select data-bind='clase' class="span2 color-classes">
                    <option value="">选择</option>
                </select> -->
                <input type="color" value="#c0c0c0" data-bind='clase' class="span2 color-classes" />
            </div>

            <label class="control-label">文字对齐</label>
            <div class="controls">
                <select data-bind='alignment' class="span2 wordAlignment-list">
                    <!-- <option value="">选择</option> -->
                </select>
            </div>

            <label class="control-label">绑定数据</label>
            <div class="controls">
                <select data-bind='bindingDataFieldList' class="span2 bindingDataFieldList"></select>
            </div>

            <label class="control-label">文字大小</label>
            <div class="controls">
                <select data-bind='fontsize' class="span2 fontsize-list">
                    <option value="">选择</option>
                </select>
            </div>

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- Anchor popover content -->
        <div id="pover-link" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label>内容</label>
            <textarea class="span2" data-bind='content' data-trigger="focusout"></textarea>
            <label>URL</label>
            <input type="text" placeholder="" class="span2" data-bind="href" />
            <label class="control-label">样式</label>
            <div class="controls">
                <select data-bind='clase' class="span2 link-classes">
                    <option value="">选择</option>
                </select>
            </div>
            <label class="control-label">Taget</label>
            <div class="controls">
                <select data-bind='target' class="span2">
                    <option>_top</option>
                    <option>_blank</option>
                    <option>_self</option>
                    <option>_parent</option>
                </select>
            </div>
            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- Anchor Image popover content -->
        <div id="pover-imglink" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <div class="btn btn-changeimage">
                选择图片
            </div>
            <div class="imagechange-preview" style="display: none;"></div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' /> -->

            <label>跳转页面</label>
            <input type="text" placeholder="" class="span2" data-bind="targetpagename" />
            <!--             <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- Solid Block popover content -->

        <div id="pover-block" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label class="control-label">样式</label>
            <div class="controls">
                <!-- <select class="span2 block-classes" data-bind='clase'>
                    <option value="">选择</option>
                </select> -->
                <input type="color" value="#c0c0c0" data-bind='clase' class="span2 block-classes" />
            </div>
            <!-- <label>透明度</label> -->
            <!--<input type="range" min="0" max="1" step="0.1" data-bind="opacity" class="span2" />-->
            <!-- <div class="ui-slider"></div> -->

            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- Video popover content -->
        <div id="pover-video" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label class="radio">
                <input type="radio" name="videotype" value="localvideo" checked="checked">本地视频
            </label>
            <label class="radio">
                <input type="radio" name="videotype" value="onlinevideo">在线视频
            </label>
            <div style="display:none;" class="div-changevideouri">
                <label>视频地址：</label>
                <input type="text" placeholder="视频地址" value="" class="span2" data-bind='videosrc' />
            </div>
            <!-- <div class="btn btn-changevideo">
                选择视频
            </div> -->
            <div class="btn-changevideo">
                <div class="btn btn-uploadLocalVideo" style="position: relative;">
                    选择视频<input type="file" name="file" multiple="multiple" accept="video/*" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
                </div>
                <div class="btn mediaLibrary" data-type="video" style="">
                    媒体库
                </div>
                <input type="text" value="0" readonly class="numberOfUploadedFiles" style="margin-right:5px;width: 20px;" />个
            </div>
            <ul class="selectable videoList" style="width: 95%;max-height: 200px;overflow-y:auto;overflow-x: hidden;"></ul>

            <div class="videochange-preview" style="display: none;"></div>
            <label>最大宽度 x 最大高度</label>
            <input type="text" placeholder="最大宽度" value="" class="span1" data-bind='width' />
            <input type="text" placeholder="最大高度" value="" class="span1" data-bind='height' />

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- Audio popover content -->
        <div id="pover-audio" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <!-- <div class="btn btn-changeaudio">
                选择音频
            </div> -->
            <div class="btn btn-changeaudio" style="position: relative;">
                选择音频<input type="file" name="file" type="file" accept="audio/*" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>
            <div class="audiochange-preview" style="display: none;"></div>
            <label>最大宽度 x 最大高度</label>
            <input type="text" placeholder="最大宽度" value="" class="span1" data-bind='width' />
            <input type="text" placeholder="最大高度" value="" class="span1" data-bind='height' />

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- Marquee popover content -->

        <div id="pover-marquee" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label>内容</label>
            <textarea class="span2" data-bind='content' data-trigger="focusout"></textarea>

            <label class="control-label">文字颜色</label>
            <div class="controls">
                <!-- <select data-bind='clase' class="span2 color-classes">
                    <option value="">选择</option>
                </select> -->
                <input type="color" value="#c0c0c0" data-bind='clase' class="span2 color-classes" />
            </div>
            <label class="control-label">文字大小</label>
            <div class="controls">
                <select data-bind='fontsize' class="span2 fontsize-list">
                    <option value="">选择</option>
                </select>
            </div>
            <label class="control-label">滚动方向</label>
            <div class="controls">
                <select data-bind='marqueedirection' class="span2">
                    <option value="left">向左滚动</option>
                    <option value="right">向右滚动</option>
                    <option value="up">向上滚动</option>
                    <option value="down">向下滚动</option>
                </select>
            </div>
            <label class="control-label">滚动速度</label>
            <div class="controls">
                <select data-bind='marqueescrollspeed' class="span2">
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                </select>
            </div>

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- PDF popover content -->
        <div id="pover-pdf" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <!--  <div class="btn btn-changepdf">
                 选择PDF
             </div> -->
            <div class="btn btn-changepdf" style="position: relative;">
                选择PDF<input type="file" name="file" type="file" accept="application/pdf" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>
            <!--          <div class="btn mediaLibrary" data-type="application" style="">
                         媒体库
                     </div> -->
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">间隔时间：</span>
                <input id="pptIntervalTime" type="number" min="0" max="500000" value="2" placeholder="(s)" class="span1" data-bind='imgswitchingTime' />秒
            </div>

            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">切换效果：</span>
                <select class="span1 input-small" data-bind='intraAreaAnimationOptions'>
                    <option values="no-effect">无动画</option>
                    <option values="rollIn">滚入</option>
                    <option values="zoomIn">放大</option>
                    <option values="slideInRight">右滑动</option>
                    <option values="slideInLeft">左滑动</option>
                    <option values="slideInDown">上滑入</option>
                    <option values="slideInUp">下滑入</option>
                    <option values="rotateInUpRight">向上向右旋转</option>
                    <option values="rotateInUpLeft">向上向左旋转</option>
                </select>
            </div>
            <div class="pdfchange-preview" style="display: none;"></div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- Word popover content -->
        <div id="pover-word" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <!-- <div class="btn btn-changeword">
                选择Word文档
            </div> -->
            <div class="btn btn-changeword" style="position: relative;">
                选择Word<input type="file" name="file" type="file" accept=".doc,.docx" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>
            <!-- <div class="btn mediaLibrary" data-type="application" style="">
                媒体库
            </div> -->
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">间隔时间：</span>
                <input id="pptIntervalTime" type="number" min="0" max="500000" value="2" placeholder="(s)" class="span1" data-bind='imgswitchingTime' />秒
            </div>

            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">切换效果：</span>
                <select class="span1 input-small" data-bind='intraAreaAnimationOptions'>
                    <option values="no-effect">无动画</option>
                    <option values="rollIn">滚入</option>
                    <option values="zoomIn">放大</option>
                    <option values="slideInRight">右滑动</option>
                    <option values="slideInLeft">左滑动</option>
                    <option values="slideInDown">上滑入</option>
                    <option values="slideInUp">下滑入</option>
                    <option values="rotateInUpRight">向上向右旋转</option>
                    <option values="rotateInUpLeft">向上向左旋转</option>
                </select>
            </div>
            <div class="wordchange-preview" style="display: none;"></div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- ppt popover content -->
        <div id="pover-ppt" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <!-- <div class="btn btn-changeppt">
                选择PPT
            </div> -->
            <div class="btn btn-changeppt" style="position: relative;">
                选择PPT<input type="file" name="file" type="file" accept=".ppt,.pptx" style="width:100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 10;opacity: 0;">
            </div>
            <!--  <div class="btn mediaLibrary" data-type="application" style="">
                 媒体库
             </div> -->
            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">间隔时间：</span>
                <input id="pptIntervalTime" type="number" min="0" max="500000" value="2" placeholder="(s)" class="span1" data-bind='imgswitchingTime' />秒
            </div>

            <div style="padding: 5px;">
                <span style="position: relative; top: -5px;left:-4px;">切换效果：</span>
                <select class="span1 input-small" data-bind='intraAreaAnimationOptions'>
                    <option values="no-effect">无动画</option>
                    <option values="rollIn">滚入</option>
                    <option values="zoomIn">放大</option>
                    <option values="slideInRight">右滑动</option>
                    <option values="slideInLeft">左滑动</option>
                    <option values="slideInDown">上滑入</option>
                    <option values="slideInUp">下滑入</option>
                    <option values="rotateInUpRight">向上向右旋转</option>
                    <option values="rotateInUpLeft">向上向左旋转</option>
                </select>
            </div>

            <div class="pptchange-preview" style="display: none;"></div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- countDown popover content -->
        <div id="pover-countDown" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label class="control-label">时间格式</label>
            <div class="controls">
                <select data-bind='timeformat' class="span2 timeformat-list">
                    <option value="HH:mm">选择</option>
                    <option value="HH:mm">时:分</option>
                    <option value="HH:mm:ss">时:分:秒</option>
                    <option value="yyyy年MM月dd日 HH:mm">年月日 时:分</option>
                    <option value="yyyy年MM月dd日 HH:mm:ss">年月日 时:分:秒</option>
                    <option value="yyyy年MM月dd日 HH:mm 星期w">年月日 时:分 星期</option>
                    <option value="yyyy年MM月dd日 HH:mm:ss 星期w">年月日 时:分:秒 星期</option>
                    <option value="yyyy年MM月dd日 星期w">年月日 星期</option>
                </select>
            </div>
            <label class="control-label">文字颜色</label>
            <div class="controls">
                <!-- <select data-bind='clase' class="span2 color-classes">
                    <option value="">选择</option>
                </select> -->
                <input type="color" value="#c0c0c0" data-bind='clase' class="span2 color-classes" />
            </div>
            <label class="control-label">文字大小</label>
            <div class="controls">
                <select data-bind='fontsize' class="span2 fontsize-list">
                    <option value="">选择</option>
                </select>
            </div>

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- PageLink popover content -->
        <div id="pover-pagelink" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <div class="btn btn-changepagelink">
                选择目标页面
            </div>
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' /> -->
            <label>目标页面ID</label>
            <input type="text" value="" class="span2" data-bind='targetpageid' readonly="readonly" />
            <label>目标页面名称：</label>
            <input type="text" value="" class="span2" data-bind='targetpagename' readonly="readonly" />

            <!--             <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- WebBrowser popover content -->
        <div id="pover-webbrowser" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>

            <label>网址</label>
            <input type="text" placeholder="网址" value="" class="span2" data-bind='webbrowserhref' />
            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- Clock popover content -->
        <div id="pover-clock" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label class="control-label">时间格式</label>
            <div class="controls">
                <select data-bind='timeformat' class="span2 timeformat-list">
                    <option value="HH:mm">选择</option>
                    <option value="HH:mm">时:分</option>
                    <option value="HH:mm:ss">时:分:秒</option>
                    <option value="yyyy年MM月dd日 HH:mm">年月日 时:分</option>
                    <option value="yyyy年MM月dd日 HH:mm:ss">年月日 时:分:秒</option>
                    <option value="yyyy年MM月dd日 HH:mm 星期w">年月日 时:分 星期</option>
                    <option value="yyyy年MM月dd日 HH:mm:ss 星期w">年月日 时:分:秒 星期</option>
                    <option value="yyyy年MM月dd日 星期w">年月日 星期</option>
                </select>
            </div>
            <label class="control-label">文字颜色</label>
            <div class="controls">
                <!-- <select data-bind='clase' class="span2 color-classes">
                    <option value="">选择</option>
                </select> -->
                <input type="color" value="#c0c0c0" data-bind='clase' class="span2 color-classes" />
            </div>
            <label class="control-label">文字大小</label>
            <div class="controls">
                <select data-bind='fontsize' class="span2 fontsize-list">
                    <option value="">选择</option>
                </select>
            </div>

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- QRCode popover content -->
        <div id="pover-qrcode" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label>内容</label>
            <textarea class="span2" data-bind='qrcodecontent' data-trigger="focusout"></textarea>

            <!--             <label>宽度 x 高度</label>
                        <input type="text" placeholder="宽度" value="" class="span1" data-bind='width' />
                        <input type="text" placeholder="高度" value="" class="span1" data-bind='height' />

                        <label>其他工具</label>

                        <a title=""
                           data-id="#tools"
                           data-placement="bottom"
                           data-toggle="popover"
                           class="btn "
                           href="#"
                           data-original-title="工具"><em class="icon icon-cog"></em></a> -->
        </div>

        <!-- PrintText popover content -->

        <div id="pover-printtext" class="hidden">
            <a class="remove-item-quick" href="#">删除</a>
            <label>内容</label>
            <textarea class="span2" data-bind='content' data-trigger="focusout"></textarea>

            <label style="display:none;" class="control-label">文字大小</label>
            <div style="display:none;" class="controls">
                <select data-bind='fontsize' class="span2 fontsize-list">
                    <option value="">选择</option>
                </select>
            </div>

            <label>其他工具</label>

            <a title=""
               data-id="#tools"
               data-placement="bottom"
               data-toggle="popover"
               class="btn "
               href="#"
               data-original-title="工具"><em class="icon icon-cog"></em></a>
        </div>

        <!-- Animation in popover -->
        <div id="animation-in" class="hidden">
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label inline">at</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='at'>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label inline">plus</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='plus'>
                    </div>
                </div>
                <div class="control-group">

                    <!-- Select Basic -->
                    <label class="control-label">from</label>
                    <div class="controls">
                        <select class="input-small effect-list" data-bind='from'></select>
                    </div>

                </div>

                <div class="control-group">

                    <!-- Select Basic -->
                    <label class="control-label">use</label>
                    <div class="controls">
                        <select class="input-small easing-list" data-bind='use'></select>
                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label">during</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='during'>
                    </div>
                </div>
                <div class="control-group only-element">
                    <label class="control-label">override global </label>
                    <div class="controls">
                        <input type="checkbox" data-bind="override" />
                    </div>
                </div>

            </form>
        </div>

        <!-- Animation out popover -->
        <div id="animation-out" class="hidden">
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label inline">at</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='at'>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label inline">plus</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='plus'>
                    </div>
                </div>
                <div class="control-group">

                    <!-- Select Basic -->
                    <label class="control-label">to</label>
                    <div class="controls">
                        <select class="input-small effect-list" data-bind='to'></select>
                    </div>

                </div>

                <div class="control-group">

                    <!-- Select Basic -->
                    <label class="control-label">use</label>
                    <div class="controls">
                        <select class="input-small easing-list" data-bind='use'></select>
                    </div>

                </div>
                <div class="control-group">


                    <label class="control-label">during</label>
                    <div class="controls">
                        <input type="text" placeholder="(ms)" class="input-mini" data-bind='during'>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">force </label>
                    <div class="controls">
                        <input type="checkbox" data-bind="force" />
                    </div>
                </div>
                <div class="control-group only-element">
                    <label class="control-label">override global </label>
                    <div class="controls">
                        <input type="checkbox" data-bind="override" />
                    </div>
                </div>

            </form>
        </div>

        <!-- Current Slide setting popover  -->
        <div id="pover-slide" class="hidden">
            <a class="clone-slide" href="#">复制</a>
            <form class="form-horizontal" style="margin-bottom: 9px;">
                <div class="control-group">
                    <label class="control-label inline">内页持续时间</label>
                    <div class="controls">
                        <input id="deadtimeinput" type="text" placeholder="(ms)" class="input-mini" data-bind='deadtime'>
                        <input type="text" style="display: none">
                    </div>
                </div>
            </form>
        </div>


        <!-- Background image setting popover  -->
        <div id="pover-bgimage" class="hidden">
            <a id="remove-bg" href="#">删除</a>
            <label>位置（X坐标xY坐标）</label>
            <input type="text" placeholder="0" value="" class="span1" data-itemname='positionx' />
            <input type="text" placeholder="0" value="" class="span1" data-itemname='positiony' />
            <input type="text" style="display:none;" placeholder="0 0" value="" class="span2" data-bind='position' />
            <label>重复</label>
            <select class="span1" style="width:144px;" data-bind='repeat'>
                <option value="no-repeat">不重复</option>
                <option value="repeat-x">X轴方向重复</option>
                <option value="repeat-y">Y轴方向重复</option>
                <option value="repeat">X轴方向和Y轴方向重复</option>
            </select>
            <!--<input type="text" placeholder="no-repeat" value="" class="span2" data-bind='repeat' />-->
            <label>宽度</label>
            <input type="text" placeholder="0" value="" class="span1" data-itemname='sizex' />
            <select class="span1" data-itemname='sizexunit'>
                <option value="">自适应</option>
                <option value="px">像素</option>
                <option value="%">页面百分比</option>
            </select>
            <div class="btn btn-sizexauto">宽度自适应</div>
            <label>高度</label>
            <input type="text" placeholder="0" value="" class="span1" data-itemname='sizey' />
            <select class="span1" data-itemname='sizeyunit'>
                <option value="">自适应</option>
                <option value="px">像素</option>
                <option value="%">页面百分比</option>
            </select>
            <div class="btn btn-sizeyauto">高度自适应</div>
            <input type="text" style="display:none;" placeholder="100% auto" value="" class="span2" data-bind='size' />
        </div>

        <!-- Tools popover -->
        <div id="tools" class="hidden">

            <label>调整尺寸</label>
            <div class="text-center">
                <a class="btn" id="tool-resize-h" title="宽度最大化"><em class="icon icon-resize-horizontal"></em></a>
                <a class="btn" id="tool-resize-v" title="高度最大化"><em class="icon icon-resize-vertical"></em></a>
                <a class="btn" id="tool-resize-f" title="按页面尺寸最大化"><em class="icon icon-fullscreen"></em></a>
                <a class="btn" id="tool-resize-r" title="恢复原始尺寸"><em class="icon icon-undo"></em></a>
            </div>
            <label>调整位置</label>
            <div class="tool-position text-center">
                <a class="btn btn-mini" id="tool-align-tl" title="对齐左上角"><em class="icon-2x icon-caret-left icon-rotate-45"></em></a>
                <a class="btn btn-mini" id="tool-align-tt" title="对齐顶部"><em class="icon-2x icon-caret-up"></em></a>
                <a class="btn btn-mini" id="tool-align-tr" title="对齐右上角"><em class="icon-2x icon-caret-up icon-rotate-45"></em></a>
                <br>
                <a class="btn btn-mini" id="tool-align-ll" title="对齐左侧"><em class="icon-2x icon-caret-left"></em></a>
                <a class="btn btn-mini" id="tool-align-cc" title="居中"><em class="icon-circle"></em></a>
                <a class="btn btn-mini" id="tool-align-rr" title="对齐右侧"><em class="icon-2x icon-caret-right"></em></a>
                <br>
                <a class="btn btn-mini" id="tool-align-bl" title="对齐左下角"><em class="icon-2x icon-caret-down icon-rotate-45"></em></a>
                <a class="btn btn-mini" id="tool-align-bb" title="对齐底部"><em class="icon-2x icon-caret-down"></em></a>
                <a class="btn btn-mini" id="tool-align-br" title="对齐右下角"><em class="icon-2x icon-caret-right icon-rotate-45"></em></a>
                <br>
            </div>
            <br>
            <div class="text-center">
                <a class="btn btn-mini" id="tool-align-vc" title="垂直居中">垂直居中</a>
                <a class="btn btn-mini" id="tool-align-hc" title="水平居中">水平居中</a>
            </div>
            <br />
        </div>

        <!-- 选择目标页面弹出框 -->
        <div id="pagelist" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">选择目标页面</h3>
            </div>
            <div class="modal-body">



                <div class="tab-pane active" id="devices">
                    <table cellpading="0" cellspacing="0" border="0" class="dTable " id="pageDatatable"></table>
                </div>


            </div>
            <div class="modal-footer" style="display: none;">
                <button class="button bSky sButton" data-dismiss="modal" aria-hidden="true">取消</button>
                <button class="button bMuddy sButton">发送</button>
            </div>
        </div>

        <!-- Generated Code Modal -->
        <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mod-label" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 id="mod-label">保存页面文件</h3>
            </div>
            <div class="modal-body">
                <p>
                    页面名称:<input id="txtTitle" type="text" style="width: 300px;" value="<?php echo $layout['layout']; ?>"/>
                    <input id="type" type="hidden" value="">
                </p>
                <pre class="prettyprint" id="generated-markup" style="display: none;"></pre>
                <p>
                </p>
                <pre class="prettyprint" id="generated-js" style="display: none;"></pre>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">
                    取消
                </button>
                <button class="btn" id="btnSave">
                    保存
                </button>
            </div>
        </div>

        <!-- 退出页面 -->
        <div id="exitBox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mod-label" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 id="mod-label">退出编辑页面</h3>
            </div>
            <div class="modal-body">
                <p>
                    退出编辑状态，将不会保存修改的节目内容。
                </p>
                <pre class="prettyprint" id="generated-markup" style="display: none;"></pre>
                <p>
                </p>
                <pre class="prettyprint" id="generated-js" style="display: none;"></pre>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">
                    取消
                </button>
                <button class="btn" id="" onClick="javascript :history.back(-1);">
                    确认
                </button>
            </div>
        </div>

        <!-- Preview Modal -->

        <div id="prev-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="prev-mod-label" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 id="prev-mod-label">页面效果预览</h3>
            </div>
            <div class="modal-body" id="prev-container">
            </div>
        </div>

        <!-- 媒体文件选项页面 -->
        <div id="mediaFileOptionsPage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mod-label" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close closeMediaLibrary">
                    &times;
                </button>
                <h3>媒体库文件</h3>
                <!-- <select id="selectMediaType" name="users">
                <option>请选择</option>
                <option value="video/mp4">视频</option>
                <option value="image/jpeg">图片</option>
                </select> -->
            </div>
            <div class="modal-body">
                <form id="mainForm">
                    <!-- id：<input type="text" name="id" value="" size="8"> -->
                    文件名 <input type="text" name="name" value="" size="8">
                    <input class="btn" id="agreementSub" type="button" value="搜索" style="margin-bottom:10px;" />
                </form>
                <table>
                    <thead>
                    <tr><td>Url</td><td>Name</td><td>Size</td><td>type</td><td></td></tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                    <tfoot id="tableFoot"></tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn closeMediaLibrary">
                    取消
                </button>
                <button class="btn" id="assign">
                    添加
                </button>
            </div>
        </div>

    </div>


</div>

<!-- Scripts
    ================================================== -->
<script src="/static/admin_released/builder/js/jquery.js"></script>
<script src="/static/admin_released/builder/js/bootstrap.min.js"></script>
<!-- Extra plugins -->
<script src="/static/admin_released/builder/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/static/admin_released/builder/js/dragslider.js"></script>
<script src="/static/admin_released/builder/js/google-code-prettify/prettify.js"></script>
<script src="/static/admin_released/builder/js/style-html.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<!-- Myslider Scripts -->
<script src="/static/admin_released/js/jquery.easing.1.3.min.js"></script>
<script src="/static/admin_released/js/jquery.myslider.min.js"></script>
<!-- MySlider Builder Scripts -->
<script src="/static/admin_released/builder/js/myslider.builder.min.js"></script>
<!-- Custom Scripts -->
<!-- <script src="../DataTables/js/jquery.dataTables.js"></script> -->
<script src="/static/admin_released/builder/js/uploadFileType.js"></script>
<script src="/static/admin_released/builder/js/myslider.builder.min.mycustom.js"></script>
<script src="/static/admin_released/js/jquery.qrcode.min.js"></script>
<script src="/static/admin_released/builder/js/uploadEditor.js"></script>
<script src="/static/admin_released/builder/js/pptFile.js"></script>
<script src="/static/admin_released/builder/js/mediaLibraryPaging.js"></script>
<script src="/static/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/static/admin/layui/layui.js"></script>
<script type="text/javascript">
    var url = {
        'uploadImg' : '<?php echo url("upload/layoutImg"); ?>',
        'layoutAdd' : '<?php echo url("layout/layoutAdd"); ?>',
        'layoutIndex' : '<?php echo url("layout/index"); ?>',
        'uploadVideo' : '<?php echo url("upload/layoutVideo"); ?>',
        'uploads' : '<?php echo url("upload/uploads"); ?>',
        'uploadPPT' : '<?php echo url("upload/uploadPPT"); ?>',
        'uploadWord' : '<?php echo url("upload/uploadWord"); ?>',
        'uploadPdf' : '<?php echo url("upload/uploadPdf"); ?>',
        'rmFile' : '<?php echo url("layout/rmFile"); ?>',
        'mediaCenter' : '<?php echo url("layout/mediaCenter"); ?>'
    };
    var contentJson = <?php echo $layout['content']; ?>;
    var id = <?php echo $layout['id']; ?>;

    var AreLayoutChangesAllowed;
    if("<?php echo $are_layout_changes_allowed; ?>" == 0){
        AreLayoutChangesAllowed = true;
    }else if("<?php echo $are_layout_changes_allowed; ?>" == 1){
        AreLayoutChangesAllowed = false;
    }


    var fontsizeList1 = <?php echo $bindData; ?>;
    console.log(fontsizeList1);
    //绑定数据
    $('.bindingDataFieldList').each(function() {
        var e = this;
        var t = fontsizeList1;
        $.each(t, function(t, i) {
            $('<option/>', {
                values: t
            }).text(t).appendTo(e)
        })

    })



    function bindData1() {
        var data = {};
        if ($(".bindingDataList").css("display") !== 'none'){
            $(".bindingDataList").find("input").each(function(k,v){
                var key=$(this).attr("name");
                var value=$(this).val();
                if (key !== 'file'){
                    data[key] = value;
                }

            })
            console.log(data);
            return data;
        } else {
            //允许编辑模板
            return 1;
        }
    }

    function bindData(generateHtml) {
        // var a=$(generateHtml).find(".text").html();
        // var b=$(generateHtml).find(".text").data("bindingdatafieldlist");
        // console.log(a+","+b);
        var data = {};
        $(generateHtml).find(".text").each(function(ind,vul){
            var key = $(this).data("bindingdatafieldlist");
            data[key] = $(this).html();
        });
        return data;


    }

    console.log(AreLayoutChangesAllowed);
    // 判断是否编辑
    if(AreLayoutChangesAllowed){
        $(".pointerEvents").css({
            "pointer-events":"auto"
        });
       // $('.pointerEvents').attr('disabled',"true");
        $('.pointerEvents').removeAttr("disabled");
        $(".bindingDataList").show();
        // 编辑绑定数据
        var bindingDataList="";
        $.each(fontsizeList1,function(k,v){
            // console.log(k+","+v);
            bindingDataList+='<div class="form-group">';
            bindingDataList+=k+':<input oninput="bindingDataTextBoxFunction(this)" type="text" name="'+k+'" id="input_'+k+'" value="'+v+'">';
            if (k.indexOf("图片")!=-1) {
                bindingDataList += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name=' + k + ' class="layui-btn" id=' + k + '>\n' +
                    '  <i class="layui-icon">&#xe67c;</i>上传图片\n' +
                    '</button>';
            }
            // bindingDataList+=k+':<input type="file" class="imgs" name="'+k+'">';
            bindingDataList+='</div>';
            // //上传图片按钮
            layui.use('upload', function(){
                var upload = layui.upload;
                //执行实例
                var uploadInst = upload.render({
                    elem: "#"+k //绑定元素
                    ,url: "<?php echo url('upload/uploadOne'); ?>" //上传接口
                    ,done: function(res){
                        console.log(res);
                        if (res.code == 1){
                            console.log($('#input_'+k));
                            $('#input_'+k).val(res.data[0].path);
                            layer.msg('上传成功！');

                        }
                    }
                    ,error: function(){
                        console.log(1111111111);
                    }
                });
            });
        });
        $(".bindingDataList").html(bindingDataList);
    }else{
        $(".pointerEvents").css({
            "pointer-events":"none"
        });
        $('.pointerEvents').attr('disabled',"true");
        $(".bindingDataList").show();
        //
        // // 编辑绑定数据
        // var bindingDataList="";
        // $.each(fontsizeList1,function(k,v){
        //     // console.log(k+","+v);
        //     bindingDataList+='<div class="form-group">';
        //     bindingDataList+=k+':<input oninput="bindingDataTextBoxFunction(this)" type="text" name="'+k+'" id="input_'+k+'" value="'+v+'">';
        //     bindingDataList+='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name='+k+' class="layui-btn" id='+k+'>\n' +
        //         '  <i class="layui-icon">&#xe67c;</i>上传图片\n' +
        //         '</button>';
        //     // bindingDataList+=k+':<input type="file" class="imgs" name="'+k+'">';
        //     bindingDataList+='</div>';
        //     // //上传图片按钮
        //     layui.use('upload', function(){
        //         var upload = layui.upload;
        //         //执行实例
        //         var uploadInst = upload.render({
        //             elem: "#"+k //绑定元素
        //             ,url: "<?php echo url('upload/uploadOne'); ?>" //上传接口
        //             ,done: function(res){
        //                 console.log(res);
        //                 if (res.code == 1){
        //                     console.log($('#input_'+k));
        //                     $('#input_'+k).val(res.data[0].path);
        //                     layer.msg('上传成功！');
        //
        //                 }
        //             }
        //             ,error: function(){
        //                 console.log(1111111111);
        //             }
        //         });
        //     });
        // });

        // 编辑绑定数据
        var bindingDataList="";
        $.each(fontsizeList1,function(k,v){
            // console.log(k+","+v);
            bindingDataList+='<div class="form-group">';
            bindingDataList+=k+':<input oninput="bindingDataTextBoxFunction(this)" type="text" name="'+k+'" id="input_'+k+'" value="'+v+'">';
            if (k.indexOf("图片")!=-1) {
                bindingDataList += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name=' + k + ' class="layui-btn" id=' + k + '>\n' +
                    '  <i class="layui-icon">&#xe67c;</i>上传图片\n' +
                    '</button>';
            }
            // bindingDataList+=k+':<input type="file" class="imgs" name="'+k+'">';
            bindingDataList+='</div>';
            // //上传图片按钮
            layui.use('upload', function(){
                var upload = layui.upload;
                //执行实例
                var uploadInst = upload.render({
                    elem: "#"+k //绑定元素
                    ,url: "<?php echo url('upload/uploadOne'); ?>" //上传接口
                    ,done: function(res){
                        console.log(res);
                        if (res.code == 1){
                            console.log($('#input_'+k));
                            $('#input_'+k).val(res.data[0].path);
                            layer.msg('上传成功！');

                        }
                    }
                    ,error: function(){
                        console.log(1111111111);
                    }
                });
            });
        });
        $(".bindingDataList").html(bindingDataList);
    }

    function bindingDataTextBoxFunction(a){
        var value = $(a).val();
        var name = $(a).attr("name");
        console.log(value);
        console.log(name);
        var targetSource = getCurrentSlideChilds().filter(".lush-element");
        console.log(targetSource);
        $.each(targetSource,function(k,v){
            if($(this).data("itemData").bindingDataFieldList==name){
                $(this).data("itemData").content=value;
                $(this).text(value);
            }
        })
    }

    $("#sendTask").click(function () {
       $("#type").val(2);
    });


    function getDeviceIds() {
        if($('#device_ids').length>0){
            var ids = $('#device_ids').val();
            return ids;
        }else {
            return 0;
        }
    }

    //设备下拉框
    var config = {
        '.chosen-select': {},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    var str = '';
    function isSave(obj) {
        str = obj.innerText
        ;
    }

//    console.log(bind_data);
//    $('.bindingDataFieldList').each(function() {
//        var e = this;
//        var t = bind_data;
//        $.each(t, function (t, i) {
//            $('<option/>', {
//                values: t
//            }).text(t).appendTo(e)
//        })
//    });



</script>
</body>
</html>