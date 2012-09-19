    	{section name=i loop=$pins}
        <li>
            <div class="sysBoardItemContainer pin pinBoard">
                <h3><a href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}/{insert name=return_seo_bname value=a assign=bname bname=$pins[i].bname}{$bname|stripslashes}">{$pins[i].bname|stripslashes}</a></h3>
                <a href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}/{$bname|stripslashes}" class="link">
                	{insert name=board_pics value=a assign=bp BID=$pins[i].BID}
                    {section name=j loop=$bp}
                    <img src="{$purl}/t/t-{$bp[j].pic}" />
                    {/section}
                </a>
                <div style="padding: 0 15px 10px;text-align: center;display: block;margin:0;margin-bottom:10px">
                	<div style="float:right;color:#AD9C9C;"><strong>{$pins[i].pincount}</strong> {$lang173}</div>
                </div>
                <div class="followBoard">     
                    {if $smarty.session.USERID eq $pins[i].USERID}
                    <a class="Button12 Button OrangeButton" href="{$baseurl}/edit_board?id={$pins[i].BID}"><strong>{$lang222}</strong><span></span></a>
                    <a class="Button12 Button WhiteButton" href="javascript:void(0)" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/delete_board_popup?id={/literal}{$pins[i].BID}{literal}', {id: 'sysPinDeleteBoardPopup', width: '500px'})"{/literal}><strong>{$lang221}</strong><span></span></a>
                    {/if}
                </div>	    	
            </div>    
        </li>
    	{/section}