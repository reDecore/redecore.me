<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 05:37:15
         compiled from "/home/redecore/public_html/themes/all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11136886795056ef4b82c021-37838688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '011465484a41b5e91c0f1f7fd13e9e3dc9bd9d55' => 
    array (
      0 => '/home/redecore/public_html/themes/all.tpl',
      1 => 1347850750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11136886795056ef4b82c021-37838688',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="ColumnContainer" style="margin-top: <?php if ($_SESSION['USERID']==''){?>160<?php }else{ ?>80<?php }?>px;">
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
    <div id="sysPinsList" class="pinList center">        
        <?php $_template = new Smarty_Internal_Template('pic_bit.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>
    <div class="cl"></div>
    <div id="sysScrollContainerBottom"></div>
    <?php if ($_smarty_tpl->getVariable('more')->value=="1"){?>
     
    <script type="text/javascript">
    $(document).ready(function(){
    App.nextPageLoader.init({
    url: "<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/more2",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"CATID": "<?php echo $_smarty_tpl->getVariable('CATID')->value;?>
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