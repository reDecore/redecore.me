<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:30:31
         compiled from "/home/redecore/public_html/themes/header_scroll.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125981007050569957624b95-18538177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee091501124738dd909978ec0f88c130c956840b' => 
    array (
      0 => '/home/redecore/public_html/themes/header_scroll.tpl',
      1 => 1347850760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125981007050569957624b95-18538177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
$(document).ready(function()
{
    $("#ScrollToTop").click(function()
    {
        $(window).scrollTop(0);

        return false;
    });
    function scrollToTopCheck() {
        if ($(window).scrollTop() > 500) $("#ScrollToTop").show();
        else $("#ScrollToTop").hide();
    }
    $(window).scroll(scrollToTopCheck);
    scrollToTopCheck();
    // Fancy Form
    $(".FancyForm input[type=text], .FancyForm input[type=password], .FancyForm textarea").each(function() {
        if ($(this).val()) $(this).addClass("NotEmpty");
    }).change(function() {
        if ($(this).val()) $(this).addClass("NotEmpty");
        else  $(this).removeClass("NotEmpty");
    });
})
</script>
