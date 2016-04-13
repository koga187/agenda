$(document).ready(function(){
    var areaModal = $('#areaModal');

    areaModal.on('show.bs.modal', function(){
        geraTabelaArea();
    });


    body.on('click', 'a.editArea', function(e){
        editArea(event, $(this).attr('href'));
    });
});

function geraTabelaArea() {
    $(function () {
        $('#tableArea').bootstrapTable({
            method: 'get',
            url: host+'/areas/',
            dataType:'json',
            responseHandler: function(res) {
                if(res['total'] > 0) {
                    return res;
                }

                return {total:0, rows:[]};
            },
            onLoadSuccess: function(_data) {
            },
            onLoadError: function(_status) {

            },
            columns: [
                { field: 'id',  title: 'Código',   align: 'center',   valign: 'middle', sortable: true, class : 'noWrap', width : '100px'},
                { field: 'nome',     title: 'Nome',     align: 'left', valign: 'middle', sortable: true, width : '300px'},
                { field: '',
                    title: '<span class="glyphicon glyphicon-asterisk" data-toggle="tooltip" title="Ações Disponíveis"></span>',
                    align: 'center',
                    valign: 'middle',
                    sortable: false,
                    formatter : acoesBotoesArea,
                    switchable : false,
                    width: 50
                }
            ]
        });
    });
}

function acoesBotoesArea() {
    return [
        '<a class="editArea" data-toggle="tooltip" title="Editar" href="',host,'/areas/emails/',arguments[1].id,'">',
        '<span class="glyphicon glyphicon-pencil"></span>',
        '</a>',
        '<a class="excluirArea" data-toggle="tooltip" title="Excluir" href="',host,'/areas/',arguments[1].id,'">',
        '<span class="glyphicon glyphicon-trash"></span>',
        '</a>'
    ].join('');
}

function editArea(event, url) {
    event.preventDefault();
    $('#areaForm').modal('show');

    $.get(url, function(data){
        data = JSON.parse(data);

        $.each(data, function(key, area) {
            $('#nomeArea').val(area.nome);
            $('#descricaoArea').val(area.descricao);
            $('#idArea').val(area.id);
            $('.grid').show();

            if(typeof area.email != 'undefined') {
                $.each(area.email, function(key, emailVal){
                    adicionaLinhaEmail(emailVal.id, emailVal.nome, emailVal.email)
                });
            }
        });
    });
}