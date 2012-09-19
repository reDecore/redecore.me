		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Pins</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="stories_manage.php" id="isoft_group_1" name="group_1" title="Manage Pins" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Pins
                                    </span>
        						</a>

                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Pin</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Pin ID </label></td>
                                                        <td class="value">
                                                        	{$story.PID}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="USERID">Owner </label></td>
                                                        <td class="value">
                                                        	<select name="USERID" id="USERID">
                                                            {insert name=get_all_users assign=listallcats}
                                                            {section name=i loop=$listallcats}
                                                            <option value="{$listallcats[i].USERID}" {if $story.USERID eq $listallcats[i].USERID}selected{/if}>{$listallcats[i].username|stripslashes}</option>
                                                            {/section}
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[OWNER OF THE PIN]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="ptitle">Title </label></td>
                                                        <td class="value">
                                                        	<input id="ptitle" name="ptitle" value="{$story.ptitle|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TITLE OF THE PIN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="orig">Origin </label></td>
                                                        <td class="value">
                                                        	<input id="orig" name="orig" value="{$story.orig|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ORIGINAL WEBSITE OF THE PIN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Source </label></td>
                                                        <td class="value">
                                                        	<input id="source" name="source" value="{$story.source|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SOURCE OF THE PIN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Date Added </label></td>
                                                        <td class="value">
                                                        	{$story.time_added|date_format:"%b %e, %Y"}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points">Points </label></td>
                                                        <td class="value">
                                                        	<input id="points" name="points" value="{$story.points}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF POINTS THE PIN HAS, USED FOR POPULARITY SORTING]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="viewcount">View Count </label></td>
                                                        <td class="value">
                                                        	<input id="viewcount" name="viewcount" value="{$story.viewcount}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF TIMES THE PIN WAS VIEWED]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Active </label></td>
                                                        <td class="value">
                                                        	<select name="active" id="active">
                                                            <option value="1" {if $story.active eq 1}selected{/if}>Yes</option>
                                                            <option value="0" {if $story.active eq 0}selected{/if}>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[PIN STATUS]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">IP Posted With </label></td>
                                                        <td class="value">
                                                        	<a href="{$adminurl}/bans_ip_add.php?add={$story.pip}" target="_blank">{$story.pip}</a>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                    	<td></td>
                                                        <td>
                                                        {if $story.youtube ne ""}
														<object width="640" height="385"><param name="movie" value="http://www.youtube.com/v/{$story.youtube}&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/{$story.youtube}&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="385"></embed></object>
        												{else}
                                                        <img src="{$purl}/t/s-{$story.pic}" />
                                                        {/if}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
 
    						</li>
                            
                            <li >
                                <a href="stories_reported.php" id="isoft_group_4" name="group_4" title="Reported Pins" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Reported Pins
                                    </span>
                                </a>
                                <div id="isoft_group_4_content" style="display:none;"></div>
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
                               <h3 class="icon-head head-products">Pins - Edit Pin</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="stories_edit.php?PID={$smarty.request.PID}" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>