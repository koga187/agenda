$(document).ready(function(){
    var projetoModal = $('#projetoModal');

    body.on('click', 'a.editProjeto', function(e){
        editProjeto(event, $(this).attr('href'));
    });

    projetoModal.on('show.bs.modal', function(){
        geraTabelaProjeto();
    });
});

function atualizaTabelaProjeto() {
    $('#projetoForm').modal('hide');
    $(function () {
        $('#tableProjeto').bootstrapTable('refresh');
    });
}

function geraTabelaProjeto() {

    $(function () {
        $('#tableProjeto').bootstrapTable({
            method: 'get',
            url: host+'/projetos/',
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
                alert(_status);
            },
            columns: [
                { field: 'id',  title: 'Código',   align: 'center',   valign: 'middle', sortable: true, class : 'noWrap', width : '100px'},
                { field: 'nome',     title: 'Nome',     align: 'left', valign: 'middle', sortable: true, width : '300px'},
                //{ field: 'dataInicio',     title: 'Inicio',     align: 'center', valign: 'middle', sortable: false},
                //{ field: 'dataFim',     title: 'Fim',     align: 'center', valign: 'middle', sortable: false},
                { field: '',
                    title: '<span class="glyphicon glyphicon-asterisk" data-toggle="tooltip" title="Ações Disponíveis"></span>',
                    align: 'center',
                    valign: 'middle',
                    sortable: false,
                    formatter : acoesBotoesProjeto,
                    switchable : false,
                    width: 50
                }
            ]
        });


        body.on('click', 'a.excluirProjeto', function(e){
            e.preventDefault();
            if(sendDeleteRequest($(this).attr('href'))) {
                $('#tableProjeto').refresh();
            }
        });
    });
}

function editProjeto(event, url) {
    event.preventDefault();
    $('#projetoForm').modal('show');

    $.get(url, function(data){
        data = JSON.parse(data);

        $('#tituloProjeto').val(data.nome);
        $('#descricaoProjeto').val(data.descricao);
        $('#selectArea').val(data.idArea);
        $('#dataInicioProjeto').val(data.dataInicio);
        $('#dataFimProjeto').val(data.dataFim);
        $('#codigoProjeto').val(data.id);
    });
}

function acoesBotoesProjeto() {
    return [
        '<a class="backlogFromProject" data-toggle="tooltip" title="Backlog" href="',host,'/backlog/projeto/',arguments[1].id,'"' +
        'data-id="',arguments[1].id,'" data-nome="',arguments[1].nome,'">',
        '<span class="glyphicon glyphicon-th"></span>',
        '</a>',
        '<a class="editProjeto" data-toggle="tooltip" title="Editar" href="',host,'/projetos/',arguments[1].id,'">',
        '<span class="glyphicon glyphicon-pencil"></span>',
        '</a>',
        '<a class="excluirProjeto" data-toggle="tooltip" title="Excluir" href="',host,'/projetos/',arguments[1].id,'">',
        '<span class="glyphicon glyphicon-trash"></span>',
        '</a>'
    ].join('');
}