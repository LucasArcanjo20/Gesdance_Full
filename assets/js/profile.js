$("#form_edit_password").validate({
    rules:{//regras
        new_password:{
            required: true,
            minlength: 8,
         
        },
        repeat_password:{
            required:true,
            minlength: 8,
            equalTo: "#new_password"
        }
    },
    messages:{//mensagem
        new_passwordgin:{
            required: "Preencha o campo",
            minlength: "Insira no mínimo 8 caracteres",
           
        },
        repeat_password:{
            required: "Preencha o campo",
            minlength: "Insira no mínimo 8 caracteres",
            equalTo: "As senhas não conferem"
        }
    }
 
});



