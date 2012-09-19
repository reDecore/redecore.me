{literal}
<style>
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

<div class="AboutContent">
	<div class="AboutLeft">
		<ul>
			<li>
				<a href="{$baseurl}/about">
					<span>{$lang208}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/pinit" class="selected">
					<span>{$lang209}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/rules">
					<span>{$lang210}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/help">
					<span>{$lang211}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/tos">
					<span>{$lang212}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/privacy">
					<span>{$lang213}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/contact">
					<span>{$lang214}</span>
				</a>			
			</li>
		</ul>
	</div>
	<div class="AboutRight">
		<h1>{$lang209}</h1>
		        
        <p>
            {$lang480}
        </p>
        
        <div>
            <a title="Pin It" href="javascript:void((function()%7Bvar%20e=document.createElement(%27script%27);e.setAttribute(%27type%27,%27text/javascript%27);e.setAttribute(%27charset%27,%27UTF-8%27);e.setAttribute(%27src%27,%27{$baseurl}/js/pinme.js?r=%27+Math.random()*99999999);document.body.appendChild(e)})());" class="button orange" style="cursor: move; float: left;">{$lang17}</a> 
            <div style="float: left; margin-left: 8px; margin-top: 7px; font-size:16px; color:#666">{$lang23}</div>
        </div>
        
        <div class="clear message" style="padding-top:20px;"></div>
        <h3>{$lang24}:</h3>

        <p>
             {$lang25} {$lang26} {$lang27}
        </p>
        
        <div class="clear message"></div>



	</div>
</div>
{include file='bit_goto.tpl'}