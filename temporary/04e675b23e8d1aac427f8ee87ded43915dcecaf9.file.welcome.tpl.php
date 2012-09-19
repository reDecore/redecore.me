<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 00:03:51
         compiled from "/home/redecore/public_html/themes/welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4617502105056a127157c85-66035664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04e675b23e8d1aac427f8ee87ded43915dcecaf9' => 
    array (
      0 => '/home/redecore/public_html/themes/welcome.tpl',
      1 => 1347850777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4617502105056a127157c85-66035664',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<style>
#container {s
    min-height: 500px;
}
#sp_welcome {
    overflow: hidden;
    width: 760px;
    margin: auto;
}

#sp_welcome div.categories {
    overflow: hidden;
    margin-top: 30px;
}

#sp_welcome div.categories div.item {
    margin: 0 6px 20px 6px;
    width: 114px;
    float: left;
}

#sp_welcome div.categories div.name {
    color: #000000;
    margin-left: 2px;
    margin-top: 5px;
    line-height: 15px;
    height: 25px;
    font-size: 11px;
}

#sp_welcome div.categories div.box {
    margin-top: 10px;
    width: 100px;
    height: 100px;
    background-color: #ffffff;
    cursor: pointer;
    border: 1px solid #e3ebdc;
    padding: 6px;
    position: relative;
}

#sp_welcome div.categories div.box div.cover {
    position: absolute;
    width: 100px;
    height: 100px;
    z-index: 9;
}

#sp_welcome div.categories div.box div.cover.active {
    background-image: url(<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/cat/welcome_category_selected.png);
}

#sp_welcome input[type="button"] {
    float: right;
    margin-top: 15px;
}

#sp_welcome div.friends {
    margin: 20px 0;
    text-align: center;
}

#sp_welcome div.friends img {
    border: 1px solid #e3ebdc;
    margin: 0 3px;
}

#sp_welcome div.suggested_users {
    margin-top: 20px;
    overflow: hidden;
}

#sp_welcome div.suggested_users div.item {
    float: left;
    width: 285px;
    height: 135px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e3ebdc;
    margin: 0 50px 15px 0;
}

#sp_welcome div.suggested_users div.item div.images {
    overflow: hidden;
}

#sp_welcome div.suggested_users div.item div.images div.user {
    float: left;
    width: 80px;
}

#sp_welcome div.suggested_users div.item div.images div.user div {
    width: 70px;
    height: 70px;
    padding: 5px;
    background-color: #ffffff;
    border: 1px solid #e3ebdc;
}

#sp_welcome div.suggested_users div.item div.images div.user div img {
    width: 70px;
    height: 70px;
}

#sp_welcome div.suggested_users div.item div.images div.pins {
    margin-left: 10px;
    float: left;
    width: 195px;
}

#sp_welcome div.suggested_users div.item div.images div.pins img {
    float: left;
    width: 35px;
    height: 35px;
    border: 1px solid #e3ebdc;
    margin: 0 0 8px 2px;
}

#sp_welcome div.suggested_users div.item div.info {
    margin-top: 5px;
    font-size: 14px;
}

#sp_welcome div.suggested_users div.item div.info b {
    color: #000000;
    font-weight: normal;
}

#sp_welcome div.suggested_users div.item div.info a {
    width: 50px;
    font-size: 11px;
    float: right;
}

#sp_welcome div.create_boards {
    margin-top: 20px;
    overflow: hidden;
}

#sp_welcome div.create_boards div.info {
    float: left;
    width: 250px;
}

#sp_welcome div.create_boards div.info p {
    margin-top: 15px;
    color: #000000;
    width: 215px;
    line-height: 19px;
}

#sp_welcome div.create_boards div.form {
    float: left;
    width: 450px;
}

#sp_welcome div.create_boards div.form div input[type="text"] {
    font-size: 16px;
    padding: 10px 15px;
    width: 250px;
    color: #000000;
    margin-bottom: 10px;
}

#sp_welcome div.create_boards div.form div a {
    color: #000000;
    margin-left: 15px;
}

#sp_welcome div.create_boards input[type="button"] {
    float: left;
    margin: 0 153px 0 0;
}

div.bg_loader {
    overflow: hidden;
    width: 0;
    height: 0;
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
	margin-right:260px;
}

.button:hover, input[type="submit"]:hover {
    text-decoration: none;
    background-color: #d3dac2;
    border: 1px solid #9ea886;
}

.button.grey_light {
    background-color: #cccccc;
    font-size: 12px;
    color: #ffffff;
    border: 1px solid #ababab;
    cursor: pointer;
}

.button.grey_light:hover {
    background-color: #c0c0c0;
}

.button.green {
    background-color: #5b9429;
    color: #ffffff;
    border: 1px solid #4a7d1e;
}

.button.green:hover {
    background-color: #73b33a;
}
</style>


<div id="container">

<h1 style="margin: 0 auto 28px; text-align: center; font-weight: 300;"><?php echo $_smarty_tpl->getVariable('lang29')->value;?>
</h1>

<div id="sp_welcome">
    <div class="categories">
    	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('c')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        <div id="category_<?php echo $_smarty_tpl->getVariable('c')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['CATID'];?>
" class="item">
        <div class="box">
        <div class="cover"></div>
        <img src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/cat/<?php echo $_smarty_tpl->getVariable('c')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['CATID'];?>
.jpg" />
        </div>
        <div class="name"><?php echo stripslashes($_smarty_tpl->getVariable('c')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name']);?>
</div>
        </div>
        <?php endfor; endif; ?>
    </div>

    <input type="button" id="next_button" class="button green" value="Next" />
    <form method="POST" action="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/welcome" target="_top">
    <input type="hidden" name="categories" value="" />
    </form>
    <div style="margin-bottom:100px;"></div>


<script type="text/javascript">
var num_selected_categories = 0;

$('#sp_welcome div.categories div.item div.box').click(function() {
var cover = $(this).find('div.cover');

if (cover.hasClass('active')) {
num_selected_categories--;
} else {
num_selected_categories++;
}

cover.toggleClass('active');

if (num_selected_categories > 0) {
$('#sp_welcome input[type="button"]').removeClass('grey').addClass('green');
} else {
$('#sp_welcome input[type="button"]').removeClass('green').addClass('grey');
}
});

$('#sp_welcome input[type="button"]').click(function() {
if (num_selected_categories < 1) {
return;
}

var selected_categories = '';

$('#sp_welcome div.categories div.item div.box div.cover').each(function(i) {
if ($(this).hasClass('active')) {
selected_categories += $(this).parent().parent().attr('id').split('category_')[1] + ',';
}
});

if (selected_categories != '') {
$('#sp_welcome input[type="hidden"]').val(selected_categories.substr(0, selected_categories.length-1));
$('#sp_welcome form').submit();
}
});

</script>


</div>

<div class="bg_loader">
<img src="<?php echo $_smarty_tpl->getVariable('imageurl')->value;?>
/cat/welcome_category_selected.png" />
</div>

</div>