
var opcionesEditar = function(s, c){
	this.success=s;	
	this.cancel=c;
}

var cancelEditUser = function(){
	$(".ui-dialog-content").dialog('close');
	return false;
}
var editButton = function(){
	var url = $(this).attr('href');
	var tipo= $(this).data('tipo');
	var opciones={
		user: new opcionesEditar(enviarDatosClienteJson, cancelEditUser),
		taxi:new opcionesEditar(enviarDatosClienteJson, cancelEditUser),
		conductor:new opcionesEditar(enviarDatosClienteJson, cancelEditUser),
	}
	$.get(url, function(data) {
		$(data).dialog({width:'auto', modal: true,});
		$('.usuarioEditForm').ajaxForm({dataType:  'json', success:   opciones[tipo].success });
		$('.usuarioEditForm .cancelButton').on('click', cancelEditUser);
	});
	
	return false;
}
var enviarDatosClienteJson=function(data){
	if(data.success==1){
		$('.error-message').remove();
		$('.usuarioEditForm input').removeClass('form-error');
		$(".formGhost").slideUp();
		$(".usuarioDetalles").show('fast');
		$('.usuarioEditForm').before(data.message);
		$.each(data.datos.Usuario, function (i, val){
			if(i!='email'&& i!='password' && i!='password_confirm'&& i!='id'){
				$(".usuarioDetalles ."+i+" span").html(val);
			}
		});
		
	}else{
		$('.error-message').remove();
		$.each(data.datos, function (i, val){
			$(".Usuario"+i.charAt(0).toUpperCase()+i.slice(1)).addClass('form-error').after('<div class="error-message">'+val[0]+'</div>');
		});
		$('.usuarioEditForm').before(data.message);

	}	
	setInterval(function(){
			$('#flashMessage').remove();
		}, 6000);
}
var home=function(){
	$('#accordion-taxi, #accordion-conductores').accordion();
}

$(document).on('ready',home);
$('.editButton').on('click', editButton);
