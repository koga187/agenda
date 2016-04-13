$(document).ready(function(){
    var modalAreaForm = $('#areaForm');
    /**
     * Cria area
     */
    body.on('click', '#salvarArea', function() {

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
                    habilitaGridAreaEmail($return.id);
                } else {
                    alert('Erro ao inserir!');
                }
            }
        });
    });

    body.on('click', '.adicionaEmail', function() {
        if($('#nomeEmail').val() != '' && $('#email').val() != '') {
            $.post({
                url: host + '/email_areas/',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'nomeEmail': $('#nomeEmail').val(),
                    'email': $('#email').val(),
                    'idArea': $('#idArea').val()
                },

                beforeSend: function () {

                },

                error: function () {

                },

                success: function ($return, $jqXHR) {
                    if ($jqXHR == 'success') {
                        adicionaLinhaEmail($return.id, $return.nome, $return.email);
                    } else {
                        alert('Erro ao inserir!');
                    }
                }
            });
        } else {
            alert('Preencha todos os dados de Email!');
        }
    });

    modalAreaForm.on('hide.bs.modal', function(){
        limpaForm($(this));
        $('.grid').hide();
        $('tr.emailArea').remove()
    });

});

function habilitaGridAreaEmail($_codigo) {
    $('div#areaForm .grid').css('display', 'inline');
    $('#idArea').val($_codigo)
}

 function adicionaLinhaEmail(id, nome, email) {
     $tr = '<tr class="emailArea email_'+id+'"><td>'+nome+'</td><td>'+email+'</td><td><span class="glyphicon glyphicon-remove deleteEmail"></span></td></tr>'
     $('table.tabelaEmail > tbody').append($tr);
 }