		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Comments</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="comments.php" id="isoft_group_1" name="group_1" title="Manage Comments" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Comments
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Manage Comments</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">
                            	Showing {if $total gt 0}{$beginning} - {$ending} of {/if}{$total} Comments
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='comments.php'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col  width="100"  />
                                <col  width="250"  />
                                <col  width="100"  />
                                <col   />
                                <col  width="100"  />
                                <col  width="125"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                    
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=COMID&sorthow={if $sortby eq "COMID"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="COMID" class="{if $sortby eq "COMID"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Comment ID</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=PID&sorthow={if $sortby eq "PID"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="PID" class="{if $sortby eq "PID"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Pin ID</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=story&sorthow={if $sortby eq "story"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="story" class="{if $sortby eq "story"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Pin Title</span></a></span></th>
                                        
                                        
                                        
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=username&sorthow={if $sortby eq "username"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="username" class="{if $sortby eq "username"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Poster</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=details&sorthow={if $sortby eq "details"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="details" class="{if $sortby eq "details"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Comment</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="comments.php?page={$currentpage}&sortby=time_added&sorthow={if $sortby eq "time_added"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}" name="time_added" class="{if $sortby eq "time_added"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Date Posted</span></a></span></th>
                                        
                                        <th  class=" no-link last"><span class="nobr">Action</span></th>
                                        
	                	            </tr>
	            	            	<tr class="filter">
                                        <th >
                                            <div class="range">
                                                <div class="range-line">
                                                    <span class="label">From:</span> 
                                                    <input type="text" name="fromid" id="fromid" value="{$fromid}" class="input-text no-changes"/>
                                                </div>
                                                <div class="range-line">
                                                    <span class="label">To : </span>
                                                    <input type="text" name="toid" id="toid" value="{$toid}" class="input-text no-changes"/>
                                                </div>
                                            </div>
                                        </th>
                                        <th ><input type="text" name="pid" id="pid" value="{$pid}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="story" id="story" value="{$story|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="username" id="username" value="{$username|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="details" id="details" value="{$details|stripslashes}" class="input-text no-changes"/></th>
                                        <th></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	{section name=i loop=$results}
                                    <tr id="" >
                                        <td align="center">{$results[i].COMID}</td>
                                        <td align="center">{$results[i].PID}</td>
                                        <td class=" ">{$results[i].ptitle|stripslashes|truncate:80:"...":true}</td>
                                        <td class=" ">{$results[i].username|stripslashes|truncate:20:"...":true}</td>
                                        <td class=" ">{$results[i].comment|stripslashes|truncate:50:"...":true}</td>
                                        <td class=" ">{$results[i].time_added|date_format:"%b %e, %Y"}</td>
                                        <td class=" last">
                                        	<a href="comments_edit.php?COMID={$results[i].COMID}">Edit</a>&nbsp;|&nbsp;
                                        	<a href="comments.php?page={$currentpage}&sortby={$sortby}&sorthow={$sorthow}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&pid={$pid}&story={$story}&details={$details}&username={$username}{/if}&delete=1&COMID={$results[i].COMID}&PID={$results[i].PID}">Delete</a>
                                        </td>
                                	</tr>
                                    {/section}
                                    <tr>
                                    	<td colspan="7">
                                        {$pagelinks}
                                        </td>
                                    </tr>
	    	    	    		</tbody>
								</table>
                            </div>
                        </div>
					</div>
				</div>
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
                               <h3 class="icon-head head-products">Comments - Comments</h3>
                            </div>
                            
                            <form action="comments.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>