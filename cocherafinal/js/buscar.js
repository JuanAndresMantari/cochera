
$(obtener_registros());
function obtener_registros(vehiculos)
{
	$.ajax({
		url : 'buscar_vehiculo.php',
		type : 'POST',
		dataType : 'html',
		data : { vehiculos: vehiculos },
	})
	.done(function(resultado){
		$("#tabla_resultados").html(resultado);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
	{
		obtener_registros();
	}
});


























