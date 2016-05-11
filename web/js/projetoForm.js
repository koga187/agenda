$(document).ready(function(){
    var modalProjetoForm = $('#projetoForm');

    modalProjetoForm.on('show.bs.modal', function(){
        $.get({
            url: host + '/areas/',
            data: {},
            type:'GET',
            dataType: 'JSON',
            beforeSend: function() {

            },
            success: function($return) {
                var selectArea = $('#selectArea');

                if(selectArea.length > 0) {
                    selectArea.remove();
                }
                $('div#formProjeto').append(createOption('selectArea', $return.rows));
            },
            error: function() {

            }
        });
    });

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

    modalProjetoForm.on('hide.bs.modal', function(){
        limpaForm($(this));
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
            bootbox.alert('Erro!');
        },

        success: function ($return, $jqXHR) {
            if ($jqXHR == 'success') {
                bootbox.alert('Projeto: ' + $return.nome + ' inserido com sucesso!');
            } else {
                bootbox.alert('Erro ao inserir!');
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