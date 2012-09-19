<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:48:14
         compiled from "/home/redecore/public_html/themes/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18066642350569d7e840683-87465349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd12080a4157187b8dafdb8185aa4fec922501ab2' => 
    array (
      0 => '/home/redecore/public_html/themes/signup.tpl',
      1 => 1347850775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18066642350569d7e840683-87465349',
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
        	<div><a class="Button OrangeButton Button18" href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/login"><strong><?php echo $_smarty_tpl->getVariable('lang58')->value;?>
 »</strong><span></span></a></div>
        	<p><?php echo $_smarty_tpl->getVariable('lang56')->value;?>
<br><?php echo $_smarty_tpl->getVariable('lang57')->value;?>
</p>
        </div>
        <div class="Sheet2 Sheet"></div>
        <div class="Sheet3 Sheet"></div>
    </div>
    <div class="cl"></div>	
</div>

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

<img src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/login_bar.png" class="login_bar" />

<?php $_template = new Smarty_Internal_Template('error.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<p class="auth_text" style="font-size:24px"><?php echo $_smarty_tpl->getVariable('lang60')->value;?>
</p>

<div class="error_block login_error"></div>

<form id="sysForm" method="POST" class="Form FancyForm AuthForm">
    <ul>
        <li>
        	<input class="input_text" type="text" name="user_username" id="sysForm_user_username" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_username')->value);?>
" max="30" />
            <label for="sysForm_user_username"><?php echo $_smarty_tpl->getVariable('lang13')->value;?>
</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_fname" id="sysForm_user_fname" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_fname')->value);?>
" max="30" />
            <label for="sysForm_user_fname"><?php echo $_smarty_tpl->getVariable('lang101')->value;?>
</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_lname" id="sysForm_user_lname" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_lname')->value);?>
" max="50" />
            <label for="sysForm_user_lname"><?php echo $_smarty_tpl->getVariable('lang102')->value;?>
</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_email" id="sysForm_user_email" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_email')->value);?>
" />
            <label for="sysForm_user_email"><?php echo $_smarty_tpl->getVariable('lang8')->value;?>
</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="password" name="user_password" id="sysForm_user_password" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_password')->value);?>
" />
        	<label for="sysForm_user_password"><?php echo $_smarty_tpl->getVariable('lang9')->value;?>
</label>
        	<span class="fff"></span>
        </li>  
        <li>
        	<input class="input_text" type="password" name="user_password2" id="sysForm_user_password2" value="<?php echo stripslashes($_smarty_tpl->getVariable('user_password2')->value);?>
" />
        	<label for="sysForm_user_password2"><?php echo $_smarty_tpl->getVariable('lang61')->value;?>
</label>
        	<span class="fff"></span>
        </li> 
        <li>
            <input class="input_text" type="text" name="user_captcha_solution" id="sysForm_user_captcha_solution" value="" />
        	<label for="sysForm_user_captcha_solution"><?php echo $_smarty_tpl->getVariable('lang62')->value;?>
</label>
        	<span class="fff"></span>
        </li>  
        <li>
            <img src="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/include/captcha.php" style="border: 0px; margin:0px; padding:0px" />
        </li> 
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="<?php echo $_smarty_tpl->getVariable('lang18')->value;?>
" class="Button_input" id="sysForm_submit" />
    </div>
     <input type="hidden" name="r" value="<?php echo stripslashes($_smarty_tpl->getVariable('r')->value);?>
" />
     <input type="hidden" name="jsub" value="1" />
</form>

<div style="padding-bottom:50px;"></div>