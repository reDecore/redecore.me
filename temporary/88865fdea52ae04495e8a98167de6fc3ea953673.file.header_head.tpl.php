<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/header_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204414126350569957535472-14981962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88865fdea52ae04495e8a98167de6fc3ea953673' => 
    array (
      0 => '/home/redecore/public_html/themes/header_head.tpl',
      1 => 1347850760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204414126350569957535472-14981962',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<head>
<title><?php if ($_smarty_tpl->getVariable('pagetitle')->value!=''){?><?php echo $_smarty_tpl->getVariable('pagetitle')->value;?>
 - <?php }?><?php echo $_smarty_tpl->getVariable('site_name')->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php if ($_smarty_tpl->getVariable('pagetitle')->value!=''){?><?php echo $_smarty_tpl->getVariable('pagetitle')->value;?>
 - <?php }?><?php if ($_smarty_tpl->getVariable('metadescription')->value!=''){?><?php echo $_smarty_tpl->getVariable('metadescription')->value;?>
 - <?php }?><?php echo $_smarty_tpl->getVariable('site_name')->value;?>
">
<meta name="keywords" content="<?php if ($_smarty_tpl->getVariable('pagetitle')->value!=''){?><?php echo $_smarty_tpl->getVariable('pagetitle')->value;?>
,<?php }?><?php if ($_smarty_tpl->getVariable('metakeywords')->value!=''){?><?php echo $_smarty_tpl->getVariable('metakeywords')->value;?>
,<?php }?><?php echo $_smarty_tpl->getVariable('site_name')->value;?>
">
<link rel="icon" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/favicon.ico" type="image/x-icon" />
<meta property="fb:app_id" content="<?php echo $_smarty_tpl->getVariable('FACEBOOK_APP_ID')->value;?>
"/>
<meta property="og:site_name" content="<?php echo $_smarty_tpl->getVariable('site_name')->value;?>
"/>
<?php if ($_smarty_tpl->getVariable('pinpage')->value=="1"&&$_smarty_tpl->getVariable('pins')->value['pic']!=''){?>
<meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('purl')->value;?>
/t/<?php echo $_smarty_tpl->getVariable('pins')->value['pic'];?>
"/>
<?php }else{ ?>
<meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/logo_190x190.jpg"/>
<?php }?>
<link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-ui/style/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/css/jquery/jcarousel/pin-create-img-picker.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/css/face/main.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if IE 7]> <link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/css/face/ie.css" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 8]> <link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/css/face/ie.css" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
<link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/css/jquery/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-ui/style/tipTip.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-plugins/jquery.url.packed.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/app.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-plugins/jquery.caret.1.02.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/nav.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/pin.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-plugins/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery-plugins/jquery.tipTip.minified.js"></script>
<script type="text/javascript">var base_url = "<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
";</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/custom.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/js/jquery.form.js"></script> 
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>