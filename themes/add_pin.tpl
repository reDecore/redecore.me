<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<title>{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}</title>
<meta name="description" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{if $metadescription ne ""}{$metadescription} - {/if}{$site_name}">
<meta name="keywords" content="{if $pagetitle ne ""}{$pagetitle},{/if}{if $metakeywords ne ""}{$metakeywords},{/if}{$site_name}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
var base_url = '{$baseurl}/';
var base_link_url = '{$baseurl}/';
var likes = {};
var signed_request = '';
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/popup/jquery.domwindow.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/popup/jquery.pageless.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/popup/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/popup/app.min.js"></script>

{literal}
<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, textarea, input {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}
a {
        text-decoration: none;
}
a:hover {
        text-decoration: underline;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}

/* remember to define focus styles! */
:focus {
	outline: 0;
}

/* remember to highlight inserts somehow! */
ins {
	text-decoration: none;
}
del {
	text-decoration: line-through;
}

/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: collapse;
	border-spacing: 0;
}
body {
    overflow-x: hidden;
}

body, div, td, span, a, input, select, textarea {
    font-family: Tahoma, Arial, Verdana;
    font-size: 12px;
    color: #908686;
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
textarea {
    resize: none;
}
br.clear {
    clear: both;
}
div.error {
    color: #cb0000;
    margin: 5px 0 0 0;
}
.invisibile {
    visibility: hidden;
}
#DOMWindow {
    color: #efefef;
    margin: auto;
}

div.overlay div.header {
    overflow: hidden;
    background-color: #c8c8c8;
    -moz-border-top-right-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -khtml-border-top-right-radius: 10px;
    border-top-right-radius: 10px;
    -moz-border-top-left-radius: 10px;
    -webkit-border-top-left-radius: 10px;
    -khtml-border-top-left-radius: 10px;
    border-top-left-radius: 10px;
    border: 1px solid #e2e7e6;
    border-bottom: none;
}

div.overlay div.header div.name {
    float: left;
    color: #60605f;
    font-size: 24px;
    font-weight: bold;
    margin: 10px 15px;
    cursor: default;
}

div.overlay div.header div.close_window {
    float: right;
    width: 31px;
    height: 30px;
    background-image: url({/literal}{$imageurl}{literal}/closepin.png);
    cursor: pointer;
    margin: 7px 15px;
}

div.overlay div.header div.close_window:hover {
    background-position: 0 30px;
}

div.overlay > div.body {
    border: 1px solid #e2e7e6;
    border-top: none;
    background-color: #f4f4f4;
    padding: 12px;
}
#ov_addFromWeb div.select_image, #ov_addFromUpload div.select_image, #ov_repin div.select_image {
    overflow: hidden;
}

#ov_addFromWeb div.select_image div.images, #ov_addFromUpload div.select_image div.images, #ov_repin div.select_image div.images {
    width: 205px;
    float: left;
}

#ov_addFromWeb div.select_image div.details, #ov_addFromUpload div.select_image div.details, #ov_repin div.select_image div.details {
    width: 272px;
    float: left;
}

#ov_addFromWeb div.select_image div.details select, #ov_addFromUpload div.select_image div.details select, #ov_repin div.select_image div.details select {
    font-size: 14px;
    width: 272px;
    height: 30px;
    resize: none;
}

#ov_addFromWeb div.select_image div.details textarea, #ov_addFromUpload div.select_image div.details textarea, #ov_repin div.select_image div.details textarea {
    font-size: 14px;
    width: 260px;
    height: 70px;
    resize: none;
}
#ov_addFromUpload div.select_image #images_container img, #ov_repin div.select_image #images_container img {
    border: 1px solid #c8cfce;
    padding: 5px;
}

#ov_addFromUpload div.select_image div.details p, #ov_addFromUpload div.select_image div.details p, #ov_repin div.select_image div.details p {
    margin-bottom: 10px;
}

#ov_addFromWeb div.select_image div.details p input[type="checkbox"], #ov_addFromUpload div.select_image div.details p input[type="checkbox"], #ov_repin div.select_image div.details p input[type="checkbox"] {
    margin-left: 10px;
}
#ov_addFromUpload input[type="file"] {
    font-size: 16px;
}

#ov_addFromUpload input[type="submit"] {
    margin-top: 10px;
}

#ov_addFromUpload td {
    padding-bottom: 10px;
}

#ov_addFromUpload td.label {
    width: 145px;
}

#ov_addFromUpload label {
    font-size: 16px;
    margin-right: 30px;
}

#ov_addFromUpload td.label label {
    color: #5b9429;
    margin: 0;
}
div.select {
    padding: 0;
    margin-bottom: 10px;
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
    font-size: 14px;
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
    width: 270px;
    max-height: 140px;
    overflow: hidden;
    overflow-y: scroll;
}

div.select div.body ul li {
    padding: 8px 5px;
    cursor: pointer;
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
    width: 170px;
}

div.select div.body div.form input[type="submit"] {
    width: 60px;
    font-size: 12px;
    padding: 5px;
}
.button, input[type="submit"] {
    display: block;
    background-color: #e2e8d4;
    border: 1px solid #d0d6c2;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;
    padding: 8px 15px 8px 15px;
    font-size: 12px;
    font-weight: bold;
    color: #6d8c29;
    text-align: center;
    cursor: pointer;
}

.button.orange {
    background-color: #f7941e;
    color: #ffffff;
    border: 1px solid #f6851f;
}
.button.orange:hover {
    background-color: #f6851f;
}
.button:hover, input[type="submit"]:hover {
    text-decoration: none;
    background-color: #f6851f;
    border: 1px solid #f6851f;
}
</style>
{/literal}
</head>

<body>
<a name="top" style="position: absolute; top: -38px;"></a>

<div class="overlay">
    <div class="header">
    	<div class="name">{$lang85}</div>
    	<div class="close_window" onclick="window.close();"></div>
    </div>
    
    <div class="body">
        <div id="ov_addFromUpload">
            <div class="select_image">
                <div class="images">
                	<div id="images_container">
                	<img src="{$url}" style="max-width: 170px; max-height: 170px;" />
                	</div>
                </div>
                
                <div class="details">
                	{if $error ne ""}<div class="error" style="padding-bottom:5px;">{$error}</div>{/if}
                    <form method="post" action="{$baseurl}{$fullurl}">      
                    	<input type="hidden" name="pinsub" value="1" />                  
                        <input type="hidden" name="image_src" value="{$url}" />
                        <input type="hidden" name="sourceurl" value="{$sourceurl}" />
                        <input type="hidden" name="image_url" id="image_url" value="{$url}" />
                        
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
                                	<input type="text" value="{$lang82}" />
                                    <select name="cat" id="cat" style="width:182px;">
                                    	{insert name=get_categories assign=c}
                                        {section name=i loop=$c}
                                    	<option value="{$c[i].CATID|stripslashes}">{$c[i].name|stripslashes}</option>
                                        {/section}
                                    </select>
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
							
							$(function() {
								initSelect();
								
								$('div.select input[type="text"]').focus(function() {
									if ($(this).val() == "{/literal}{$lang82}{literal}") {
										$(this).val('');
									}
								});
						
								$('div.select input[type="text"]').blur(function() {
									if ($(this).val() == '') {
										$(this).val("{/literal}{$lang82}{literal}");
									}
								});
							});
						</script>  
                        {/literal}                      
                        <p>
                        	<textarea name="description">{if $title eq ""}{$lang83}{else}{$title|stripslashes}{/if}</textarea>
                        </p>
                        <p style="margin-top: 10px;">
                        	<input type="submit" name="add_pin" value="{$lang17}" class="button orange" />
                        </p>
                    </form>
                </div>
            </div>
            {literal}
            <script type="text/javascript">
				$(function () {
					$('div.details textarea').focus(function () {
						if ($(this).val() == '{/literal}{$lang83}{literal}') {
							$(this).val('');
						}
					});
					$('div.details textarea').blur(function () {
						if ($(this).val() == '') {
							$(this).val('{/literal}{$lang83}{literal}');
						}
					});
					$('div.details input[type="submit"]').click(function () {
						if ($('div.details textarea').val() == '{/literal}{$lang83}{literal}' || $('textarea').val() == '') {
							return false;
						}
					});
					$('form').submit(function () {
						$('input[name="add_pin"]').val('{/literal}{$lang84}{literal}...').addClass('button grey').click(function () {
							return false;
						});
					});
				});
			</script>
            {/literal}
        </div>
        {literal}
        <script type="text/javascript">
        parent.setWindowSize(false, 350);
        </script>
        {/literal}
    </div>
</div>
</body>
</html>  