<?php
include_once 'conexao.php';

if(isset($_POST['autor']) && isset($_POST['depoimento']) && isset( $_FILES[ 'arquivo' ][ 'name' ] ) && isset($_POST['iddepo'])){

	
	if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0 && !empty($_POST['autor']) && !empty($_POST['depoimento']) && empty($_POST['iddepo'])){

		$autor = $_POST['autor'];
		$depoimento    = $_POST['depoimento'];
		$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
		$nome = $_FILES[ 'arquivo' ][ 'name' ];

		$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		$extensao = strtolower ( $extensao );

		if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

			$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = 'img/depoimentos/' . $novoNome;

			if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
				$c = $con;

				$sql = $c->prepare("insert into depoimento(ds_nome_entrevistado,ds_depoimento,ds_caminho_img_entrevistado) values(:ds_nome_entrevistado,:ds_depoimento,:ds_caminho_img_entrevistado);");

				$sql->bindParam("ds_nome_entrevistado", $autor, PDO::PARAM_STR);
				$sql->bindParam("ds_depoimento", $depoimento, PDO::PARAM_STR);
				$sql->bindParam("ds_caminho_img_entrevistado", $destino, PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno){
					$retorno = array('status' => 1, 'mensagem' => 'Cadastro de depoimento realizado com sucesso!');
					echo json_encode($retorno);
				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o depoimento!'); 
					echo json_encode($retorno);
				}

			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o depoimento!'); 
				echo json_encode($retorno);
			}
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o depoimento!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['autor']) && !empty($_POST['depoimento']) && empty($_POST['iddepo'])){
		
		$autor = $_POST['autor'];
		$depoimento    = $_POST['depoimento'];
		$img_cam = 'img/p1.png';

		$c = $con;

		$sql = $c->prepare("insert into depoimento(ds_nome_entrevistado,ds_depoimento,ds_caminho_img_entrevistado) values(:ds_nome_entrevistado,:ds_depoimento,:ds_caminho_img_entrevistado);");

		$sql->bindParam("ds_nome_entrevistado", $autor, PDO::PARAM_STR);
		$sql->bindParam("ds_depoimento", $depoimento, PDO::PARAM_STR);
		$sql->bindParam("ds_caminho_img_entrevistado", $img_cam, PDO::PARAM_STR);

		$retorno = $sql->execute();

		if($retorno){
			$retorno = array('status' => 1, 'mensagem' => 'Cadastro de depoimento realizado com sucesso!');
			echo json_encode($retorno);
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o depoimento!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['autor']) && !empty($_POST['depoimento']) && !empty($_POST['iddepo'])){

		$autor = $_POST['autor'];
		$depoimento    = $_POST['depoimento'];
		$iddepoimento = $_POST['iddepo'];

		if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0 ){
			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$nome = $_FILES[ 'arquivo' ][ 'name' ];

			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
			$extensao = strtolower ( $extensao );

			if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

				$novoNome = uniqid ( time () ) . '.' . $extensao;
				$destino = 'img/depoimentos/' . $novoNome;

				if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
					$c = $con;

					$rs = $c->query("select ds_caminho_img_entrevistado from depoimento where iddepoimento='$iddepoimento';");
					$row = $rs->fetch(PDO::FETCH_OBJ);
					$caminho_img_antigo = $row->ds_caminho_img_entrevistado;

					$sql = $c->prepare("update depoimento set ds_nome_entrevistado = :ds_nome_entrevistado,ds_depoimento = :ds_depoimento,ds_caminho_img_entrevistado = :ds_caminho_img_entrevistado where iddepoimento = :iddepoimento;");

					$sql->bindParam("ds_nome_entrevistado", $autor, PDO::PARAM_STR);
					$sql->bindParam("ds_depoimento", $depoimento, PDO::PARAM_STR);
					$sql->bindParam("ds_caminho_img_entrevistado", $destino, PDO::PARAM_STR);
					$sql->bindParam("iddepoimento", $iddepoimento, PDO::PARAM_STR);

					$retorno = $sql->execute();

					if($retorno){
						//deleta a img antiga
						if($caminho_img_antigo != "img/p1.png"){
							unlink($caminho_img_antigo);
						}

						$retorno = array('status' => 1, 'mensagem' => 'Alteração de depoimento realizado com sucesso!');
						echo json_encode($retorno);
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o depoimento!'); 
						echo json_encode($retorno);
					}

				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o depoimento!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o depoimento!'); 
				echo json_encode($retorno);
			}
		}else{
			$c = $con;

			$sql = $c->prepare("update depoimento set ds_nome_entrevistado = :ds_nome_entrevistado,ds_depoimento = :ds_depoimento where iddepoimento = :iddepoimento;");

			$sql->bindParam("ds_nome_entrevistado", $autor, PDO::PARAM_STR);
			$sql->bindParam("ds_depoimento", $depoimento, PDO::PARAM_STR);
			$sql->bindParam("iddepoimento", $iddepoimento, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno){
				
				$retorno = array('status' => 1, 'mensagem' => 'Alteração de depoimento realizado com sucesso!');
				echo json_encode($retorno);
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o depoimento!'); 
				echo json_encode($retorno);
			}
		}
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}

}else if(isset($_POST['iddepo'])) {
	
	$iddepo = $_POST['iddepo'];
	$c = $con;

	$rs = $c->query("select ds_caminho_img_entrevistado from depoimento where iddepoimento='$iddepo';");
	$row = $rs->fetch(PDO::FETCH_OBJ);
	$caminho_img_antigo = $row->ds_caminho_img_entrevistado;

	$sql = $c->prepare("delete from depoimento where iddepoimento = :iddepo;");

	$sql->bindParam("iddepo", $iddepo, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		//deleta a img antiga
		if($caminho_img_antigo != "img/p1.png"){
			unlink($caminho_img_antigo);
		}

		$retorno = array('status' => 1, 'mensagem' => 'Depoimento excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o depoimento!'); 
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