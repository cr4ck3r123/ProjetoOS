<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin com PDO</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/estilos.css" rel="stylesheet" media="screen">
               
        <!------ CSS ---------->
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <!-- libs -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <script src="../js/script.js" type="text/javascript"></script> 

        <!-- libs jquery  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../js/custom.js" type="text/javascript"></script>

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
                                <li><a href="#">Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul>

                    <p class="pull-right logout">
                        Bem Vindo: SEU NOME &nbsp
                        <a href="#" class="btn btn-danger">Sair</a>
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
                                        <td>SEU NOME</td>
                                        <td>email@email.com</td>
                                        <td>LOGIN</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>@jdoe</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Matt</td>
                                        <td>Armon</td>
                                        <td>@marmon</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jane</td>
                                        <td>Kowalsky</td>
                                        <td>@jane-kow</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tim</td>
                                        <td>Pacey</td>
                                        <td>@t-pac</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Steve</td>
                                        <td>Rovinsky</td>
                                        <td>@steve-sky</td>
                                        <td>admn</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
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
                            <a href="#" class="list-group-item">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
