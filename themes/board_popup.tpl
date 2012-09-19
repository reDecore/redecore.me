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
    width: 570px;
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
<div class="modal" title="{$lang162}">
	<div class="header_popup lg">
		<a class="close" href="javascript:void(0)" onclick="$('#sysABoardPopup').dialog('close');"><strong>{$lang94}</strong><span></span></a>
		<h2>{$lang162}</h2>
		<div class="cl"></div>
	</div>
</div>
<div id="firstit" style="margin-top:20px;">
	<form action="{$baseurl}/createboard2" id="thePinForm" method="POST" class="Form PinForm">
        <input type="hidden" name="subpin" value="1" />
        <img src="{$imageurl}/blank.gif" onload="theiload();" />                  
        <ul>
        	<li>
            	<label style="width:25%">{$lang170}</label> <input name="thebname" type="text" style="width:350px;" />
            </li>
            <li>
            	<label style="width:25%">{$lang171}</label> 
                <select name="cat" id="cat" style="width:350px;">
                    {insert name=get_categories assign=c}
                    {section name=i loop=$c}
                    <option value="{$c[i].CATID|stripslashes}">{$c[i].name|stripslashes}</option>
                    {/section}
                </select>   
            </li>
        </ul>
    	<div id="results" class="error-field" style="padding-bottom:5px;"></div>
        <div class="Submit"><input type="submit" value="{$lang172}" class="green_submit" /></div>
        <div class="cl"></div>
        <div style="padding-bottom:15px;"></div>
    </form>
    
    {literal}
	<script type="text/javascript">
        function theiload() {
            
            var forme = $('#thePinForm');
            $('#thePinForm').ajaxForm({
                dataType:  'json',
                beforeSubmit: function() {
                    $('#results').html('');
                    forme.find('input[type=submit]').attr('disabled', 'disabled');
                },
                success: function(r) {
                    if (r.success == true) 
                    {
						var gotorul = r.m1;
                        window.location.href = gotorul;						
                    } 
                    else 
                    {
                        if (r.msg) 
                        {
                            $('#results').html(r.msg);
                        }
                    }
                    forme.find('input[type=submit]').removeAttr('disabled');
                }
            });

        };
    </script>  
    {/literal} 
</div>