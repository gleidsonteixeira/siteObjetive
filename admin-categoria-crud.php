<?php
include_once 'conexao.php';

if (isset($_POST['categoria']) && isset($_POST['custId'])) {

	if(!empty($_POST['categoria'])){
		$categoria = $_POST['categoria'];

		$c = $con;
		if (empty($_POST['custId'])) {
			$rs = $con->query("select count(idcategoria) as quant from categoria where ds_categoria = '$categoria';");

			$row = $rs->fetch(PDO::FETCH_OBJ);

			if ($row->quant == 0) {
				
				$sql = $c->prepare("insert into categoria(ds_categoria) values(:ds_categoria);");

				$sql->bindParam("ds_categoria", $categoria, PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno){
					$retorno = array('status' => 1, 'mensagem' => 'Cadastro de categoria realizado com sucesso!');
					echo json_encode($retorno);
				}else{
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar a categoria!'); 
					echo json_encode($retorno);
				}
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Essa categoria já existe!'); 
				echo json_encode($retorno);
			}
		}else{
			$idcategoria = $_POST['custId'];

			$rs = $con->query("select count(idcategoria) as quant from categoria where ds_categoria = '$categoria';");

			$row = $rs->fetch(PDO::FETCH_OBJ);

			if ($row->quant == 0) {
					
				$rs = $c->query("select * from categoria where idcategoria = ".$idcategoria.";");
				$row = $rs->fetch(PDO::FETCH_OBJ);
				
				$ds_categoria = $row->ds_categoria;

				$sql = $c->prepare("update categoria set ds_categoria = :ds_categoria where idcategoria = :idcategoria;");

				$sql->bindParam("ds_categoria", $categoria, PDO::PARAM_STR);
				$sql->bindParam("idcategoria", $idcategoria, PDO::PARAM_STR);

				$retorno = $sql->execute();

				if($retorno):
					$sql = $c->prepare("UPDATE `post_blog` SET `categoria_ds_categoria`= '".$categoria."' WHERE `categoria_ds_categoria`= '".$ds_categoria."'");

					$retorno = $sql->execute();

					if($retorno):
						$retorno = array('status' => 1, 'mensagem' => 'Alteração de categoria realizado com sucesso!');
						echo json_encode($retorno);
					else:
						$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o categoria!'); 
						echo json_encode($retorno);
					endif;
				else:
					$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o categoria!'); 
					echo json_encode($retorno);
				endif;
			}else{
				$retorno = array('status' => 0, 'mensagem' => 'Essa categoria já existe!'); 
				echo json_encode($retorno);
			}
		}

	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if(isset($_POST['ds_categoria'])) {
	$ds_categoria = $_POST['ds_categoria'];
	$c = $con;

	//altera os post da categoria a ser excluido
	$sql = $c->prepare("update post_blog set categoria_ds_categoria = 'Todos' where categoria_ds_categoria = :ds_categoria;");
	$sql->bindParam("ds_categoria", $ds_categoria, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
	//exclui a categoria
		$sql = $c->prepare("delete from categoria where ds_categoria = :ds_categoria;");
		$sql->bindParam("ds_categoria", $ds_categoria, PDO::PARAM_STR);

		$retorno = $sql->execute();

		if($retorno){
			$retorno = array('status' => 1, 'mensagem' => 'Categoria excluida com sucesso!');
			echo json_encode($retorno);
		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o categoria!'); 
			echo json_encode($retorno);
		}
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o categoria!'); 
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