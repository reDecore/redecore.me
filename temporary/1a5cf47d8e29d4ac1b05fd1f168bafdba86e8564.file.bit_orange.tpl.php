<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/bit_orange.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28503323650569957a5b341-41774899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a5cf47d8e29d4ac1b05fd1f168bafdba86e8564' => 
    array (
      0 => '/home/redecore/public_html/themes/bit_orange.tpl',
      1 => 1347850751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28503323650569957a5b341-41774899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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