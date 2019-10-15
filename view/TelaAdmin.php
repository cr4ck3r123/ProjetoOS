<?php
session_start();
@$login = $_SESSION['usuario']; // email do usuario
@$senha_log = $_SESSION['password']; //password do usuario

if ($login == null) {
   header('location:../view/TelaLogin.php');
}


