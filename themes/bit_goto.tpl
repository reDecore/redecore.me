{literal}       
<script>
$(document).ready(function() {
    $("i.sysOutLink").each(function(){
        var target = $(this).attr("same-win") ? "_self" : "_blank";
        var link = $(this).attr("skip-protocol") ? "" : "http://";
        link = link + $(this).attr("title");
        if ($(this).attr("away")) {
            link = "{/literal}{$baseurl}{literal}/goto/?" + link;
        }

		$(this).replaceWith("<a target=\"" + target + "\" class='" + $(this).attr("class") +"'" +" href=\"" + link + "\">" +$(this).html() + "</a>");
    });
    $(".sysShowAfterLoading").show();
});
</script>
{/literal}