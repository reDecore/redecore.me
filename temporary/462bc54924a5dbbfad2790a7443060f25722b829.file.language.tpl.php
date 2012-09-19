<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:31:28
         compiled from "/home/redecore/public_html/themes/language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119310938150569990c7f9e8-66136593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '462bc54924a5dbbfad2790a7443060f25722b829' => 
    array (
      0 => '/home/redecore/public_html/themes/language.tpl',
      1 => 1347850763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119310938150569990c7f9e8-66136593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="modal" title="<?php echo $_smarty_tpl->getVariable('lang160')->value;?>
">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysLangPopup').dialog('close');"><strong><?php echo $_smarty_tpl->getVariable('lang94')->value;?>
</strong><span></span></a>
		<h2><?php echo $_smarty_tpl->getVariable('lang490')->value;?>
</h2>
		<div class="cl"></div>
	</div>
</div>
<div class="OpenLinks" align="center" style="padding:30px;">
 	<form name="langselect" id="langselect" method="post">                        
        <select name="language" onChange="document.langselect.submit()" style="font-size: 24px;"> 
            <option value="english" <?php if ($_SESSION['language']=="english"){?>selected<?php }?> >English</option> 
            <option value="spanish" <?php if ($_SESSION['language']=="spanish"){?>selected<?php }?>>Español</option> 
            <option value="french" <?php if ($_SESSION['language']=="french"){?>selected<?php }?>>Français</option> 
            <option value="portuguese" <?php if ($_SESSION['language']=="portuguese"){?>selected<?php }?>>Português</option>
            <option value="japanese" <?php if ($_SESSION['language']=="japanese"){?>selected<?php }?>>日本の</option>
            <option value="chinese_simplified" <?php if ($_SESSION['language']=="chinese_simplified"){?>selected<?php }?>>中文（简体）</option>
            <option value="chinese_traditional" <?php if ($_SESSION['language']=="chinese_traditional"){?>selected<?php }?>>中國傳統文化</option>
        </select>
    </form>
</div>