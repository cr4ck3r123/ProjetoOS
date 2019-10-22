<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ CSS ---------->
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<!-- libs -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="../js/script.js" type="text/javascript"></script> 

<!-- libs jquery  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="../js/custom.js" type="text/javascript"></script>

<?php
session_start();
require '../funcoes/banco/conexao.php';
conecta();
/*
echo "<pre>";

print_r($_SESSION['administrador']);

echo "</pre>";

echo "<br>";
*/

?>



<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login - Para entrar no sistema</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div class="retorno"></div>
                    <div id="login-box" class="col-md-12">                       
                        <form id="login-form" class="form" action="" method="POST" name="loginForm">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="email" name="usuario" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Relembre - se</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <button type="submit" name="submit" class="btn btn-info btn-md" value="Entrar" onclick="return validar()">Entrar</button>
                                <img src="../img/14.gif" class="load" alt="Carregando" style="display: none">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
