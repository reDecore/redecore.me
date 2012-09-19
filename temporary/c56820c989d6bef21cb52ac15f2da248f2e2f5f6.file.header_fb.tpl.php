<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/header_fb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125392455350569957603f01-46320111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c56820c989d6bef21cb52ac15f2da248f2e2f5f6' => 
    array (
      0 => '/home/redecore/public_html/themes/header_fb.tpl',
      1 => 1347850760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125392455350569957603f01-46320111',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="loadme"></div>
<?php if ($_smarty_tpl->getVariable('invite_mode')->value!="1"){?>
<?php if ($_smarty_tpl->getVariable('enable_fc')->value=="1"){?>
<div id="fb-root"></div>

<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '<?php echo $_smarty_tpl->getVariable('FACEBOOK_APP_ID')->value;?>
', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
  });	  
</script>

<?php }?>
<?php }?>