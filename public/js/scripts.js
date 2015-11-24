'use strict';


$('document').ready(function()
{


//_____HIGHLIGHT_____
	function highlightEvenMsg(){
		var array = $('.msg').toArray();
		var i = 0; 
		while(i <= array.length) {
			if(i % 2==0) {
				$('.msg').eq(i).addClass('highlight');
			}
			i++;
		}
	};
// ________________


// ____ REFRESH MESSAGES ____
	function chatRefresh()
	{
		$.ajax(
		{
			url: 'index.php?page=messages&ajax'
		})

		.done(function(messages)
		{
			$('.messages').html(messages)
		});
	};
// ________________


// ____ REFRESH USERLIST ____
	function userlistRefresh()
	{
		$.ajax(
		{
			url: 'index.php?page=userlist&ajax'
		})

		.done(function(users)
		{
			$('.userlist').html(users)
		});
	};
// ________________


// ____ SUBMIT ____
	function submitMessage()
	{
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
					data: {message:message}
				})

				.done(function(message) {
	    			console.log('Okay')
	 			});
			}
		});
	};
// ________________


// ____ APPELS FONCTIONS ____
	highlightEvenMsg();
	setInterval(chatRefresh, 1000);
	setInterval(userlistRefresh, 30000);
	submitMessage();
// ________________


});