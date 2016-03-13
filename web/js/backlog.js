$(document).ready(function(){

    $('td.Tarefa').droppable(function(){
        alert('trabaia cumpadi');
    });

    $('td.Desenvolvendo').droppable(function(){
        alert('Desenvolvi cumpadi');
        alert('Desenvolvi cumpadi');
    });

    $('td.FInalizado').droppable(function(){
        alert('Finaliza cumpadi');
    });

    body.on('click', '#salvarBacklog', function(){
        salvaBacklog({
            nome:$('#tituloTarefa').val(),
            descricao:$('#descricaoTarefa').val(),
            horas:$('#horasTarefa').val(),
            dataInicio:$('#dataInicioTarefa').val(),
            dataFim:$('#dataFimTarefa').val(),
            projetoId: $('#projetoBacklog').attr('data-id')
        });

        var $novaTarefa = $('.tarefaView').clone();
        $novaTarefa.find('.tituloTarefaView').html($('#tituloTarefa').val());
        $novaTarefa.find('.descricaoTarefaView').html($('#descricaoTarefa').val());
        $novaTarefa.find('.horasTarefaView').html($('#horasTarefa').val());
        $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', $('.tarefaAgendada').length+1).draggable();

        $('.to_do_'+$('#projetoBacklog').attr('data-id')).append($novaTarefa);
    });

    $('#modalTarefa').on('show.bs.modal', function(ev){
        if($('#projetoBacklog').attr('data-id') > 0) {

        } else {
            ev.preventDefault();
            alert('Cadastre projetos!');
        }

    });
});

function montarTabelaBacklog(id) {
    $('#backlogTable').append(
        '<tr>' +
            '<td class="to_do_'+id+'" style></td>'+
            '<td class="progress_'+id+'"></td>'+
            '<td class="done_'+id+'"></td>'+
        '</tr>'
    );
}

function salvaBacklog(data) {
    $.post(host+'/backlog/', data, function(){

    });
}