
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
				url: 'index.php?page=chat',
				type: 'POST',
				data: {message:message},
				})
				.done(function( message ) {
    			console.log( 'okay');
 			 });
		}
	});

});
/*--big bisou--*/