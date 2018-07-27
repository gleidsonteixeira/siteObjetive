$(document).ready(function($) {
 
	// Evento Submit do formulário
	$('#formulario_login').submit(function() {
		// Captura os dados do formulário
		var formulario = document.getElementById('formulario_login');
 
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);
 
		// Envia O FormData através da requisição AJAX
		$.ajax({
		   url: "usuario-login.php",
		   type: "POST",
		   data: formData,
		   dataType: 'json',
		   processData: false,  
		   contentType: false,
		   success: function(retorno){
	   			if (retorno.status == '1'){
	   				if (retorno.tipo == '1') {
	   					window.location="admin.php";
	   				}else if (retorno.tipo == '2') {
	   					window.location="admin-chat.php";
	   				}
	   			}else{
					$("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
	   			}
	   			
	   	   }
		});
 
		return false;
	});
 
});