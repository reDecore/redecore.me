<div class="ColumnContainer" style="margin-top: {if $smarty.session.USERID eq ""}160{else}80{/if}px;">
	{if $smarty.session.USERID eq ""}
	{literal}
	<script type="text/javascript">
    $(document).ready(function(){
    var navShowed = false, hideTo = null;
    $(".Nag").hover(
    function(){ if (hideTo) clearTimeout(hideTo); if (!navShowed) { $("#UnauthCallout").animate({marginTop: '90px'},'slow'); navShowed = true; } },
    function() { hideTo = setTimeout(function(){$("#UnauthCallout").animate({marginTop: '-42px'},'slow');}, 1000); }
    );
    });
    </script>
    {/literal}
    <div id="UnauthCallout" style="margin-top: -42px;">
        <div class="Nag">
            <div class="Sheet1 Sheet">
                <noindex>
                    <h2>{$lang96}:</h2>
                    <p class="bborder">
                        - {$lang97}<br/>
                        - {$lang98}<br/>
                        - {$lang99}<br/>
                    </p>
                    <div>
                    	{if $invite_mode eq "1"}
                    	<a class="Button OrangeButton Button18" href="{$baseurl}/invite"><strong>{$lang4} »</strong><span></span></a>
                        {else}
                        <a class="Button OrangeButton Button18" href="{$baseurl}/signup"><strong>{$lang41} »</strong><span></span></a>
                        {/if}
                        <a class="Button WhiteButton Button18" href="{$baseurl}/login"><strong>{$lang0}</strong><span></span></a>
                    </div>
                    <p>{$short_name} - {$site_slogan}<br>{$lang95}</p>
                </noindex>
            </div>
        	<div class="Sheet2 Sheet"></div>
        	<div class="Sheet3 Sheet"></div>
        </div>
        <div class="cl"></div>	
    </div>
    {/if}
    {if $smarty.session.USERID ne ""}
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
        </script>
        {/literal}
    {/if}
    <div class="BoardTitle">
		<h1>{$bname|stripslashes}</h1>
		<div class="desc"></div>
        <div class="BoardMeta sysBoardItemContainer">
            <div class="BoardUsers">
            	<a href="{$baseurl}/{$username|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=bpp profilepicture=$profilepicture}{$bpp}" alt="{$username|stripslashes}" title="{$username|stripslashes}"/></a>
            	<span class="BoardUserName"><a href="{$baseurl}/{$username|stripslashes}">{if $use_username eq "1"}{$username|stripslashes}{else}{$fname|stripslashes} {$lname|stripslashes}{/if}</a></span>
            </div>
            <div class="BoardStats">{$totalfols} <span>{$lang180}</span>, <strong>{$pincount}</strong> {$lang175}</div>
            <div class="BoardButton">                
                {if $smarty.session.USERID ne ""}
                    {if $smarty.session.USERID ne $USERID}
                    {insert name=is_folb assign=isfolb BID=$q}
                    <div class="sysBoardFollowButton {if $isfolb eq "1"}hidden{/if}" id="BADD{$q}" onclick="ATB('{$q}', 'BADD{$q}', 'BREM{$q}');"><a class="Button12 Button WhiteButton" href="javascript:void(0)"><strong>{$lang130}</strong><span></span></a></div>
                    <div class="sysBoardUnFollowButton {if $isfolb eq "0"}hidden{/if}" id="BREM{$q}" onclick="RFB('{$q}', 'BREM{$q}', 'BADD{$q}');"><a class="Button12 Button WhiteButton disabled" href="javascript:void(0)"><strong>{$lang131}</strong><span></span></a></div>
                    {/if}
                {else}
                <div class="sysBoardFollowButton "><a class="Button12 Button WhiteButton" href="{$baseurl}/login"><strong>{$lang130}</strong><span></span></a></div>
                {/if} 
            </div>
        </div>
	</div>
    <div class="cl"></div>

    <div class="FixedContainer">
        <div class="WhiteContainer clearfix">
            <h2>{$lang180}</h2>
            <div id="sysFollowList" class="PeopleList">
            	{section name=i loop=$pins}
                <div class="person">
                    <a class="PersonImage ImgLink" href="{$baseurl}/{$pins[i].username|stripslashes}"><img src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=mpp profilepicture=$pins[i].profilepicture}{$mpp}" alt="{$pins[i].username|stripslashes}" /></a>
                    <p class="PersonIdentity"><a href="{$baseurl}/{$pins[i].username|stripslashes}">{if $use_username eq "1"}{$pins[i].username|stripslashes}{else}{$pins[i].fname|stripslashes} {$pins[i].lname|stripslashes}{/if}</a></p>
                	
                    {if $smarty.session.USERID ne ""}
                        {if $smarty.session.USERID ne $pins[i].USERID}
                        {insert name=is_folm assign=isfolm USERID=$pins[i].USERID}
                        {if $isfolm GTE "0"}
                        <div class="sysBoardFollowAllButton {if $isfolm eq "1"}hidden{/if}" id="SFADD{$pins[i].USERID}" onclick="ATF('{$pins[i].USERID}', 'SFADD{$pins[i].USERID}', 'SFREM{$pins[i].USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div>
                        <div class="sysBoardUnFollowAllButton {if $isfolm eq "0"}hidden{/if}" id="SFREM{$pins[i].USERID}" onclick="RFF('{$pins[i].USERID}', 'SFREM{$pins[i].USERID}', 'SFADD{$pins[i].USERID}');"><a href="javascript:void(0)" class="Button12 Button OrangeButton disabled"><strong>{$lang131}</strong><span></span></a></div>
                        {/if}
                        {/if}
                    {else}
                    <div class="sysBoardFollowAllButton "><a href="{$baseurl}/login" class="Button12 Button OrangeButton"><strong>{$lang130}</strong><span></span></a></div>
                    {/if}
                </div>
                {/section}
            </div>
        </div>
        <div class="cl"></div>
        <div id="sysScrollContainerBottom"></div>
    </div>
</div>	 

{include file='bit_goto.tpl'}
{include file='bit_smiles.tpl'}
        
<div class="sysNextPageLoading" style="display: none;"><img src="{$baseurl}/img/icons/uploading_3.gif" alt="loading" align="top" /><span>{$lang152}...</span></div>
<div class="sysNextPageMore" style="text-align: center;display: none;margin-bottom: 50px;"><a class="Button Button12 WhiteButton" href="#" style="font-size: 16px;"><strong>{$lang153}</strong><span></span></a></div>
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong>{$lang154}</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>