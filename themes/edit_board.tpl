<div class="FixedContainer">
	   

    <form id="PinEdit" class="Form StaticForm" action="{$baseurl}/edit_board?id={$pins.BID}" method="POST" style="padding-top:20px; padding-left:93px; width: 614px;">
    {include file='error.tpl'} 
        <h3>{$lang222}</h3>
        <ul>
            
            <li>
                <label for="id_link">{$lang170}</label>
                <div class="Right">
                	<input type="text" name="bname" value="{$pins.bname|stripslashes}" id="bname" />
                </div>
            </li>
            
            <li>
                <label for="id_board">{$lang171}</label>
                <div class="Right">
                    <select name="cat" id="cat">
                    	{insert name=get_categories assign=hc}
                        {section name=i loop=$hc}
                        <option value="{$hc[i].CATID}" {if $pins.CATID eq $hc[i].CATID}selected="selected"{/if}>{$hc[i].name|stripslashes}</option>
                        {/section}
                    </select>
            	</div>
            </li>
            
            <li>
                <label>{$lang224}</label>
                <div class="Right">
                	<a href="#" id="delete" class="Button WhiteButton Button18 deleteButton" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/delete_board_popup?id={/literal}{$pins.BID}{literal}', {id: 'sysPinDeleteBoardPopup', width: '500px'})"{/literal}><strong>{$lang242}</strong><span></span></a>
                </div>
            </li>
        </ul>
        
        <div class="Submit">
            <p>
                <a href="#" class="Button OrangeButton Button24" onclick="$('#PinEdit').submit(); return false">
                	<strong>{$lang18}</strong>
                	<span></span>
                </a>
            </p>
        </div>
        <input type="hidden" name="esub" value="1" />
    </form>
</div>