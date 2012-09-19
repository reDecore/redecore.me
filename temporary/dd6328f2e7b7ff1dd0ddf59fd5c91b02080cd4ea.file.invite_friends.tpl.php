<?php /* Smarty version Smarty-3.0.7, created on 2012-09-17 09:04:45
         compiled from "/home/redecore/public_html/themes/invite_friends.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134378575550571fedc5d374-77492019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd6328f2e7b7ff1dd0ddf59fd5c91b02080cd4ea' => 
    array (
      0 => '/home/redecore/public_html/themes/invite_friends.tpl',
      1 => 1347850762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134378575550571fedc5d374-77492019',
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
/invite_friends" class="selected">
					<span><?php echo $_smarty_tpl->getVariable('lang188')->value;?>
</span>
				</a>			
			</li>
		</ul>
	</div>
	<div class="AboutRight">
		<h1><?php echo $_smarty_tpl->getVariable('lang189')->value;?>
</h1>
		
        <?php $_template = new Smarty_Internal_Template('error.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        
        <form id="inviteforms" method="post" action="<?php echo $_smarty_tpl->getVariable('baseurl')->value;?>
/invite_friends">
        <div id="EmailAddresses" class="Form FancyForm floatLeft" style="width: 62%; margin-left:-42px;">
            <ul>
                <li>
                    <input type="text" class="email" tabindex="1" name="email1" />
                    <label><?php echo $_smarty_tpl->getVariable('lang190')->value;?>
</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="2" name="email2" />
                    <label><?php echo $_smarty_tpl->getVariable('lang191')->value;?>
</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="3" name="email3" />
                    <label><?php echo $_smarty_tpl->getVariable('lang192')->value;?>
</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="4" name="email4" />
                    <label><?php echo $_smarty_tpl->getVariable('lang193')->value;?>
</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <textarea name="message" style="min-height: 6.85em;" tabindex="5"></textarea>
                    <label><?php echo $_smarty_tpl->getVariable('lang194')->value;?>
 (<?php echo $_smarty_tpl->getVariable('lang195')->value;?>
):</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
            </ul>
        </div>
        
        <div class="clear message"></div>
        
        <div class="clear">
            <a href="#" id="SendInvites" class="Button OrangeButton Button18" tabindex="6"><strong><?php echo $_smarty_tpl->getVariable('lang196')->value;?>
</strong><span></span></a>
        </div>
        <input type="hidden" name="fpsub" value="1" />
		</form>


	</div>
</div>