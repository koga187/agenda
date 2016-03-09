function atualizaTabelaArea(jsonArea) {
    var table = $('#tableArea');

    var data = [];

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
                console.log(_data);
            },
            onLoadError: function(_status) {

            },
            columns: [
                { field: 'id',  title: 'Código',   align: 'center',   valign: 'middle', sortable: true, class : 'noWrap', width : '100px'},
                { field: 'nome',     title: 'Nome',     align: 'left', valign: 'middle', sortable: true, width : '300px'},
                { field: 'acoes',     title: 'Ações',     align: 'center', valign: 'middle', sortable: false },
                { field: '',
                    title: '<span class="glyphicon glyphicon-asterisk" data-toggle="tooltip" title="Ações Disponíveis"></span>',
                    align: 'center',
                    valign: 'middle',
                    sortable: false,
                    formatter : acoesBotoes,
                    switchable : false,
                    width: 50
                }
            ]
        });
    });
}

