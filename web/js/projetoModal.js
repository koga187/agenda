function atualizaTabelaArea(jsonArea) {
    var table = $('#tableProjeto');

    var data = Array();

    $.each(jsonArea, function(key, value){
        data.push($.extend(value,  {acoes : botaoAlteracao(value.id)+botaoExclusao(value.id)}));
    });

    var tableParams = {
        columns: [
            { field: 'id',  title: 'Código',   align: 'center',   valign: 'middle', sortable: true, class : 'noWrap', width : '100px'},
            { field: 'nome',     title: 'Nome',     align: 'left', valign: 'middle', sortable: true, width : '300px'},
            { field: 'acoes',     title: 'Ações',     align: 'center', valign: 'middle', sortable: false }
        ],
        data : data
    };

    table.bootstrapTable(tableParams);
}

function resetTable(){
    var $table = $('#tableProjeto');
    $table.bootstrapTable('resetView');
}