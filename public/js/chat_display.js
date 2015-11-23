	$('document').ready(function()
	{
		$.get('?page=chat_display', function(page)
		{
				$('.chatbox').html(page);
		});
	});