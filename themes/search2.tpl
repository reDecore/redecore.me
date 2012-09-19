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
    <div class="ContextBar">
    <p align="center">
    	<span style="color:#333">{$lang174} "{$q|stripslashes}"</span>
        <br style="margin-bottom:10px;" />
        <a href="{$baseurl}/search?q={$q|stripslashes}">{$lang175} ({$ptotal})</a> · 
        <span class="selected">{$lang176} ({$btotal})</span>
    </p>
    </div>
    <div class="cl"></div>
    
    <ul class="ColumnContainer pinList center" id="sysBoardsList">
    	{include file='board_bit.tpl'}
    </ul>

    <div class="cl"></div>
    <div id="sysScrollContainerBottom"></div>
    {literal} 
    <script type="text/javascript">
    App.tabledList.init("#sysBoardsList");
    </script>
    {/literal}
</div>	 

{include file='bit_goto.tpl'}
{include file='bit_smiles.tpl'}
        
<div class="sysNextPageLoading" style="display: none;"><img src="{$baseurl}/img/icons/uploading_3.gif" alt="loading" align="top" /><span>{$lang152}...</span></div>
<div class="sysNextPageMore" style="text-align: center;display: none;margin-bottom: 50px;"><a class="Button Button12 WhiteButton" href="#" style="font-size: 16px;"><strong>{$lang153}</strong><span></span></a></div>
<a class="Button WhiteButton Indicator" href="#" id="ScrollToTop" style="display: none;"><strong>{$lang154}</strong><span></span></a>
<div class="cl"></div>
<div id="sys-profiler"></div>
<div id="sysMessageDialog" style="display: none;" title="Message"></div>