<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:43:37
         compiled from "/home/redecore/public_html/themes/header_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18079717950569c69295983-45149584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcde36b999d2ab48328f85129457a81693407dd8' => 
    array (
      0 => '/home/redecore/public_html/themes/header_menu.tpl',
      1 => 1347853373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18079717950569c69295983-45149584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="header">
    <div class="HeaderContainer">
        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/" class="Pinme"><img alt="<?php echo $_smarty_tpl->getVariable('site_name')->value;?>
" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/redecore_logo.png" /></a>
        <ul class="Navigation">
        	<?php if ($_SESSION['USERID']!=''){?>
            	<li>
                    <div class="nav sysOutLink"><a href="javascript:void(0)" onclick="App.ajaxDialog('<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/add_popup', {id: 'sysAddPopup', width: '550px'})"><?php echo $_smarty_tpl->getVariable('lang160')->value;?>
</a><span class="PlusIcon"></span></div>
                </li>
                <li>
                    <i class="nav sysOutLink" title="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_SESSION['USERNAME']);?>
" skip-protocol="true" same-win="true"><?php if ($_smarty_tpl->getVariable('use_username')->value=="1"){?><?php echo stripslashes($_SESSION['USERNAME']);?>
<?php }else{ ?><?php echo stripslashes($_SESSION['FNAME']);?>
 <?php echo stripslashes($_SESSION['LNAME']);?>
<?php }?><span></span></i>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/<?php echo stripslashes($_SESSION['USERNAME']);?>
"><?php echo $_smarty_tpl->getVariable('lang216')->value;?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/myboards"><?php echo $_smarty_tpl->getVariable('lang217')->value;?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/mypins"><?php echo $_smarty_tpl->getVariable('lang218')->value;?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/mylikes"><?php echo $_smarty_tpl->getVariable('lang219')->value;?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/settings"><?php echo $_smarty_tpl->getVariable('lang220')->value;?>
</a></li>
                    </ul>
                </li>
                <li>
                    
                    <script type="text/javascript">
                    function loadContent(elementSelector, sourceURL) {
                    $(""+elementSelector+"").load(""+sourceURL+"");
                    }
                    </script>
                    
                    <div class="nav sysOutLink"><a href="javascript:loadContent('#loadme', '<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/log_out');"><?php echo $_smarty_tpl->getVariable('lang49')->value;?>
</a><span class="PlusIcon"></span></div>
                </li>
            <?php }else{ ?>
                <?php if ($_smarty_tpl->getVariable('invite_mode')->value=="0"){?>
                <li>
                    <i class="nav sysOutLink" title="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/signup" skip-protocol="true" same-win="true"><?php echo $_smarty_tpl->getVariable('lang48')->value;?>
<span class="PlusIcon"></span></i>
                </li>
                <?php }?>
                <li>
                    <i class="nav sysOutLink" title="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login" skip-protocol="true" same-win="true"><?php echo $_smarty_tpl->getVariable('lang0')->value;?>
<span class="PlusIcon"></span></i>
                </li>
            <?php }?>
            <li style="margin-right:10px; padding-right:10px;">
            	<i class="nav sysOutLink" title="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/about" skip-protocol="true" same-win="true"><?php echo $_smarty_tpl->getVariable('lang478')->value;?>
<span></span></i>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/about"><?php echo $_smarty_tpl->getVariable('lang208')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pinit"><?php echo $_smarty_tpl->getVariable('lang209')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/rules"><?php echo $_smarty_tpl->getVariable('lang210')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/help"><?php echo $_smarty_tpl->getVariable('lang211')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/tos"><?php echo $_smarty_tpl->getVariable('lang212')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/privacy"><?php echo $_smarty_tpl->getVariable('lang213')->value;?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/contact"><?php echo $_smarty_tpl->getVariable('lang214')->value;?>
</a></li>
                </ul>
            </li>
            <li>
                <div class="nav sysOutLink"><a href="javascript:void(0)" onclick="App.ajaxDialog('<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/language.php', {id: 'sysLangPopup', width: '550px'})"><?php if ($_SESSION['language']=="english"){?>English<?php }elseif($_SESSION['language']=="spanish"){?>Español<?php }elseif($_SESSION['language']=="french"){?>Français<?php }elseif($_SESSION['language']=="portuguese"){?>Português<?php }elseif($_SESSION['language']=="japanese"){?>日本の<?php }elseif($_SESSION['language']=="chinese_simplified"){?>中文（简体）<?php }elseif($_SESSION['language']=="chinese_traditional"){?>中國傳統文化<?php }?></a></div>
            </li>  
        </ul>
        <div class="Search">
            <form class="sysFullTSForm text" method="get" action="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/search">
            	<input type="text" value="" size="27" name="q" id="query" is_empty="yes" class="ui-autocomplete-input" />
            	<button class="lg" id="query_button" type="submit"><img alt="<?php echo $_smarty_tpl->getVariable('lang159')->value;?>
" src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/search.gif"></button>
            </form>
            
            <script type="text/javascript">
            $('.sysFullTSForm INPUT[name="q"]').emptyVal({text: "<?php echo $_smarty_tpl->getVariable('lang159')->value;?>
"})
            </script>
            
        </div>
    </div>		
</div>