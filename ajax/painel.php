<?php
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);


switch ($acao) {
    case 'form_cad':
        ?>
<!-- libs -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="../js/script.js" type="text/javascript"></script> 

 <div class="retorno"></div>
        <form method="POST" enctype="multipart/form-data" name="form_cad" action="">
            <div class="form-group">
                <label for="recipient-name" class="control-label" >Nome:</label>
                <input name="nome" type="text" class="form-control" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="exampleInputText" class="control-label">E-mail:</label>
                <input name="email" type="email" class="form-control" placeholder="Digite seu E-mail">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Login:</label>
                <input name="login" type="text" class="form-control" placeholder="Digite seu Login">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Senha:</label>
                <input name="senha" type="password" class="form-control" placeholder="Digite sua Senha">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Repita a senha:</label>
                <input name="re_senha" type="password" class="form-control" placeholder="Confirme sua senha">
            </div>
            <label for="recipient-name" class="control-label">Nivel:</label><br>
            <select name="nivel" class="form-control" placeholder="Escolha a opção">
                <option value="1">Administrador</option> 
                <option value="2">Moderador</option>
            </select>

            <div class="modal-footer">
                <img src="../img/350.gif" class="load" alt="Carregando" style="display: none">
                <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
            </div>
                       
        </form>
        
        <?php
        break;
        

    default:
        echo 'Nada';
        break;
}