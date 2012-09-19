<div class="ColumnContainer" style="margin-top: {if $smarty.session.USERID eq ""}160{else}80{/if}px;">
	{include file='bit_orange.tpl'}
    <div id="sysPinsList" class="pinList center">  
        {if $showfeed eq "1"}
        <div class="feed pin" style="">		    
               <div>
                   <h2>{$lang186}</h2>
                  <ol class="activity sysStreamList">
                    {section name=i loop=$act}
                    {insert name=get_member_profilepicture value=var assign=bpp profilepicture=$act[i].profilepicture}
                    <li>
                    <a class="ImgLink" href="{$baseurl}/{$act[i].uname|stripslashes}"><img src="{$murl}/thumbs/{$bpp}" alt="{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}" /></a>
                    <span class="ActivityDetails">
                        {if $act[i].atype eq "repin"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a>:<br/>
                        &nbsp;<img alt="" src="{$imageurl}/repin.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                        {elseif $act[i].atype eq "pin"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a>:<br/>
                        &nbsp;<img alt="" src="{$imageurl}/pin.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                        {elseif $act[i].atype eq "com"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a>:<br/>
                        &nbsp;<img alt="" src="{$imageurl}/comment.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].comment|stripslashes}"</a></span>
                        {elseif $act[i].atype eq "folb"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a> <span class="sysEventPartTargetOther">{$lang184} <a href="{$baseurl}/{$act[i].username|stripslashes}/{insert name=get_seo_bname value=a assign=bname bname=$act[i].bname}{$bname|stripslashes}">{$act[i].bname|stripslashes}</a>.</span>
                        {elseif $act[i].atype eq "folm"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a> <span class="sysEventPartTargetOther">{$lang184} <a href="{$baseurl}/{$act[i].username|stripslashes}">{if $use_username eq "1"}{$act[i].username|stripslashes}{else}{$act[i].fname|stripslashes} {$act[i].lname|stripslashes}{/if}</a>.</span>
                        {elseif $act[i].atype eq "like"}
                        <a href="{$baseurl}/{$act[i].uname|stripslashes}">{if $use_username eq "1"}{$act[i].uname|stripslashes}{else}{$act[i].f|stripslashes} {$act[i].l|stripslashes}{/if}</a>:<br/>
                        &nbsp;<img alt="" src="{$imageurl}/heart.gif" />&nbsp;
                        <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                        {/if}
                    </span>
                    </li> 
                    {/section}            
                </ol>
              </div>
        </div>
        {/if}             
        {include file='pic_bit.tpl'}
    </div>
    <div class="cl"></div>
    <div id="sysScrollContainerBottom"></div>
    {if $more eq "1"}
    {literal} 
    <script type="text/javascript">
    $(document).ready(function(){
    App.nextPageLoader.init({
    url: "{/literal}{if $smarty.session.USERID ne ""}{$baseurl}/more8{else}{$baseurl}/more{/if}{literal}",
    container: "#sysPinsList",
    bottomPosition: "#sysScrollContainerBottom",
    count: 50,
    more_url: '?',
    perPage: 10,
    postParams: {"start": "", "q": "{/literal}{$q|stripslashes}{literal}"},
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