<div class="modal" title="{$lang160}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysLangPopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang490}</h2>
		<div class="cl"></div>
	</div>
</div>
<div class="OpenLinks" align="center" style="padding:30px;">
 	<form name="langselect" id="langselect" method="post">                        
        <select name="language" onChange="document.langselect.submit()" style="font-size: 24px;"> 
            <option value="english" {if $smarty.session.language eq "english"}selected{/if} >English</option> 
            <option value="spanish" {if $smarty.session.language eq "spanish"}selected{/if}>Español</option> 
            <option value="french" {if $smarty.session.language eq "french"}selected{/if}>Français</option> 
            <option value="portuguese" {if $smarty.session.language eq "portuguese"}selected{/if}>Português</option>
            <option value="japanese" {if $smarty.session.language eq "japanese"}selected{/if}>日本の</option>
            <option value="chinese_simplified" {if $smarty.session.language eq "chinese_simplified"}selected{/if}>中文（简体）</option>
            <option value="chinese_traditional" {if $smarty.session.language eq "chinese_traditional"}selected{/if}>中國傳統文化</option>
        </select>
    </form>
</div>