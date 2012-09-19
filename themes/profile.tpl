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
            <span class="selected">{$lang176} (<span class="sysUserBoardCounter_{$u.USERID}">{$btotal}</span>)</span> ·
            <a href="{$baseurl}/{$u.username|stripslashes}/pins">{$lang175}</a> (<span class="sysUserPinCounter_{$u.USERID}">{$ptotal}</span>) ·
            <a href="{$baseurl}/{$u.username|stripslashes}/likes">{$lang134}</a> (<span class="sysUserLikeCounter_{$u.USERID}">{$ltotal}</span>)
        </p>
    </div>
    <center>
    {insert name=get_advertisement AID=3}
    </center>
    <div class="ColumnContainer">
        <ul class="sortable" id="sysBoardList">
            {include file='board_bit.tpl'}
        </ul>
    </div>	
</div>	 

{include file='bit_goto.tpl'}
{include file='bit_smiles.tpl'}
        
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong>{$lang154}</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>