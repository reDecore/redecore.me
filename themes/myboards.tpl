<div class="ColumnContainer" style="margin-top: 80px;">
    <div class="ContextBar">
    <p align="center">
    	<span style="color:#333; font-size:24px">{$lang217}</span>
    </p>
    </div>
    <div class="cl"></div>
    
    {include file='error.tpl'}
    
    <ul class="ColumnContainer pinList center" id="sysBoardsList">
    	{include file='board_bit_owner.tpl'}
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