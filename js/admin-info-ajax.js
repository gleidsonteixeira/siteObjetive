$(document).ready(function($) {

	// Evento Submit do formulário
	$('#formulario-pag-principal').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-pag-principal');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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

	$('#formulario-tipo-conta').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-tipo-conta');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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

	$('#formulario-pag-faq').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-pag-faq');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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

	$('#formulario-pag-blog').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-pag-blog');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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

	$('#formulario-contatos').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-contatos');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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

	$('#formulario-rede-social').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario-rede-social');
		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);

		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "admin-info-crud.php",
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