<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1858944766505699577a50c4-44872063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e370bf80e53ff490d743af28497811660c7a7252' => 
    array (
      0 => '/home/redecore/public_html/themes/index.tpl',
      1 => 1347850762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1858944766505699577a50c4-44872063',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="ColumnContainer" style="margin-top: <?php if ($_SESSION['USERID']==''){?>160<?php }else{ ?>80<?php }?>px;">
	<?php $_template = new Smarty_Internal_Template('bit_orange.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <div id="sysPinsList" class="pinList center">  
        <?php if ($_smarty_tpl->getVariable('showfeed')->value=="1"){?>
        <div class="feed pin" style="">		    
               <div>
                   <h2><?php echo $_smarty_tpl->getVariable('lang186')->value;?>
</h2>
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
                    <?php $_smarty_tpl->assign('bpp' , insert_get_member_profilepicture (array('value' => 'var', 'profilepicture' => $_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['profilepicture']),$_smarty_tpl), true);?>
                    <li>
                    <a class="ImgLink" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><img src="<?php echo $_smarty_tpl->getVariable('murl')->value;?>
/thumbs/<?php echo $_smarty_tpl->getVariable('bpp')->value;?>
" alt="<?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?>" /></a>
                    <span class="ActivityDetails">
                        <?php if ($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="repin"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?></a>:<br/>
                        &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/repin.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
"</a></span>
                        <?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="pin"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?></a>:<br/>
                        &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/pin.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
"</a></span>
                        <?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="com"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?></a>:<br/>
                        &nbsp;<img alt="" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/comment.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pin/<?php echo md5($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['PID']);?>
">"<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['comment']);?>
"</a></span>
                        <?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="folb"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?></a> <span class="sysEventPartTargetOther"><?php echo $_smarty_tpl->getVariable('lang184')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
/<?php $_smarty_tpl->assign('bname' , insert_get_seo_bname (array('value' => 'a', 'bname' => $_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('bname')->value);?>
"><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['bname']);?>
</a>.</span>
                        <?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="folm"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
<?php }?></a> <span class="sysEventPartTargetOther"><?php echo $_smarty_tpl->getVariable('lang184')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fname']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lname']);?>
<?php }?></a>.</span>
                        <?php }elseif($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['atype']=="like"){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uname']);?>
<?php }else{ ?><?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['f']);?>
 <?php echo stripslashes($_smarty_tpl->getVariable('act')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['l']);?>
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
        </div>
        <?php }?>             
        <?php $_template = new Smarty_Internal_Template('pic_bit.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>
    <div class="cl"></div>
    <div id="sysScrollContainerBottom"></div>
    <?php if ($_smarty_tpl->getVariable('more')->value=="1"){?>
     
    <script type="text/javascript">
    $(document).ready(function(){
    App.nextPageLoader.init({
    url: "<?php if ($_SESSION['USERID']!=''){?><?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/more8<?php }else{ ?><?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/more<?php }?>",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"start": "", "q": "<?php echo stripslashes($_smarty_tpl->getVariable('q')->value);?>
"},
    afterAppend: function(data) { Pin.init(); App.tabledList.append("#sysPinsList", data.html); }
    });
    });
    App.tabledList.init("#sysPinsList");
    </script>
    
    <?php }else{ ?>
     
    <script type="text/javascript">
    App.tabledList.init("#sysPinsList");
    </script>
    
    <?php }?> 
</div>	 

<?php $_template = new Smarty_Internal_Template('bit_goto.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template('bit_smiles.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        
<div class="sysNextPageLoading" style="display: none;"><img src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/img/icons/uploading_3.gif" alt="loading" align="top" /><span><?php echo $_smarty_tpl->getVariable('lang152')->value;?>
...</span></div>
<div class="sysNextPageMore" style="text-align: center;display: none;margin-bottom: 50px;"><a class="Button Button12 WhiteButton" href="#" style="font-size: 16px;"><strong><?php echo $_smarty_tpl->getVariable('lang153')->value;?>
</strong><span></span></a></div>
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong><?php echo $_smarty_tpl->getVariable('lang154')->value;?>
</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>