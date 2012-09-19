	<div class="middle" id="anchor-content">
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
                                                <td class=" a-center last">{insert name=get_total_v2}</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">New Pins</td>
                                                <td class=" a-center last">{insert name=get_total_v4}</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">Total Pins</td>
                                                <td class=" a-center last">{insert name=get_total_v5}</td>
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
                                                <td class=" a-center last">{insert name=get_total_com value=var table=categories}</td>
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
                                                <td class=" a-center last">{insert name=get_total_com value=var table=comments}</td>
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
                                                <td class=" a-center last">{insert name=get_total_com value=var table=boards}</td>
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
                                                <td class=" a-center last">{insert name=get_total_com value=var table=invites}</td>
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
                                                <td class=" a-center last">{insert name=get_total_com value=var table=advertisements}</td>
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
                                                <td class=" a-center last">{insert name=get_total_m3}</td>
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
                                        	{section name=i loop=$results}
                                            <tr>
                                            	<td class=" ">{$results[i].username|stripslashes|truncate:20:"...":true}</td>
                                                <td class=" a-center last">{$results[i].email|stripslashes|truncate:50:"...":true}</td>
                                        	</tr>
											{/section}
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