    	{if $smarty.session.USERID ne ""}
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
    	{section name=i loop=$pins}
        <li>
            <div class="sysBoardItemContainer pin pinBoard">
                <h3><a href="{$baseurl}/{$pins[i].username|stripslashes}/{insert name=return_seo_bname value=a assign=bname bname=$pins[i].bname}{$bname|stripslashes}">{$pins[i].bname|stripslashes}</a></h3>
                <a href="{$baseurl}/{$pins[i].username|stripslashes}/{$bname|stripslashes}" class="link">
                	{insert name=board_pics value=a assign=bp BID=$pins[i].BID}
                    {section name=j loop=$bp}
                    <img src="{$purl}/t/t-{$bp[j].pic}" />
                    {/section}
                </a>
                <div style="padding: 0 15px 10px;text-align: center;display: block;margin:0;margin-bottom:10px">
                	<div style="float:right;color:#AD9C9C;"><strong>{$pins[i].pincount}</strong> {$lang173}</div>
                </div>
                <div class="followBoard">                    
                    {if $smarty.session.USERID ne ""}
                        {if $smarty.session.USERID ne $pins[i].USERID}
                        {insert name=is_folb assign=isfolb BID=$pins[i].BID}
                        <div class="sysBoardFollowButton {if $isfolb eq "1"}hidden{/if}" id="BADD{$pins[i].BID}" onclick="ATB('{$pins[i].BID}', 'BADD{$pins[i].BID}', 'BREM{$pins[i].BID}');"><a class="Button12 Button WhiteButton" href="javascript:void(0)"><strong>{$lang130}</strong><span></span></a></div>
                        <div class="sysBoardUnFollowButton {if $isfolb eq "0"}hidden{/if}" id="BREM{$pins[i].BID}" onclick="RFB('{$pins[i].BID}', 'BREM{$pins[i].BID}', 'BADD{$pins[i].BID}');"><a class="Button12 Button WhiteButton disabled" href="javascript:void(0)"><strong>{$lang131}</strong><span></span></a></div>
                        {/if}
                    {else}
                    <div class="sysBoardFollowButton "><a class="Button12 Button WhiteButton" href="{$baseurl}/login"><strong>{$lang130}</strong><span></span></a></div>
                    {/if} 
                </div>	    	
            </div>    
        </li>
    	{/section}