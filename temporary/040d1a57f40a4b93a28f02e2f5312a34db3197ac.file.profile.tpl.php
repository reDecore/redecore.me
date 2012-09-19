<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 00:08:12
         compiled from "/home/redecore/public_html/themes/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19518625645056a22c31f8a2-21091295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '040d1a57f40a4b93a28f02e2f5312a34db3197ac' => 
    array (
      0 => '/home/redecore/public_html/themes/profile.tpl',
      1 => 1347850772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19518625645056a22c31f8a2-21091295',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="profile" style="margin-top: <?php if ($_SESSION['USERID']==''){?>160<?php }else{ ?>80<?php }?>px;">
	<?php if ($_SESSION['USERID']==''){?>
	
	<script type="text/javascript">
    $(document).ready(function(){
    var navShowed = false, hideTo = null;
    $(".Nag").hover(
    function(){ if (hideTo) clearTimeout(hideTo); if (!navShowed) { $("#UnauthCallout").animate({marginTop: '90px'},'slow'); navShowed = true; } },
    function() { hideTo = setTimeout(function(){$("#UnauthCallout").animate({marginTop: '-42px'},'slow');}, 1000); }
    );
    });
    </script>
    
    <div id="UnauthCallout" style="margin-top: -42px;">
        <div class="Nag">
            <div class="Sheet1 Sheet">
                <noindex>
                    <h2><?php echo $_smarty_tpl->getVariable('lang96')->value;?>
:</h2>
                    <p class="bborder">
                        - <?php echo $_smarty_tpl->getVariable('lang97')->value;?>
<br/>
                        - <?php echo $_smarty_tpl->getVariable('lang98')->value;?>
<br/>
                        - <?php echo $_smarty_tpl->getVariable('lang99')->value;?>
<br/>
                    </p>
                    <div>
                    	<?php if ($_smarty_tpl->getVariable('invite_mode')->value=="1"){?>
                    	<a class="Button OrangeButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/invite"><strong><?php echo $_smarty_tpl->getVariable('lang4')->value;?>
 »</strong><span></span></a>
                        <?php }else{ ?>
                        <a class="Button OrangeButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/signup"><strong><?php echo $_smarty_tpl->getVariable('lang41')->value;?>
 »</strong><span></span></a>
                        <?php }?>
                        <a class="Button WhiteButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login"><strong><?php echo $_smarty_tpl->getVariable('lang0')->value;?>
</strong><span></span></a>
                    </div>
                    <p><?php echo $_smarty_tpl->getVariable('short_name')->value;?>
 - <?php echo $_smarty_tpl->getVariable('site_slogan')->value;?>
<br><?php echo $_smarty_tpl->getVariable('lang95')->value;?>
</p>
                </noindex>
            </div>
        	<div class="Sheet2 Sheet"></div>
        	<div class="Sheet3 Sheet"></div>
        </div>
        <div class="cl"></div>	
    </div>
    <?php }?>
    <?php $_template = new Smarty_Internal_Template('profile_left.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <div class="ContextBar">
        <p class="bar-links">
            <span class="selected"><?php echo $_smarty_tpl->getVariable('lang176')->value;?>
 (<span class="sysUserBoardCounter_<?php echo $_smarty_tpl->getVariable('u')->value['USERID'];?>
"><?php echo $_smarty_tpl->getVariable('btotal')->value;?>
</span>)</span> ·
            <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
/pins"><?php echo $_smarty_tpl->getVariable('lang175')->value;?>
</a> (<span class="sysUserPinCounter_<?php echo $_smarty_tpl->getVariable('u')->value['USERID'];?>
"><?php echo $_smarty_tpl->getVariable('ptotal')->value;?>
</span>) ·
            <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_smarty_tpl->getVariable('u')->value['username']);?>
/likes"><?php echo $_smarty_tpl->getVariable('lang134')->value;?>
</a> (<span class="sysUserLikeCounter_<?php echo $_smarty_tpl->getVariable('u')->value['USERID'];?>
"><?php echo $_smarty_tpl->getVariable('ltotal')->value;?>
</span>)
        </p>
    </div>
    <center>
    <?php echo insert_get_advertisement(array('AID' => 3),$_smarty_tpl);?>

    </center>
    <div class="ColumnContainer">
        <ul class="sortable" id="sysBoardList">
            <?php $_template = new Smarty_Internal_Template('board_bit.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        </ul>
    </div>	
</div>	 

<?php $_template = new Smarty_Internal_Template('bit_goto.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template('bit_smiles.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong><?php echo $_smarty_tpl->getVariable('lang154')->value;?>
</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>