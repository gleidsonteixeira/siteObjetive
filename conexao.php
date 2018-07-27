<?php
try {
	$username = 'objetiveti';
	$password = 'Objti2016';
	$con = new PDO('mysql:host=mysql.objetiveti.com.br;dbname=objetiveti', $username, $password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>