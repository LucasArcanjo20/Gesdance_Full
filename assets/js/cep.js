const cod_postal = "zipcode";

function limpa_formulario_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('street').value = ("");
    document.getElementById('district').value = ("");
    document.getElementById('city').value = ("");
    document.getElementById('state').value = ("");

}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('street').value = (conteudo.logradouro);
        document.getElementById('district').value = (conteudo.bairro);
        document.getElementById(estado_box).value = conteudo.uf;
        muda_estado();//executa mudança de estado
        document.getElementById(cidade_box).value = conteudo.localidade;
        muda_cidade();//executa mudança de cidade
        //------------------------------------
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulario_cep();
        alert("CEP não encontrado.");
        document.getElementById('zipcode').value = ("");
    }
}

function muda_estado() {
    //Selecionar cidades do estado
    document.getElementById(cidade_box).innerHTML = ''; //limpa a cidade
    let estado_selecionado = document.getElementById(estado_box).selectedIndex;
    let cidade_selecionada = document.getElementById(cidade_box).selectedIndex;

    for (var cid in cidades[estado_selecionado]) {
        let c = document.createElement("option");
        c.text = cidades[estado_selecionado][cid];
        c.value = cidades[estado_selecionado][cid];
        document.getElementById(cidade_box).appendChild(c);
    }
    


};
function muda_cidade() {
    //Selecionar Códigos IBGE do município

    let estado_selecionado = document.getElementById(estado_box).selectedIndex;
    let cidade_selecionada = document.getElementById(cidade_box).selectedIndex;

   
};

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep !== "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('street').value = "...";
            document.getElementById('district').value = "...";
            document.getElementById('city').value = "...";
            document.getElementById('state').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulario_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulario_cep();
    }
}

function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i);

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }

}