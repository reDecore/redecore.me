	<div class="ProfileSidebar">
        <h1>{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</h1>
        <p>
            <a href="{$baseurl}/{$u.username|stripslashes}/followers"><strong class="sysUserFollowersCounter_{$u.USERID}">{$fola}</strong><span> {$lang182}</span></a>, <a href="{$baseurl}/{$u.username|stripslashes}/following"><strong class="sysUserFollowingCounter_{$u.USERID}">{$folb}</strong><span> {$lang183}</span></a>
        </p>
        <div class="ProfileImage">
            <img alt="{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}" src="{$murl}/{insert name=get_member_profilepicture value=var assign=bpp profilepicture=$u.profilepicture}{$bpp}"/>    
        </div>
        <ul class="ProfileLinks">
        	{$lang252}: {if $u.gender eq "1"}{$lang253}{elseif $u.gender eq "2"}{$lang254}{elseif $u.gender eq "0"}{$lang255}{/if}
            {if $u.description ne ""}
            <br />{$lang208}: {$u.description|stripslashes}
            {/if}
            {if $u.location ne ""}
            <br />{$lang256}: {$u.location|stripslashes}
            {/if}
            {if $u.website ne ""}
            <br /><a href="{$u.website|stripslashes}" target="_blank">{$u.website|stripslashes}</a>
            {/if}
        </ul>
        <ol class="activity sysStreamList">
        	{section name=i loop=$act}
            <li>
                <a class="ImgLink" href="{$baseurl}/{$u.username|stripslashes}"><img src="{$murl}/thumbs/{$bpp}" alt="{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}" /></a>
                <span class="ActivityDetails">
                    {if $act[i].atype eq "repin"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a>:<br/>
                    &nbsp;<img alt="" src="{$imageurl}/repin.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                	{elseif $act[i].atype eq "pin"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a>:<br/>
                    &nbsp;<img alt="" src="{$imageurl}/pin.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                	{elseif $act[i].atype eq "com"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a>:<br/>
                    &nbsp;<img alt="" src="{$imageurl}/comment.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].comment|stripslashes}"</a></span>
                	{elseif $act[i].atype eq "folb"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a> <span class="sysEventPartTargetOther">{$lang184} <a href="{$baseurl}/{$act[i].username|stripslashes}/{insert name=get_seo_bname value=a assign=bname bname=$act[i].bname}{$bname|stripslashes}">{$act[i].bname|stripslashes}</a>.</span>
                	{elseif $act[i].atype eq "folm"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a> <span class="sysEventPartTargetOther">{$lang184} <a href="{$baseurl}/{$act[i].username|stripslashes}">{if $use_username eq "1"}{$act[i].username|stripslashes}{else}{$act[i].fname|stripslashes} {$act[i].lname|stripslashes}{/if}</a>.</span>
                	{elseif $act[i].atype eq "like"}
                    <a href="{$baseurl}/{$u.username|stripslashes}">{if $use_username eq "1"}{$u.username|stripslashes}{else}{$u.fname|stripslashes} {$u.lname|stripslashes}{/if}</a>:<br/>
                    &nbsp;<img alt="" src="{$imageurl}/heart.gif" />&nbsp;
                    <span class="text"><a class="no_bold" href="{$baseurl}/pin/{$act[i].PID|md5}">"{$act[i].ptitle|stripslashes}"</a></span>
                    {/if}
                </span>
            </li> 
            {/section}            
        </ol>
    </div>