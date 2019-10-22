<?php
ob_start();
session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';


logado($_SESSION['administrador']);

if (isset($_GET['logout']) && $_GET['logout'] == 'true'):
    session_destroy();
    header("Location: login.php");
endif;



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin com PDO</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/estilos.css" rel="stylesheet" media="screen">



    </head>
    <body>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HOME ADMIN</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="list-group-item" id="janelax">Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul>

                    <p class="pull-right logout">
                        Bem Vindo: <?php echo $_SESSION['administrador']->admin_login; ?> &nbsp
                        <a href="?logout=true" class="btn btn-danger">Sair</a>
                    </p>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="linha">HOME</h2>
                    <div class="box">

                        <div class="box-title">Administradores</div>
                        <div class="box-content nopadding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Login</th>
                                        <th>Nivel</th>
                                        <th width="200">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="../img/244.gif" class="load" alt="Carregando"></td>
                                    </tr>
                                    
                                <!--    <tr>
                                        <td>SEU NOME</td>
                                        <td>email@email.com</td>
                                        <td>LOGIN</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>

                                    </tr>
                                         -->                                                    
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3">
                    <h2 class="linha">Menu</h2>
                    <div class="bloco">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">14</span>
                                Registros
                            </li>
                        </ul>

                        <div class="list-group">
                            <a href="#" class="list-group-item active">Administrador</a>
                            <a href="#" class="list-group-item" id="janela">Cadastrar</a>
                          
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------------------- LIBS -------------------------------------------------------------------------> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/painel.js"></script>

            <!---------------------------------------------  INICIO DO MODAL ------------------------------------------------------------->
           
            <div class="modal fade" id="myModalLabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Usuário</h4>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                    </div>
                </div>
            </div>   
            
            <!----------------------------------------------- FIM DO MODAL ------------------------------------------------------------->
        </div>
           
                </div>              
    </body>
</html>
<?php ob_end_flush(); ?>