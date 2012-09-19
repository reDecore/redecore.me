		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Settings</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="settings_general.php" id="isoft_group_1" name="group_1" title="Settings" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        General Settings
                                    </span>
        						</a>
                                
        						<div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">General Settings</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Website Name </label></td>
                                                        <td class="value">
                                                        	<input id="site_name" name="site_name" value="{$site_name}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUR WEBSITE NAME]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="short_name">Short Name </label></td>
                                                        <td class="value">
                                                        	<input id="short_name" name="short_name" value="{$short_name}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUR SHORTENED WEBSITE NAME]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="site_slogan">Website Slogan </label></td>
                                                        <td class="value">
                                                        	<input id="site_slogan" name="site_slogan" value="{$site_slogan}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUR WEBSITE SLOGAN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Website E-Mail </label></td>
                                                        <td class="value">
                                                            <input id="site_email" name="site_email" value="{$site_email}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[WHERE E-MAILS ARE SENT FROM]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                                                                        
                                                    <tr class="hidden">
                                                        <td class="label"><label for="enable_fc">Enable Facebook Connect? </label></td>
                                                        <td class="value">
                                                            <select id="enable_fc" name="enable_fc" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $enable_fc eq "1"}selected{/if}>Yes</option>
                											<option value="0" {if $enable_fc eq "0"}selected{/if}>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ALLOW USERS TO SIGN UP USING THEIR FACEBOOK ACCOUNT?]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                    
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Facebook Application ID </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" value="{$FACEBOOK_APP_ID}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[FACEBOOK APPLICATION ID YOU GOT WHEN YOU CREATED YOUR FACEBOOK APPLICATION]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Facebook Secret </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_SECRET" name="FACEBOOK_SECRET" value="{$FACEBOOK_SECRET}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[FACEBOOK APPLICATION SECRET YOU GOT WHEN YOU CREATED YOUR FACEBOOK APPLICATION]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="enable_tc">Enable Twitter Login? </label></td>
                                                        <td class="value">
                                                            <select id="enable_tc" name="enable_tc" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $enable_tc eq "1"}selected{/if}>Yes</option>
                											<option value="0" {if $enable_tc eq "0"}selected{/if}>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ALLOW USERS TO SIGN UP USING THEIR TWITTER ACCOUNT?]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                    
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="CONSUMER_KEY">Twitter Consumer key </label></td>
                                                        <td class="value">
                                                            <input id="CONSUMER_KEY" name="CONSUMER_KEY" value="{$CONSUMER_KEY}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TWITTER CONSUMER_KEY YOU GOT WHEN YOU CREATED YOUR TWITTER APPLICATION]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="CONSUMER_SECRET">Twitter Consumer secret </label></td>
                                                        <td class="value">
                                                            <input id="CONSUMER_SECRET" name="CONSUMER_SECRET" value="{$CONSUMER_SECRET}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TWITTER CONSUMER_SECRET YOU GOT WHEN YOU CREATED YOUR TWITTER APPLICATION]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="enable_gifts">Enable Gifts? </label></td>
                                                        <td class="value">
                                                            <select id="enable_gifts" name="enable_gifts" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $enable_gifts eq "1"}selected{/if}>Yes</option>
                											<option value="0" {if $enable_gifts eq "0"}selected{/if}>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ENABLE THE GIFTS SECTION?]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="invite_mode">Invite Mode </label></td>
                                                        <td class="value">
                                                            <select id="invite_mode" name="invite_mode" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $invite_mode eq "1"}selected{/if}>On</option>
                											<option value="0" {if $invite_mode eq "0"}selected{/if}>Off</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ENABLE THE GIFTS SECTION?]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="use_username">Show Usernames Instead Of Real Names? </label></td>
                                                        <td class="value">
                                                            <select id="use_username" name="use_username" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $use_username eq "1"}selected{/if}>Yes</option>
                											<option value="0" {if $use_username eq "0"}selected{/if}>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[SOME WEBSITES SUCH AS ADULT WEBSITES ARE BETTER OFF USING USERNAMES INSTEAD OF FIRST AND LAST NAMES FOR PUBLIC DISPLAY]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_view">Points Per Pin View </label></td>
                                                        <td class="value">
                                                            <input id="points_view" name="points_view" value="{$points_view}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF POINTS A PIN GETS WHEN IT IS VIEWED]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_com">Points Per Pin Comment </label></td>
                                                        <td class="value">
                                                            <input id="points_com" name="points_com" value="{$points_com}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF POINTS A PIN GETS WHEN IT IS COMMENTED ON]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_repin">Points Per RePin </label></td>
                                                        <td class="value">
                                                            <input id="points_repin" name="points_repin" value="{$points_repin}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF POINTS A PIN GETS WHEN IT IS REPINNED]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_like">Points Per Pin Like </label></td>
                                                        <td class="value">
                                                            <input id="points_like" name="points_like" value="{$points_like}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF POINTS A PIN GETS WHEN IT IS LIKES]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="twitter">Twitter </label></td>
                                                        <td class="value">
                                                            <input id="twitter" name="twitter" value="{$twitter}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUR TWITTER USERNAME]</td>
                                                        <td><small></small></td>
                                                    </tr>

                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
    						</li>
                            
                            <li >
                                <a href="settings_meta.php" id="isoft_group_9" name="group_9" title="Meta Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Meta Settings
                                    </span>
                                </a>
                                <div id="isoft_group_9_content" style="display:none;"></div>
                            </li>
                            
                            <li >
                                <a href="settings_static.php" id="isoft_group_11" name="group_11" title="Static Pages" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Static Pages
                                    </span>
                                </a>
                                <div id="isoft_group_11_content" style="display:none;"></div>
                            </li>
    
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>
                        
					</div>
                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">
                            {if $message ne "" OR $error ne ""}
                            	{include file="administrator/show_message.tpl"}
                            {/if}
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Settings - General Settings</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="settings_general.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>