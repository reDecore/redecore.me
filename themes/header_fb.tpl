<div id="loadme"></div>
{if $invite_mode ne "1"}
{if $enable_fc eq "1"}
<div id="fb-root"></div>
{literal}
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
  });	  
</script>
{/literal}
{/if}
{/if}