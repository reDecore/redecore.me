<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:59:35
         compiled from "/home/redecore/public_html/themes/popular.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17450283845056a027d703d1-30247460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a94a82197a4797f51653d18857755f250275e5f2' => 
    array (
      0 => '/home/redecore/public_html/themes/popular.tpl',
      1 => 1347850771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17450283845056a027d703d1-30247460',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="ColumnContainer" style="margin-top: <?php if ($_SESSION['USERID']==''){?>160<?php }else{ ?>80<?php }?>px;">
	<?php $_template = new Smarty_Internal_Template('bit_orange.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>   
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
/more",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"start": ""},
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