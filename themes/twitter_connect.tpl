<a style="" id="GoToMain" href="{$baseurl}/" class="Button WhiteButton Indicator"><strong>{$lang1}</strong><span></span></a>

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
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="{$lang18}" class="Button_input" id="sysForm_submit" />
    </div>
     <input type="hidden" name="r" value="{$r|stripslashes}" />
     <input type="hidden" name="jsub" value="1" />
</form>

<div style="padding-bottom:50px;"></div>