$(document).ready(function(){
    /**
     * Cria projeto
     */
    body.on('click', '#salvarProjeto', function() {

        $.post({
            url: host + '/area/',
            type: 'POST',
            dataType: 'JSON',
            data: {
                'tituloProjeto': $('#tituloProjeto').val(),
                'descricaoProjeto': $('#descricaoProjeto').val(),
                'dataInicio': $('#dataInicio').val(),
                'dataFim': $('#dataFim').val()
            },

            beforeSend: function () {

            },

            error: function () {
                alert('Erro!');
            },

            success: function ($return, $jqXHR) {
                if ($jqXHR == 'success') {
                    alert('Projeto: ' + $return.nome + ' inserido com sucesso!');
                } else {
                    alert('Erro ao inserir!');
                }
            }
        });
    });

});