<div class="FixedContainer" style="margin-top: {if $smarty.session.USERID eq ""}150{else}70{/if}px;">
	{include file='bit_orange2.tpl'}  
    
    
    {if $smarty.session.USERID ne ""}
        {if $smarty.session.USERID ne $pins.USERID}
        {literal}
        <script language="javascript" type="text/javascript">
        function ATF(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/fav.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function RFF(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/fav2.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function ATB(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/favb.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function RFB(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/favb2.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function ATL(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/like.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function RFL(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/like2.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        </script>
        {/literal}
        {insert name=is_folm assign=isfolm USERID=$pins.USERID}
        {else}
        {literal}
        <script language="javascript" type="text/javascript">
        function ATL(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/like.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        function RFL(id,nhide,nshow) {
            $('#'+nhide).addClass('hidden');
            $.post("{/literal}{$baseurl}/like2.php{literal}",{"id":id},function(html) {
                $('#'+nshow).removeClass('hidden');
            });
        }
        </script>
        {/literal}
        {/if}
    {/if}
                    
                    
                      
    <div class="CloseupLeft">
        <div class="sysBoardItemContainer pin pinBoard  ">
            <h3><a href="{$baseurl}/{$pins.username|stripslashes}/{insert name=return_seo_bname value=a assign=ibname bname=$pins.bname}{$ibname|stripslashes}">{$pins.bname|stripslashes}</a></h3>
            {if $bp|@count GT "0"}
            <a href="{$baseurl}/{$pins.username|stripslashes}/{$ibname|stripslashes}" class="link">
            {section name=i loop=$bp}
            <img src="{$purl}/t/t-{$bp[i].pic}" alt="{$bp[i].ptitle|stripslashes}" />
            {/section}
            </a>
            {/if}
            <div style="padding: 0 15px 10px;text-align: center;display: block;margin:0;margin-bottom:10px">
            	<div style="float:right;color:#AD9C9C;"><strong>{$pins.pincount}</strong> {$lang173}</div>
            </div>
            <div class="followBoard">
            	{if $smarty.session.USERID ne ""}
                    {if $smarty.session.USERID ne $pins.USERID}
                    {insert name=is_folb assign=isfolb BID=$pins.BID}
                    <div class="sysBoardFollowButton {if $isfolb eq "1"}hidden{/if}" id="BADD{$pins.BID}" onclick="ATB('{$pins.BID}', 'BADD{$pins.BID}', 'BREM{$pins.BID}');"><a class="Button12 Button OrangeButton" href="javascript:void(0)"><strong>{$lang130}</strong><span></span></a></div>
                    <div class="sysBoardUnFollowButton {if $isfolb eq "0"}hidden{/if}" id="BREM{$pins.BID}" onclick="RFB('{$pins.BID}', 'BREM{$pins.BID}', 'BADD{$pins.BID}');"><a class="Button12 Button OrangeButton disabled" href="javascript:void(0)"><strong>{$lang131}</strong><span></span></a></div>
                    {/if}
                {else}
                <div class="sysBoardFollowButton "><a class="Button12 Button OrangeButton" href="{$baseurl}/login"><strong>{$lang130}</strong><span></span></a></div>
                {/if} 
            </div>	    	
        </div>  
        
        <div class="sysBoardItemContainer pin pinBoard" style="margin-top:15px;">
            <h3>{$lang126}</h3>
            {if $op|@count GT "0"}
            <a href="{$baseurl}/{$o_name|stripslashes}" class="link">
            {section name=i loop=$op}
            <img src="{$purl}/t/t-{$op[i].pic}" alt="{$op[i].ptitle|stripslashes}" />
            {/section}
            </a>
            {/if}
            <div style="padding: 0 15px 10px;text-align: center;display: block;margin:0;margin-bottom:10px">
            	<div style="color:#AD9C9C; alignment-baseline:middle"><a href="{$baseurl}/{$o_name|stripslashes}" style="font-size:16px">{if $use_username eq "1"}{$o_name|stripslashes|mb_truncate:50:"...":'UTF-8'}{else}{$o_fname|stripslashes}{/if}</a></div>
            </div>
            <div class="followBoard">
            	{if $smarty.session.USERID ne ""}
                    {if $smarty.session.USERID ne $pins.USERID}
                    {if $isfolm GTE "0"}
                    <div class="sysBoardFollowAllButton {if $isfolm eq "1"}hidden{/if}" id="SFADD{$pins.USERID}" onclick="ATF('{$pins.USERID}', 'SFADD{$pins.USERID}', 'SFREM{$pins.USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div>
                    <div class="sysBoardUnFollowAllButton {if $isfolm eq "0"}hidden{/if}" id="SFREM{$pins.USERID}" onclick="RFF('{$pins.USERID}', 'SFREM{$pins.USERID}', 'SFADD{$pins.USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton disabled"><strong>{$lang131}</strong><span></span></a></div>
                    {/if}
                    {/if}
                {else}
                <div class="sysBoardFollowAllButton "><a href="{$baseurl}/login" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div>
                {/if}
            </div>	    	
        </div>
        {insert name=get_google_url value=a assign=geeurl key=$pins.pkey short=$posts[i].short}
        {if $csource ne ""}
        <div class="pin pinBoard WhiteContainer domainPins">
            <h3>{$lang127} <a href="{$baseurl}/source/{$csource|stripslashes}" class="colorless">{$csource|stripslashes}</a></h3>
            <div class="img_list">
            	{if $sim|@count GT "0"}
                {section name=i loop=$sim}
                <a href="{$baseurl}/source/{$csource|stripslashes}"><img src="{$purl}/t/t-{$sim[i].pic}"/></a>
                {/section}
                {/if}
            </div>
        </div>
        {/if}
    </div>    
    
	<div class="CloseupRight2">
        <div class="WhiteContainer clearfix sysPinItemContainer" owner_id="{$pins.USERID}" pin_id="{$pins.pkey}">
            <div class="PinPinner">
                {if $smarty.session.USERID ne ""}
                    {if $smarty.session.USERID ne $pins.USERID}
                    <div style="float:right">
                    <div class="sysBoardFollowAllButton {if $isfolm eq "1"}hidden{/if}" id="FADD{$pins.USERID}" onclick="ATF('{$pins.USERID}', 'FADD{$pins.USERID}', 'FREM{$pins.USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div>            
                    <div class="sysBoardUnFollowAllButton {if $isfolm eq "0"}hidden{/if}" id="FREM{$pins.USERID}" onclick="RFF('{$pins.USERID}', 'FREM{$pins.USERID}', 'FADD{$pins.USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton disabled"><strong>{$lang131}</strong><span></span></a></div>
                    </div>
                    {/if}
                {else}
                <div style="float:right"><div class="sysBoardFollowAllButton "><a href="{$baseurl}/login" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div></div>
                {/if}            
                <a class="ImgLink PinnerImage" href="{$baseurl}/{$pins.username|stripslashes}"><img alt="{$pins.username|stripslashes|mb_truncate:50:"...":'UTF-8'}" src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=thepp profilepicture=$pins.profilepicture}{$thepp}" /></a>
                <p class="PinnerName"><a href="{$baseurl}/{$pins.username|stripslashes}" >{if $use_username eq "1"}{$pins.username|stripslashes|mb_truncate:50:"...":'UTF-8'}{else}{$pins.fname|stripslashes} {$pins.lname|stripslashes}{/if}</a>{if $repinfrom ne ""} {$lang111} <a href="{$baseurl}/{$repinfrom|stripslashes}" >{if $use_username eq "1"}{$repinfrom|stripslashes}{else}{$repinfrom2|stripslashes}{/if}</a>{/if}</p>
                {if $bname ne ""}
                <p class="colorless PinnerStats">{$lang120} {insert name=get_time_to_days_ago value=a assign=atime time=$pins.time_added}{$atime} {$lang225} <a href="{$baseurl}/{$pins.username|stripslashes}/{insert name=get_seo_bname value=a assign=rpbname bname=$bname}{$rpbname|stripslashes}">{$bname|stripslashes}</a></p>
                {elseif $pins.source ne ""}
                <p class="colorless PinnerStats">{$lang121} {insert name=get_time_to_days_ago value=a assign=atime time=$pins.time_added}{$atime} {$lang123} <a href="{$pins.source|stripslashes}" target="_blank" rel="nofollow">{$csource|stripslashes}</a></p>
                {else}
                <p class="colorless PinnerStats">{$lang122} {insert name=get_time_to_days_ago value=a assign=atime time=$pins.time_added}{$atime}</p>
                {/if}
            </div>
            <div class="PinActionButtons">
                <ul>
                    {if $smarty.session.USERID ne ""}
                    {insert name=is_fav assign=isfav PID=$pins.PID}
                    <li class="like-button">
                        <a href="javascript:void(0)" id="LADD{$pins.PID}" onclick="ATL('{$pins.PID}', 'LADD{$pins.PID}', 'LREM{$pins.PID}');" class="Button Button12 WhiteButton likebutton sysPinLikeButton {if $isfav eq "1"}hidden{/if}"><strong><em></em>{$lang132}</strong><span></span></a>
                        <a href="javascript:void(0)" id="LREM{$pins.PID}" onclick="RFL('{$pins.PID}', 'LREM{$pins.PID}', 'LADD{$pins.PID}');" class="Button Button12 WhiteButton disabled sysPinUnLikeButton {if $isfav eq "0"}hidden{/if}"><strong>{$lang133}</strong><span></span></a>
                    </li>
                    <li class="repin-button"><a href="javascript:void(0)" class="Button Button12 WhiteButton" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/pin_create_popup?id={/literal}{$pins.PID}{literal}', {id: 'sysPinCreatePopup', width: '600px'})"{/literal}><strong><em></em>{$lang107}</strong><span></span></a></li>
                    {else}
                    <li class="like-button">
                        <a href="{$baseurl}/login" class="Button Button12 WhiteButton likebutton sysPinLikeButton "><strong><em></em>{$lang132}</strong><span></span></a>
                    </li>
                    <li class="repin-button"><a href="{$baseurl}/login" class="Button Button12 WhiteButton"><strong><em></em>{$lang107}</strong><span></span></a></li>
                    {/if} 
                </ul>
            </div>
            <div class="ImgLink PinImage">
                {if $pins.youtube ne ""}
				<iframe title="scriptolution video player" width="640" height="390" src="http://www.youtube.com/embed/{$pins.youtube}?wmode=opaque&hl=en_US&fs=1" frameborder="0" allowfullscreen></iframe>
        		{elseif $pins.source ne ""}
            	<a target="_blank" rel="nofollow" title="{$pins.ptitle|stripslashes}" href="{$pins.source|stripslashes}"><img alt="{$pins.ptitle|stripslashes}" class="pinCloseupImage sysPinImg" src="{$purl}/t/{$pins.pic}"></a>
                {else}
                {literal}
                <script type="text/javascript">
                function fancyload() {
                    $("A.sysPinPhotoOriginal").fancybox();
                };
                </script>
                {/literal}
                <a title="{$pins.ptitle|stripslashes}" href="{$purl}/{$pins.pic}" class="sysPinPhotoOriginal"><img alt="{$pins.ptitle|stripslashes}" class="pinCloseupImage sysPinImg" src="{$purl}/t/{$pins.pic}" onload="fancyload();"></a>
                {/if}
            </div>
            <center>
        	{insert name=get_advertisement AID=1}
        	</center>
            <div class="PinCaption">
                <span class="sysPinDescr">{$pins.ptitle|stripslashes}</span>
            </div>
            
            <div class="PinSocials clearfix addthis_toolbox addthis_default_style ">
                {literal}
                <a href="javascript:void(0)" style="float:right;" onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/report_popup?id={/literal}{$pins.PID}{literal}', {id: 'sysComplaintPopup'})" class="Button Button11 WhiteButton"><strong>{/literal}{$lang140}{literal}</strong><span></span></a>
                {/literal}            
                {literal}
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId={/literal}{$FACEBOOK_APP_ID}{literal}";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                {/literal}
                <iframe src="//www.facebook.com/plugins/like.php?href={$baseurl}/pin/{$pins.pkey}&amp;send=false&amp;layout=standard&amp;width=350&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80&amp;appId={$FACEBOOK_APP_ID}" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:80px;" allowTransparency="true"></iframe>  
                <a href="javascript:void(0)" style="float:right; padding-right:10px;" onclick="$('#scriptolution_embed').toggle();" class="Button Button11 WhiteButton"><strong>{$lang481}</strong><span></span></a>
                <div style="float:right; padding-right:10px;">
                <a href="http://twitter.com/share" class="twitter-share-button" data-url="{$baseurl}/pin/{$pins.pkey}" data-via="{$twitter}" data-text="{$pins.ptitle|stripslashes}" data-count="none">Tweet</a>
                <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                <g:plusone size="medium" count="false" href="{$geeurl}"></g:plusone>
                </div> 
                <div id="scriptolution_embed" style="display:none;">
                <input type="text" value="&lt;a href=&quot;{$baseurl}/pin/{$pins.pkey}&quot;&gt;&lt;img src=&quot;{$purl}/t/{$pins.pic}&quot; /&gt;&lt;/a&gt;" style="width:98%" onClick="this.select();" />
                </div>  
            </div>
            {if $smarty.session.USERID ne ""}
            {insert name=get_member_profilepicture value=var assign=compp profilepicture=$smarty.session.PP}
            {literal}
            <script type="text/javascript">
            function mycomsubmit()
            {
                var form = $('#comform');
            
                $.ajax({
                    url: '{/literal}{$baseurl}{literal}/com_sub.php',
                    type: 'post',
                    beforeSend: function()
                    {
                        $('#comerrors').html('');
                        form.find('input[type=submit]').attr('disabled', 'disabled');
                    },
                    success: function(r)
                    {
                        if (r.success == true) 
                        {
                            $("#PinAddComment").hide();
                            $('#newcomdata').html(r.m1);
                            $("#newcomment").show();
                            $("#comyes").show();
                        } 
                        else 
                        {
                            if (r.msg) 
                            {
                                $('#comerrors').html(r.msg);
                            }
                        }
                        form.find('input[type=submit]').removeAttr('disabled');
                    },
                    cache: false,
                    data: form.serializeArray(),
                    dataType: 'json'
                });
            
                return false;
            }
            function DELCOM(id,nhide) {
                $('#'+nhide).hide();
                $.post("{/literal}{$baseurl}/delcom.php{literal}",{"id":id},function(html) {
                });
            }
            function DELCOMO(id,nhide) {
                $('#'+nhide).hide();
                $.post("{/literal}{$baseurl}/delcomo.php{literal}",{"id":id},function(html) {
                });
            }
            </script>
            {/literal}   
            {/if}
            
            <div class="sysPinCmntList_Full PinComments">        
                {section name=i loop=$com}
                {insert name=get_member_profilepicture value=var assign=comupic profilepicture=$com[i].profilepicture}
                <div class="sysPinCmntItemContainer comment" id="DCOM{$com[i].COMID}">
                    {if $smarty.session.USERID eq $com[i].USERID}
                    <a href="javascript:void(0)" onclick="DELCOM('{$com[i].COMID}', 'DCOM{$com[i].COMID}');" class="DeleteComment floatRight tipsyHover sysPinCmntDelButton" title="{$lang224}">X</a>
                    {elseif $smarty.session.USERID eq $pins.USERID}
                    <a href="javascript:void(0)" onclick="DELCOMO('{$com[i].COMID}', 'DCOM{$com[i].COMID}');" class="DeleteComment floatRight tipsyHover sysPinCmntDelButton" title="{$lang224}">X</a>
                    {/if}
                    <a class="CommenterImage" href="{$baseurl}/{$com[i].username|stripslashes}"><img alt="{$com[i].username|stripslashes}" src="{$murl}/thumbs/{$comupic}"></a>
                    <p class="CommenterMeta"><a class="CommenterName" href="{$baseurl}/{$com[i].username|stripslashes}">{if $use_username eq "1"}{$com[i].username|stripslashes|mb_truncate:50:"...":'UTF-8'}{else}{$com[i].fname|stripslashes} {$com[i].lname|stripslashes}{/if}</a> <span style="font-size:smaller;color: #AD9C9C;">{insert name=get_time_to_days_ago value=a assign=comtime time=$com[i].time_added}{$comtime}</span><br/>{$com[i].comment|stripslashes}</p>
                    <div class="cl"></div>
                </div>
                {/section}
                <div id="newcomment" style="display:none;">
                    <div class="sysPinCmntItemContainer comment">
                        <a class="CommenterImage" href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}"><img alt="{$smarty.session.USERNAME|stripslashes}" src="{$murl}/thumbs/{$compp}"></a>
                        <p class="CommenterMeta"><a class="CommenterName" href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}">{if $use_username eq "1"}{$smarty.session.USERNAME|stripslashes}{else}{$smarty.session.FNAME|stripslashes} {$smarty.session.LNAME|stripslashes}{/if}</a> <br/><span id="newcomdata"></span></p>
                        <div class="cl"></div>
                    </div>
                </div>
                {if $smarty.session.USERID eq ""}
                <p class="nologged" style="padding-left:10px; padding-top:15px;"><a style="font-size:16px" href="{$baseurl}/login">{$lang124}</a></p>
                {/if}
                <div style="padding-top:10px;"></div>
            </div>  
            {if $smarty.session.USERID ne ""}
            <div class="PinAddComment" id="PinAddComment">
                <div class="CommenterImage">
                    <img src="{$murl}/thumbs/{$compp}" />
                </div>
                <div class="InputContainer">
                    <form id="comform" method="post" onsubmit="return mycomsubmit()">
                        <textarea id="thecomment" name="thecomment" class="CloseupComment"></textarea>
                        <div id="comerrors" style="color:#cb0000; padding:5px;"></div>
                        <input type="submit" value="{$lang147}" class="Button_input_a11" />
                        <input type="hidden" name="compid" value="{$pins.PID}" />
                    </form>
                </div>
            </div>
            <div id="comyes" style="display:none; color:#3C0; margin-left:50px; padding-top:10px; font-size:12px;">{$lang139}</div>
            <div style="clear: both;">&nbsp;</div>
            {/if}                                 
            
            {if $rp|@count GT "0"}
            <div class="PinActivity">
                <h4>{$totalrp} {if $totalrp eq "1"}{$lang107}{else}{$lang128}{/if}</h4>
                {section name=i loop=$rp}                
                <div class="clearfix" style="padding: 0 0 5px 0;">
                    <a class="CommenterImage" href="{$baseurl}/{$rp[i].username|stripslashes}"><img alt="{$rp[i].username|stripslashes}" src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=mpp profilepicture=$rp[i].profilepicture}{$mpp}"></a>
                    <a class="CommenterName" href="{$baseurl}/{$rp[i].username|stripslashes}">{if $use_username eq "1"}{$rp[i].username|stripslashes}{else}{$rp[i].fname|stripslashes} {$rp[i].lname|stripslashes}{/if}</a>
                    {$lang100} <a href="{$baseurl}/{$rp[i].username|stripslashes}/{insert name=get_seo_bname value=a assign=mybname bname=$rp[i].bname}{$mybname|stripslashes}">{$rp[i].bname|stripslashes}</a>
                </div>
                {/section}
                {if $morerp GT "0"}
                <p class="PinMoreActivity"><strong>+{$morerp}</strong> {$lang129}</p>
                {/if}
            </div>
            {/if}
            {if $pl|@count GT "0"}
            <div class="PinActivity">
                <h4>{$totfav} {if $totfav eq "1"}{$lang132}{else}{$lang134}{/if}</h4>
                {section name=i loop=$pl}
                <a class="CommenterImage" href="{$baseurl}/{$pl[i].username|stripslashes}"><img alt="{$pl[i].username|stripslashes}" src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=mpp profilepicture=$pl[i].profilepicture}{$mpp}" /></a>
                {/section}
                {if $morefav GT "0"}
                <p class="PinMoreActivity"><strong>+{$morefav}</strong> {$lang135}</p>
                {/if}
            </div>    
            {/if}
        </div>
    </div>
	<script>
    {if $smarty.session.USERID ne ""}
    App.currentUser.id = {$smarty.session.USERID};
    {/if}
    {literal}
    Pin.init();
    });
    document.title=$('<title>{/literal}{$pins.ptitle|stripslashes} / {$site_name|stripslashes}{literal}<\/title>').text();
    </script>
    {/literal}
</div>

{include file='bit_goto.tpl'}