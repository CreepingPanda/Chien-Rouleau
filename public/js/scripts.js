$('document').ready(function()
{

	$('.chat').on('submit', function(e)
	{
		e.preventDefault();
		var message = $('#message').val();
		if (message.length>0 && message.length<512)
		{
			$.ajax(
			{
				url: $(this).attr('?pages=chat'),
				type: $(this).attr('post'),
				data: $(this).serialize(),
				success: function(json)
				{
					$('.chatbox').html(json)
				}
			});
		}
	});

});