{literal}
<style>
#container {s
    min-height: 500px;
}
#sp_welcome {
    overflow: hidden;
    width: 760px;
    margin: auto;
	padding-left:150px;
}

#sp_welcome div.categories {
    overflow: hidden;
    margin-top: 30px;
}

#sp_welcome div.categories div.item {
    margin: 0 6px 20px 6px;
    width: 114px;
    float: left;
}

#sp_welcome div.categories div.name {
    color: #000000;
    margin-left: 2px;
    margin-top: 5px;
    line-height: 15px;
    height: 25px;
    font-size: 11px;
}

#sp_welcome div.categories div.box {
    margin-top: 10px;
    width: 100px;
    height: 100px;
    background-color: #ffffff;
    cursor: pointer;
    border: 1px solid #e3ebdc;
    padding: 6px;
    position: relative;
}

#sp_welcome div.categories div.box div.cover {
    position: absolute;
    width: 100px;
    height: 100px;
    z-index: 9;
}

#sp_welcome div.categories div.box div.cover.active {
    background-image: url({/literal}{$imageurl}{literal}/cat/welcome_category_selected.png);
}

#sp_welcome input[type="button"] {
    float: right;
    margin-top: 15px;
}

#sp_welcome div.friends {
    margin: 20px 0;
    text-align: center;
}

#sp_welcome div.friends img {
    border: 1px solid #e3ebdc;
    margin: 0 3px;
}

#sp_welcome div.suggested_users {
    margin-top: 20px;
    overflow: hidden;
}

#sp_welcome div.suggested_users div.item {
    float: left;
    width: 285px;
    height: 135px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e3ebdc;
    margin: 0 50px 15px 0;
}

#sp_welcome div.suggested_users div.item div.images {
    overflow: hidden;
}

#sp_welcome div.suggested_users div.item div.images div.user {
    float: left;
    width: 80px;
}

#sp_welcome div.suggested_users div.item div.images div.user div {
    width: 70px;
    height: 70px;
    padding: 5px;
    background-color: #ffffff;
    border: 1px solid #e3ebdc;
}

#sp_welcome div.suggested_users div.item div.images div.user div img {
    width: 70px;
    height: 70px;
}

#sp_welcome div.suggested_users div.item div.images div.pins {
    margin-left: 10px;
    float: left;
    width: 195px;
}

#sp_welcome div.suggested_users div.item div.images div.pins img {
    float: left;
    width: 35px;
    height: 35px;
    border: 1px solid #e3ebdc;
    margin: 0 0 8px 2px;
}

#sp_welcome div.suggested_users div.item div.info {
    margin-top: 5px;
    font-size: 14px;
}

#sp_welcome div.suggested_users div.item div.info b {
    color: #000000;
    font-weight: normal;
}

#sp_welcome div.suggested_users div.item div.info a {
    width: 50px;
    font-size: 11px;
    float: right;
}

#sp_welcome div.create_boards {
    margin-top: 20px;
    overflow: hidden;
}

#sp_welcome div.create_boards div.info {
    float: left;
    width: 250px;
}

#sp_welcome div.create_boards div.info p {
    margin-top: 15px;
    color: #000000;
    width: 215px;
    line-height: 19px;
}

#sp_welcome div.create_boards div.form {
    float: left;
    width: 450px;
}

#sp_welcome div.create_boards div.form div input[type="text"] {
    font-size: 16px;
    padding: 10px 15px;
    width: 250px;
    color: #000000;
    margin-bottom: 10px;
}

#sp_welcome div.create_boards div.form div a {
    color: #000000;
    margin-left: 15px;
}

#sp_welcome div.create_boards input[type="button"] {
    float: left;
    margin: 0 153px 0 0;
}

div.bg_loader {
    overflow: hidden;
    width: 0;
    height: 0;
}

.button, input[type="submit"] {
    display: block;
    background-color: #e2e8d4;
    border: 1px solid #d0d6c2;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;
    padding: 8px 15px 8px 15px;
    font-size: 12px;
    font-weight: bold;
    color: #6d8c29;
    text-align: center;
    cursor: pointer;
}

.button:hover, input[type="submit"]:hover {
    text-decoration: none;
    background-color: #d3dac2;
    border: 1px solid #9ea886;
}

.button.grey_light {
    background-color: #cccccc;
    font-size: 12px;
    color: #ffffff;
    border: 1px solid #ababab;
    cursor: pointer;
}

.button.grey_light:hover {
    background-color: #c0c0c0;
}

.button.green {
    background-color: #5b9429;
    color: #ffffff;
    border: 1px solid #4a7d1e;
}

.button.green:hover {
    background-color: #73b33a;
}

input[type="submit"] {
    display: inline;
	margin-left:350px;
}
</style>
{/literal}
<div id="container">

<h1 style="margin: 0 auto 28px; text-align: center; font-weight: 300;">{$lang177}</h1>

<div id="sp_welcome">

<div class="suggested_users">
	{section name=i loop=$users}
    <div class="item">
        <div class="images">
            <div class="user">
            	{insert name=get_member_profilepicture value=var assign=fpp profilepicture=$users[i][4]}
            	<div><img src="{$murl}/thumbs/{$fpp}" /></div>
            </div>
            <div class="pins">
            	{insert name=board_pics2 value=a assign=bp BID=$users[i][6]}
                {section name=j loop=$bp}
                <img src="{$purl}/t/t-{$bp[j].pic}" />
                {/section}
            </div>
        </div>
        <div class="info" style="line-height: 30px;">
        	<b>{if $use_username eq "1"}{$users[i][1]}{else}{$users[i][2]} {$users[i][3]}{/if}</b> - {$users[i][5]|stripslashes}                    <a href="" onclick="toogleFollow(this, {$users[i][0]}); return false;" style="line-height: 100%; padding: 5px 6px;" class="button grey_light">{$lang131}</a>
        </div>
    </div>
    {/section}
</div>


<form method="GET" action="{$baseurl}/welcome">
<input type="submit" class="button green" value="{$lang178}" />
<input type="hidden" name="step" value="3" />
</form>

<div>

{literal}
<script type="text/javascript">
var locked = false;
function toogleFollow(obj, user_id) {
if (locked) {
return;
}
locked = true;
if ($(obj).hasClass('grey_light')) {
$.ajax({
type: 'POST',
url: 'unfollowuser.php',
data: 'user_id='+user_id+'&signed_request='
}).done(function(data) {
locked = false;
$(obj).removeClass('grey_light');
$(obj).addClass('green');
$(obj).html('{/literal}{$lang130}{literal}');
});
} else {
$.ajax({
type: 'POST',
url: 'followuser.php',
data: 'user_id='+user_id+'&signed_request='
}).done(function(data) {
locked = false;
$(obj).removeClass('green');
$(obj).addClass('grey_light');
$(obj).html('{/literal}{$lang131}{literal}');
});
}  
}
</script>
{/literal}
</div>