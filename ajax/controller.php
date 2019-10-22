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
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>
                </td>

            </tr>

        <?php
        endforeach;
        else:
        endif;

        break;
    default :
        echo 'erro inexistente!';
        break;




endswitch;

ob_end_flush();
