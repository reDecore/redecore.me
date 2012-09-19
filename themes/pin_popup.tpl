{literal}
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
#ImagePicker .Arrows {background: #ddd9d9;}
#ImagePicker .picker {display: inline-block; margin-right: 8px; padding: 3px 10px 3px; font-size: 13px; border: 1px solid #e1dfdf;}
#ImagePicker .picker:hover {background: #eee; text-decoration: none;}
#ImagePicker .imagePickerNext {float: right; margin-right: 0;}
</style>
<script type="text/javascript">
function getimageSubmit()
{
	var iurl = $('#iurl').val();
	var form = $('#thePinForm2');

    $.ajax({
        url: '{/literal}{$baseurl}{literal}/get_images.php?url='+iurl,
        type: 'post',
        beforeSend: function()
        {
            $('#sysfoundError').html('');
            form.find('input[type=submit]').attr('disabled', 'disabled');
			$("#beforeit").hide();
        },
        success: function(r)
        {
            if (r.success == true) 
			{
				$('#cardata').html(r.m1);
				$("#beforeit").show();
				var icnt = r.m2;
				$('#tempimg').val('1');
				$('#sourceimg').val(r.m3);
				$('#totalimg').val(r.m2);
				$('#youtube1').val(r.m4);
				$('#youtube2').val(r.m5);
				
				if(icnt > 1)
				{
					$("#gonext").show();
				}
				if(icnt == 1)
				{
					$("#gonext").hide();
				}
				$("#goprev").hide();
				
				$('#sourceurl').val(iurl);
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
function showrightimage()
{
	var itotal = $('#totalimg').val();
	var icur = $('#tempimg').val();
	
	var i=1;
	for (i=1;i<itotal;i++)
	{
		$("#myimage"+i).hide();
	}
	icur++;
	$("#myimage"+icur).show();
	$('#tempimg').val(icur);
	var imgSrc = $("#myimage"+icur).attr("src");
	$('#sourceimg').val(imgSrc);
	$("#goprev").show();
	if(icur == itotal)
	{
		$("#gonext").hide();	
	}
}
function showleftimage()
{
	var itotal = $('#totalimg').val();
	var icur = $('#tempimg').val();
	
	var i=1;
	for (i=1;i<=itotal;i++)
	{
		$("#myimage"+i).hide();
	}
	icur--;
	$("#myimage"+icur).show();
	$('#tempimg').val(icur);
	var imgSrc = $("#myimage"+icur).attr("src");
	$('#sourceimg').val(imgSrc);
	$("#gonext").show();
	if(icur == 1)
	{
		$("#goprev").hide();
	}
}
function thepinSubmit()
{
    var form = $('#thePinForm');

    $.ajax({
        url: '{/literal}{$baseurl}{literal}/addpin.php',
        type: 'post',
        beforeSend: function()
        {
            $('#pinfoundError').html('');
            form.find('input[type=submit]').attr('disabled', 'disabled');
        },
        success: function(r)
        {
            if (r.success == true) 
			{
				$("#firstit").hide();
                $("#beforeit").hide();
				$('#succ1').html(r.m1);
				$('#succ2').html(r.m2);
				$("#afterit").show();
				function initTimeout() 
				{
					timeout = setTimeout(function() { $('#sysAPinPopup').dialog('close'); }, 3000);
				}
				initTimeout();
			} 
			else 
			{
                if (r.msg) 
				{
                    $('#pinfoundError').html(r.msg);
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
<div class="modal" title="{$lang85}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysAPinPopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang85}</h2>
		<div class="cl"></div>
	</div>
</div>
<div id="firstit" style="margin-top:20px;">
	<form id="thePinForm2" method="POST" onsubmit="return getimageSubmit();" class="Form PinForm">
    	<div style="float:left">
		<input name="iurl" id="iurl" type="text" placeholder="http://" style="width:350px; margin-right:10px;" />
        </div>
        <input type="submit" value="Find Images" class="green_submit" />
        <img src="{$imageurl}/blank.gif" onload="theiload();" />
        <div id="sysfoundError" class="error-field"></div>
	</form>
</div>

<div id="beforeit" style="display:none;">
    <div class="CloseupLeft" style="margin-left:10px;">        
        	<div class="ImagePicker" id="ImagePicker">
                <div class="Images pin jcarousel-clip">                    
                    <div class="thecarousel">
                        <ul id="cardata">
                        </ul>
                    </div>
                </div>
                <div class="Arrows">
                    <a href="javascript:void(0)" onclick="showrightimage();" class="imagePickerNext picker next" id="gonext">Next&nbsp;&rarr;<span class="imagePickerNextArrow"></span></a>
                    <a href="javascript:void(0)" onclick="showleftimage();" class="imagePickerPrevious picker prev" id="goprev">&larr;&nbsp;Prev<span class="imagePickerPreviousArrow"></span></a>
                </div>
			</div>    
    </div>
    <div class="CloseupRight">
        <form id="thePinForm" method="POST" onsubmit="return thepinSubmit()" class="Form PinForm">
        	<input type="hidden" name="tempimg" id="tempimg" value="" />
            <input type="hidden" name="totalimg" id="totalimg" value="" />
            <input type="hidden" name="sourceimg" id="sourceimg" value="" />
            <input type="hidden" name="sourceurl" id="sourceurl" value="" />
            <input type="hidden" name="subpin" value="1" />
            <input type="hidden" name="youtube1" id="youtube1" value="" />
            <input type="hidden" name="youtube2" id="youtube2" value="" />
            <div id="pinfoundError" class="error-field"></div>
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
                    <div class="Right"><textarea name="comment" placeholder="{$lang88}"></textarea></div>
                </li>
            </ul>
            <div class="Submit"><input type="submit" value="{$lang17}" class="green_submit" /></div>
            <div class="cl"></div>
            <div style="padding-bottom:15px;"></div>
        </form>
    </div>
</div>
<div id="afterit" style="display:none">
	<div style="margin:20px;" align="center">
    	<h2 id="succ1"></h2>
        <h2 id="succ2"></h2>
    </div>
</div>