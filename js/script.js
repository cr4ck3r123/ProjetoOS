       
       function validar() {
                var email = loginForm.usuario.value;
                var senha = loginForm.password.value;
                //  alert(email);
                if (email == "" || senha == "") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Preecha todos os campos!',                       
                    });
                    //   formlogin.nome.focus();
                    return false;
                }
               
            }
