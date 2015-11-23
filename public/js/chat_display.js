	$('document').ready(function()
	{
		$.get('../chien_rouleau/views/chat_display.phtml', function(page)
		{
				$('.chatbox').html(page);
		});
	});