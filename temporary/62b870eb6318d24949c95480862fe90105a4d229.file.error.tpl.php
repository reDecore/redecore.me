<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:44
         compiled from "/home/redecore/public_html/themes/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5065058695056996477df62-59943993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62b870eb6318d24949c95480862fe90105a4d229' => 
    array (
      0 => '/home/redecore/public_html/themes/error.tpl',
      1 => 1347850756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5065058695056996477df62-59943993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('error')->value!=''){?>
<div class="error_block login_error">
    <a name="sys_message"></a>
    <div class="ui-widget">
        <div class="ui-state-error ui-corner-all" style="margin-top: 10px;margin-bottom: 10px; padding: 1em;">
            <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
            <p style="margin-left:60px;margin-top: 10px;"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</p>
        </div>
    </div>
    <div class="cl"></div>
</div>
<?php }elseif($_smarty_tpl->getVariable('msg')->value!=''){?>
<div class="error_block login_error">
    <a name="sys_message"></a>
    <div class="ui-widget">
        <div class="ui-state-highlight ui-corner-all" style="margin-top: 10px;margin-bottom: 10px; padding: 1em;">
            <span class="ui-icon ui-icon-info" style="float: left; margin-right: 0.3em;"></span>
            <p style="margin-left:60px;margin-top: 10px;"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</p>
        </div>
    </div>
    <div class="cl"></div>
</div>
<?php }?>
