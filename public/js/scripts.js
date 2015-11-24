'use strict';

$('document').ready(function()
{

	// ____ REFRESH
	function chatRefresh()
	{
		$.ajax(
		{
			url: 'index.php?page=messages&ajax'
		})
		.done(function(refresh) {
			$('.messages').html(refresh)
		});
	}
		setInterval(chatRefresh(), 1000);


	// ____ SUBMIT
	$('.chat').on('submit', function(e)
	{
		e.preventDefault();
		var message = $('#message').val();
		$('#message').val('').blur();
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