<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 00:08:12
         compiled from "/home/redecore/public_html/themes/profile_left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4106007275056a22c4238a8-14993544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27a7c7ea16905382cc7d476c3ee93837598da8c0' => 
    array (
      0 => '/home/redecore/public_html/themes/profile_left.tpl',
      1 => 1347850773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4106007275056a22c4238a8-14993544',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="ProfileSidebar">
        <h1><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></h1>
        <p>
            <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
/followers"><strong class="sysUserFollowersCounter_<?php echo $_smarty_tpl->getVariable('u')->value['USERID'];?>
"><?php echo $_smarty_tpl->getVariable('fola')->value;?>
</strong><span> <?php echo $_smarty_tpl->getVariable('lang182')->value;?>
</span></a>, <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
/following"><strong class="sysUserFollowingCounter_<?php echo $_smarty_tpl->getVariable('u')->value['USERID'];?>
"><?php echo $_smarty_tpl->getVariable('folb')->value;?>
</strong><span> <?php echo $_smarty_tpl->getVariable('lang183')->value;?>
</span></a>
        </p>
        <div class="ProfileImage">
            <img alt="<?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?>" src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/<?php $_smarty_tpl->assign('bpp' , insert_get_member_profilepicture (array('value' => 'var', 'profilepicture' => $_smarty_tpl->getVariable('u')->value['profilepicture']),$_smarty_tpl), true);?><?php echo $_smarty_tpl->getVariable('bpp')->value;?>
"/>    
        </div>
        <ul class="ProfileLinks">
        	<?php echo $_smarty_tpl->getVariable('lang252')->value;?>
: <?php if ($_smarty_tpl->getVariable('u')->value['gender']=="1"){?><?php echo $_smarty_tpl->getVariable('lang253')->value;?>
<?php }elseif($_smarty_tpl->getVariable('u')->value['gender']=="2"){?><?php echo $_smarty_tpl->getVariable('lang254')->value;?>
<?php }elseif($_smarty_tpl->getVariable('u')->value['gender']=="0"){?><?php echo $_smarty_tpl->getVariable('lang255')->value;?>
<?php }?>
            <?php if ($_smarty_tpl->getVariable('u')->value['description']!=''){?>
            <br /><?php echo $_smarty_tpl->getVariable('lang208')->value;?>
: <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['description']);?>

            <?php }?>
            <?php if ($_smarty_tpl->getVariable('u')->value['location']!=''){?>
            <br /><?php echo $_smarty_tpl->getVariable('lang256')->value;?>
: <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['location']);?>

            <?php }?>
            <?php if ($_smarty_tpl->getVariable('u')->value['website']!=''){?>
            <br /><a href="<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['website']);?>
" target="_blank"><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['website']);?>
</a>
            <?php }?>
        </ul>
        <ol class="activity sysStreamList">
        	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('act')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
                <a class="ImgLink" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php echo $_smarty_tpl->getVariable('bpp')->value;?>
" alt="<?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?>" /></a>
                <span class="ActivityDetails">
                    <?php if ($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="repin"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a>:<br/>
                    &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/repin.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
"</a></span>
                	<?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="pin"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a>:<br/>
                    &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/pin.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
"</a></span>
                	<?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="com"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a>:<br/>
                    &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/comment.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['comment']);?>
"</a></span>
                	<?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="folb"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a> <span class="sysEventPartTargetOther"><?php echo $_smarty_tpl->getVariable('lang184')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
/<?php $_smarty_tpl->assign('bname' , insert_get_seo_bname (array('value' => 'a', 'bname' => $_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('bname')->value);?>
"><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']);?>
</a>.</span>
                	<?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="folm"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a> <span class="sysEventPartTargetOther"><?php echo $_smarty_tpl->getVariable('lang184')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lname']);?>
<?php }?></a>.</span>
                	<?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="like"){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('u')->value['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('u')->value['lname']);?>
<?php }?></a>:<br/>
                    &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/heart.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
"</a></span>
                    <?php }?>
                </span>
            </li> 
            <?php endfor; endif; ?>            
        </ol>
    </div>