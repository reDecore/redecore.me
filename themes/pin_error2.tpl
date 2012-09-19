<div class="pinPopup">
    <div class="BackLayout" onclick="history.back()"><span class="text"><em></em>{$lang106}</span><div></div></div>
    <div class="CloseLayout" onclick="Nav.toFirst()"><span class="text"><em></em>{$lang94}</span><div></div></div>
    <div class="WhiteContainer clearfix sysPinItemContainer" owner_id="{$pins.USERID}" pin_id="{$pins.pkey}">
        
            
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
</div>
<script>
{if $smarty.session.USERID ne ""}
App.currentUser.id = {$smarty.session.USERID};
{/if}
{literal}
Pin.init();
});
document.title=$('<title>{/literal}{$lang246|stripslashes} / {$site_name|stripslashes}{literal}<\/title>').text();
</script>
{/literal}