{literal}
<script type="text/javascript">
	function theiload() 
	{
		$('#delboardscriptolution').click(function() {
			window.location.href = '{/literal}{$baseurl}/myboards?d=1&did={$BID}{literal}';
		});		
	};
</script>  
{/literal}
<div style="margin:20px;">
    <div class="">
        <p style="font-size: 18px; font-weight: bold;">{$lang243}</p>
        <p style="font-size: 16px; font-weight: bold; color:#C00;">{$lang244}</p>
        <div style="text-align: right;">
        	<a href="#" class="Button WhiteButton Button18" onclick="$('#sysPinDeleteBoardPopup').dialog('close');"><strong>{$lang235}</strong><span></span></a>&nbsp;&nbsp;&nbsp;
        	<a href="javascript:void(0)" class="Button OrangeButton Button18" style="color:#FFF" id="delboardscriptolution"><strong>{$lang242}</strong><span></span></a>
        </div>
    </div>
    <img src="{$imageurl}/blank.gif" onload="theiload();" /> 
</div>