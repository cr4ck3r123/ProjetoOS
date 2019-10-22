$(document).ready(function () {

    $('form[name="loginForm"]').submit(function () {
        console.log("clicou");
        var forma = $(this);
        var botao = $(this).find(':button');

        $.ajax({
            url: "../ajax/controller.php",
            type: "POST",
            data: "acao=usuario&" + forma.serialize(),
            beforeSend: function () {
                botao.attr('disabled', true);
                $('.load').fadeIn('slow');
            },
            success: function (retorno) {
                console.log(retorno);
                $('.load').fadeOut('slow', function(){
                   botao.attr('disabled', false); 
                });                
                
                if (retorno === 'diffpass') {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Senha ou Usuario inválido!',
                    });
                    // msg('Senha ou Usuario inválido', 'erro');
                } else if (retorno === 'noif') {
                    swal({
                        type: 'error',
                        title: 'ops...',
                        text: 'usuario ou senha invalidos',
                    });
                } else {
                    swal({
                        position: 'top-center',
                        type: 'success',
                        title: 'Logado com sucesso!',
                        showConfirmButton: false,
                        timer: 1000                        
                    })
                    
//                    forma.fadeOut('last', function(){
//                       $('#load').fadeIn('slow'); 
//                    });
                setTimeout(function(){
                    $(location).attr('href', '../view/painel.php');
                },2000);
                    
                }
            },
        })
        return false;
    });

    //FUNÇÕES GERAL
    function msg(msg, tipo) {

        var retorno = $('.retorno');
        var tipo = (tipo === 'sucesso') ? 'success' :
                (tipo === 'alerta') ? 'warning' :
                (tipo === 'erro') ? 'danger' :
                (tipo === 'info') ? 'info' :
                alert('Informe Mensagens de sucesso, alerta, erro e info');

        retorno.empty().fadeOut('fast', function () {
            return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
        });

        setTimeout(function () {
            retorno.fadeOut('slow').empty();
        }, 2000);
    }
});




