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

    //$('#modalProjeto').on('show.bs.modal', function(ev){
        body.on('click', '#salvarProjeto', function(){

            $.post({
                url:host+'/projetos/',
                type:'POST',
                dataType:'JSON',
                data:{
                    'tituloProjeto':$('#tituloProjeto').val(),
                    'descricaoProjeto':$('#descricaoProjeto').val(),
                    'dataInicio':$('#dataInicio').val(),
                    'dataFim':$('#dataFim').val()
                },

                beforeSend: function(){

                },

                error: function(){
                    alert('Erro!');
                },

                success: function($return, $jqXHR){
                    if($jqXHR == 'success') {
                        alert('Projeto: '+$return.nome+' inserido com sucesso!');
                    } else {
                        alert('Erro ao inserir!');
                    }
                }
            });
            //var key;
            //key = projetos.length;
            //projetos[key] = {
            //    var tituloProjeto = $('#tituloProjeto').val();
            //    var descricaoProjeto = $('#descricaoProjeto').val();
            //    var dataInicio = $('#dataInicio').val();
            //    var dataFim = $('#dataFim').val();
            //};

            //if(path == '/backlog') {
            //    var table = $('#backlogTable');
            //    var projectLine = "<tr class=\"linhaBacklogProjeto\"><td colspan=\"3\"'><h4 class=\"tituloBacklogProjeto\">"+tituloProjeto+"</h4></td></tr>" +
            //        "<tr id=\"projeto_"+tituloProjeto+"\" class=\"backLogLine\">" +
            //        "<td class=\"to_do\"></td>"+
            //        "<td class=\"in_progress\"></td>"+
            //        "<td class=\"done\"></td></tr>";
            //
            //    table.find('tbody').append(projectLine);
            //} else if (path == '/timeline'){
            //
            //}
        //});
    });
});