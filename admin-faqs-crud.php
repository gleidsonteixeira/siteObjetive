<?php
include_once 'conexao.php';

if (isset($_POST['pergunta']) && isset($_POST['resposta']) && isset($_POST['custId'])) {

	if(!empty($_POST['pergunta']) && !empty($_POST['resposta'])){
		$pergunta = $_POST['pergunta'];
		$resposta    = $_POST['resposta'];

		$c = $con;
		if (empty($_POST['custId'])) {
			$sql = $c->prepare("insert into faqs(ds_pergunta,ds_resposta) values(:ds_pergunta,:ds_resposta);");

			$sql->bindParam("ds_pergunta", $pergunta, PDO::PARAM_STR);
			$sql->bindParam("ds_resposta", $resposta, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Cadastro de faq realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao cadastrar o faq!'); 
				echo json_encode($retorno);
			endif;
		}else{
			$idfaqs = $_POST['custId'];
			
			$sql = $c->prepare("update faqs set ds_pergunta = :ds_pergunta,ds_resposta = :ds_resposta where idfaqs = :idfaqs;");

			$sql->bindParam("ds_pergunta", $pergunta, PDO::PARAM_STR);
			$sql->bindParam("ds_resposta", $resposta, PDO::PARAM_STR);
			$sql->bindParam("idfaqs", $idfaqs, PDO::PARAM_STR);

			$retorno = $sql->execute();

			if($retorno):
				$retorno = array('status' => 1, 'mensagem' => 'Alteração de faq realizado com sucesso!');
				echo json_encode($retorno);
			else:
				$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao alterar o faq!'); 
				echo json_encode($retorno);
			endif;
		}
		
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if(isset($_POST['idfaqs'])) {
	$idfaqs = $_POST['idfaqs'];
	$c = $con;
	$sql = $c->prepare("delete from faqs where idfaqs = :idfaqs;");

	$sql->bindParam("idfaqs", $idfaqs, PDO::PARAM_STR);

	$retorno = $sql->execute();

	if($retorno){
		$retorno = array('status' => 1, 'mensagem' => 'Faq excluido com sucesso!');
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao excluir o faq!'); 
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