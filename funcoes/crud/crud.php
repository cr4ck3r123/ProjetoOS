<?php
    
    //FUNÇÃO DE CADASTRO 
       function cadastro($nome, $login, $email, $senha, $nivel){
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
       function listarAdmin(){
           
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

