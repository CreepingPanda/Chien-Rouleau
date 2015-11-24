$('document').ready(function()
{

	$('.chat').on('submit', function(e)
	{
		e.preventDefault();
		var message = $('#message').val();
		if (message.length>0 && message.length<512)
		{
			message = JSON.parse(message);
			$.ajax(
			{
				url: 'index.php?page=chat',
				type: 'POST',
				dataType: 'json',
				data: message,
				success: function(data)
				{
					$('.chatbox').html(data);
				}
			});
		}
	});

});