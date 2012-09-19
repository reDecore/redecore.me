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
        {if $smarty.session.USERID ne $USERID}
        {literal}
        <script language="javascript" type="text/javascript">
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
    {/if}
    <div class="BoardTitle">
		<h1>{$bname|stripslashes}</h1>
		<div class="desc"></div>
        <div class="BoardMeta sysBoardItemContainer">
            <div class="BoardUsers">
            	<a href="{$baseurl}/{$username|stripslashes}" class="ImgLink"><img src="{$murl}/thumbs/{insert name=get_member_profilepicture value=var assign=bpp profilepicture=$profilepicture}{$bpp}" alt="{$username|stripslashes}" title="{$username|stripslashes}"/></a>
            	<span class="BoardUserName"><a href="{$baseurl}/{$username|stripslashes}">{if $use_username eq "1"}{$username|stripslashes}{else}{$fname|stripslashes} {$lname|stripslashes}{/if}</a></span>
            </div>
            <div class="BoardStats"><a href="{$baseurl}/{$username|stripslashes}/{insert name=get_seo_bname value=a assign=rpbname bname=$bname}{$rpbname|stripslashes}/followers" class="sysBoardFollowersCounterTxt_4ed9db3dbe04704632000079">{$totalfols} <span>{$lang180}</span></a>, <strong>{$pincount}</strong> {$lang175}</div>
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
    <div id="sysPinsList" class="pinList center">        
        {include file='pic_bit.tpl'}
    </div>
    <div class="cl"></div>
    <div id="sysScrollContainerBottom"></div>
    {if $more eq "1"}
    {literal} 
    <script type="text/javascript">
    $(document).ready(function(){
    App.nextPageLoader.init({
    url: "{/literal}{$baseurl}{literal}/more5",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"q": "{/literal}{$q|stripslashes}{literal}"},
    afterAppend: function(data) { Pin.init(); App.tabledList.append("#sysPinsList", data.html); }
    });
    });
    App.tabledList.init("#sysPinsList");
    </script>
    {/literal}
    {else}
    {literal} 
    <script type="text/javascript">
    App.tabledList.init("#sysPinsList");
    </script>
    {/literal}
    {/if} 
</div>	 

{include file='bit_goto.tpl'}
{include file='bit_smiles.tpl'}
        
<div class="sysNextPageLoading" style="display: none;"><img src="{$baseurl}/img/icons/uploading_3.gif" alt="loading" align="top" /><span>{$lang152}...</span></div>
<div class="sysNextPageMore" style="text-align: center;display: none;margin-bottom: 50px;"><a class="Button Button12 WhiteButton" href="#" style="font-size: 16px;"><strong>{$lang153}</strong><span></span></a></div>
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong>{$lang154}</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>