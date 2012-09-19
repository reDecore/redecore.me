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
#sp_login {
    width: 760px;
    margin: auto;
    text-align: center;
}

#sp_login.minimal {
    width: 520px;
}

#sp_login p {
    font-size: 18px;
    color: #000000;
    margin-top: 35px;
}

#sp_login table {
    margin-top: 20px;
}

#sp_login td {
    text-align: left;
    padding: 5px 0;
}

#sp_login td input[type=text] {
    width: 200px;
}

#sp_login tr td:first-child {
    padding-right: 10px;
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
div.error {
    color: #cb0000;
    margin: 5px 0;
}

</style>
{/literal}
</head>

<body>
<a name="top" style="position: absolute; top: -38px;"></a>
<div id="sp_login" style="width: 500px; height: 225px; padding: 10px; background-color: #ffffff">
    <p style="margin-top: 0;">
    	{$lang76}
    </p>
    
    <form method="post" target="_parent">
    <input type="hidden" name="sublog" value="1" />  
    {if $error ne ""}
    <div class="error" style="margin-top: 15px;">{$error}</div>
    {/if}
    <table cellspacing="0" cellpadding="0" style="margin-left: 60px;">
        <tr>
            <td>{$lang8}:</td>
            <td><input type="text" name="email" value="{$email|stripslashes}" /></td>
        </tr>
        <tr>
        	<td>{$lang9}:</td>
	        <td><input type="password" name="password" /></td>
        </tr>
        <tr>
        	<td></td>
        	<td><input type="checkbox" name="l_remember_me" id="l_remember_me" checked="checked" value="1" /><label for="remember"> {$lang38}</label></td>
        </tr>
        <tr>
        	<td></td>
        
        	<td>
                <input type="submit" name="login" class="button orange" value="Login" style="float: left; margin-right: 5px;" /> <a href="https://www.facebook.com/dialog/permissions.request?app_id={$FACEBOOK_APP_ID}&display=page&next={$baseurl}/&response_type=code&fbconnect=1&perms=email,offline_access,publish_stream"><img src="{$imageurl}/fb_connect.gif" style="float: left; cursor: pointer;" /></a> <a href="{$baseurl}/oauth/redirect.php"><img src="{$imageurl}/tw_connect.png" style="float: right; padding-left:5px;" /></a>
                <br style="clear: both;" />
                <div style="margin-top: 20px; text-align: left;">
                <div><a href="{$baseurl}/{if $invite_mode eq "1"}invite{else}signup{/if}" target="_blank" style="font-weight: bold; color: #f7941e;">{$lang77}</a></div>
                <div style="margin-top: 5px;"><a href="{$baseurl}/lost" target="_blank" style="font-weight: bold; color: #f7941e;">{$lang78}</a></div>
                </div>
        	</td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>  