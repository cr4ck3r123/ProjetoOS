<?php

//FUNÇÃO DE CADASTRO 
function cadastro($nome, $login, $email, $senha, $nivel) {
    $pdo = conecta();
    try {
        $cadastro = $pdo->prepare("INSERT INTO admin(admin_nome, admin_login, admin_email, admin_senha, admin_nivel) VALUES (?,?,?,?,?);");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $login, PDO::PARAM_STR);
        $cadastro->bindValue(3, $email, PDO::PARAM_STR);
        $cadastro->bindValue(4, $senha, PDO::PARAM_STR);
        $cadastro->bindValue(5, $nivel, PDO::PARAM_INT);
        $cadastro->execute();

        if ($cadastro->rowCount() > 0):
            return TRUE;
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}

//FUNÇÃO LISTAR
function listarAdmin() {
    $pdo = conecta();
    try {
        $listar = $pdo->query("select * from admin");

        $listar->execute();

        if ($listar->rowCount() > 0):
            return $listar->fetchAll(PDO::FETCH_OBJ);
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}

//FUNÇÃO PEGA ID
function pegaId($id) {
    $pdo = conecta();
    try {
        $pegaId = $pdo->prepare("SELECT * FROM admin WHERE id = ?");

        $pegaId->bindValue(1, $id, PDO::PARAM_INT);
        $pegaId->execute();

        if ($pegaId->rowCount() > 0):
            return $pegaId->fetch(PDO::FETCH_OBJ);
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

//FUNÇÃO ATUALIZA
function atualizar($nome, $login, $email, $id) {
    $pdo = conecta();
    try {
        $atualizar = $pdo->prepare("UPDATE admin SET admin_nome = ?, admin_email = ?, admin_login = ? WHERE id = ?");
        $atualizar->bindValue(1, $nome, PDO::PARAM_STR);
        $atualizar->bindValue(2, $email, PDO::PARAM_STR);
        $atualizar->bindValue(3, $login, PDO::PARAM_STR);
        $atualizar->bindValue(4, $id, PDO::PARAM_INT);
        $atualizar->execute();

        if ($atualizar->rowCount() == 1):
            return TRUE;
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

//FUNÇÃO DELETE
function delete($id) {
    $pdo = conecta();
    try {
        $delete = $pdo->prepare("DELETE FROM admin WHERE id = ?");
        $delete->bindValue(1, $id, PDO::PARAM_INT);
        $delete->execute();

        if ($delete->rowCount() == 1):
            return TRUE;
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}
