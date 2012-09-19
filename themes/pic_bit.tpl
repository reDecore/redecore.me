		{section name=i loop=$pins}
        <div class="sysPinItemContainer pin" owner_id="{$pins[i].USERID}" pin_id="{$pins[i].pkey}">
        {if $enable_gifts eq "1"}
        {if $pins[i].price ne "0.00" AND $pins[i].price ne ""}
        <strong class="price">${$pins[i].price}</strong>
        {/if}
        {/if}
            <div class="sysPinActionButtonsContainer actions hidden">
            	{if $smarty.session.USERID ne ""}
                <a href="javascript:void(0)" class="Button Button11 WhiteButton repin_link" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/pin_create_popup?id={/literal}{$pins[i].PID}{literal}', {id: 'sysPinCreatePopup', width: '600px'})"{/literal}><strong><em></em>{$lang107}</strong><span></span></a>
                
                {insert name=is_fav assign=favp PID=$pins[i].PID}
                <a href="javascript:void(0)" id="A_L{$pins[i].PID}" onclick="ADD_LIKE('{$pins[i].PID}', 'A_L{$pins[i].PID}', 'R_L{$pins[i].PID}');" class="Button Button11 WhiteButton likebutton sysPinLikeButton {if $favp eq "1"}hidden{/if}"><strong><em></em>{$lang132}</strong><span></span></a>
                <a href="javascript:void(0)" id="R_L{$pins[i].PID}" onclick="REM_LIKE('{$pins[i].PID}', 'R_L{$pins[i].PID}', 'A_L{$pins[i].PID}');" class="Button Button11 WhiteButton disabled sysPinUnLikeButton {if $favp eq "0"}hidden{/if}"><strong>{$lang133}</strong><span></span></a>
                
                <a href="javascript:void(0)" class="Button Button11 WhiteButton comment sysPinCommentButton"><strong><em></em>{$lang146}</strong><span></span></a>
                {else}
                <a href="{$baseurl}/login" class="Button Button11 WhiteButton repin_link"><strong><em></em>{$lang107}</strong><span></span></a>
                <a href="{$baseurl}/login" class="Button Button11 WhiteButton likebutton"><strong><em></em>{$lang132}</strong><span></span></a>
                <a href="{$baseurl}/login" class="Button Button11 WhiteButton comment"><strong><em></em>{$lang146}</strong><span></span></a>
                {/if}
            </div>
            <a href="/pin/{$pins[i].pkey}" class="ImgLink" onclick="return Nav.go(this, 'pin')">{if $enable_youtube eq "1"}{if $pins[i].youtube != ""}{include file='youtube_bit.tpl'}{/if}{/if}<img class="sysPinImg" src="{$purl}/t/s-{$pins[i].pic}" alt="{$pins[i].ptitle|stripslashes} - {$pins[i].bname|stripslashes}" style="max-width:192px;"/></a>
            <p class="stats colorless">
                <span class="LikesCount" title="Likes"><em></em><span class="sysPinLikeCounter_{$pins[i].pkey}">{insert name=favcount value=a assign=fnum PID=$pins[i].PID}{if $fnum eq "1"}<span id="chglikes{$pins[i].PID}">{$fnum}</span> {$lang148}{else}<span id="chglikes{$pins[i].PID}">{$fnum}</span> {$lang149}{/if}</span> &nbsp;&nbsp;</span>
                <span class="RepinsCount" title="Repins"><em></em><span class="sysPinRepinsCounter_{$pins[i].pkey}">{insert name=repincount value=a assign=rnum PID=$pins[i].PID}{if $rnum eq "1"}<span id="chgrps{$pins[i].PID}">{$rnum}</span> {$lang150}{else}<span id="chgrps{$pins[i].PID}">{$rnum}</span> {$lang151}{/if}</span>&nbsp;&nbsp;</span>
            </p>
            <p class="description sysPinDescr">{$pins[i].ptitle|stripslashes|mb_truncate:100:"...":'UTF-8'}</p>
            <div class="convo attribution clearfix">
                <a href="{$baseurl}/{$pins[i].username|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=pinpp profilepicture=$pins[i].profilepicture}{$pinpp}" alt="{$pins[i].username|stripslashes}" /></a>
                <p>
                    <a href="{$baseurl}/{$pins[i].username|stripslashes}" >{if $use_username eq "1"}{$pins[i].username|stripslashes|mb_truncate:50:"...":'UTF-8'}{else}{$pins[i].fname|stripslashes} {$pins[i].lname|stripslashes}{/if}</a> {$lang100} <a href="{$baseurl}/{$pins[i].username|stripslashes}/{insert name=get_seo_bname value=a assign=bname bname=$pins[i].bname}{$bname|stripslashes}" title="{$pins[i].bname|stripslashes}">{$pins[i].bname|stripslashes|mb_truncate:100:"...":'UTF-8'}</a>
                </p>
            </div>
            {insert name=get_comments value=a assign=pcom PID=$pins[i].PID}
            <div class="sysPinCmntContainer">            	
                <div class="comments colormuted">
                    <div class="sysPinCmntList">
                    	{section name=j loop=$pcom step=-1}
                        <div class="comment convo clearfix sysPinCmntItemContainer">
                            <a href="{$baseurl}/{$pcom[j].username|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=pincompp profilepicture=$pcom[j].profilepicture}{$pincompp}" alt="{$pcom[j].username|stripslashes}" /></a>
                            <p>
                                <a href="{$baseurl}/{$pcom[j].username|stripslashes}">{if $use_username eq "1"}{$pcom[j].username|stripslashes|mb_truncate:50:"...":'UTF-8'}{else}{$pcom[j].fname|stripslashes} {$pcom[j].lname|stripslashes}{/if}</a>
                                <div class="sysPinCmntItemText" onclick="$(this).html($('#{$pcom[j].COMID}-FullComment').html());">{$pcom[j].comment|stripslashes|mb_truncate:50:"...":'UTF-8'}</div>
                                <div class="sysPinCmntItemText" style="display:none" id="{$pcom[j].COMID}-FullComment">{$pcom[j].comment|stripslashes}</div>
                            </p>
                        </div>	
                        {/section}
                        {if $smarty.session.USERID ne ""}
                        {insert name=get_member_profilepicture value=var assign=sesspp profilepicture=$smarty.session.PP}
                        <div class="comment convo clearfix sysPinCmntItemContainer" id="show_new_com_{$pins[i].PID}" style="display:none">
                            <a href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{$sesspp}" alt="{$smarty.session.USERNAME|stripslashes}" /></a>
                            <p>
                                <a href="{$smarty.session.USERNAME|stripslashes}">{if $use_username eq "1"}{$smarty.session.USERNAME|stripslashes}{else}{$smarty.session.FNAME|stripslashes} {$smarty.session.LNAME|stripslashes}{/if}</a>
                                <div id="atcom{$pins[i].PID}" class="sysPinCmntItemText"></div>
                            </p>
                        </div>
                        {/if}
                    </div>
                    {insert name=get_total_comments value=a assign=ptcom PID=$pins[i].PID}
                    {if $ptcom GT "5"}
                    <div class="all_comms sysPinCmntAllBtn" {if $smarty.session.USERID ne ""}style="border-top:0px;"{/if}><a href="/pin/{$pins[i].pkey}" class="all comment convo clearfix" onclick="return Nav.go(this, 'pin')">{$lang145} (<span class="sysCmtAllCount">{$ptcom}</span>)</a></div>
                    {/if}
                    {if $smarty.session.USERID ne ""}
                    <div class="write  convo clearfix sysPinCmntItemContainer" {if $ptcom LT "5"} style="border-top:0px;"{/if} id="hide_new_com_{$pins[i].PID}">
                    <a href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{$sesspp}" alt="{$smarty.session.USERNAME|stripslashes}" /></a>
                    <form method="post" onsubmit="return SEND_COM('{$pins[i].PID}')" id="scform{$pins[i].PID}">
                        <textarea id="add_comment{$pins[i].PID}" name="smaddcom"></textarea>
                        <div id="scerr{$pins[i].PID}" style="color:#cb0000; padding-top:5px; float:right"></div>
                        <input type="submit" value="{$lang146}" style="float:right" />
                    </form>
                    </div>
                    {/if}
                </div>   
            </div>
        </div>
        {if $smarty.section.i.iteration eq "25"}
        {insert name=get_advertisement2 assign=myad AID=2}
        {if $myad ne ""}
        <div class="sysPinItemContainer pin">
        {$myad}
        </div>
        {/if}
        {/if}
        {/section}