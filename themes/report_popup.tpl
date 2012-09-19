{literal}
<script type="text/javascript">
function complaintFormSubmit()
{
    var form = $('#sysComplaintForm');

    $.ajax({
        url: '{/literal}{$baseurl}{literal}/add_report.php',
        type: 'post',
        beforeSend: function()
        {
            $('#sysComplaintError').html('');
            form.find('input[type=submit]').attr('disabled', 'disabled');
        },
        success: function(r)
        {
            if (r.success == true) 
			{
                $("#beforeit").hide();
				$("#afterit").show();
				function initTimeout() 
				{
					timeout = setTimeout(function() { $('#sysComplaintPopup').dialog('close'); }, 2000);
				}
				initTimeout();
			} 
			else 
			{
                if (r.msg) 
				{
                    $('#sysComplaintError').html(r.msg);
                }
            }
            form.find('input[type=submit]').removeAttr('disabled');
        },
        cache: false,
        data: form.serializeArray(),
        dataType: 'json'
    });

    return false;
}
</script>
{/literal}

<div class="modal" title="{$lang140}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysComplaintPopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang140}</h2>
		<div class="cl"></div>
	</div>
</div>

<div id="beforeit">    
    <form id="sysComplaintForm" method="POST" onsubmit="return complaintFormSubmit()" class="Form FormComplaint">
        <div id="sysComplaintError" class="error-field"></div>
        <ul>
            <li>
                <label>{$lang141}</label>
                <div class="Right"><textarea name="comment"></textarea></div>
            </li>
        </ul>
        <div class="Submit"><input type="submit" value="{$lang18}" class="green_submit" /></div>
        <div class="cl"></div>
        <div style="padding-bottom:15px;"></div>
        <input type="hidden" name="PID" value="{$PID}" />
    </form>
</div>
<div id="afterit" style="display:none">
	<div style="margin:20px;" align="center">
    	<h2 id="succ1">{$lang144}</h2>
    </div>
</div>