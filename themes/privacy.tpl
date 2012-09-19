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
				<a href="{$baseurl}/privacy" class="selected">
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
		<h1>{$lang213}</h1>
		        
        <p>
            {insert name=get_static ID=2 assign=static}{$static|stripslashes}
        </p>
        
        <div class="clear message"></div>



	</div>
</div>
{include file='bit_goto.tpl'}