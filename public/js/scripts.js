'use strict';

$('document').ready(function()
{


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
				if (message.length>0 && message.length<512)
				{
					$('#message').val('').blur();
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
				if (pv.length>0 && pv.length<512)
				{
					$('#pv').val('').blur();
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


//_____HIGHLIGHT_____
	function highlightEvenMsg()
	{
		var msg = $('.msg').toArray();
		var i = 0; 
		while(i <= msg.length)
		{
			if(i % 2 == 0)
			{
				$('.msg').eq(i).addClass('highlight');
			}
		i++;
		}
	};
// ________________


// ____ APPELS FONCTIONS ____
	submitMessage();
	setInterval(chatRefresh, 1000);
	setInterval(userlistRefresh, 30000);
	highlightEvenMsg();
// ________________


});