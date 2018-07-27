<?php
session_start();
include_once 'conexao.php';

if(isset( $_FILES[ 'arquivo' ][ 'name' ] )  && isset($_POST['pretitulo']) && isset($_POST['titulo']) && isset($_POST['link'])  && isset($_POST['idbanner'])){

	if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0 && !empty($_POST['pretitulo']) && !empty($_POST['titulo']) && !empty($_POST['link']) && empty($_POST['idbanner'])){

		$pretitulo = $_POST['pretitulo'];
		$titulo    = $_POST['titulo'];
		$link 	   = $_POST['link'];

		$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
		$nome = $_FILES[ 'arquivo' ][ 'name' ];

		$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		$extensao = strtolower ( $extensao );

		if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

			$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = 'img/banners/' . $novoNome;

			if (@move_uploaded_file( $arquivo_tmp, $destino )) {

				$c = $con;

				$rs = $c->query("select count(idbanner) as quantBanner from banner;");
				$row = $rs->fetch(PDO::FETCH_OBJ);

				if ($row->quantBanner == 6) {
					$retorno = array('status' => 1, 'mensagem' => 'Número de banners cadastrado excedido! Número de banner: 6');
					echo json_encode($retorno);							
				}else{
					$sql = $c->prepare("insert into banner(ds_pre_titulo,ds_titulo,ds_caminho_img_banner,ds_link_video) values(:ds_pre_titulo,:ds_titulo,:ds_caminho_img_banner,:ds_link_video);");

					$sql->bindParam("ds_pre_titulo", $pretitulo, PDO::PARAM_STR);
					$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
					$sql->bindParam("ds_caminho_img_banner", $destino, PDO::PARAM_STR);
					$sql->bindParam("ds_link_video", $link , PDO::PARAM_STR);

					$retorno = $sql->execute();

					if($retorno){
						$retorno = array('status' => 1, 'mensagem' => 'Cadastro de banner realizado com sucesso!');
						echo json_encode($retorno);
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o banner!'); 
						echo json_encode($retorno);
					}
				}

			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o banner!'); 
				echo json_encode($retorno);
			}
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o banner!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['pretitulo']) && !empty($_POST['titulo']) && !empty($_POST['link']) && !empty($_POST['idbanner'])){ 

		$pretitulo = $_POST['pretitulo'];
		$titulo    = $_POST['titulo'];
		$link 	   = $_POST['link'];
		$idbanner  = $_POST['idbanner'];

		if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0){

			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$nome = $_FILES[ 'arquivo' ][ 'name' ];

			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
			$extensao = strtolower ( $extensao );

			if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

				$novoNome = uniqid ( time () ) . '.' . $extensao;
				$destino = 'img/banners/' . $novoNome;

				if (@move_uploaded_file( $arquivo_tmp, $destino )) {

					$c = $con;
					
					$rs = $c->query("select ds_caminho_img_banner from banner where idbanner='$idbanner';");
					$row = $rs->fetch(PDO::FETCH_OBJ);
					$caminho_img_antigo = $row->ds_caminho_img_banner;

					$sql = $c->prepare("update banner set ds_pre_titulo = :ds_pre_titulo, ds_titulo = :ds_titulo, ds_caminho_img_banner = :ds_caminho_img_banner, ds_link_video = :ds_link_video where idbanner = :idbanner ;");

					$sql->bindParam("ds_pre_titulo", $pretitulo, PDO::PARAM_STR);
					$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
					$sql->bindParam("ds_caminho_img_banner", $destino, PDO::PARAM_STR);
					$sql->bindParam("ds_link_video", $link , PDO::PARAM_STR);
					$sql->bindParam("idbanner", $idbanner , PDO::PARAM_STR);

					$retorno = $sql->execute();

					if($retorno){
						//deleta a img antiga
						if($caminho_img_antigo != "img/p1.png"){
							unlink($caminho_img_antigo);
						}
						$retorno = array('status' => 1, 'mensagem' => 'Alteração de banner realizado com sucesso!');
						echo json_encode($retorno);
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o banner!'); 
						echo json_encode($retorno);
					}
					

				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o banner!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o banner!'); 
				echo json_encode($retorno);
			}
		}else{
			$c = $con;

			$sql = $c->prepare("update banner set ds_pre_titulo = :ds_pre_titulo, ds_titulo = :ds_titulo, ds_link_video = :ds_link_video where idbanner = :idbanner ;");

			$sql->bindParam("ds_pre_titulo", $pretitulo, PDO::PARAM_STR);
			$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
			$sql->bindParam("ds_link_video", $link , PDO::PARAM_STR);
			$sql->bindParam("idbanner", $idbanner , PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno){
				
				$retorno = array('status' => 1, 'mensagem' => 'Alteração de banner realizado com sucesso!');
				echo json_encode($retorno);
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o banner!'); 
				echo json_encode($retorno);
			}
		}
	}else{

		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);

	}

}else if(isset($_POST['idbanner'])) {

	$idbanner = $_POST['idbanner'];
	$c = $con;
	
	$rs = $c->query("select ds_caminho_img_banner from banner where idbanner='$idbanner';");
	$row = $rs->fetch(PDO::FETCH_OBJ);
	$caminho_img_antigo = $row->ds_caminho_img_banner;

	$sql = $c->prepare("delete from banner where idbanner = :idbanner;");

	$sql->bindParam("idbanner", $idbanner, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		//deleta a img antiga
		if($caminho_img_antigo != "img/p1.png"){
			unlink($caminho_img_antigo);
		}

		$retorno = array('status' => 1, 'mensagem' => 'Banner excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o Banner!'); 
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