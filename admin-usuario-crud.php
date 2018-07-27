<?php
session_start();
include_once 'conexao.php';

if(isset( $_FILES[ 'arquivo' ][ 'name' ] ) && isset($_POST['nome']) && isset($_POST['email'])  && isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['tipo_usu']) && isset($_POST['custId'])){

	$teste_admin = 0;

	$Dashboard   	= 1;
	$Banners     	= 1;
	$Depoimentos	= 1;
	$Tickets		= 1;
	$Chat 			= 1;
	$Blog 			= 1;
	$Categorias		= 1;
	$FAQs			= 1;
	$Newsletter		= 1;
	$Informações	= 1;
	$Usuarios 		= 1;

	if (!empty($_POST['tipo_usu'])) {
		$teste_admin = $_POST['tipo_usu'];	
	}

	if ($teste_admin != 0 && $teste_admin != 1) {
		

		if (!empty($_POST['Dashboard'])) {
			$Dashboard 		= 1;
		}else{
			$Dashboard 		= 0;
		}

		if (!empty($_POST['Banners'])) {
			$Banners 		= 1;
		}else{
			$Banners 		= 0;
		}

		if (!empty($_POST['Depoimentos'])) {
			$Depoimentos 		= 1;
		}else{
			$Depoimentos 		= 0;
		}

		if (!empty($_POST['Tickets'])) {
			$Tickets 		= 1;
		}else{
			$Tickets 		= 0;
		}

		if (!empty($_POST['Chat'])) {
			$Chat 		= 1;
		}else{
			$Chat 		= 0;
		}

		if (!empty($_POST['Blog'])) {
			$Blog 		= 1;
		}else{
			$Blog 		= 0;
		}

		if (!empty($_POST['Categorias'])) {
			$Categorias 		= 1;
		}else{
			$Categorias 		= 0;
		}

		if (!empty($_POST['FAQs'])) {
			$FAQs 		= 1;
		}else{
			$FAQs 		= 0;
		}

		if (!empty($_POST['Newsletter'])) {
			$Newsletter 		= 1;
		}else{
			$Newsletter 		= 0;
		}

		if (!empty($_POST['Informações'])) {
			$Informações 		= 1;
		}else{
			$Informações 		= 0;
		}

		if (!empty($_POST['Usuarios'])) {
			$Usuarios 		= 1;
		}else{
			$Usuarios 		= 0;
		}
	}

	if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0 && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['senha']) && !empty($_POST['tipo_usu']) && empty($_POST['custId'])){ 

		$nome_usu 	   = $_POST['nome'];
		$email     = $_POST['email'];
		$usuario   = $_POST['usuario'];
		$senha	   = $_POST['senha'];
		$tipo_usu  = $_POST['tipo_usu'];

		$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
		$nome = $_FILES[ 'arquivo' ][ 'name' ];

		$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		$extensao = strtolower ( $extensao );

		if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

			$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = 'img/foto_perfil/' . $novoNome;

			if (@move_uploaded_file( $arquivo_tmp, $destino )) {

				$c = $con;

				$rs = $c->query("select count(idusuario) quant from usuario where ds_login='$usuario';");
				$row = $rs->fetch(PDO::FETCH_OBJ);

				if($row->quant == 0){

					$sql = $c->prepare("insert into usuario(ds_nome,ds_login,ds_senha,ds_caminho_img,tipo_usuario_idtipo_usuario,ds_email,ds_acesso_menu) values(:ds_nome,:ds_login,:ds_senha,:ds_caminho_img,:tipo_usuario_idtipo_usuario,:ds_email,:ds_acesso_menu);");

					$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
					$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
					$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
					$sql->bindParam("ds_caminho_img", $destino, PDO::PARAM_STR);
					$sql->bindParam("tipo_usuario_idtipo_usuario", $tipo_usu, PDO::PARAM_STR);
					$sql->bindParam("ds_email", $email , PDO::PARAM_STR);

					$ds_acesso_menu = ''.$Dashboard.''.$Banners.''.$Depoimentos.''.$Tickets.''.$Chat.''.$Blog.''.$Categorias.''.$FAQs.''.$Newsletter.''.$Informações.''.$Usuarios;

					$sql->bindParam("ds_acesso_menu", $ds_acesso_menu , PDO::PARAM_STR);

					$retorno = $sql->execute();

					if($retorno){
						$retorno = array('status' => 1, 'mensagem' => 'Cadastro de usuário realizado com sucesso!');
						echo json_encode($retorno);
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o usuário!'); 
						echo json_encode($retorno);
					}
				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Esse login já existe, por favor altere o login!'); 
					echo json_encode($retorno);
				}

			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o usuário!'); 
				echo json_encode($retorno);
			}
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o usuário!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['senha']) && !empty($_POST['tipo_usu']) && empty($_POST['custId'])){ 

		$nome_usu  = $_POST['nome'];
		$email     = $_POST['email'];
		$usuario   = $_POST['usuario'];
		$senha	   = $_POST['senha'];
		$tipo_usu  = $_POST['tipo_usu'];
		$destino   = "img/p1.png";
		
		$c = $con;

		$rs = $c->query("select count(idusuario) quant from usuario where ds_login='$usuario';");
		$row = $rs->fetch(PDO::FETCH_OBJ);

		if($row->quant == 0){

			$sql = $c->prepare("insert into usuario(ds_nome,ds_login,ds_senha,ds_caminho_img,tipo_usuario_idtipo_usuario,ds_email,ds_acesso_menu) values(:ds_nome,:ds_login,:ds_senha,:ds_caminho_img,:tipo_usuario_idtipo_usuario,:ds_email,:ds_acesso_menu);");

			$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
			$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
			$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
			$sql->bindParam("ds_caminho_img", $destino, PDO::PARAM_STR);
			$sql->bindParam("tipo_usuario_idtipo_usuario", $tipo_usu, PDO::PARAM_STR);
			$sql->bindParam("ds_email", $email , PDO::PARAM_STR);

			$ds_acesso_menu = ''.$Dashboard.''.$Banners.''.$Depoimentos.''.$Tickets.''.$Chat.''.$Blog.''.$Categorias.''.$FAQs.''.$Newsletter.''.$Informações.''.$Usuarios;

			$sql->bindParam("ds_acesso_menu", $ds_acesso_menu , PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno){
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro de usuário realizado com sucesso!');
				echo json_encode($retorno);
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o usuário!'); 
				echo json_encode($retorno);
			}

		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Esse login já existe, por favor altere o login!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['senha']) && !empty($_POST['tipo_usu']) && !empty($_POST['custId'])){ 

		$nome_usu  = $_POST['nome'];
		$email     = $_POST['email'];
		$usuario   = $_POST['usuario'];
		$senha	   = $_POST['senha'];
		$tipo_usu  = $_POST['tipo_usu'];
		$idusu     = $_POST['custId'];

		if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0){

			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$nome = $_FILES[ 'arquivo' ][ 'name' ];

			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
			$extensao = strtolower ( $extensao );

			if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

				$novoNome = uniqid ( time () ) . '.' . $extensao;
				$destino = 'img/foto_perfil/' . $novoNome;

				if (@move_uploaded_file( $arquivo_tmp, $destino )) {

					$c = $con;
					$rs = $c->query("select count(idusuario) quant from usuario where ds_login='$usuario' and idusuario != '$idusu';");
					$row = $rs->fetch(PDO::FETCH_OBJ);

					if($row->quant == 0){
						$rs = $c->query("select ds_caminho_img from usuario where idusuario='$idusu';");
						$row = $rs->fetch(PDO::FETCH_OBJ);
						$caminho_img_antigo = $row->ds_caminho_img;

						$sql = $c->prepare("update usuario set ds_nome = :ds_nome, ds_login = :ds_login, ds_senha = :ds_senha, ds_caminho_img = :ds_caminho_img, tipo_usuario_idtipo_usuario = :tipo_usuario_idtipo_usuario, ds_email = :ds_email, ds_acesso_menu = :ds_acesso_menu where idusuario = :idusuario ;");

						$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
						$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
						$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
						$sql->bindParam("ds_caminho_img", $destino, PDO::PARAM_STR);
						$sql->bindParam("tipo_usuario_idtipo_usuario", $tipo_usu, PDO::PARAM_STR);
						$sql->bindParam("ds_email", $email , PDO::PARAM_STR);

						$ds_acesso_menu = ''.$Dashboard.''.$Banners.''.$Depoimentos.''.$Tickets.''.$Chat.''.$Blog.''.$Categorias.''.$FAQs.''.$Newsletter.''.$Informações.''.$Usuarios;

						$sql->bindParam("ds_acesso_menu", $ds_acesso_menu , PDO::PARAM_STR);

						$sql->bindParam("idusuario", $idusu , PDO::PARAM_STR);

						$retorno = $sql->execute();

						if($retorno){
							//deleta a img antiga
							if($caminho_img_antigo != "img/p1.png"){
								unlink($caminho_img_antigo);
							}
							
							$retorno = array('status' => 1, 'mensagem' => 'Alteração de usuário realizado com sucesso!');
							echo json_encode($retorno);
						}else{
							$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o usuário!'); 
							echo json_encode($retorno);
						}
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Esse login já existe, por favor digite outro!'); 
						echo json_encode($retorno);
					}

				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o usuário!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o usuário!'); 
				echo json_encode($retorno);
			}
		}else{
			$c = $con;
			$rs = $c->query("select count(idusuario) quant from usuario where ds_login='$usuario' and idusuario!=$idusu;");
			$row = $rs->fetch(PDO::FETCH_OBJ);

			if($row->quant == 0){

				$sql = $c->prepare("update usuario set ds_nome = :ds_nome, ds_login = :ds_login, ds_senha = :ds_senha, tipo_usuario_idtipo_usuario = :tipo_usuario_idtipo_usuario, ds_email = :ds_email, ds_acesso_menu = :ds_acesso_menu where idusuario = :idusuario ;");

				$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
				$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
				$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
				$sql->bindParam("tipo_usuario_idtipo_usuario", $tipo_usu, PDO::PARAM_STR);
				$sql->bindParam("ds_email", $email , PDO::PARAM_STR);
				
				$ds_acesso_menu = ''.$Dashboard.''.$Banners.''.$Depoimentos.''.$Tickets.''.$Chat.''.$Blog.''.$Categorias.''.$FAQs.''.$Newsletter.''.$Informações.''.$Usuarios;

				$sql->bindParam("ds_acesso_menu", $ds_acesso_menu , PDO::PARAM_STR);
				
				$sql->bindParam("idusuario", $idusu , PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno){
					$retorno = array('status' => 1, 'mensagem' => 'Alteração de usuário realizado com sucesso!');
					echo json_encode($retorno);
				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o usuário!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Esse login já existe, por favor digite outro login!'); 
				echo json_encode($retorno);
			}

		}
	}else{
		
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);

	}

}else if(isset($_POST['idusu'])) {

	$idusu = $_POST['idusu'];
	$c = $con;
	
	$rs = $c->query("select ds_caminho_img from usuario where idusuario='$idusu';");
	$row = $rs->fetch(PDO::FETCH_OBJ);
	$ds_caminho_img = $row->ds_caminho_img;

	$sql = $c->prepare("delete from usuario where idusuario = :idusu;");

	$sql->bindParam("idusu", $idusu, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		//deleta a img antiga
		if ($ds_caminho_img != 'img/p1.png') {
			unlink($ds_caminho_img);
		}
		

		$retorno = array('status' => 1, 'mensagem' => 'Usuário excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o usuário!'); 
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