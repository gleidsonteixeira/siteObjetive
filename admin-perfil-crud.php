<?php
session_start();
include_once 'conexao.php';

if(isset( $_FILES[ 'arquivo' ][ 'name' ] ) && isset($_POST['nome']) && isset($_POST['email'])  && isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['custId'])){

	if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['senha']) && !empty($_POST['custId'])){ 

		$nome_usu  = $_POST['nome'];
		$email     = $_POST['email'];
		$usuario   = $_POST['usuario'];
		$senha	   = $_POST['senha'];
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

						$sql = $c->prepare("update usuario set ds_nome = :ds_nome, ds_login = :ds_login, ds_senha = :ds_senha, ds_caminho_img = :ds_caminho_img, ds_email = :ds_email where idusuario = :idusuario ;");

						$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
						$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
						$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
						$sql->bindParam("ds_caminho_img", $destino, PDO::PARAM_STR);
						$sql->bindParam("ds_email", $email , PDO::PARAM_STR);
						$sql->bindParam("idusuario", $idusu , PDO::PARAM_STR);

						$retorno = $sql->execute();

						if($retorno){
							//deleta a img antiga
							if($caminho_img_antigo != "img/p1.png"){
								unlink($caminho_img_antigo);
							}
							
							$_SESSION['ds_nome'] = $nome_usu;
							$_SESSION['ds_login'] = $usuario;
							$_SESSION['ds_senha'] = $senha;
							$_SESSION['ds_caminho_img'] = $destino;
							$_SESSION['ds_email'] =$email;

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

				$sql = $c->prepare("update usuario set ds_nome = :ds_nome, ds_login = :ds_login, ds_senha = :ds_senha, ds_email = :ds_email where idusuario = :idusuario ;");

				$sql->bindParam("ds_nome", $nome_usu, PDO::PARAM_STR);
				$sql->bindParam("ds_login", $usuario, PDO::PARAM_STR);
				$sql->bindParam("ds_senha", $senha, PDO::PARAM_STR);
				$sql->bindParam("ds_email", $email , PDO::PARAM_STR);
				$sql->bindParam("idusuario", $idusu , PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno){
					$_SESSION['ds_nome']  = $nome_usu;
					$_SESSION['ds_login'] = $usuario;
					$_SESSION['ds_senha'] = $senha;
					$_SESSION['ds_email'] = $email;

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