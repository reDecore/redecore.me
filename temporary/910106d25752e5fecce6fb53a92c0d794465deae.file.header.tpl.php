<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20307069750569957344000-46981858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '910106d25752e5fecce6fb53a92c0d794465deae' => 
    array (
      0 => '/home/redecore/public_html/themes/header.tpl',
      1 => 1347850758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20307069750569957344000-46981858',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<?php $_template = new Smarty_Internal_Template('header_head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<body>
<?php $_template = new Smarty_Internal_Template('header_fb.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template('header_scroll.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<a name="top"></a>
<?php $_template = new Smarty_Internal_Template('header_menu.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="CategoriesBar">
	<a class="Button OrangeButton Button12" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/invite_friends"><strong><?php echo $_smarty_tpl->getVariable('lang156')->value;?>
</strong><span></span></a>
    <!--
	<a class="Button GreenButton Button12" href="#"><strong>Find Friends</strong><span></span></a>
    -->
    <ul class="HeaderCategory HeaderContainer">
    	<?php if ($_SESSION['USERID']!=''){?>
        <li><a class="nav <?php if ($_smarty_tpl->getVariable('showfeed')->value=="1"){?>selected<?php }?>" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/"><?php echo $_smarty_tpl->getVariable('lang187')->value;?>
</a>&nbsp;·&nbsp;</li>
        <?php }?>
        <li class="submenu">
            <a class="nav <?php if ($_smarty_tpl->getVariable('menu')->value=="1"){?>selected<?php }?>" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/all"><?php echo $_smarty_tpl->getVariable('lang155')->value;?>
<?php if ($_smarty_tpl->getVariable('showcatname')->value!=''){?>: <?php echo stripslashes($_smarty_tpl->getVariable('showcatname')->value);?>
<?php }?><span></span></a>
            <?php $_smarty_tpl->assign('hc' , insert_get_categories (array(),$_smarty_tpl), true);?>
            <ul class="CategoriesDropdown" <?php if (count($_smarty_tpl->getVariable('hc')->value)>"60"){?>style="width:720px; margin-left:-270px;"<?php }elseif(count($_smarty_tpl->getVariable('hc')->value)>"40"){?>style="width:540px; margin-left:-90px;"<?php }?>>
                <li>
                    <span class="SubmenuColumn">
                    	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('hc')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                        <a class="" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/all?category=<?php echo stripslashes($_smarty_tpl->getVariable('hc')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['seo']);?>
"><?php echo stripslashes($_smarty_tpl->getVariable('hc')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name']);?>
</a>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']=="20"||$_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']=="40"||$_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']=="60"){?>
                        </span>
                        <span class="SubmenuColumn">
                        <?php }?>
                        <?php endfor; endif; ?>
                    </span>
                </li>
            </ul>
        </li>
    	<li>&nbsp;·&nbsp;<a class="nav <?php if ($_smarty_tpl->getVariable('menu')->value=="2"){?>selected<?php }?>" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/popular"><?php echo $_smarty_tpl->getVariable('lang157')->value;?>
</a></li>
        <?php if ($_smarty_tpl->getVariable('enable_youtube')->value=="1"){?><li>&nbsp;·&nbsp;<a class="nav <?php if ($_smarty_tpl->getVariable('menu')->value=="4"){?>selected<?php }?>" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/videos"><?php echo $_smarty_tpl->getVariable('lang472')->value;?>
</a></li><?php }?>
    	<?php if ($_smarty_tpl->getVariable('enable_gifts')->value=="1"){?><li>&nbsp;·&nbsp;<a class="nav <?php if ($_smarty_tpl->getVariable('menu')->value=="3"){?>selected<?php }?>" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/gifts"><?php echo $_smarty_tpl->getVariable('lang158')->value;?>
</a></li><?php }?>
    </ul>
</div>