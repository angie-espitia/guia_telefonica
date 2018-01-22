$(document).ready(function()
{
	buscar();
});

function buscar()
{
	var buscarNombre = $("#buscarNombre").val();
	var buscarEmpresa = $("#buscarEmpresa").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/buscar",
		dataType: 'json',
		data: { 
				buscarNombre:buscarNombre, 
				buscarEmpresa: buscarEmpresa }
	})

	.done(function(response){
		$('#info').html(response.html);
	});
}

// $("#buscar").on("click", "a", function(){

// 	var value = $(this).attr("value");
// 	var id = $(this).attr("id");

// 	if (value == "actualizar") {
// 		$.ajax({
// 			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
// 			method: "POST",
// 			url: "/admin/idRadicado",
// 			dataType: 'json',
// 			data: { id: id }
// 		})

// 		.done(function(response) {
// 			location.href = '/admin/editar';
// 		});
// 	}
// });