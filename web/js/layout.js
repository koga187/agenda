var body;
//var projetos = [];
var url;
var path;

$(document).ready(function(){
    url = window.location.href;
    path = window.location.pathname;
    body = $('body');

    //$('#modalProjeto').on('show.bs.modal', function(ev){
        body.on('click', '#salvarProjeto', function(){
            //var key;
            //key = projetos.length;
            //projetos[key] = {
                var tituloProjeto = $('#tituloProjeto').val();
                var descricaoProjeto = $('#descricaoProjeto').val();
                var dataInicio = $('#dataInicio').val();
                var dataFim = $('#dataFim').val();
            //};

            if(path == '/backlog') {
                var table = $('#backlogTable');
                var projectLine = "<tr class=\"linhaBacklogProjeto\"><td colspan=\"3\"'><h4 class=\"tituloBacklogProjeto\">"+tituloProjeto+"</h4></td></tr>" +
                    "<tr id=\"projeto_"+tituloProjeto+"\" class=\"backLogLine\">" +
                    "<td class=\"to_do\"></td>"+
                    "<td class=\"in_progress\"></td>"+
                    "<td class=\"done\"></td></tr>";

                table.find('tbody').append(projectLine);
            } else if (path == '/timeline'){

            }
        //});
    });
});