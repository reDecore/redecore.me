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
#ov_addFromBookmarklet {
    text-align: center;
}

#ov_addFromBookmarklet div.header {
    padding: 15px 0;
    border-bottom: 1px solid #e8e8e8;
}

#ov_addFromBookmarklet div.info {
    margin-top: 10px;
}

#ov_addFromBookmarklet div.info, #ov_addFromBookmarklet div.info a {
    color: #000000;
    font-size: 14px;
}

#ov_addFromBookmarklet div.info a {
    font-weight: bold;
	font-size: 20px;
}

#ov_addFromBookmarklet div.info p {
    font-size: 20px;
    margin-bottom: 10px;
}

#ov_addFromBookmarklet div.buttons {
    width: 315px;
    margin: 10px auto 0 auto;
    overflow: hidden;
}

#ov_addFromBookmarklet div.buttons a {
    width: 120px;
    float: left;
}

#ov_addFromBookmarklet div.buttons a:first-child {
    margin-right: 10px;
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
    font-size: 14px;
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
    <div id="ov_addFromBookmarklet">
        <div class="success">
            <div class="header"><img src="{$imageurl}/logo.png" /></div>
            
            <div class="info">
            	<p>{$lang92} <a href="{$baseurl}/{$username|stripslashes}/{insert name=get_seo_bname value=a assign=board bname=$bname}{$board|stripslashes}" target="_blank">{$bname|stripslashes}</a></p>
            </div>
            
            <div class="buttons">
            	<a href="{$baseurl}/pin/{$PID}" target="_blank" class="button orange">{$lang93}</a>
            	<a href="" onclick="closedPin(); return false;" class="button orange">{$lang94}</a>
            </div>
        </div>
        <script type="text/javascript">
			var timeout;
			function closedPin() {
				window.close();
			}
			function initTimeout() {
				timeout = setTimeout(function() { window.close(); }, 3000);
			}
			initTimeout();
		</script>
    </div>
<div>
</body>
</html>  