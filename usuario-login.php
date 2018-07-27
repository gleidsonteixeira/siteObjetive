<?php
include_once 'conexao.php';
session_start();

if (isset($_POST['usuario']) && isset($_POST['senha'])) {

	if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
		$usuario = $_POST['usuario'];
		$senha    = $_POST['senha'];


		$sql = $con->query("select * from usuario where ds_login = '$usuario' and ds_senha = '$senha';");

		$users = $sql->fetch(PDO::FETCH_OBJ);

		if (!empty($users)) {
			
			$_SESSION['login'] = true;
			$_SESSION['idusuario'] = $users->idusuario;
			$_SESSION['ds_nome'] = $users->ds_nome;
			$_SESSION['ds_login'] = $users->ds_login;
			$_SESSION['ds_senha'] = $users->ds_senha;
			$_SESSION['ds_caminho_img'] = $users->ds_caminho_img;
			$_SESSION['tipo_usuario_idtipo_usuario'] = $users->tipo_usuario_idtipo_usuario;
			$_SESSION['ds_email'] = $users->ds_email;
			$_SESSION['ds_acesso_menu'] = $users->ds_acesso_menu;

			$retorno = array('status' => 1, 'mensagem' => 'Login realizado com sucesso!', 'tipo' => $users->tipo_usuario_idtipo_usuario);
			echo json_encode($retorno);

		}else{
			$retorno = array('status' => 0, 'mensagem' => 'Senha ou usuário incorreto!'); 
			echo json_encode($retorno);
		}

	}else{
		$retorno = array('status' => 0, 'mensagem' => 'Nenhum campo pode estar vazio'); 
		echo json_encode($retorno);
	}
}else if (isset($_SESSION['login'])) {
	header('Location: admin.php');
}else{
	header('Location: index.php');
}

?>