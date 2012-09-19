<?php /* Smarty version Smarty-3.0.7, created on 2012-09-16 23:32:04
         compiled from "/home/redecore/public_html/themes/administrator/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:706238616505699b45f8100-10454235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff11e6c4584a05ff9dc201ccc2d1f26a1b2dc833' => 
    array (
      0 => '/home/redecore/public_html/themes/administrator/home.tpl',
      1 => 1347850789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '706238616505699b45f8100-10454235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/redecore/public_html/smarty/libs/plugins/modifier.truncate.php';
?>	<div class="middle" id="anchor-content">
    	<div id="page:main-container">
        	
            <div id="messages"></div>
            
            <div class="content-header">
                <table cellspacing="0">
                    <tr>
                        <td><h3 class="head-dashboard">Home</h3></td>
                    </tr>
                </table>
            </div>
            
			<div class="dashboard-container">
    			<p class="switcher">
                	<label for="store_switcher">Website Statistics</label>
				</p>
                  
				<table cellspacing="25" width="100%">
        		<tr>
            		<td>                                                
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Pin Statistics</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Reported Pins</td>
                                                <td class=" a-center last"><?php echo insert_get_total_v2(array(),$_smarty_tpl);?>
</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">New Pins</td>
                                                <td class=" a-center last"><?php echo insert_get_total_v4(array(),$_smarty_tpl);?>
</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">Total Pins</td>
                                                <td class=" a-center last"><?php echo insert_get_total_v5(array(),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Categories</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Total Categories</td>
                                                <td class=" a-center last"><?php echo insert_get_total_com(array('value' => 'var', 'table' => 'categories'),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Comments</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Total Comments</td>
                                                <td class=" a-center last"><?php echo insert_get_total_com(array('value' => 'var', 'table' => 'comments'),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                
            	</td>
                <td>                                                
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Boards</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Total Boards</td>
                                                <td class=" a-center last"><?php echo insert_get_total_com(array('value' => 'var', 'table' => 'boards'),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Invitations</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Total Requests</td>
                                                <td class=" a-center last"><?php echo insert_get_total_com(array('value' => 'var', 'table' => 'invites'),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Advertisement Statistics</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Total Ads</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Standard Advertisements</td>
                                                <td class=" a-center last"><?php echo insert_get_total_com(array('value' => 'var', 'table' => 'advertisements'),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Member Statistics</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Summary</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Results</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Total Members</td>
                                                <td class=" a-center last"><?php echo insert_get_total_m3(array(),$_smarty_tpl);?>
</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                
            	</td>
            	<td>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Last 10 Members</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Username</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">E-Mail Address</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('results')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <tr>
                                            	<td class=" "><?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('results')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']),20,"...",true);?>
</td>
                                                <td class=" a-center last"><?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('results')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email']),50,"...",true);?>
</td>
                                        	</tr>
											<?php endfor; endif; ?>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>

            </td>
        </tr>
    </table>
</div>
                        </div>
        </div>