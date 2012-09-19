<div class="ColumnContainer" style="margin-top: {if $smarty.session.USERID eq ""}160{else}80{/if}px;">
	{include file='bit_orange.tpl'}   
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
    url: "{/literal}{$baseurl}{literal}/more",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"start": ""},
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