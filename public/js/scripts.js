'use strict';

$('document').ready(function()
{

	function chatRefresh()
	{
		$.ajax(
		{
			url: 'index.php?page=chat'
		})
		.done(function(refresh) {
			$('.chatbox').load('?page=messages')
		});
	}
		// setInterval(chatRefresh(), 1800);


	$('.chat').on('submit', function(e)
	{
		e.preventDefault();
		$('input').empty();
		var message = $('#message').val();
		if (message.length>0 && message.length<512)
		{
			$.ajax(
			{
				url: 'index.php?page=chat',
				type: 'POST',
				data: {message:message},
			})
			.done(function(message) {
    			console.log('Okay')
 			});
		}
	});

});