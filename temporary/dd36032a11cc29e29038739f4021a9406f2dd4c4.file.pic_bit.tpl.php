<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/pic_bit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40333833150569957ac0e79-40036355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd36032a11cc29e29038739f4021a9406f2dd4c4' => 
    array (
      0 => '/home/redecore/public_html/themes/pic_bit.tpl',
      1 => 1347850766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40333833150569957ac0e79-40036355',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_mb_truncate')) include '/home/redecore/public_html/smarty/libs/plugins/modifier.mb_truncate.php';
?>		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('pins')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <div class="sysPinItemContainer pin" owner_id="<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['USERID'];?>
" pin_id="<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pkey'];?>
">
        <?php if ($_smarty_tpl->getVariable('enable_gifts')->value=="1"){?>
        <?php if ($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price']!="0.00"&&$_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price']!=''){?>
        <strong class="price">$<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
</strong>
        <?php }?>
        <?php }?>
            <div class="sysPinActionButtonsContainer actions hidden">
            	<?php if ($_SESSION['USERID']!=''){?>
                <a href="javascript:void(0)" class="Button Button11 WhiteButton repin_link" onclick="App.ajaxDialog('<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin_create_popup?id=<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
', {id: 'sysPinCreatePopup', width: '600px'})"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang107')->value;?>
</strong><span></span></a>
                
                <?php $_smarty_tpl->assign('favp' , insert_is_fav (array('PID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']),$_smarty_tpl), true);?>
                <a href="javascript:void(0)" id="A_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" onclick="ADD_LIKE('<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
', 'A_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
', 'R_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
');" class="Button Button11 WhiteButton likebutton sysPinLikeButton <?php if ($_smarty_tpl->getVariable('favp')->value=="1"){?>hidden<?php }?>"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang132')->value;?>
</strong><span></span></a>
                <a href="javascript:void(0)" id="R_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" onclick="REM_LIKE('<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
', 'R_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
', 'A_L<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
');" class="Button Button11 WhiteButton disabled sysPinUnLikeButton <?php if ($_smarty_tpl->getVariable('favp')->value=="0"){?>hidden<?php }?>"><strong><?php echo $_smarty_tpl->getVariable('lang133')->value;?>
</strong><span></span></a>
                
                <a href="javascript:void(0)" class="Button Button11 WhiteButton comment sysPinCommentButton"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang146')->value;?>
</strong><span></span></a>
                <?php }else{ ?>
                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login" class="Button Button11 WhiteButton repin_link"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang107')->value;?>
</strong><span></span></a>
                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login" class="Button Button11 WhiteButton likebutton"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang132')->value;?>
</strong><span></span></a>
                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login" class="Button Button11 WhiteButton comment"><strong><em></em><?php echo $_smarty_tpl->getVariable('lang146')->value;?>
</strong><span></span></a>
                <?php }?>
            </div>
            <a href="/pin/<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pkey'];?>
" class="ImgLink" onclick="return Nav.go(this, 'pin')"><?php if ($_smarty_tpl->getVariable('enable_youtube')->value=="1"){?><?php if ($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['youtube']!=''){?><?php $_template = new Smarty_Internal_Template('youtube_bit.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?><?php }?><?php }?><img class="sysPinImg" src="<?php echo $_smarty_tpl->getVariable('purl')->value;?>
/t/s-<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pic'];?>
" alt="<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
 - <?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']);?>
" style="max-width:192px;"/></a>
            <p class="stats colorless">
                <span class="LikesCount" title="Likes"><em></em><span class="sysPinLikeCounter_<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pkey'];?>
"><?php $_smarty_tpl->assign('fnum' , insert_favcount (array('value' => 'a', 'PID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']),$_smarty_tpl), true);?><?php if ($_smarty_tpl->getVariable('fnum')->value=="1"){?><span id="chglikes<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
"><?php echo $_smarty_tpl->getVariable('fnum')->value;?>
</span> <?php echo $_smarty_tpl->getVariable('lang148')->value;?>
<?php }else{ ?><span id="chglikes<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
"><?php echo $_smarty_tpl->getVariable('fnum')->value;?>
</span> <?php echo $_smarty_tpl->getVariable('lang149')->value;?>
<?php }?></span> &nbsp;&nbsp;</span>
                <span class="RepinsCount" title="Repins"><em></em><span class="sysPinRepinsCounter_<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pkey'];?>
"><?php $_smarty_tpl->assign('rnum' , insert_repincount (array('value' => 'a', 'PID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']),$_smarty_tpl), true);?><?php if ($_smarty_tpl->getVariable('rnum')->value=="1"){?><span id="chgrps<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
"><?php echo $_smarty_tpl->getVariable('rnum')->value;?>
</span> <?php echo $_smarty_tpl->getVariable('lang150')->value;?>
<?php }else{ ?><span id="chgrps<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
"><?php echo $_smarty_tpl->getVariable('rnum')->value;?>
</span> <?php echo $_smarty_tpl->getVariable('lang151')->value;?>
<?php }?></span>&nbsp;&nbsp;</span>
            </p>
            <p class="description sysPinDescr"><?php echo smarty_modifier_mb_truncate(stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']),100,"...",'UTF-8');?>
</p>
            <div class="convo attribution clearfix">
                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
" class="ImgLink"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php $_smarty_tpl->assign('pinpp' , insert_get_member_profilepicture (array('value' => 'var', 'profilepicture' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['profilepicture']),$_smarty_tpl), true);?><?php echo $_smarty_tpl->getVariable('pinpp')->value;?>
" alt="<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
" /></a>
                <p>
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
" ><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo smarty_modifier_mb_truncate(stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']),50,"...",'UTF-8');?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lname']);?>
<?php }?></a> <?php echo $_smarty_tpl->getVariable('lang100')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
/<?php $_smarty_tpl->assign('bname' , insert_get_seo_bname (array('value' => 'a', 'bname' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('bname')->value);?>
" title="<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']);?>
"><?php echo smarty_modifier_mb_truncate(stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']),100,"...",'UTF-8');?>
</a>
                </p>
            </div>
            <?php $_smarty_tpl->assign('pcom' , insert_get_comments (array('value' => 'a', 'PID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']),$_smarty_tpl), true);?>
            <div class="sysPinCmntContainer">            	
                <div class="comments colormuted">
                    <div class="sysPinCmntList">
                    	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('pcom')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
                        <div class="comment convo clearfix sysPinCmntItemContainer">
                            <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['username']);?>
" class="ImgLink"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php $_smarty_tpl->assign('pincompp' , insert_get_member_profilepicture (array('value' => 'var', 'profilepicture' => $_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['profilepicture']),$_smarty_tpl), true);?><?php echo $_smarty_tpl->getVariable('pincompp')->value;?>
" alt="<?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['username']);?>
" /></a>
                            <p>
                                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo smarty_modifier_mb_truncate(stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['username']),50,"...",'UTF-8');?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['lname']);?>
<?php }?></a>
                                <div class="sysPinCmntItemText" onclick="$(this).html($('#<?php echo $_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['COMID'];?>
-FullComment').html());"><?php echo smarty_modifier_mb_truncate(stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['comment']),50,"...",'UTF-8');?>
</div>
                                <div class="sysPinCmntItemText" style="display:none" id="<?php echo $_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['COMID'];?>
-FullComment"><?php echo stripslashes($_smarty_tpl->getVariable('pcom')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['comment']);?>
</div>
                            </p>
                        </div>	
                        <?php endfor; endif; ?>
                        <?php if ($_SESSION['USERID']!=''){?>
                        <?php $_smarty_tpl->assign('sesspp' , insert_get_member_profilepicture (array('value' => 'var', 'profilepicture' => $_SESSION['PP']),$_smarty_tpl), true);?>
                        <div class="comment convo clearfix sysPinCmntItemContainer" id="show_new_com_<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" style="display:none">
                            <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_SESSION['USERNAME']);?>
" class="ImgLink"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php echo $_smarty_tpl->getVariable('sesspp')->value;?>
" alt="<?php echo stripslashes($_SESSION['USERNAME']);?>
" /></a>
                            <p>
                                <a href="<?php echo stripslashes($_SESSION['USERNAME']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_SESSION['USERNAME']);?>
<?php }else{ ?><?php echo stripslashes($_SESSION['FNAME']);?>
 <?php echo stripslashes($_SESSION['LNAME']);?>
<?php }?></a>
                                <div id="atcom<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" class="sysPinCmntItemText"></div>
                            </p>
                        </div>
                        <?php }?>
                    </div>
                    <?php $_smarty_tpl->assign('ptcom' , insert_get_total_comments (array('value' => 'a', 'PID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']),$_smarty_tpl), true);?>
                    <?php if ($_smarty_tpl->getVariable('ptcom')->value>"5"){?>
                    <div class="all_comms sysPinCmntAllBtn" <?php if ($_SESSION['USERID']!=''){?>style="border-top:0px;"<?php }?>><a href="/pin/<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pkey'];?>
" class="all comment convo clearfix" onclick="return Nav.go(this, 'pin')"><?php echo $_smarty_tpl->getVariable('lang145')->value;?>
 (<span class="sysCmtAllCount"><?php echo $_smarty_tpl->getVariable('ptcom')->value;?>
</span>)</a></div>
                    <?php }?>
                    <?php if ($_SESSION['USERID']!=''){?>
                    <div class="write  convo clearfix sysPinCmntItemContainer" <?php if ($_smarty_tpl->getVariable('ptcom')->value<"5"){?> style="border-top:0px;"<?php }?> id="hide_new_com_<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
">
                    <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_SESSION['USERNAME']);?>
" class="ImgLink"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php echo $_smarty_tpl->getVariable('sesspp')->value;?>
" alt="<?php echo stripslashes($_SESSION['USERNAME']);?>
" /></a>
                    <form method="post" onsubmit="return SEND_COM('<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
')" id="scform<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
">
                        <textarea id="add_comment<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" name="smaddcom"></textarea>
                        <div id="scerr<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID'];?>
" style="color:#cb0000; padding-top:5px; float:right"></div>
                        <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lang146')->value;?>
" style="float:right" />
                    </form>
                    </div>
                    <?php }?>
                </div>   
            </div>
        </div>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']=="25"){?>
        <?php $_smarty_tpl->assign('myad' , insert_get_advertisement2 (array('AID' => 2),$_smarty_tpl), true);?>
        <?php if ($_smarty_tpl->getVariable('myad')->value!=''){?>
        <div class="sysPinItemContainer pin">
        <?php echo $_smarty_tpl->getVariable('myad')->value;?>

        </div>
        <?php }?>
        <?php }?>
        <?php endfor; endif; ?>