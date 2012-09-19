<div class="profile" style="margin-top: {if $smarty.session.USERID eq ""}160{else}80{/if}px;">
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
    {include file='profile_left.tpl'}
    <div class="ContextBar">
        <p class="bar-links">
            <a href="{$baseurl}/{$u.username|stripslashes}">{$lang176}</a> (<span class="sysUserBoardCounter_{$u.USERID}">{$btotal}</span>) ·
            <span class="selected">{$lang175} (<span class="sysUserPinCounter_{$u.USERID}">{$ptotal}</span>)</span> ·
            <a href="{$baseurl}/{$u.username|stripslashes}/likes">{$lang134}</a> (<span class="sysUserLikeCounter_{$u.USERID}">{$ltotal}</span>)
        </p>
    </div>
    <div class="ColumnContainer">
        <div id="sysPinsList" style="position: relative;" class="pinList">
            {include file='pic_bit.tpl'}
        </div>
        
        <div class="cl"></div>
        <div id="sysScrollContainerBottom"></div>
        {if $more eq "1"}
        {literal} 
        <script type="text/javascript">
        $(document).ready(function(){
        App.nextPageLoader.init({
        url: "{/literal}{$baseurl}{literal}/more6",
        container: "#sysPinsList",
        bottomPosition: "#sysScrollContainerBottom",
        count: 50,
        more_url: '?',
        perPage: 10,
        postParams: {"q": "{/literal}{$u.USERID|stripslashes}{literal}"},
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
</div>	 

{include file='bit_goto.tpl'}
{include file='bit_smiles.tpl'}
        
<div class="sysNextPageLoading" style="display: none;"><img src="{$baseurl}/img/icons/uploading_3.gif" alt="loading" align="top" /><span>{$lang152}...</span></div>
<div class="sysNextPageMore" style="text-align: center;display: none;margin-bottom: 50px;"><a class="Button Button12 WhiteButton" href="#" style="font-size: 16px;"><strong>{$lang153}</strong><span></span></a></div>
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong>{$lang154}</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>