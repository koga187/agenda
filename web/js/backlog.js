$(document).ready(function(){

    body.on('click', '.backlogFromProject', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        var nome = $(this).data('nome');
        var id = $(this).data('id');
        var backLogTable = $('#projetoBacklog');

        $.get({
            url:link,
            error: function(){
                alert('Erro ao buscar os dados!');
            },
            success: function(data) {
                $('#projetoModal').modal('hide');
                backLogTable.text(nome);
                backLogTable.attr('data-id', id);

                motarTabelaBacklog(id);
            }
        })

    });

    $('td.Tarefa').droppable(function(){
        alert('trabaia cumpadi');
    });

    $('td.Desenvolvendo').droppable(function(){
        alert('Desenvolvi cumpadi');
    });

    $('td.FInalizado').droppable(function(){
        alert('Finaliza cumpadi');
    });

    body.on('click', '#salvarFormulario', function(){
        var $novaTarefa = $('.tarefaView').clone();
        $novaTarefa.find('.tituloTarefaView').html($('#tituloTarefa').val());
        //$novaTarefa.find('.descricaoTarefaView').html($('#descricaoTarefa').val());
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

function motarTabelaBacklog(id) {
    $('#backlogTable').append(
        '<tr>' +
            '<td class="to_do_'+id+'" style></td>'+
            '<td class="progress_'+id+'"></td>'+
            '<td class="done_'+id+'"></td>'+
        '</tr>'
    );
}