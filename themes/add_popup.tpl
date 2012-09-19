<div class="modal" title="{$lang160}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysAddPopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang160}</h2>
		<div class="cl"></div>
	</div>
</div>
<div class="PinIt"><a href="{$baseurl}/getbutton">{$lang163}</a></div>
<div class="OpenLinks">
 
	<div class="cell" {literal}onclick="$('#sysAddPopup').dialog('close');App.ajaxDialog('{/literal}{$baseurl}{literal}/pin_popup', {id: 'sysAPinPopup', width: '600px'})"{/literal}>
		<div class="scrape icon">
		</div>
        <div style="font-size:16px;font-weight:bold;">{$lang85}</div>
	</div>
    
    <div class="cell" {literal}onclick="$('#sysAddPopup').dialog('close');App.ajaxDialog('{/literal}{$baseurl}{literal}/upload_popup', {id: 'sysAUpPopup', width: '600px'})"{/literal}>
        <div class="upload icon">
		</div>
        <div style="font-size:16px;font-weight:bold;">{$lang161}</div>
	</div>
    
    <div class="cell" {literal}onclick="$('#sysAddPopup').dialog('close');App.ajaxDialog('{/literal}{$baseurl}{literal}/board_popup', {id: 'sysABoardPopup', width: '600px'})"{/literal}>
        <div class="board icon">
		</div>
        <div style="font-size:16px;font-weight:bold;">{$lang162}</div>
	</div>
</div>