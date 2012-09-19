<head>
<title>{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{if $metadescription ne ""}{$metadescription} - {/if}{$site_name}">
<meta name="keywords" content="{if $pagetitle ne ""}{$pagetitle},{/if}{if $metakeywords ne ""}{$metakeywords},{/if}{$site_name}">
<link rel="icon" href="{$baseurl}/favicon.ico" type="image/x-icon" />
<meta property="fb:app_id" content="{$FACEBOOK_APP_ID}"/>
<meta property="og:site_name" content="{$site_name}"/>
{if $pinpage eq "1" AND $pins.pic ne ""}
<meta property="og:image" content="{$purl}/t/{$pins.pic}"/>
{else}
<meta property="og:image" content="{$imageurl}/logo_190x190.jpg"/>
{/if}
<link href="{$baseurl}/js/jquery-ui/style/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/css/jquery/jcarousel/pin-create-img-picker.css" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/css/face/main.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if IE 7]> <link href="{$baseurl}/css/face/ie.css" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 8]> <link href="{$baseurl}/css/face/ie.css" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
<link href="{$baseurl}/css/jquery/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/js/jquery-ui/style/tipTip.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$baseurl}/js/jquery.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery-plugins/jquery.url.packed.js"></script>
<script type="text/javascript" src="{$baseurl}/js/app.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery-plugins/jquery.caret.1.02.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/nav.js"></script>
<script type="text/javascript" src="{$baseurl}/js/pin.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery-plugins/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery-plugins/jquery.tipTip.minified.js"></script>
<script type="text/javascript">var base_url = "{$baseurl}";</script>
<script type="text/javascript" src="{$baseurl}/js/custom.js"></script>
<script src="{$baseurl}/js/jquery.form.js"></script> 
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>