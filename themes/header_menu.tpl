<div class="header">
    <div class="HeaderContainer">
        <a href="{$baseurl}/" class="Pinme"><img alt="{$site_name}" src="{$imageurl}/redecore_logo.png" /></a>
        <ul class="Navigation">
        	{if $smarty.session.USERID ne ""}
            	<li>
                    <div class="nav sysOutLink"><a href="javascript:void(0)" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/add_popup', {id: 'sysAddPopup', width: '550px'})"{/literal}>{$lang160}</a><span class="PlusIcon"></span></div>
                </li>
                <li>
                    <i class="nav sysOutLink" title="{$baseurl}/{$smarty.session.USERNAME|stripslashes}" skip-protocol="true" same-win="true">{if $use_username eq "1"}{$smarty.session.USERNAME|stripslashes}{else}{$smarty.session.FNAME|stripslashes} {$smarty.session.LNAME|stripslashes}{/if}<span></span></i>
                    <ul>
                        <li><a href="{$baseurl}/{$smarty.session.USERNAME|stripslashes}">{$lang216}</a></li>
                        <li><a href="{$baseurl}/myboards">{$lang217}</a></li>
                        <li><a href="{$baseurl}/mypins">{$lang218}</a></li>
                        <li><a href="{$baseurl}/mylikes">{$lang219}</a></li>
                        <li><a href="{$baseurl}/settings">{$lang220}</a></li>
                    </ul>
                </li>
                <li>
                    {literal}
                    <script type="text/javascript">
                    function loadContent(elementSelector, sourceURL) {
                    $(""+elementSelector+"").load(""+sourceURL+"");
                    }
                    </script>
                    {/literal}
                    <div class="nav sysOutLink"><a href="javascript:loadContent('#loadme', '{$baseurl}/log_out');">{$lang49}</a><span class="PlusIcon"></span></div>
                </li>
            {else}
                {if $invite_mode eq "0"}
                <li>
                    <i class="nav sysOutLink" title="{$baseurl}/signup" skip-protocol="true" same-win="true">{$lang48}<span class="PlusIcon"></span></i>
                </li>
                {/if}
                <li>
                    <i class="nav sysOutLink" title="{$baseurl}/login" skip-protocol="true" same-win="true">{$lang0}<span class="PlusIcon"></span></i>
                </li>
            {/if}
            <li style="margin-right:10px; padding-right:10px;">
            	<i class="nav sysOutLink" title="{$baseurl}/about" skip-protocol="true" same-win="true">{$lang478}<span></span></i>
                <ul>
                    <li><a href="{$baseurl}/about">{$lang208}</a></li>
                    <li><a href="{$baseurl}/pinit">{$lang209}</a></li>
                    <li><a href="{$baseurl}/rules">{$lang210}</a></li>
                    <li><a href="{$baseurl}/help">{$lang211}</a></li>
                    <li><a href="{$baseurl}/tos">{$lang212}</a></li>
                    <li><a href="{$baseurl}/privacy">{$lang213}</a></li>
                    <li><a href="{$baseurl}/contact">{$lang214}</a></li>
                </ul>
            </li>
            <li>
                <div class="nav sysOutLink"><a href="javascript:void(0)" {literal}onclick="App.ajaxDialog('{/literal}{$baseurl}{literal}/language.php', {id: 'sysLangPopup', width: '550px'})"{/literal}>{if $smarty.session.language eq "english"}English{elseif $smarty.session.language eq "spanish"}Español{elseif $smarty.session.language eq "french"}Français{elseif $smarty.session.language eq "portuguese"}Português{elseif $smarty.session.language eq "japanese"}日本の{elseif $smarty.session.language eq "chinese_simplified"}中文（简体）{elseif $smarty.session.language eq "chinese_traditional"}中國傳統文化{/if}</a></div>
            </li>  
        </ul>
        <div class="Search">
            <form class="sysFullTSForm text" method="get" action="{$baseurl}/search">
            	<input type="text" value="" size="27" name="q" id="query" is_empty="yes" class="ui-autocomplete-input" />
            	<button class="lg" id="query_button" type="submit"><img alt="{$lang159}" src="{$imageurl}/search.gif"></button>
            </form>
            {literal}
            <script type="text/javascript">
            $('.sysFullTSForm INPUT[name="q"]').emptyVal({text: "{/literal}{$lang159}{literal}"})
            </script>
            {/literal}
        </div>
    </div>		
</div>