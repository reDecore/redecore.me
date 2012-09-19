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
                                            <h4 class="icon-head head-edit-form fieldset-legend">Manage Boards</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">
                            	Showing {if $total gt 0}{$beginning} - {$ending} of {/if}{$total} Boards
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='boards.php'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col  width="200"  />
                                <col   />
                                <col  width="150"  />
                                <col  width="50"  />
                                <col  width="125"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                    
                                        <th ><span class="nobr"><a href="boards.php?page={$currentpage}&sortby=BID&sorthow={if $sortby eq "BID"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}" name="BID" class="{if $sortby eq "BID"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Board ID</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="boards.php?page={$currentpage}&sortby=cname&sorthow={if $sortby eq "cname"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}" name="cname" class="{if $sortby eq "cname"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Board Category</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="boards.php?page={$currentpage}&sortby=bname&sorthow={if $sortby eq "bname"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}" name="bname" class="{if $sortby eq "bname"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Board Name</span></a></span></th>                                        
                                        
                                        <th ><span class="nobr"><a href="boards.php?page={$currentpage}&sortby=username&sorthow={if $sortby eq "username"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}" name="username" class="{if $sortby eq "username"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Creator</span></a></span></th>
                                        
                                        <th ><span class="nobr"><a href="boards.php?page={$currentpage}&sortby=pincount&sorthow={if $sortby eq "pincount"}{if $sorthow eq "desc"}asc{else}desc{/if}{else}{$sorthow}{/if}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}" name="pincount" class="{if $sortby eq "pincount"}sort-arrow-{if $sorthow eq "desc"}desc{else}asc{/if}{else}not-sort{/if}"><span class="sort-title">Pin Count</span></a></span></th>
                                        
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
                                        <th ><input type="text" name="cname" id="cname" value="{$cname}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="bname" id="bname" value="{$bname|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="username" id="username" value="{$username|stripslashes}" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="pincount" id="pincount" value="{$pincount|stripslashes}" class="input-text no-changes"/></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	{section name=i loop=$results}
                                    <tr id="" >
                                        <td align="center">{$results[i].BID}</td>
                                        <td align="center">{$results[i].name|stripslashes}</td>
                                        <td class=" ">{$results[i].bname|stripslashes|truncate:80:"...":true}</td>
                                        <td class=" ">{$results[i].username|stripslashes|truncate:20:"...":true}</td>
                                        <td class=" ">{$results[i].pincount|stripslashes|truncate:50:"...":true}</td>
                                        <td class=" last">
                                        	<a href="boards_edit.php?BID={$results[i].BID}">Edit</a>&nbsp;|&nbsp;
                                        	<a href="boards.php?page={$currentpage}&sortby={$sortby}&sorthow={$sorthow}{if $search eq "1"}&fromid={$fromid}&toid={$toid}&cname={$cname}&bname={$bname}&pincount={$pincount}&username={$username}{/if}&delete=1&BID={$results[i].BID}">Delete</a>
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
                               <h3 class="icon-head head-products">Boards - Manage Boards</h3>
                            </div>
                            
                            <form action="boards.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>