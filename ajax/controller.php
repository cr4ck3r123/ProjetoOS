<?php

sleep(1);
ob_start();
session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao):

    case 'usuario' :
        // faz a interação
        $login = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $senhaCripto = md5(strrev($senha));
        if (login($login, $senhaCripto)):
            //CRIA A SESSÃO
            $_SESSION['administrador'] = pegaLogin($login);
            echo 'chegou aki';
      
        else :
            $dados = pegaLogin($login);
            if (!$dados):
                echo 'noif';
            elseif ($dados->admin_senha != $senha):
                echo 'diffpass';
            elseif ($dados->admin_nivel > 1):
                echo 'non';
            endif;

        endif;

        break;
    default :
        echo 'erro inexistente!';
        break;

endswitch;
ob_end_flush();
