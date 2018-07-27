<?php
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {
	if(isset($_GET['newsletter'])){
		$rs = $con->query("select * from newsletter;");
		$html = "";
		$html .= "<table>";
		$html .= "<tr>";
		$html .= "<td><b>Email</b></td>";
		$html .= "</tr>";

		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$retorno_nome = $row->ds_email;
			$html .= "<tr>";
			$html .= "<td>$retorno_nome</td>";
			$html .= "</tr>";

		}
		$html .= "</table>";
		echo $html;

		$arquivo = 'excel-newsletter.xls';
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename={$arquivo}" );
		header ("Content-Description: PHP Generated Data" );
	}else{
		if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){
			header('Location: admin.php');
		}else{
			header('Location: admin-chat.php');
		}
	}
}else{
	header('Location: index.php');
}
?>