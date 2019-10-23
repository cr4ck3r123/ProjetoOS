$(document).ready(function () {

var janela = $('#janela');
        var conteudo = $('.modal-body');
        janela.click(function () {

        $.post('../ajax/painel.php', {acao: 'form_cad'}, function (retorno) {
        $('#myModalLabel').modal({backdrop: 'static'});
                conteudo.html(retorno);
        });
        });
        $('#myModalLabel').on("submit", 'form[name="form_cad"]', function () {

console.log("clicou aki");
        var form = $(this);
        var botao = form.find(':button');
        console.log(form.serialize());
        $.ajax({
        url: "../ajax/controller.php",
                type: "POST",
                data: "acao=cadastro&" + form.serialize(),
                beforeSend: function () {

                botao.attr('disabled', true);
                        $('.load').fadeIn('slow');
                        console.log('chegou aki');
                },
                success: function (retorno) {
                console.log(retorno);
                        botao.attr('disabled', false);
                        $('.load').fadeOut('slow');
                        if (retorno === 'senhainval') {
                swal({
                position: 'top-center',
                        type: 'error',
                        title: 'Senhas não conferem!',
                        showConfirmButton: false,
                        timer: 2000
                })

                } else if (retorno === 'cadastrou') {

                swal({
                position: 'top-center',
                        type: 'success',
                        title: 'Cadastro realizado com sucesso!',
                        showConfirmButton: false,
                        timer: 2000
                })
                        setTimeout(function () {
                        $('#myModalLabel').modal('hide')
                                window.location.reload();
                        }, 2000);
                } else {
                swal({
                position: 'top-center',
                        type: 'error',
                        title: 'Dados Invalidos!',
                        showConfirmButton: false,
                        timer: 1000
                })
                }
                }
        });
        return false;
        });
        
        //FUNÇÃO PEGA ID
        $('.table').on("click", '#btnEdit', function () {
        var id = $(this).attr('data-id');
        $.post('../ajax/controller.php', {acao: 'form_edit', id: id}, function (retorno) {
        $('#myModalLabel').modal({backdrop: 'static'});
                conteudo.html(retorno);
        });
        return false;
        });
        
        //FUNÇÃO ATUALIZA
        $('#myModalLabel').on("submit", 'form[name="form_edit"]', function(){
var dados = $(this);
        var botao = dados.find(':button');
        $.ajax({
        url: '../ajax/controller.php',
                type: 'POST',
                data: 'acao=edit&' + dados.serialize(),
                beforeSend: function(){
                botao.attr('disabled', true);
                        $('.load').fadeIn('slow');
                        //    alert('clicou');
                },
                success: function(retorno){
                if (retorno === 'atualizou'){
                swal({
                position: 'top-center',
                        type: 'success',
                        title: 'Cadastro atualizado com sucesso!',
                        showConfirmButton: false,
                        timer: 2000
                })
                        setTimeout(function () {
                        $('#myModalLabel').modal('hide')
                                //    window.location.reload();
                        }, 2000);
                        listarAdmin('../ajax/controller.php', 'listar_admin', true);
                } else{
                swal({
                position: 'top-center',
                        type: 'warning',
                        title: 'Você não alterou nenhum dos dados do cadastro!',
                        showConfirmButton: false,
                        timer: 2000
                })

                        $('.load').fadeOut('slow', function(){
                botao.attr('disabled', false);
                });
                }
                }
        });
        return false;
        });
        
        // FUNÇÕES GERAL
                function listarAdmin(url, acao, atualiza) {
                $.post(url, {acao: acao}, function (retorno) {
                var tbody = $('.table').find('tbody');
                        var load = tbody.find('.load');
                        if (atualiza === true){
                tbody.html(retorno);
                } else{
                load.fadeOut('slow', function () {
                tbody.html(retorno);
                });
                }

                });
                }


        //FUNÇÃO DELETAR
        $('.table').on("click", '#btnExcluir', function () {
     
            var id = $(this).attr('data-id');
            
        if(confirm('voce deseja realmente excluir')){
        $.post('../ajax/controller.php', {acao: 'excluir', id: id}, function (retorno) {
            
            if(retorno === 'deletou'){
            alert('usuario excluido com sucesso');
                 setTimeout(function () {
                        $('#myModalLabel').modal('hide')
                       //  window.location.reload();
                        }, 2000);
                        listarAdmin('../ajax/controller.php', 'listar_admin', true);
        }else{
              swal({
                position: 'top-center',
                        type: 'error',
                        title: 'Usuario não deletado!',
                        showConfirmButton: false,
                        timer: 2000
                })
        }
        });
    }else{
        return false;
    }
        });
        
        
                listarAdmin('../ajax/controller.php', 'listar_admin');
        });



