<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:47:48
         compiled from "/home/redecore/public_html/themes/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67617680650569d647567a4-40501806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc225128e70a8029711672b7b1c10fae19d0e2e4' => 
    array (
      0 => '/home/redecore/public_html/themes/404.tpl',
      1 => 1347850748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67617680650569d647567a4-40501806',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page_error">
	<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/404.png" />
	<p><?php echo $_smarty_tpl->getVariable('lang273')->value;?>
</p>
</div>
<?php $_template = new Smarty_Internal_Template('bit_goto.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>