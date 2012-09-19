{literal}
<style>
#container {s
    min-height: 500px;
}
#sp_welcome {
    overflow: hidden;
    width: 760px;
    margin: auto;
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
    font-size: 18px;
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

.button.orange {
    background-color: #f7941e;
    color: #ffffff;
    border: 1px solid #f6851f;
}

.button.orange:hover {
    background-color: #f6851f;
}
</style>
{/literal}

<div id="container">
    <h1 style="margin: 0 auto 28px; text-align: center; font-weight: 300;">{$lang22} </h1>
    
    <div id="sp_welcome">
		<div style="padding-left:200px;">
            <a title="Pin It" href="javascript:void((function()%7Bvar%20e=document.createElement(%27script%27);e.setAttribute(%27type%27,%27text/javascript%27);e.setAttribute(%27charset%27,%27UTF-8%27);e.setAttribute(%27src%27,%27{$baseurl}/js/pinme.js?r=%27+Math.random()*99999999);document.body.appendChild(e)})());" class="button orange" style="cursor: move; float: left;">{$lang17}</a> 
            <div style="float: left; margin-left: 8px; margin-top: 7px; font-size:16px; color:#666">{$lang23}</div>
        </div>
        
        <div style="clear:both; padding-top:40px;"></div>
        <h1 style="text-align: center; font-weight: 100; font-size:24px; color:#333">{$lang24}:</h1>

        <div style="line-height: 25px; padding-left:100px; padding-right:100px; font-size:12px;">
             {$lang25} {$lang26} {$lang27}
        </div>
    	
        <div style="clear:both; padding-top:30px;"></div>
        <center>
    	<a href="{$baseurl}/" target="_top" style="font-weight: 100; font-size:36px; color:#333">{$lang28}</a>
        </center>
    </div>
</div>