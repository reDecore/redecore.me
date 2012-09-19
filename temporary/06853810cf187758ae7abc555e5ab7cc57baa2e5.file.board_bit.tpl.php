<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 00:08:12
         compiled from "/home/redecore/public_html/themes/board_bit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2873587995056a22c848226-64047809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06853810cf187758ae7abc555e5ab7cc57baa2e5' => 
    array (
      0 => '/home/redecore/public_html/themes/board_bit.tpl',
      1 => 1347850752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2873587995056a22c848226-64047809',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    	<?php if ($_SESSION['USERID']!=''){?>
            
            <script language="javascript" type="text/javascript">
            function ATB(id,nhide,nshow) {
                $('#'+nhide).addClass('hidden');
                $.post("<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/favb.php",{"id":id},function(html) {
                    $('#'+nshow).removeClass('hidden');
                });
            }
            function RFB(id,nhide,nshow) {
                $('#'+nhide).addClass('hidden');
                $.post("<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/favb2.php",{"id":id},function(html) {
                    $('#'+nshow).removeClass('hidden');
                });
            }
            </script>
            
        <?php }?>
    	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
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
        <li>
            <div class="sysBoardItemContainer pin pinBoard">
                <h3><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
/<?php $_smarty_tpl->assign('bname' , insert_return_seo_bname (array('value' => 'a', 'bname' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('bname')->value);?>
"><?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']);?>
</a></h3>
                <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
/<?php echo stripslashes($_smarty_tpl->getVariable('bname')->value);?>
" class="link">
                	<?php $_smarty_tpl->assign('bp' , insert_board_pics (array('value' => 'a', 'BID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID']),$_smarty_tpl), true);?>
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('bp')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
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
                    <img src="<?php echo $_smarty_tpl->getVariable('purl')->value;?>
/t/t-<?php echo $_smarty_tpl->getVariable('bp')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['pic'];?>
" />
                    <?php endfor; endif; ?>
                </a>
                <div style="padding: 0 15px 10px;text-align: center;display: block;margin:0;margin-bottom:10px">
                	<div style="float:right;color:#AD9C9C;"><strong><?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pincount'];?>
</strong> <?php echo $_smarty_tpl->getVariable('lang173')->value;?>
</div>
                </div>
                <div class="followBoard">                    
                    <?php if ($_SESSION['USERID']!=''){?>
                        <?php if ($_SESSION['USERID']!=$_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['USERID']){?>
                        <?php $_smarty_tpl->assign('isfolb' , insert_is_folb (array('BID' => $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID']),$_smarty_tpl), true);?>
                        <div class="sysBoardFollowButton <?php if ($_smarty_tpl->getVariable('isfolb')->value=="1"){?>hidden<?php }?>" id="BADD<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
" onclick="ATB('<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
', 'BADD<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
', 'BREM<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
');"><a class="Button12 Button WhiteButton" href="javascript:void(0)"><strong><?php echo $_smarty_tpl->getVariable('lang130')->value;?>
</strong><span></span></a></div>
                        <div class="sysBoardUnFollowButton <?php if ($_smarty_tpl->getVariable('isfolb')->value=="0"){?>hidden<?php }?>" id="BREM<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
" onclick="RFB('<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
', 'BREM<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
', 'BADD<?php echo $_smarty_tpl->getVariable('pins')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['BID'];?>
');"><a class="Button12 Button WhiteButton disabled" href="javascript:void(0)"><strong><?php echo $_smarty_tpl->getVariable('lang131')->value;?>
</strong><span></span></a></div>
                        <?php }?>
                    <?php }else{ ?>
                    <div class="sysBoardFollowButton "><a class="Button12 Button WhiteButton" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login"><strong><?php echo $_smarty_tpl->getVariable('lang130')->value;?>
</strong><span></span></a></div>
                    <?php }?> 
                </div>	    	
            </div>    
        </li>
    	<?php endfor; endif; ?>