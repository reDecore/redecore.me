<a style="" id="GoToMain" href="{$baseurl}/" class="Button WhiteButton Indicator"><strong>{$lang1}</strong><span></span></a>
<div id="UnauthCallout" style="top:60px; position: absolute;">
    <div class="Nag">
        <div class="Sheet1 Sheet">
        	<div><a class="Button OrangeButton Button18" href="{$baseurl}/login"><strong>{$lang58} »</strong><span></span></a></div>
        	<p>{$lang56}<br>{$lang57}</p>
        </div>
        <div class="Sheet2 Sheet"></div>
        <div class="Sheet3 Sheet"></div>
    </div>
    <div class="cl"></div>	
</div>

{if $enable_fc eq "1" AND $enable_tc eq "0"}
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="" style="width:213px; margin: 0 auto;">	
    <div class="inset">
        <a href="https://www.facebook.com/dialog/permissions.request?app_id={$FACEBOOK_APP_ID}&display=page&next={$baseurl}/&response_type=code&fbconnect=1&perms=email,offline_access,publish_stream" class="fb login_button">
        <div class="logo_wrapper"><span class="logo"></span></div>
        <span>{$lang6}</span>
        </a>
    </div>
    <div class="cl"></div>	
</div>
{elseif $enable_fc eq "0" AND $enable_tc eq "1"}
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="" style="width:213px; margin: 0 auto;">	
    <div class="inset">
        <a href="{$baseurl}/oauth/redirect.php" class="tw login_button">
			<div class="logo_wrapper"><span class="logo"></span></div>
			<span>{$lang491}</span>
		</a>
    </div>
    <div class="cl"></div>	
</div>
{elseif $enable_fc eq "1" AND $enable_tc eq "1"}
<p class="auth_text" style="margin-top: 100px; font-size:24px"></p>
<div class="social_buttons">	
    <div class="inset">
        <a href="https://www.facebook.com/dialog/permissions.request?app_id={$FACEBOOK_APP_ID}&display=page&next={$baseurl}/&response_type=code&fbconnect=1&perms=email,offline_access,publish_stream" class="fb login_button">
        <div class="logo_wrapper"><span class="logo"></span></div>
        <span>{$lang6}</span>
        </a>
    </div>
    <div class="inset last">
		<a href="{$baseurl}/oauth/redirect.php" class="tw login_button">
			<div class="logo_wrapper"><span class="logo"></span></div>
			<span>{$lang491}</span>
		</a>
	</div>
    <div class="cl"></div>	
</div>
{/if}

<img src="{$imageurl}/login_bar.png" class="login_bar" />

{include file='error.tpl'}

<p class="auth_text" style="font-size:24px">{$lang60}</p>

<div class="error_block login_error"></div>

<form id="sysForm" method="POST" class="Form FancyForm AuthForm">
    <ul>
        <li>
        	<input class="input_text" type="text" name="user_username" id="sysForm_user_username" value="{$user_username|stripslashes}" max="30" />
            <label for="sysForm_user_username">{$lang13}</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_fname" id="sysForm_user_fname" value="{$user_fname|stripslashes}" max="30" />
            <label for="sysForm_user_fname">{$lang101}</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_lname" id="sysForm_user_lname" value="{$user_lname|stripslashes}" max="50" />
            <label for="sysForm_user_lname">{$lang102}</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="text" name="user_email" id="sysForm_user_email" value="{$user_email|stripslashes}" />
            <label for="sysForm_user_email">{$lang8}</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="password" name="user_password" id="sysForm_user_password" value="{$user_password|stripslashes}" />
        	<label for="sysForm_user_password">{$lang9}</label>
        	<span class="fff"></span>
        </li>  
        <li>
        	<input class="input_text" type="password" name="user_password2" id="sysForm_user_password2" value="{$user_password2|stripslashes}" />
        	<label for="sysForm_user_password2">{$lang61}</label>
        	<span class="fff"></span>
        </li> 
        <li>
            <input class="input_text" type="text" name="user_captcha_solution" id="sysForm_user_captcha_solution" value="" />
        	<label for="sysForm_user_captcha_solution">{$lang62}</label>
        	<span class="fff"></span>
        </li>  
        <li>
            <img src="{$baseurl}/include/captcha.php" style="border: 0px; margin:0px; padding:0px" />
        </li> 
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="{$lang18}" class="Button_input" id="sysForm_submit" />
    </div>
     <input type="hidden" name="r" value="{$r|stripslashes}" />
     <input type="hidden" name="jsub" value="1" />
</form>

<div style="padding-bottom:50px;"></div>