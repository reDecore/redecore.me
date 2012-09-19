{if $error ne ""}
<div class="error_block login_error">
    <a name="sys_message"></a>
    <div class="ui-widget">
        <div class="ui-state-error ui-corner-all" style="margin-top: 10px;margin-bottom: 10px; padding: 1em;">
            <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
            <p style="margin-left:60px;margin-top: 10px;">{$error}</p>
        </div>
    </div>
    <div class="cl"></div>
</div>
{elseif $msg ne ""}
<div class="error_block login_error">
    <a name="sys_message"></a>
    <div class="ui-widget">
        <div class="ui-state-highlight ui-corner-all" style="margin-top: 10px;margin-bottom: 10px; padding: 1em;">
            <span class="ui-icon ui-icon-info" style="float: left; margin-right: 0.3em;"></span>
            <p style="margin-left:60px;margin-top: 10px;">{$msg}</p>
        </div>
    </div>
    <div class="cl"></div>
</div>
{/if}
