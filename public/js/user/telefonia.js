$(document).ready(function()
{
	mostrar();
});

function mostrar()
{
	
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "GET",
		url: "/mostrar",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		console.info(response);
		$('#info').html(response.html);
	});
}