<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/bit_goto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185126032450569957e61b69-65870692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87b0f0aea657359ef987240238b1dc6f8ddfa4a8' => 
    array (
      0 => '/home/redecore/public_html/themes/bit_goto.tpl',
      1 => 1347850751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185126032450569957e61b69-65870692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
       
<script>
$(document).ready(function() {
    $("i.sysOutLink").each(function(){
        var target = $(this).attr("same-win") ? "_self" : "_blank";
        var link = $(this).attr("skip-protocol") ? "" : "http://";
        link = link + $(this).attr("title");
        if ($(this).attr("away")) {
            link = "<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/goto/?" + link;
        }

		$(this).replaceWith("<a target=\"" + target + "\" class='" + $(this).attr("class") +"'" +" href=\"" + link + "\">" +$(this).html() + "</a>");
    });
    $(".sysShowAfterLoading").show();
});
</script>
