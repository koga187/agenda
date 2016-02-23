var $body;

$(document).ready(function(){
    $body = $('body');

    $('td.Tarefa').droppable(function(){
        alert('trabaia cumpadi');
    });

    $('td.Desenvolvendo').droppable(function(){
        alert('Desenvolvi cumpadi');
    });

    $('td.FInalizado').droppable(function(){
        alert('Finaliza cumpadi');
    });

    $('#modalTarefa').on('show.bs.modal', function(ev){
        $body.on('click', '#salvarFormulario', function(){
            $novaTarefa = $('.tarefaView').clone();
            $novaTarefa.find('.tituloTarefaView').html($('#tituloTarefa').val());
            $novaTarefa.find('.descricaoTarefaView').html($('#descricaoTarefa').val());
            $novaTarefa.find('.horasTarefaView').html($('#horasTarefa').val());

            $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', $('.tarefaAgendada').length+1).draggable();

            $('td.to_do').append($novaTarefa);
        });

    });
    //$('#calendar').fullCalendar({
    //    defaultView: 'Month',
    //    events: [
    //        // events go here
    //    ],
    //    resources: [
    //        // resources go here
    //    ]
    //    // other options go here...
    //});

    //$('.tarefaAgendada').
});

function adicionaTarefa(event) {
    alert('teste');
}