'use strict';

$('document').ready(function()
{


//_____HIGHLIGHT_____
	function highlightEvenMsg()
	{
		var array = $('.msg').toArray();
		var i = 0; 
		while(i <= array.length)
		{
			if(i % 2==0)
			{
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


// ____ REFRESH MESSAGES ____
	function pvRefresh()
	{
		$.ajax(
		{
			url: 'index.php?page=p_messages&ajax'
		})

		.done(function(messages)
		{
			$('.p_messages').html(messages)
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
			var pv = $('#pv').val();

		// ____ Message public ____
			if (message != '')
			{
				$('#message').val('').blur();
				if (message.length>0 && message.length<512)
				{
					$.ajax(
					{
						url: 'index.php?page=chat',
						type: 'POST',
						data: {message:message}
					})
				}
			}

		// ____ Message privé ____
			else if (pv != '')
			{
				$('#pv').val('').blur();
				if (pv.length>0 && pv.length<512)
				{
					$.ajax(
					{
						url: 'index.php?page=chat',
						type: 'POST',
						data: {pv:pv}
					})
				}
			}
		});
	};
// ________________


// ________________


// ____ APPELS FONCTIONS ____
	highlightEvenMsg();
	setInterval(chatRefresh, 1000);
	setInterval(userlistRefresh, 30000);
	submitMessage();
// ________________


});