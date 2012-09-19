		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Boards</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="boards.php" id="isoft_group_1" name="group_1" title="Manage Boards" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Boards
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Board</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">ID </label></td>
                                                        <td class="value">
                                                        	{$board.BID}
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
                                                            <option value="{$listallcats[i].USERID}" {if $board.USERID eq $listallcats[i].USERID}selected{/if}>{$listallcats[i].username|stripslashes}</option>
                                                            {/section}
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[OWNER OF THE BOARD]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="bname">Board Name </label></td>
                                                        <td class="value">
                                                        	<input id="bname" name="bname" value="{$board.bname|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NAME OF THE BOARD]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="CATID">Category </label></td>
                                                        <td class="value">
                                                        	<select name="CATID" id="CATID">
                                                            {insert name=get_all_cats assign=listallcats}
                                                            {section name=i loop=$listallcats}
                                                            <option value="{$listallcats[i].CATID}" {if $board.CATID eq $listallcats[i].CATID}selected{/if}>{$listallcats[i].name|stripslashes}</option>
                                                            {/section}
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CATEGORY OF THE BOARD]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div> 
                                
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
                               <h3 class="icon-head head-products">Boards - Edit Board</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="boards_edit.php?BID={$smarty.request.BID}" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>