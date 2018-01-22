$(document).ready(function()
{
	subirRespuestas();
});

function subirRespuestas()
{
	$('#subiendo').html("");
	$('#loader').html("<label class='control-label'>Se esta subiendo los resultados</label><div class='center-block loader'></div>")
	$('#loader').fadeIn(1000);

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/subirRespuestas",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$('#loader').fadeOut(1000);
		$('#subiendo').hide();
		$('#subiendo').html("<h1 class='text-center' style='margin-top: 0px;''>Se ha subido los datos correctamente</h1>").fadeIn(2000);
	});
}