$(document).ready(function(){
    /**
     * Cria projeto
     */
    body.on('click', '#salvarProjeto', function() {

        url = '/projetos/';

        var codigoProjeto = $('#codigoProjeto');

        if(codigoProjeto.val() != '') {
            atualizaProjeto(codigoProjeto.val());
        } else {
            salvaProjeto();
        }


    });

});

function salvaProjeto() {
    $.post({
        url: host + '/projetos/',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'tituloProjeto': $('#tituloProjeto').val(),
            'descricaoProjeto': $('#descricaoProjeto').val(),
            'dataInicio': $('#dataInicioProjeto').val(),
            'dataFim': $('#dataFimProjeto').val(),
            'selectArea': $('#selectArea').val()
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
}

function atualizaProjeto(codigoProjeto) {

    $.ajax({
        url: host + '/projetos/' + codigoProjeto,
        type: 'PUT',
        dataType: 'JSON',
        data: {
            'id': $('#codigoProjeto').val(),
            'tituloProjeto': $('#tituloProjeto').val(),
            'descricaoProjeto': $('#descricaoProjeto').val(),
            'dataInicio': $('#dataInicioProjeto').val(),
            'dataFim': $('#dataFimProjeto').val(),
            'selectArea': $('#selectArea').val()
        },

        success: atualizaTabelaProjeto()
    });
}