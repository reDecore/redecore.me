		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Members</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="members_manage.php" id="isoft_group_1" name="group_1" title="Manage Members" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Members
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Manage Members</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">
                            	Showing {if $total gt 0}{$beginning} - {$ending} of {/if}{$total} Members
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='members_manage.php'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col  width="150"  />
                                <col   />
                                <col  width="50"  />
                                <col  width="100"  />
                                <col  width="50"  />
                                <col  width="125"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=USERID&sorthow={if $sortby eq "USERID"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="id" class="{if $sortby eq "USERID"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=username&sorthow={if $sortby eq "username"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="username" class="{if $sortby eq "username"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Username</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=email&sorthow={if $sortby eq "email"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="email" class="{if $sortby eq "email"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">E-Mail</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=verified&sorthow={if $sortby eq "verified"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="verified" class="{if $sortby eq "verified"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Verified</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=addtime&sorthow={if $sortby eq "addtime"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="addtime" class="{if $sortby eq "addtime"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Date Joined</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page={$currentpage}&sortby=status&sorthow={if $sortby eq "status"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}" name="status" class="{if $sortby eq "status"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Active</span></a></span></th>
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
                                        <th ><input type="text" name="username" id="username" value="{$username|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="email" id="email" value="{$email|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="checkbox" name="verified" id="verified" {if $verified eq "on"}checked="checked"{/if}></th>
                                        <th></th>
                                        <th ><input type="checkbox" name="status" id="status" {if $status eq "on"}checked="checked"{/if}></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	{section name=i loop=$results}
                                    <tr id="" >
                                        <td align="center">{$results[i].USERID}</td>
                                        <td class=" ">{$results[i].username|stripslashes|truncate:30:"...":true}</td>
                                        <td class=" ">{$results[i].email|stripslashes|truncate:150:"...":true}</td>
                                        <td class=" ">
                                        	<form name="v{$results[i].USERID}" id="v{$results[i].USERID}" action="" method="post">
                                            <input type="hidden" name="VUSERID" value="{$results[i].USERID}" />
                                            <input type="hidden" name="vsub" value="1" />
                                            <input type="hidden" name="vval" value="{$results[i].verified}" />
                                            </form>
                                        	<a href="javascript: document.v{$results[i].USERID}.submit();">{if $results[i].verified eq "1"}Yes{else}No{/if}</a>
                                        </td>
                                        <td class=" ">{$results[i].addtime|date_format:"%b %e, %Y"}</td>
                                        <td class=" ">
                                        	<form name="a{$results[i].USERID}" id="a{$results[i].USERID}" action="" method="post">
                                            <input type="hidden" name="AUSERID" value="{$results[i].USERID}" />
                                            <input type="hidden" name="asub" value="1" />
                                            <input type="hidden" name="aval" value="{$results[i].status}" />
                                            </form>
                                        	<a href="javascript: document.a{$results[i].USERID}.submit();">{if $results[i].status eq "1"}Yes{else}No{/if}</a>
                                        </td>
                                        <td class=" last"><a href="members_edit.php?USERID={$results[i].USERID}">Edit</a>&nbsp;|&nbsp;<a href="members_manage.php?page={$currentpage}&sortby={$sortby}&sorthow={$sorthow}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&username={$username}&email={$email}&verified={$verified}&familyfilter={$familyfilter}&featured={$featured}&status={$status}{/if}&delete=1&USERID={$results[i].USERID}">Delete</a></td>
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
                               <h3 class="icon-head head-products">Members - Manage Members</h3>
                            </div>
                            
                            <form action="members_manage.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>