<script type="text/javascript">
$(document).ready(function() {
	$('#SendInvites').click(function() {
	  $('#inviteforms').submit();
	});
});
</script>

<div class="AboutContent">
	<div class="AboutLeft">
		<ul>
			<li>
				<a href="{$baseurl}/invite_friends" class="selected">
					<span>{$lang188}</span>
				</a>			
			</li>
		</ul>
	</div>
	<div class="AboutRight">
		<h1>{$lang189}</h1>
		
        {include file='error.tpl'}
        
        <form id="inviteforms" method="post" action="{$baseurl}/invite_friends">
        <div id="EmailAddresses" class="Form FancyForm floatLeft" style="width: 62%; margin-left:-42px;">
            <ul>
                <li>
                    <input type="text" class="email" tabindex="1" name="email1" />
                    <label>{$lang190}</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="2" name="email2" />
                    <label>{$lang191}</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="3" name="email3" />
                    <label>{$lang192}</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <input type="text" class="email" tabindex="4" name="email4" />
                    <label>{$lang193}</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
                <li>
                    <textarea name="message" style="min-height: 6.85em;" tabindex="5"></textarea>
                    <label>{$lang194} ({$lang195}):</label>
                    <span class="fff"></span>
                    <span class="helper"></span>
                </li>
            </ul>
        </div>
        
        <div class="clear message"></div>
        
        <div class="clear">
            <a href="#" id="SendInvites" class="Button OrangeButton Button18" tabindex="6"><strong>{$lang196}</strong><span></span></a>
        </div>
        <input type="hidden" name="fpsub" value="1" />
		</form>


	</div>
</div>