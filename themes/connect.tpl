<a style="" id="GoToMain" href="{$baseurl}/" class="Button WhiteButton Indicator"><strong>{$lang1}</strong><span></span></a>

{include file='error.tpl'}

<p class="auth_text">{$lang12}</p>

<div class="error_block login_error"></div>

<form id="sysForm" method="POST" class="Form FancyForm AuthForm">
    <ul>
        <li>
        	<input class="input_text" type="text" name="l_username" id="sysForm_identity" value="{$user_username}" />
            <label for="sysForm_l_username">{$lang13}</label>
            <span class="fff"></span>
        </li>
        <li>
        	<input class="input_text" type="password" name="credential" id="sysForm_credential" value="{$password}" />
        	<label for="sysForm_credential">{$lang9}</label>
        	<span class="fff"></span>
        </li>    
    </ul>
    <div class="non_inputs">
    	<input type="submit" value="{$lang18}" class="Button_input" id="sysForm_submit" />
    </div>
    <input type="hidden" name="jsub" value="1" />
</form>