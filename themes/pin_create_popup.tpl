{literal}
<script type="text/javascript">
function repinSubmit()
{
    var form = $('#thePinForm');

    $.ajax({
        url: '{/literal}{$baseurl}{literal}/add_repin.php',
        type: 'post',
        beforeSend: function()
        {
            $('#sysfoundError').html('');
            form.find('input[type=submit]').attr('disabled', 'disabled');
        },
        success: function(r)
        {
            if (r.success == true) 
			{
                $("#beforeit").hide();
				$('#succ1').html(r.m1);
				$('#succ2').html(r.m2);
				$("#afterit").show();
				function initTimeout() 
				{
					timeout = setTimeout(function() { $('#sysPinCreatePopup').dialog('close'); }, 3000);
				}
				initTimeout();
			} 
			else 
			{
                if (r.msg) 
				{
                    $('#sysfoundError').html(r.msg);
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
<style>
.invisibile {
    visibility: hidden;
}
body {
    overflow-x: hidden;
}
div.overlay > div.body {
    border: 1px solid #e2e7e6;
    border-top: none;
    background-color: #f4f4f4;
    padding: 12px;
}
input, textarea, select, div.select div.caption {
    border: 1px solid #c8cfce;
    padding: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;
    background-color: #ffffff;
}
div.select div.caption.active {
    -moz-bottom-left-border-radius: 0;
    -webkit-bottom-left-border-radius: 0;
    -khtml-bottom-left-border-radius: 0;
    border-bottom-left-radius: 0;
    -moz-bottom-right-border-radius: 0;
    -webkit-bottom-right-border-radius: 0;
    -khtml-bottom-right-border-radius: 0;
    border-bottom-right-radius: 0;
}

div.select div.caption {
    padding: 10px 0 10px 5px;
    background-image: url({/literal}{$imageurl}{literal}/selectbg.png);
    background-repeat: no-repeat;
    background-position: center right;
    overflow: hidden;
    cursor: pointer;
}
div.select div.body {
    padding: 0;
    position: absolute;
    border: 1px solid #c8cfce;
    border-top: 0;
    background-color: #ffffff;
    width: 320px;
    max-height: 140px;
    overflow: hidden;
    overflow-y: scroll;
}

div.select div.body ul li {
    padding: 8px 5px;
    cursor: pointer;
	margin:0px;
}

div.select div.body ul li:hover {
    background-color: #e9e9e9;
}

div.select div.body ul li.selected {
    background-color: #e3e3e3;
}

div.select div.body div.form {
    border-top: 1px solid #c8cfce;
    padding: 5px 3px 14px 3px;
    background-color: #e9e9e9;
}

div.select div.body div.form input[type="text"] {
    width: 250px;
}

div.select div.body div.form input[type="submit"] {
    padding: 5px;
}
</style>
{/literal}

<div class="modal" title="{$lang107}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysPinCreatePopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang107}</h2>
		<div class="cl"></div>
	</div>
</div>

<div id="beforeit">
    <div class="CloseupLeft" style="margin-left:10px;">
        <div class="WhiteContainer" style="margin-left:-5px; padding-top:15px; padding-bottom:15px;">
            <img src="{$purl}/t/s-{$pins.pic}" onload="theiload();" />
        </div>
    </div>
    
    <div class="CloseupRight">
        <form id="thePinForm" method="POST" onsubmit="return repinSubmit()" class="Form PinForm">
            <div id="sysfoundError" class="error-field"></div>
            <ul>
                <li>
                    <div class="body">
                        <div class="select">
                            <div class="caption">{$lang86}...</div>
                            <div class="body invisibile">
                                <ul>
                                    {insert name=get_boards assign=b}
                                    {section name=i loop=$b}
                                    <li name="{$b[i].BID|stripslashes}">{$b[i].bname|stripslashes}</li>
                                    {/section}
                                </ul>
                                <div class="form">
                                    <input type="text" id="thebname" value="{$lang82}" />
                                    <select name="cat" id="cat" style="width:250px;">
                                        {insert name=get_categories assign=c}
                                        {section name=i loop=$c}
                                        <option value="{$c[i].CATID|stripslashes}">{$c[i].name|stripslashes}</option>
                                        {/section}
                                    </select><br />
                                    <input type="submit" value="{$lang34}" />
                                    <div class="errors"></div>
                                </div>
                            </div>
                            <input type="hidden" id="board_id" name="board_id" value="" />
                        </div>
                        {literal}
                        <script type="text/javascript">
                            function initSelect() {
                                $('div.select div.caption').click(function() {
                                    $('div.select div.body').find('img').show();
                                    $(this).parent().find('div.body').toggleClass('invisibile');
                                    $(this).addClass('active');
                        
                                    return false;
                                });
                        
                                $('div.select div.body ul li').click(function() {
                                    selectOption(this);
                                    return false;
                                });
                        
                                $('div.select div.body').scroll(function() {
                                    var height = this.scrollHeight;
                                    var container_height = $('div.select div.body').height()
                        
                                    if ((height - container_height) - $('div.select div.body').scrollTop() <= 1) {
                                        $('div.select div.body').scrollTop(height - container_height - 1);
                                    }
                                });
                        
                                $('div.select div.body div.form').click(function() {
                                    return false;
                                });
                        
                                $('div.select div.body div.form input[type="submit"]').click(function() {
                                    var name = $('div.select input[type="text"]').val();
                                    var cat = $("#cat").val();
                                    $.ajax({
                                        type: 'POST',
                                        url: '{/literal}{$baseurl}{literal}/createboard',
                                        data: 'name='+name+'&cat='+cat
                                    }).done(function(data) {
                                        $('div.select div.body div.form div.errors').html('');
                                        
                                        var data_int = parseInt(data);
                        
                                        if (data_int) {
                                            $('div.select div.body div.form input[type="text"]').val('')
                                            $('div.select div.body ul').append('<li name="'+data_int+'" class="selected">'+name+'</li>');
                        
                                            var object = $('div.select div.body ul li[name="'+data_int+'"]');
                        
                                            object.click(function() {
                                                selectOption(object);
                                                return false;
                                            });
                        
                                            selectOption(object);
                                            closeSelect();
                                        } else {
                                            $('div.select div.body div.form div.errors').append(data);
                                        }
                                    });
                                });
                        
                                document.onclick = closeSelect;
                            }
                        
                            function selectOption(object) {
                                var parent = $(object).parent();
                                
                                $(object).find('img').hide();
                                parent.parent().toggleClass('invisibile');
                                parent.parent().parent().find('div.caption').html($(object).html()).removeClass('active');
                                parent.find('li').removeClass('selected');
                                $('#board_id').val($(object).attr('name'));
                        
                                $(object).addClass('selected');
                            }
                        
                            function closeSelect() {
                                $('div.select div.body').addClass('invisibile');
                                $('div.select div.caption').removeClass('active');
                            }
                            
                            function theiload() {
                                initSelect();
                                
                                $('#thebname').focus(function() {
                                    if ($(this).val() == "{/literal}{$lang82}{literal}") {
                                        $(this).val('');
                                    }
                                });
                                $('#thebname').blur(function() {
                                    if ($(this).val() == '') {
                                        $(this).val("{/literal}{$lang82}{literal}");
                                    }
                                });
                            };
                        </script>  
                        {/literal}       
                    </div>
                </li>
                <li>    
                    <div class="Right"><textarea name="comment">{$pins.ptitle|stripslashes}</textarea></div>
                </li>
            </ul>
            <div class="Submit"><input type="submit" value="{$lang17}" class="green_submit" /></div>
            <div class="cl"></div>
            <div style="padding-bottom:15px;"></div>
            <input type="hidden" name="PID" value="{$pins.PID}" />
            <input type="hidden" name="OID" value="{$pins.OID}" />
            <input type="hidden" name="USERID" value="{$pins.USERID}" />
            <input type="hidden" name="OUSERID" value="{$pins.OUSERID}" />
        </form>
    </div>
</div>
<div id="afterit" style="display:none">
	<div style="margin:20px;" align="center">
    	<h2 id="succ1"></h2>
        <h2 id="succ2"></h2>
    </div>
</div>