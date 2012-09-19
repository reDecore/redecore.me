<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 09:59:27
         compiled from "/home/redecore/public_html/themes/rules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63210852650572cbf56d661-51756067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffe2f4ef246a69999b5496be59e7b8a8db0db6fe' => 
    array (
      0 => '/home/redecore/public_html/themes/rules.tpl',
      1 => 1347850773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63210852650572cbf56d661-51756067',
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
/rules" class="selected">
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
/contact">
					<span><?php echo $_smarty_tpl->getVariable('lang214')->value;?>
</span>
				</a>			
			</li>
		</ul>
	</div>
	<div class="AboutRight">
		<h1><?php echo $_smarty_tpl->getVariable('lang210')->value;?>
</h1>
		        
        <p>
            <?php $_smarty_tpl->assign('static' , insert_get_static (array('ID' => 4),$_smarty_tpl), true);?><?php echo stripslashes($_smarty_tpl->getVariable('static')->value);?>

        </p>
        
        <div class="clear message"></div>



	</div>
</div>
<?php $_template = new Smarty_Internal_Template('bit_goto.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>