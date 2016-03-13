var body;
var url;
var path;
var host;

$(document).ready(function(){
    url = window.location.href;
    path = window.location.pathname;
    host = 'http://'+window.location.host;
    body = $('body');

    body.on('show.bs.modal', '#areaModal', function(){
        geraTabelaArea();
    });

    body.on('show.bs.modal', '#projetoModal', function(){
        geraTabelaProjeto();
    });

    body.on('show.bs.modal', '#projetoForm', function(){
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

    body.on('click', 'a.editProjeto', function(e){
        editProjeto(event, $(this).attr('href'));
    });
});

function createOption(id, values) {
    option = '<label for="selectArea">Selecione a Area</label>' +
        '<select name="selectArea" id="selectArea" class="form-control">' +
        '<option value="">Selecione uma Area</option>';

    $.each(values, function(key, value){
        option += '<option value="'+value.id+'">'+value.nome+'</option>';
    });

    option += '</<select>';

    return option;
}