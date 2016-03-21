$(document).ready(function(){
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
                        $tr = '<tr '+$return.id+'><td>'+$return.nome+'</td><td>'+$return.email+'</td><td><span class="glyphicon glyphicon-remove deleteEmail"></span></td></tr>'
                        $('table.tabelaEmail > tbody').append($tr);
                    } else {
                        alert('Erro ao inserir!');
                    }
                }
            });
        } else {
            alert('Preencha todos os dados de Email!');
        }
    });
});

function habilitaGridAreaEmail($_codigo) {
    $('div#areaForm .grid').css('display', 'inline');
    $('#idArea').val($_codigo)
}