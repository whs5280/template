<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"/var/www/ZUAD_info_release/public/../application/admin_released/view/program_preview/new_page.html";i:1539857016;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>预览</title>
    <meta name="description" content="UAD Builder">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/bootstrap.min.css">
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
    <link type="text/css" rel="stylesheet" href="/static/admin_released/builder/css/animate.min.css"/>
</head>

<style>
</style>
<body>
<?php echo $layout['generateHtml']; ?>
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
    <script src="/static/admin_released/builder/js/myslider.builder.min.mycustom.js"></script>
    <script src="/static/admin_released/js/jquery.qrcode.min.js"></script>
    <script src="/static/admin_released/builder/js/pptFile.js"></script>

    <script type="text/javascript">
        $(function () {
            <?php echo $layout['generateScript']; ?>
        })
        filePhoto();
    </script>
</body>
</html>
