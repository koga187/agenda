var body;
//var projetos = [];
var url;
var path;
var host;

$(document).ready(function(){
    url = window.location.href;
    path = window.location.pathname;
    host = 'http://'+window.location.host;
    body = $('body');

    body.on('show.bs.modal', '#areaModal', function(){
        $.get({
            url: host + '/areas/',
            data: {},
            type:'GET',
            dataType: 'JSON',
            beforeSend: function() {

            },
            success: function($return, $jqHRX) {
                atualizaTabelaArea($return.areas);
            },
            error: function() {

            }
        });
    });
});

function atualizaTabelaArea($jsonArea) {
    var $table = $('#tableArea');

    var tableParams = {
        columns: [
            { field: 'id',  title: 'Código Area',   align: 'center',   valign: 'middle', sortable: true, class : 'noWrap'},
            { field: 'nome',     title: 'Nome',     align: 'left', valign: 'middle', sortable: true }
        ],
        data : $jsonArea
    };

    $table.bootstrapTable(tableParams);
}