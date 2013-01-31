//función para cerrar la ventana dialog usada para editar o agregar datos.
var cancelDialog = function(){
	$(".ui-dialog-content").dialog('close');
	return false;
}
//Función que controla el resultado del envio de un formulario  (es reutilizable)
var dialogFormControl=function(clase, data){
	if(data.success==1){
		$('.error-message').remove();
		$('.editForm input').removeClass('form-error');
		$('.editForm').before(data.message);
	}else{
		$('.error-message').remove();
		$.each(data.datos, function (i, val){
			$("."+clase+i.charAt(0).toUpperCase()+i.slice(1)).addClass('form-error').after('<div class="error-message">'+val[0]+'</div>');
		});
		$('.editForm').before(data.message);

	}	
	setInterval(function(){
			$('#flashMessage').remove();
		}, 6000);
}

//Inicialización del evento click del botón editar 
var editButton = function(){
	var url = $(this).attr('href');
	var tipo= $(this).data('tipo');
	var opciones={
		user: enviarDatosClienteJson,
		taxi: enviarDatosTaxiJson,
		conductor: enviarDatosConductorJson,
	}
	
	$.get(url, function(data) {
		$(data).dialog({width:'auto', modal: true,});
		$('.editForm').ajaxForm({dataType:  'json', type:'POST', success:   opciones[tipo]});
		$('.editForm .cancelDialog').on('click', cancelDialog);
	});
	
	return false;
}
//Respuesta del envio del formulario de editar clientes
var enviarDatosClienteJson=function(data){
	dialogFormControl('Usuario', data);
	if(data.success==1){
		$.each(data.datos.Usuario, function (i, val){
			if(i!='email'&& i!='password' && i!='password_confirm'&& i!='id'){
				$(".usuarioDetalles ."+i+" span").html(val);
			}
		});
	}
}
//Respuesa del envio del formulario de editar Taxi
var enviarDatosTaxiJson=function(data){
	
	dialogFormControl('Taxi', data);
	if(data.success==1){
		var regUnico=data.datos.Taxi.registro_unico;
		$.each(data.datos.Taxi, function (i, val){
			if(i!='registro_unico'&& i!='placa_taxi' && i!='numero_chasis'&& i!='id' && i!='usuario_id'  ){
				$(".taxiDetalles [data-cod='taxi-"+regUnico+"'] ."+i+" span").html(val);
			}
		});
	}
}
//Respuesta del envio del formulario de editar Conductor
var enviarDatosConductorJson=function(data){
	dialogFormControl('Conductor', data);
	if(data.success==1){
		var cedula=data.datos.Conductor.cedula;
		$.each(data.datos.Conductor, function (i, val){
			if(i!='id'&& i!='cedula'){
				$(".conductoresDetalles [data-cod='taxi-"+cedula+"'] ."+i+" span").html(val);
			}
		});
	}
}

/**
* Inilización de la pagina en esta sección se coloca todo script que debe correr al 
* cargar la pantalla
*/
var ready=function(){
	$('#accordion-taxi, #accordion-conductores').accordion();
}
$(document).on('ready',ready);

//Eventos
$('.editButton').on('click', editButton);
