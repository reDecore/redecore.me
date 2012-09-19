<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
{include file='header_head.tpl'}
<body>
{include file='header_fb.tpl'}
{include file='header_scroll.tpl'}
<a name="top"></a>
{include file='header_menu.tpl'}
<div class="CategoriesBar">
	<a class="Button OrangeButton Button12" href="{$baseurl}/invite_friends"><strong>{$lang156}</strong><span></span></a>
    <!--
	<a class="Button GreenButton Button12" href="#"><strong>Find Friends</strong><span></span></a>
    -->
    <ul class="HeaderCategory HeaderContainer">
    	{if $smarty.session.USERID ne ""}
        <li><a class="nav {if $showfeed eq "1"}selected{/if}" href="{$baseurl}/">{$lang187}</a>&nbsp;·&nbsp;</li>
        {/if}
        <li class="submenu">
            <a class="nav {if $menu eq "1"}selected{/if}" href="{$baseurl}/all">{$lang155}{if $showcatname ne ""}: {$showcatname|stripslashes}{/if}<span></span></a>
            {insert name=get_categories assign=hc}
            <ul class="CategoriesDropdown" {if $hc|@count GT "60"}style="width:720px; margin-left:-270px;"{elseif $hc|@count GT "40"}style="width:540px; margin-left:-90px;"{/if}>
                <li>
                    <span class="SubmenuColumn">
                    	{section name=i loop=$hc}
                        <a class="" href="{$baseurl}/all?category={$hc[i].seo|stripslashes}">{$hc[i].name|stripslashes}</a>
                        {if $smarty.section.i.iteration eq "20" OR $smarty.section.i.iteration eq "40" OR $smarty.section.i.iteration eq "60"}
                        </span>
                        <span class="SubmenuColumn">
                        {/if}
                        {/section}
                    </span>
                </li>
            </ul>
        </li>
    	<li>&nbsp;·&nbsp;<a class="nav {if $menu eq "2"}selected{/if}" href="{$baseurl}/popular">{$lang157}</a></li>
        {if $enable_youtube eq "1"}<li>&nbsp;·&nbsp;<a class="nav {if $menu eq "4"}selected{/if}" href="{$baseurl}/videos">{$lang472}</a></li>{/if}
    	{if $enable_gifts eq "1"}<li>&nbsp;·&nbsp;<a class="nav {if $menu eq "3"}selected{/if}" href="{$baseurl}/gifts">{$lang158}</a></li>{/if}
    </ul>
</div>