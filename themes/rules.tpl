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
				<a href="{$baseurl}/about">
					<span>{$lang208}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/pinit">
					<span>{$lang209}</span>
				</a>			
			</li>
            <li>
				<a href="{$baseurl}/rules" class="selected">
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
		<h1>{$lang210}</h1>
		        
        <p>
            {insert name=get_static ID=4 assign=static}{$static|stripslashes}
        </p>
        
        <div class="clear message"></div>



	</div>
</div>
{include file='bit_goto.tpl'}