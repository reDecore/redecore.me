<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:44
         compiled from "/home/redecore/public_html/themes/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1223659184505699645d0f70-42975191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4102e9124c8cf33597485e6403b630a8e0259ec3' => 
    array (
      0 => '/home/redecore/public_html/themes/login.tpl',
      1 => 1347850763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1223659184505699645d0f70-42975191',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<a style="" id="GoToMain" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/" class="Button WhiteButton Indicator"><strong><?php echo $_smarty_tpl->getVariable('lang1')->value;?>
</strong><span></span></a>
<div id="UnauthCallout" style="top:60px; position: absolute;">
    <div class="Nag">
        <div class="Sheet1 Sheet">
        	<?php if ($_smarty_tpl->getVariable('invite_mode')->value=="1"){?>
        	<div><a class="Button OrangeButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/invite"><strong><?php echo $_smarty_tpl->getVariable('lang4')->value;?>
 »</strong><span></span></a></div>
        	<p><?php echo $_smarty_tpl->getVariable('lang2')->value;?>
<br><?php echo $_smarty_tpl->getVariable('lang3')->value;?>
</p>
            <?php }else{ ?>
            <div><a class="Button OrangeButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/signup"><strong><?php echo $_smarty_tpl->getVariable('lang41')->value;?>
 »</strong><span></span></a></div>
        	<p><?php echo $_smarty_tpl->getVariable('lang2')->value;?>
<br><?php echo $_smarty_tpl->getVariable('lang40')->value;?>
</p>
            <?php }?>
        </div>
        <div class="Sheet2 Sheet"></div>
        <div class="Sheet3 Sheet"></div>
    </div>
    <div class="cl"></div>	
</div>

<?php if ($_smarty_tpl->getVariable('invite_mode')->value!="1"){?>
<?php if ($_smarty_tpl->getVariable('enable_fc')->value=="1"&&$_smarty_tpl->getVariable('enable_tc')->value=="0"){?>
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="" style="width:213px; margin: 0 auto;">	
    <div class="inset">
        <a href="https://www.facebook.com/dialog/permissions.request?app_id=<?php echo $_smarty_tpl->getVariable('FACEBOOK_APP_ID')->value;?>
&display=page&next=<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/&response_type=code&fbconnect=1&perms=email,offline_access,publish_stream" class="fb login_button">
        <div class="logo_wrapper"><span class="logo"></span></div>
        <span><?php echo $_smarty_tpl->getVariable('lang6')->value;?>
</span>
        </a>
    </div>
    <div class="cl"></div>	
</div>
<?php }elseif($_smarty_tpl->getVariable('enable_fc')->value=="0"&&$_smarty_tpl->getVariable('enable_tc')->value=="1"){?>
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="" style="width:213px; margin: 0 auto;">	
    <div class="inset">
        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/oauth/redirect.php" class="tw login_button">
			<div class="logo_wrapper"><span class="logo"></span></div>
			<span><?php echo $_smarty_tpl->getVariable('lang491')->value;?>
</span>
		</a>
    </div>
    <div class="cl"></div>	
</div>
<?php }elseif($_smarty_tpl->getVariable('enable_fc')->value=="1"&&$_smarty_tpl->getVariable('enable_tc')->value=="1"){?>
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="social_buttons">	
    <div class="inset">
        <a href="https://www.facebook.com/dialog/permissions.request?app_id=<?php echo $_smarty_tpl->getVariable('FACEBOOK_APP_ID')->value;?>
&display=page&next=<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/&response_type=code&fbconnect=1&perms=email,offline_access,publish_stream" class="fb login_button">
        <div class="logo_wrapper"><span class="logo"></span></div>
        <span><?php echo $_smarty_tpl->getVariable('lang6')->value;?>
</span>
        </a>
    </div>
    <div class="inset last">
		<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/oauth/redirect.php" class="tw login_button">
			<div class="logo_wrapper"><span class="logo"></span></div>
			<span><?php echo $_smarty_tpl->getVariable('lang491')->value;?>
</span>
		</a>
	</div>
    <div class="cl"></div>	
</div>
<?php }?>
<?php }?>
<img src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/login_bar.png" class="login_bar" />

<?php $_template = new Smarty_Internal_Template('error.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<p class="auth_text" style="font-size:24px"><?php echo $_smarty_tpl->getVariable('lang7')->value;?>
</p>

<div class="error_block login_error"></div>

<form id="sysForm" method="POST" class="Form FancyForm AuthForm">
    <ul>
        <li>
        	<input class="input_text" type="text" name="identity" id="sysForm_identity" value="<?php echo stripslashes($_smarty_tpl->getVariable('identity')->value);?>
" />
            <label for="sysForm_identity"><?php echo $_smarty_tpl->getVariable('lang8')->value;?>
</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="password" name="credential" id="sysForm_credential" value="" />
        	<label for="sysForm_credential"><?php echo $_smarty_tpl->getVariable('lang9')->value;?>
</label>
        	<span class="fff"></span>
        </li>  
        <li>
        	<input class="checkbox" id="l_remember_me" name="l_remember_me" type="checkbox" value="1" />
        	<span style="font-size:16px; color:#666"> <?php echo $_smarty_tpl->getVariable('lang38')->value;?>
</span>
        </li>   
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="<?php echo $_smarty_tpl->getVariable('lang10')->value;?>
" class="Button_input" id="sysForm_submit" />
        <?php if ($_smarty_tpl->getVariable('invite_mode')->value!="1"){?>
        <a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/signup" id="urlGetInvite" class="colorless"><?php echo $_smarty_tpl->getVariable('lang471')->value;?>
</a>
        <?php }else{ ?>
    	<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/invite" id="urlGetInvite" class="colorless"><?php echo $_smarty_tpl->getVariable('lang4')->value;?>
</a>
        <?php }?>
    	<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/lost" id="resetPassword" class="colorless"><?php echo $_smarty_tpl->getVariable('lang11')->value;?>
</a>
    </div>
     <input type="hidden" name="r" value="<?php echo stripslashes($_smarty_tpl->getVariable('r')->value);?>
" />
     <input type="hidden" name="sublog" value="1" />
</form>