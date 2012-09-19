<div class="FixedContainer" style="margin-top: {if $smarty.session.USERID eq ""}150{else}70{/if}px;">
	{include file='bit_orange2.tpl'}  
    
    <br>
    <div class="error_block login_error">
        <a name="sys_message"></a>
        <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="margin-top: 10px;margin-bottom: 10px; padding: 1em;">
                <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
                <p style="margin-left:60px;margin-top: 10px;">{$lang246}</p>
            </div>
        </div>
        <div class="cl"></div>
    </div>

</div>

{include file='bit_goto.tpl'}