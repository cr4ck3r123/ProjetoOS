<?php

session_start(); // recupero a sessão para poder usar
unset($_SESSION['usuario']);
unset($_SESSION['password']);

header('location:../view/TelaLogin.php');
?>
