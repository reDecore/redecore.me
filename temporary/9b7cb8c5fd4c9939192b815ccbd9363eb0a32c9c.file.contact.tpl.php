<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:58:49
         compiled from "/home/redecore/public_html/themes/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33763479650569ff94b7e76-49432691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b7cb8c5fd4c9939192b815ccbd9363eb0a32c9c' => 
    array (
      0 => '/home/redecore/public_html/themes/contact.tpl',
      1 => 1347850754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33763479650569ff94b7e76-49432691',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
$(document).ready(function() {
	$('#SendInvites').click(function() {
	  $('#inviteforms').submit();
	});
});
</script>

<div class="AboutContent">
	<div class="AboutLeft">
		<ul>
			<li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/about">
					<span><?php echo $_smarty_tpl->getVariable('lang208')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/pinit">
					<span><?php echo $_smarty_tpl->getVariable('lang209')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/rules">
					<span><?php echo $_smarty_tpl->getVariable('lang210')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/help">
					<span><?php echo $_smarty_tpl->getVariable('lang211')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/tos">
					<span><?php echo $_smarty_tpl->getVariable('lang212')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/privacy">
					<span><?php echo $_smarty_tpl->getVariable('lang213')->value;?>
</span>
				</a>			
			</li>
            <li>
				<a href="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/contact" class="selected">
					<span><?php echo $_smarty_tpl->getVariable('lang214')->value;?>
</span>
				</a>			
			</li>
		</ul>
	</div>
	<div class="AboutRight">
		<h1><?php echo $_smarty_tpl->getVariable('lang214')->value;?>
</h1>
		        
        <p>
            <?php $_smarty_tpl->assign('static' , insert_get_static (array('ID' => 5),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('static')->value);?>

        </p>
        
        <div class="clear message"></div>



	</div>
</div>
<?php $_template = new Smarty_Internal_Template('bit_goto.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>