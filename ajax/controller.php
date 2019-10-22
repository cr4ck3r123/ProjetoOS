<?php

sleep(1);
ob_start();
session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';
require '../funcoes/crud/crud.php';

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao):

    case 'usuario' :
        // faz a interação
        $login = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        //  $senhaCripto = md5($senha); 

        if (login($login, $senha)):
            //CRIA A SESSÃO
            $_SESSION['administrador'] = pegaLogin($login);

        else :
            $dados = pegaLogin($login);
            if (!$dados):
                echo 'noif';
            elseif ($dados->admin_senha != $senha):
                echo 'diffpass';
            elseif ($dados->admin_login == NULL) :
                echo 'noif';
            elseif ($dados->admin_login != $login && $dados->admin_senha != $senha) :
                echo 'diffpass';
            endif;

        endif;

        break;

    case 'cadastro' :

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $senha_confirma = filter_input(INPUT_POST, 're_senha', FILTER_SANITIZE_STRING);
        $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
        //$nivel = 1;

        if (!empty($nome) && !empty($email) && !empty($login) && !empty($senha)):
            if ($senha != $senha_confirma):
                echo "senhainval";
            else:
                cadastro($nome, $login, $email, $senha, $nivel);
                echo "cadastrou";
            endif;
        else:
            echo "erro";
        endif;

        break;

    case 'listar_admin':
        if (listarAdmin()):
          $admin = listarAdmin();
          foreach ($admin as $adm):
            ?>

            <tr>
                <td><?php echo $adm->admin_nome ?></td>
                <td><?php echo $adm->admin_email ?></td>
                <td><?php echo $adm->admin_login ?></td>
                <td><?php echo $adm->admin_nivel ?></td>
                <td>
                    <a href="#" class="btn btn-warning" id="btnEdit" data-id="<?php echo $adm->id ?>">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>
                </td>

            </tr>

        <?php
        endforeach;
        else:
        endif;

        break;
        
    case 'form_edit' : 
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        $dados = pegaId($id);
        
        
        ?>
       <div class="retorno"></div>
        <form method="POST" enctype="multipart/form-data" name="form_edit" action="">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Nome:</label>
                <input name="nome" type="text" value="<?php echo $dados->admin_nome ?>" class="form-control" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="exampleInputText" class="control-label">E-mail:</label>
                <input name="email" type="email" value="<?php echo $dados->admin_email ?>" class="form-control" placeholder="Digite seu E-mail">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Login:</label>
                <input name="login" type="text" value="<?php echo $dados->admin_login ?>"  class="form-control" placeholder="Digite seu Login">
            </div>
                <div class="form-group">
                <label for="recipient-name" class="control-label">Senha:</label>
                <input name="senha" type="password" value="<?php echo $dados->admin_senha ?>" class="form-control" placeholder="Digite sua Senha">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Repita a senha:</label>
                <input name="re_senha" type="password" value="<?php echo $dados->admin_senha ?>" class="form-control" placeholder="Confirme sua senha">
            </div>
            <label for="recipient-name" class="control-label">Nivel:</label><br>
            <select name="nivel" value="<?php echo $dados->admin_nivel ?>"class="form-control" placeholder="Escolha a opção">
                <option value="1">Administrador</option> 
                <option value="2">Moderador</option>
            </select>
         
            <div class="modal-footer">
                <img src="../img/350.gif" class="load" alt="Carregando" style="display: none">
                <button type="submit" name="submit" class="btn btn-success">Atualizar</button>
            </div>
                       
        </form>
        
        <?php
        break;
    default :
        echo 'erro inexistente!';
        break;




endswitch;

ob_end_flush();
