<div class="FixedContainer">
	{include file='error.tpl'}
    
    <div class="pin" style="float: right; position: relative; overflow: hidden; margin-top: 93px;">
    	<a href="{$baseurl}/pin/{$pins.PID|md5}"><img src="{$purl}/t/s-{$pins.pic}" /></a>
    	<p id="postDescription">{$pins.ptitle|stripslashes}</p>
    </div>

    <form id="PinEdit" class="Form StaticForm" action="{$baseurl}/edit_pin?id={$pins.PID}" method="POST" style="float: left; width: 614px;">
        <h3>{$lang240}</h3>
        <ul>
            <li>
                <label>{$lang231}</label>
                <div class="Right">
                    <div id="ta_holder" class="editable_shadow pin_edit">
                    	<textarea rows="2" name="ptitle" maxlength="500" id="ptitle" cols="40" class="expand autocomplete_desc">{$pins.ptitle|stripslashes}</textarea>
                    </div>
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang230}</label>
                <div class="Right">
                	<input type="text" name="source" value="{$pins.source|stripslashes}" id="source" />
                </div>
            </li>
            
            <li>
                <label for="id_board">{$lang229}</label>
                <div class="Right">
                    <select name="BID" id="BID">
                        {insert name=get_boards assign=b}
                        {section name=i loop=$b}
                        <option value="{$b[i].BID|stripslashes}" {if $pins.BID eq $b[i].BID}selected="selected"{/if}>{$b[i].bname|stripslashes}</option>
                        {/section}
                    </select>
            	</div>
            </li>
            
            <li>
                <label>{$lang224}</label>
                <div class="Right">
                	<a href="#" id="delete" class="Button WhiteButton Button18 deleteButton" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/delete_create_popup?id={/literal}{$pins.PID}{literal}', {id: 'sysPinDeletePopup', width: '400px'})"{/literal}><strong>{$lang228}</strong><span></span></a>
                </div>
            </li>
        </ul>
        
        <div class="Submit">
            <p>
                <a href="#" class="Button OrangeButton Button24" onclick="$('#PinEdit').submit(); return false">
                	<strong>{$lang227}</strong>
                	<span></span>
                </a>
            </p>
        </div>
        <input type="hidden" name="OBID" value="{$pins.BID}" />
        <input type="hidden" name="esub" value="1" />
    </form>
</div>