{literal}
<script type="text/javascript">
	function theiload() 
	{
		$('#delpinscriptolution').click(function() {
			window.location.href = '{/literal}{$baseurl}/mypins?d=1&did={$PID}{literal}';
		});		
	};
</script>  
{/literal}
<div style="margin:20px;">
    <div class="">
        <p style="font-size: 18px; font-weight: bold;">{$lang234}</p>
        <div style="text-align: right;">
        	<a href="#" class="Button WhiteButton Button18" onclick="$('#sysPinDeletePopup').dialog('close');"><strong>{$lang235}</strong><span></span></a>&nbsp;&nbsp;&nbsp;
        	<a href="javascript:void(0)" class="Button OrangeButton Button18" style="color:#FFF" id="delpinscriptolution"><strong>{$lang228}</strong><span></span></a>
        </div>
    </div>
    <img src="{$imageurl}/blank.gif" onload="theiload();" /> 
</div>