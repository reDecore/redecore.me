<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head>
</head>

<body>

<div id="fb-root"></div>
{if $enable_fc eq "1" AND $smarty.session.FB eq "1"}
{literal}
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});	 
  FB.logout(function(response) {
  });
  window.location = "{/literal}{$baseurl}/logout{literal}";
</script>
{/literal}
{else}
{literal}
<script>
	window.location = "{/literal}{$baseurl}/logout{literal}"  
</script>
{/literal}
{/if}

</body>
</html>