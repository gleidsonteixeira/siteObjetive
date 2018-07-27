$(document).ready(function($) {
 
	// Evento Submit do formulário
	$('#formulario').submit(function() {
 		
 		// alert(CKEDITOR.instances.p_conteudo.getData());
		// Captura os dados do formulário
		var formulario = document.getElementById('formulario');
 		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);
 		formData.append('p_conteudo', CKEDITOR.instances.p_conteudo.getData());

		// Envia O FormData através da requisição AJAX
		$.ajax({
		   url: "admin-blog-crud.php",
		   type: "POST",
		   data: formData,
		   dataType: 'json',
		   processData: false,  
		   contentType: false,
		   success: function(retorno){
	   			if (retorno.status == '1'){
					$("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
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