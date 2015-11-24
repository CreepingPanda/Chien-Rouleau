'use strict';

$('document').ready(function()
{
//_____HIGHLIGHT_____

function highlight(){
	var array = $('.msg').toArray();
	var i = 0; 
	while(i <= array.length) {
		if(i % 2==0) {
			$('.msg').eq(i).addClass('highlight');
		}
		i++;
	}	
};

highlight();
console.log(array.length);


// ____ REFRESH ____
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
	
	setInterval(chatRefresh, 1000);
// ________________


// ____ SUBMIT ____
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
// ________________




});