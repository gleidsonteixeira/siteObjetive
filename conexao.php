<?php
try {
	$username = 'objetiveti01';
	$password = '0bjti2018';
	$con = new PDO('mysql:host=mysql.objetiveti.com.br;dbname=objetiveti01', $username, $password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>