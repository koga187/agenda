$(document).ready(function(){
    /**
     * Cria area
     */
    body.on('click', '#salvarProjeto', function() {

        $.post({
            url: host + '/areas/',
            type: 'POST',
            dataType: 'JSON',
            data: {
                'nomeArea': $('#nomeArea').val(),
                'descricaoArea': $('#descricaoArea').val()
            },

            beforeSend: function () {

            },

            error: function () {
                alert('Erro!');
            },

            success: function ($return, $jqXHR) {
                if ($jqXHR == 'success') {
                    alert('Area: ' + $return.nome + ' inserido com sucesso!');
                } else {
                    alert('Erro ao inserir!');
                }
            }
        });
    });

});