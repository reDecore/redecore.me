function SEND_COM(id)
{
	var comment = $("#add_comment"+id).val();

		var form = $('#scform'+id);
		$.ajax({
			url: base_url+'/com_sub.php?compid='+id+'&thecomment='+comment,
			type: 'post',
			beforeSend: function()
			{
				$('#scerr'+id).html('');
				form.find('input[type=submit]').attr('disabled', 'disabled');
			},
			success: function(r)
			{
				if (r.success == true) 
				{
					$('#hide_new_com_'+id).hide();
					$('#atcom'+id).html(r.m1);
					$('#show_new_com_'+id).show();
				} 
				else 
				{
					if (r.msg) 
					{
						$('#scerr'+id).html(r.msg);
					}
				}
				form.find('input[type=submit]').removeAttr('disabled');
			},
			cache: false,
			data: form.serializeArray(),
			dataType: 'json'
		});
	
		return false;

}
function ADD_LIKE(id,nhide,nshow) {
	$('#'+nhide).addClass('hidden');
	$.post(base_url+"/like.php",{"id":id},function(html) {
		$('#'+nshow).removeClass('hidden');
		var lcnt = $("#chglikes"+id).html();
		lcnt++;
		$('#chglikes'+id).html(lcnt);
	});
}
function REM_LIKE(id,nhide,nshow) {
	$('#'+nhide).addClass('hidden');
	$.post(base_url+"/like2.php",{"id":id},function(html) {
		$('#'+nshow).removeClass('hidden');
		var lcnt = $("#chglikes"+id).html();
		if(lcnt > 0)
		{
			lcnt--;
			$('#chglikes'+id).html(lcnt);
		}
	});
}