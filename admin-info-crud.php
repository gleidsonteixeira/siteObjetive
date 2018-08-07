<?php
include_once 'conexao.php';

if (isset($_POST['tituloDaPagina']) && isset($_POST['palavrasChave']) && isset($_POST['descricaoDaPagina']) && isset($_POST['idpag'])) {

	if(!empty($_POST['tituloDaPagina']) && !empty($_POST['palavrasChave']) && !empty($_POST['descricaoDaPagina'])){

		$tituloDaPagina = utf8_decode($_POST['tituloDaPagina']);
		$palavrasChave    = utf8_decode($_POST['palavrasChave']);
		$descricaoDaPagina = utf8_decode($_POST['descricaoDaPagina']);

		$c = $con;
		if (empty($_POST['idpag'])) {
			$sql = $c->prepare("insert into pagina_principal(ds_titulo,ds_palavras_chaves,ds_descricao) values(:ds_titulo,:ds_palavras_chaves,:ds_descricao);");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPagina, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações da pagina principal realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações da pagina principal!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idpag = $_POST['idpag'];
			
			$sql = $c->prepare("update pagina_principal set ds_titulo = :ds_titulo,ds_palavras_chaves = :ds_palavras_chaves, ds_descricao = :ds_descricao where idpagina_principal = :idpagina_principal;");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPagina, PDO::PARAM_STR);
			$sql->bindParam("idpagina_principal", $idpag, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações da pagina principal realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações da pagina principal !'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_POST['tituloDaPaginaTC']) && isset($_POST['palavrasChaveTC']) && isset($_POST['descricaoDaPaginaTC']) && isset($_POST['idtipc'])) {

	if(!empty($_POST['tituloDaPaginaTC']) && !empty($_POST['palavrasChaveTC']) && !empty($_POST['descricaoDaPaginaTC'])){

		$tituloDaPagina = utf8_decode($_POST['tituloDaPaginaTC']);
		$palavrasChave    = utf8_decode($_POST['palavrasChaveTC']);
		$descricaoDaPaginaTC = utf8_encode($_POST['descricaoDaPaginaTC']);

		$c = $con;
		if (empty($_POST['idtipc'])) {
			$sql = $c->prepare("insert into pagina_tipo_conta(ds_titulo,ds_palavras_chaves,ds_descricao) values(:ds_titulo,:ds_palavras_chaves,:ds_descricaos);");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaTC, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações da pagina tipo de conta realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações da pagina tipo de conta!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idtipc = $_POST['idtipc'];
			
			$sql = $c->prepare("update pagina_tipo_conta set ds_titulo = :ds_titulo,ds_palavras_chaves = :ds_palavras_chaves, ds_descricao = :ds_descricao where idpagina_tipo_conta = :idpagina_tipo_conta;");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaTC, PDO::PARAM_STR);
			$sql->bindParam("idpagina_tipo_conta", $idtipc, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações da pagina tipo de conta realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações da pagina tipo de conta !'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_POST['tituloDaPaginaF']) && isset($_POST['palavrasChaveF']) && isset($_POST['descricaoDaPaginaF']) && isset($_POST['idfaq'])) {

	if(!empty($_POST['tituloDaPaginaF']) && !empty($_POST['palavrasChaveF']) && !empty($_POST['descricaoDaPaginaF'])){

		$tituloDaPagina = utf8_decode($_POST['tituloDaPaginaF']);
		$palavrasChave    = utf8_decode($_POST['palavrasChaveF']);
		$descricaoDaPaginaF = utf8_decode($_POST['descricaoDaPaginaF']);

		$c = $con;
		if (empty($_POST['idfaq'])) {
			$sql = $c->prepare("insert into pagina_faq(ds_titulo,ds_palavras_chaves,ds_descricao) values(:ds_titulo,:ds_palavras_chaves,:ds_descricao);");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaF, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações da pagina faq realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações da pagina faq de conta!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idfaq = $_POST['idfaq'];
			
			$sql = $c->prepare("update pagina_faq set ds_titulo = :ds_titulo,ds_palavras_chaves = :ds_palavras_chaves,ds_descricao = :ds_descricao where idpagina_faq = :idpagina_faq;");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaF, PDO::PARAM_STR);
			$sql->bindParam("idpagina_faq", $idfaq, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações da pagina faq realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações da pagina faq !'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_POST['tituloDaPaginaB']) && isset($_POST['palavrasChaveB']) && isset($_POST['descricaoDaPaginaB']) && isset($_POST['idblog'])) {

	if(!empty($_POST['tituloDaPaginaB']) && !empty($_POST['palavrasChaveB']) && !empty($_POST['descricaoDaPaginaB'])){

		$tituloDaPagina = utf8_decode($_POST['tituloDaPaginaB']);
		$palavrasChave    = utf8_decode($_POST['palavrasChaveB']);
		$descricaoDaPaginaB = utf8_encode($_POST['descricaoDaPaginaB']);

		$c = $con;
		if (empty($_POST['idblog'])) {
			$sql = $c->prepare("insert into pagina_blog(ds_titulo,ds_palavras_chaves,ds_descricao) values(:ds_titulo,:ds_palavras_chaves,:ds_descricao);");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaB, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações da pagina blog realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações da pagina blog de conta!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idblog = $_POST['idblog'];
			
			$sql = $c->prepare("update pagina_blog set ds_titulo = :ds_titulo,ds_palavras_chaves = :ds_palavras_chaves,ds_descricao = :ds_descricao where idpagina_blog = :idpagina_blog;");

			$sql->bindParam("ds_titulo", $tituloDaPagina, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave, PDO::PARAM_STR);
			$sql->bindParam("ds_descricao", $descricaoDaPaginaB, PDO::PARAM_STR);
			$sql->bindParam("idpagina_blog", $idblog, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações da pagina de blog realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações da pagina de blog !'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['whatsapp']) && isset($_POST['idcontatos'])) {

	if(!empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['whatsapp'])){

		$email = utf8_decode($_POST['email']);
		$telefone  = utf8_decode($_POST['telefone']);
		$whatsapp  = utf8_decode($_POST['whatsapp']);

		$c = $con;
		if (empty($_POST['idcontatos'])) {
			$sql = $c->prepare("insert into contatos(ds_telefone,ds_whatsapp,ds_email) values(:ds_telefone,:ds_whatsapp,:ds_email);");
			
			$sql->bindParam("ds_telefone", $telefone, PDO::PARAM_STR);
			$sql->bindParam("ds_whatsapp", $whatsapp, PDO::PARAM_STR);
			$sql->bindParam("ds_email", $email, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações da pagina contatos realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações da pagina contatos de conta!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idcontatos = $_POST['idcontatos'];
			
			$sql = $c->prepare("update contatos set ds_telefone = :ds_telefone,ds_whatsapp = :ds_whatsapp,ds_email = :ds_email where idcontatos = :idcontatos;");

			$sql->bindParam("ds_telefone", $telefone, PDO::PARAM_STR);
			$sql->bindParam("ds_whatsapp", $whatsapp, PDO::PARAM_STR);
			$sql->bindParam("ds_email", $email, PDO::PARAM_STR);
			$sql->bindParam("idcontatos", $idcontatos, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações da pagina contatos realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações da pagina contatos!'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_POST['facebook']) && isset($_POST['Instagram']) && isset($_POST['youtube']) && isset($_POST['idredesocial'])) {

	if(!empty($_POST['facebook']) && !empty($_POST['Instagram']) && !empty($_POST['youtube'])){

		$face = utf8_decode($_POST['facebook']);
		$insta  = utf8_decode($_POST['Instagram']);
		$yout  = utf8_decode($_POST['youtube']);

		$c = $con;
		if (empty($_POST['idredesocial'])) {
			$sql = $c->prepare("insert into redes_sociais(ds_facebook,ds_youtube,ds_instagram) values(:ds_facebook,:ds_youtube,:ds_instagram);");
			
			$sql->bindParam("ds_facebook", $face, PDO::PARAM_STR);
			$sql->bindParam("ds_youtube", $yout, PDO::PARAM_STR);
			$sql->bindParam("ds_instagram", $insta, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro das informações de redes sociais realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar as informações de redes sociais!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idredesocial = $_POST['idredesocial'];
			
			$sql = $c->prepare("update redes_sociais set ds_facebook = :ds_facebook,ds_youtube = :ds_youtube,ds_instagram = :ds_instagram where idredes_sociais = :idredes_sociais;");

			$sql->bindParam("ds_facebook", $face, PDO::PARAM_STR);
			$sql->bindParam("ds_youtube", $yout, PDO::PARAM_STR);
			$sql->bindParam("ds_instagram", $insta, PDO::PARAM_STR);
			$sql->bindParam("idredes_sociais", $idredesocial, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração das informações de redes sociais realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar as informações de redes sociais!'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_SESSION['login'])) {
	if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){
		header('Location: admin.php');
	}else{
		header('Location: admin-chat.php');
	}
}else{
	header('Location: index.php');
}

?>