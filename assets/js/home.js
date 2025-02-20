function date_now(){
    var dataAtual = new Date();
    var dia = dataAtual.getDate();
    var mes = (dataAtual.getMonth() + 1);
    var ano = dataAtual.getFullYear();
    var horas = dataAtual.getHours();
    var minutos = dataAtual.getMinutes();

    return (dia + "/" + mes + "/" + ano + "<br>" + horas + ":" + minutos);
}

document.addEventListener("DOMContentLoaded", function() { 
    document.querySelector("#info_date").innerHTML = date_now();  
});

