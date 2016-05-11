var body;
var url;
var path;
var host;

$(document).ready(function(){
    url = window.location.href;
    path = window.location.pathname;
    host = 'http://'+window.location.host;
    body = $('body');
});

function createOption(id, values) {
    var option = '<label for="selectArea">Selecione a Area</label>' +
        '<select name="selectArea" id="selectArea" class="form-control">' +
        '<option value="">Selecione uma Area</option>';

    $.each(values, function(key, value){
        option += '<option value="'+value.id+'">'+value.nome+'</option>';
    });

    option += '</<select>';

    return option;
}

function sendDeleteRequest(href) {
    $.ajax({
        url: href,
        data: [],
        dataType: 'json',
        type:'delete',
        error: function() {
            bootbox.alert('Erro na requisiçao!', function() {
                return false;
            });
        },

        success:function(response, status, jqXHR) {
            if(jqXHR.status == '200') {
                bootbox.alert('Excluido com sucesso!', function() {
                    location.reload();
                });
            }
        },
    });
}

function limpaForm(Context) {
    Context.find('input').val('');
    Context.find('select').val('');
}