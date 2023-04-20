$(document).ready(function () {
    //quando o campo codcidade perder a seleção ativa a função
    $("input[name='codCidade']").blur(function() {
        //declaramos que a variavel corresponde ao campo cidade
        var $cidade = $("input[name='cidade']");
        //declaramos que a variavel codigo recebe o valor inserido no campo
        var codigo  = $(this).val();

        //coletamos o retorno do arquivo de busca, o valor do campo
        $.getJSON('buscaCidade.php', {codigo},
            //e dispara a função que preenche o campo
            function(retorno) {
                //insere o valor recebido na posição .cidade
                $cidade.val(retorno.cidade);
            }
        );
    });
});
