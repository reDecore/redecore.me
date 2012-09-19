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
                                <div id="isoft_group_1_content" style="display:none;"></div>
    						</li>
                            
                            <li >
                                <a href="stories_reported.php" id="isoft_group_4" name="group_4" title="Reported Pins" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Reported Pins
                                    </span>
                                </a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_4_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Reported Pins</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">
                            	Showing {if $total gt 0}{$beginning} - {$ending} of {/if}{$total} Pins
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='stories_reported.php'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="120" />
                                <col   />
                                <col  width="75"  />
                                <col  width="100"  />
                                <col  width="50"  />
                                <col  width="275"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="stories_reported.php?page={$currentpage}&sortby=PID&sorthow={if $sortby eq "PID"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}" name="id" class="{if $sortby eq "PID"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="stories_reported.php?page={$currentpage}&sortby=story&sorthow={if $sortby eq "story"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}" name="story" class="{if $sortby eq "story"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Title</span></a></span></th>
                                        <th ><span class="nobr"><a href="stories_reported.php?page={$currentpage}&sortby=pip&sorthow={if $sortby eq "pip"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}" name="pip" class="{if $sortby eq "pip"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">IP</span></a></span></th>
                                        <th ><span class="nobr"><a href="stories_reported.php?page={$currentpage}&sortby=time&sorthow={if $sortby eq "time"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}" name="time" class="{if $sortby eq "time"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Report Date</span></a></span></th>
                                        <th ><span class="nobr"><a href="stories_reported.php?page={$currentpage}&sortby=active&sorthow={if $sortby eq "active"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}" name="active" class="{if $sortby eq "active"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Active</span></a></span></th>
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
                                        <th ><input type="text" name="story" id="story" value="{$story|stripslashes}" class="input-text no-changes"/></th>
                                        <th></th>
                                        <th></th>
                                        <th ><input type="checkbox" name="active" id="active" {if $active eq "on"}checked="checked"{/if}></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	{section name=i loop=$results}
                                    <tr id="" >
                                        <td class=" a-right ">{$results[i].PID}</td>
                                        <td class=" ">{$results[i].ptitle|stripslashes|truncate:300:"...":true}{if $results[i].youtube ne ""} <b>[VIDEO]</b>{/if} (<b>Reason: {$results[i].reason}</b>)<br /><img src="{$purl}/t/s-{$results[i].pic}" /></td>
                                        <td class=" "><a href="{$adminurl}/bans_ip_add.php?add={$results[i].pip}" target="_blank">{$results[i].pip}</a></td>
                                        <td class=" ">{$results[i].time|date_format:"%b %e, %Y"}</td>
                                        <td class=" ">
                                        	<form name="a{$results[i].RID}" id="a{$results[i].RID}" action="" method="post">
                                            <input type="hidden" name="APID" value="{$results[i].PID}" />
                                            <input type="hidden" name="asub" value="1" />
                                            <input type="hidden" name="aval" value="{$results[i].active}" />
                                            </form>
                                        	<a href="javascript: document.a{$results[i].RID}.submit();">{if $results[i].active eq "1"}Yes{else}No{/if}</a>
                                        </td>
                                        <td class=" last">
                                            <a href="stories_edit.php?PID={$results[i].PID}">Edit</a>&nbsp;|&nbsp;
                                            <a href="stories_reported.php?page={$currentpage}&sortby={$sortby}&sorthow={$sorthow}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&story={$story}&active={$active}{/if}&delete=1&PID={$results[i].PID}">Delete Pin</a>&nbsp;|&nbsp;
                                            <form name="r{$results[i].RID}" id="r{$results[i].RID}" action="" method="post">
                                            <input type="hidden" name="RRID" value="{$results[i].RID}" />
                                            <input type="hidden" name="rsub" value="1" />
                                            </form>
                                        	<a href="javascript: document.r{$results[i].RID}.submit();">Delete Report</a>
                                        </td>
                                	</tr>
                                    {/section}
                                    <tr>
                                    	<td colspan="6">
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
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_4', []);
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
                               <h3 class="icon-head head-products">Pins - Reported Pins</h3>
                            </div>
                            
                            <form action="stories_reported.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>