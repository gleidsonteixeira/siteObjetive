<?php
include_once 'conexao.php';
if(isset($_POST[ 'email-newletter' ] )){

	if(!empty($_POST['email-newletter'])){
		$email = $_POST['email-newletter'];
		
		$c = $con;

		$sql = $c->prepare("insert into newsletter(ds_email) values(:ds_email);");

		$sql->bindParam("ds_email", $email, PDO::PARAM_STR);

		$retorno = $sql->execute();

		if($retorno):
			$retorno = array('status' => 1, 'mensagem' => 'Cadastro de email realizado com sucesso!');
			echo json_encode($retorno);
		else:
			$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o email!'); 
			echo json_encode($retorno);
		endif;

	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
	
}else if (isset($_POST['idnewsletter'])) {
	$idnewsletter = $_POST['idnewsletter'];
	$c = $con;
	$sql = $c->prepare("delete from newsletter where idnewsletter = :idnewsletter;");

	$sql->bindParam("idnewsletter", $idnewsletter, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		$retorno = array('status' => 1, 'mensagem' => 'Email excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o email!'); 
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
