<a style="" id="GoToMain" href="{$baseurl}/" class="Button WhiteButton Indicator"><strong>{$lang1}</strong><span></span></a>

{include file='error.tpl'}

<div class="auth_lost">
    <form id="sysForm" method="POST" class="Form StaticForm">
    	<h3>{$lang47}</h3>
        <div class="error_block"></div>
        <ul>
            <li>
            	<label for="sysForm_identity">{$lang8}:</label>
            	<div class="Right"><input type="text" maxlength="50" name="identity" id="sysForm_id_identity" /> </div>
            </li>
        </ul>
        <div class="Submit"><input type="submit" value="{$lang18}" class="green_submit" id="sysForm_submit" /></div>
    <input type="hidden" name="fpsub" value="1" />
    </form>
</div>