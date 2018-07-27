<?php 
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {
    session_destroy();
    header('Location: login.php');
}else{
    header('Location: index.php');
}
?>