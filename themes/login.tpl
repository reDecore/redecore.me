<a style="" id="GoToMain" href="{$baseurl}/" class="Button WhiteButton Indicator"><strong>{$lang1}</strong><span></span></a>
<div id="UnauthCallout" style="top:60px; position: absolute;">
    <div class="Nag">
        <div class="Sheet1 Sheet">
        	{if $invite_mode eq "1"}
        	<div><a class="Button OrangeButton Button18" href="{$baseurl}/invite"><strong>{$lang4} »</strong><span></span></a></div>
        	<p>{$lang2}<br>{$lang3}</p>
            {else}
            <div><a class="Button OrangeButton Button18" href="{$baseurl}/signup"><strong>{$lang41} »</strong><span></span></a></div>
        	<p>{$lang2}<br>{$lang40}</p>
            {/if}
        </div>
        <div class="Sheet2 Sheet"></div>
        <div class="Sheet3 Sheet"></div>
    </div>
    <div class="cl"></div>	
</div>

{if $invite_mode ne "1"}
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
{/if}
<img src="{$imageurl}/login_bar.png" class="login_bar" />

{include file='error.tpl'}

<p class="auth_text" style="font-size:24px">{$lang7}</p>

<div class="error_block login_error"></div>

<form id="sysForm" method="POST" class="Form FancyForm AuthForm">
    <ul>
        <li>
        	<input class="input_text" type="text" name="identity" id="sysForm_identity" value="{$identity|stripslashes}" />
            <label for="sysForm_identity">{$lang8}</label><span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="password" name="credential" id="sysForm_credential" value="" />
        	<label for="sysForm_credential">{$lang9}</label>
        	<span class="fff"></span>
        </li>  
        <li>
        	<input class="checkbox" id="l_remember_me" name="l_remember_me" type="checkbox" value="1" />
        	<span style="font-size:16px; color:#666"> {$lang38}</span>
        </li>   
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="{$lang10}" class="Button_input" id="sysForm_submit" />
        {if $invite_mode ne "1"}
        <a href="{$baseurl}/signup" id="urlGetInvite" class="colorless">{$lang471}</a>
        {else}
    	<a href="{$baseurl}/invite" id="urlGetInvite" class="colorless">{$lang4}</a>
        {/if}
    	<a href="{$baseurl}/lost" id="resetPassword" class="colorless">{$lang11}</a>
    </div>
     <input type="hidden" name="r" value="{$r|stripslashes}" />
     <input type="hidden" name="sublog" value="1" />
</form>