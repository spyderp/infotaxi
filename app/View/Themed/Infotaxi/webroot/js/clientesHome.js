
var cancelEditUser = function(){
	$(".ui-dialog-content").dialog('close');
	return false;
}
var editClient = function(){
	var url = $(this).attr('href');
	$.get(url, function(data) {
		$(data).dialog({width:'auto'});
		$('.usuarioEditForm').ajaxForm({dataType:  'json', success:   enviarDatosClienteJson });
		$('.usuarioEditForm .cancelButton').on('click', cancelEditUser);
	});
	
	return false;
}
var enviarDatosClienteJson=function(data){
	if(data.success==1){
		$(".formGhost").slideUp();
		$(".usuarioDetalles").show('fast');
		$('.usuarioEditForm').before(data.message);
		$.each(data.datos.Usuario, function (i, val){
			if(i!='email'&& i!='password' && i!='password_confirm'&& i!='id'){
				$(".usuarioDetalles ."+i+" span").html(val);
			}
		});
		
	}else{
		$.each(data.datos, function (i, val){
			$("#Usuario"+i.charAt(0).toUpperCase()+i.slice(1)).addClass('form-error').after('<div class="error-message">'+val[0]+'</div>');
		});
		$('.usuarioEditForm').before(data.message);

	}	
	setInterval(function(){
			$('#flashMessage').remove();
		}, 9000);
}
var home=function(){
	$('#accordion-taxi, #accordion-conductores').accordion();
}

$(document).on('ready',home);
$('.editUser').on('click', editClient);
