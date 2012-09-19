<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:50:03
         compiled from "/home/redecore/public_html/themes/administrator/show_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199780406950569deb15e503-64376921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddc1d65059cff1781689fa2cab9abeea86825fe4' => 
    array (
      0 => '/home/redecore/public_html/themes/administrator/show_message.tpl',
      1 => 1347850793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199780406950569deb15e503-64376921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('error')->value!=''){?>
								<ul class="messages">
                                    <li class="error-msg">
                                    	<ul><li><?php echo $_smarty_tpl->getVariable('error')->value;?>
</li></ul>
                                    </li>
                                </ul>
<?php }?>
<?php if ($_smarty_tpl->getVariable('message')->value!=''){?>
								<ul class="messages">
                                	<li class="success-msg">
                                    	<ul><li><?php echo $_smarty_tpl->getVariable('message')->value;?>
</li></ul>
                                    </li>
                                </ul>
<?php }?>
