<?php
session_start();
include_once 'conexao.php';

if(isset( $_FILES[ 'arquivo' ][ 'name' ] )  && isset($_POST['p_conteudo']) && isset($_POST['titulo']) && isset($_POST['ds_categoria'])  && isset($_POST['palavrasChave']) && isset($_POST['custId'])){

	if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0 && !empty($_POST['titulo']) && !empty($_POST['p_conteudo']) && !empty($_POST['ds_categoria']) && !empty($_POST['palavrasChave']) && empty($_POST['custId'])){ 

		$titulo    = $_POST['titulo'];
		$categoria 	   = $_POST['ds_categoria'];
		$p_conteudo 	   = $_POST['p_conteudo'];
		$palavrasChave 	   = $_POST['palavrasChave'];

		$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
		$nome = $_FILES[ 'arquivo' ][ 'name' ];

		$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		$extensao = strtolower ( $extensao );

		if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

			$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = 'img/blog/' . $novoNome;

			if (@move_uploaded_file( $arquivo_tmp, $destino )) {

				$c = $con;

				$sql = $c->prepare("insert into post_blog(`ds_titulo`, `ds_conteudo`, `ds_caminho_img_destaque`, `ds_palavras_chaves`, `categoria_ds_categoria`, data_hora) values(:ds_titulo,:ds_conteudo,:ds_caminho_img_destaque,:ds_palavras_chaves,:categoria_ds_categoria,:data_hora);");

				$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
				$sql->bindParam("ds_conteudo", $p_conteudo, PDO::PARAM_STR);
				$sql->bindParam("ds_caminho_img_destaque", $destino, PDO::PARAM_STR);
				$sql->bindParam("ds_palavras_chaves", $palavrasChave , PDO::PARAM_STR);
				$sql->bindParam("categoria_ds_categoria", $categoria , PDO::PARAM_STR);
				date_default_timezone_set('America/Sao_Paulo');
				$data = date('Y-m-d H:i', time());
				$sql->bindParam("data_hora", $data , PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno){
					$retorno = array('status' => 1, 'mensagem' => 'Cadastro de post realizado com sucesso!');
					echo json_encode($retorno);
				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o post!'); 
					echo json_encode($retorno);
				}
				

			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o post!'); 
				echo json_encode($retorno);
			}
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o post!'); 
			echo json_encode($retorno);
		}

	}else if(!empty($_POST['titulo']) && !empty($_POST['p_conteudo']) && !empty($_POST['ds_categoria']) && !empty($_POST['palavrasChave']) && !empty($_POST['custId'])){ 

		$titulo    		= $_POST['titulo'];
		$categoria 	   	= $_POST['ds_categoria'];
		$p_conteudo 	= $_POST['p_conteudo'];
		$palavrasChave 	= $_POST['palavrasChave'];
		$idpost_blog   	= $_POST['custId'];

		if($_FILES['arquivo']['name'] != '' && $_FILES[ 'arquivo' ][ 'error' ] == 0){
			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$nome = $_FILES[ 'arquivo' ][ 'name' ];

			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
			$extensao = strtolower ( $extensao );

			if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {

				$novoNome = uniqid ( time () ) . '.' . $extensao;
				$destino = 'img/blog/' . $novoNome;

				if (@move_uploaded_file( $arquivo_tmp, $destino )) {

					$c = $con;

					$rs = $c->query("select ds_caminho_img_destaque from post_blog where idpost_blog='$idpost_blog';");
					$row = $rs->fetch(PDO::FETCH_OBJ);
					$caminho_img_antigo = $row->ds_caminho_img_destaque;

					$sql = $c->prepare("update post_blog set `ds_titulo` = :ds_titulo, `ds_conteudo` = :ds_conteudo, `ds_caminho_img_destaque` = :ds_caminho_img_destaque, `ds_palavras_chaves` = :ds_palavras_chaves, `categoria_ds_categoria` = :categoria_ds_categoria where idpost_blog = :idpost_blog;");

					$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
					$sql->bindParam("ds_conteudo", $p_conteudo, PDO::PARAM_STR);
					$sql->bindParam("ds_caminho_img_destaque", $destino, PDO::PARAM_STR);
					$sql->bindParam("ds_palavras_chaves", $palavrasChave , PDO::PARAM_STR);
					$sql->bindParam("categoria_ds_categoria", $categoria , PDO::PARAM_STR);
					$sql->bindParam("idpost_blog", $idpost_blog , PDO::PARAM_STR);

					$retorno = $sql->execute();

					if($retorno){
						//deleta a img antiga
						if($caminho_img_antigo != "img/p1.png"){
							unlink($caminho_img_antigo);
						}

						$retorno = array('status' => 1, 'mensagem' => 'Alteração de post realizado com sucesso!');
						echo json_encode($retorno);
					}else{
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o post!'); 
						echo json_encode($retorno);
					}


				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o post!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o post!'); 
				echo json_encode($retorno);
			}
		}else{
			$c = $con;

			$sql = $c->prepare("update post_blog set `ds_titulo` = :ds_titulo, `ds_conteudo` = :ds_conteudo, `ds_palavras_chaves` = :ds_palavras_chaves, `categoria_ds_categoria` = :categoria_ds_categoria where idpost_blog = :idpost_blog;");

			$sql->bindParam("ds_titulo", $titulo, PDO::PARAM_STR);
			$sql->bindParam("ds_conteudo", $p_conteudo, PDO::PARAM_STR);
			$sql->bindParam("ds_palavras_chaves", $palavrasChave , PDO::PARAM_STR);
			$sql->bindParam("categoria_ds_categoria", $categoria , PDO::PARAM_STR);
			$sql->bindParam("idpost_blog", $idpost_blog , PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno){
				$retorno = array('status' => 1, 'mensagem' => 'Alteração de post realizado com sucesso!');
				echo json_encode($retorno);
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o post!'); 
				echo json_encode($retorno);
			}
		}
	}else{

		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'.$_POST['p_conteudo']); 
		echo json_encode($retorno);

	}

}else if(isset($_POST['idpost_blog'])) {

	$idpost_blog = $_POST['idpost_blog'];
	$c = $con;
	
	$rs = $c->query("select ds_caminho_img_destaque from post_blog where idpost_blog='$idpost_blog';");
	$row = $rs->fetch(PDO::FETCH_OBJ);
	$caminho_img_antigo = $row->ds_caminho_img_destaque;


	$sql = $c->prepare("delete from post_blog where idpost_blog = :idpost_blog;");

	$sql->bindParam("idpost_blog", $idpost_blog, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		//deleta a img antiga
		if($caminho_img_antigo != "img/p1.png"){
			unlink($caminho_img_antigo);
		}

		$retorno = array('status' => 1, 'mensagem' => 'Post excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o Post!'); 
		echo json_encode($retorno);
	}
	
}else if(isset($_POST['requisicao_post']) && isset($_POST['idultimopost'])){
	if (!empty($_POST['requisicao_post']) && $_POST['requisicao_post'] == 5 && !empty($_POST['idultimopost'])) {
		$idultimopost = $_POST['idultimopost'];

		$rs = $con->query("select post_blog.* from post_blog
			where post_blog.idpost_blog > '$idultimopost' LIMIT 5;");
		$array['todos_post'] = array();
		$i = 0;
		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$ar = array('idpost_blog' => $row->idpost_blog, 
				'titulo' => utf8_encode($row->ds_titulo),
				'p_conteudo' => utf8_encode($row->ds_conteudo), 
				'img' => $row->ds_caminho_img_destaque,
				'ds_categoria' => $row->categoria_ds_categoria, 
				'data_hora' => $row->data_hora); 
			$array['todos_post'][$i] = $ar;

			$i++;
		}	

		echo json_encode($array['todos_post']);

	}else if (isset($_SESSION['login'])) {
		header('Location: admin.php');
	}else{
		header('Location: index.php');
	}
}else if(isset($_POST['idCategoria'])){
	if (!empty($_POST['idCategoria'])) {
		$idCategoria = $_POST['idCategoria'];

		$rs = $con->query("select ds_categoria from categoria
			where idcategoria = '$idCategoria';");

		
		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$ar = array('ds_categoria' => $row->ds_categoria);
			echo json_encode($ar);

		}	

		
	}else if (isset($_SESSION['login'])) {
		header('Location: admin.php');
	}else{
		header('Location: index.php');
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