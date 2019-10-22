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
       alert('clicou');
        return false;
    });    

    // FUNÇÕES GERAL
    function listarAdmin(url, acao) {
        $.post(url, {acao: acao}, function (retorno) {
            var tbody = $('.table').find('tbody');
            var load = tbody.find('.load');
            load.fadeOut('slow', function () {
                tbody.html(retorno);
            })
        });
    }

    listarAdmin('../ajax/controller.php', 'listar_admin');
});



