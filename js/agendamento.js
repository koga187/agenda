$(document).ready(function(){
    var $body = $('body');

    $('span#Tarefa').attr('data-toggle', 'modal').attr('data-target','#modalTarefa');

    $('td.Tarefa').droppable(function(){
        alert('trabaia cumpadi');
    });

    $('td.Desenvolvendo').droppable(function(){
        alert('Desenvolvi cumpadi');
    });

    $('td.FInalizado').droppable(function(){
        alert('Finaliza cumpadi');
    });

    $body.on('click', '#salvarFormulario', function(){
        $novaTarefa = $('.tarefaView').clone();
        $novaTarefa.find('.tituloTarefaView').html($('#tituloTarefa').val());
        $novaTarefa.find('.descricaoTarefaView').html($('#descricaoTarefa').val());
        $novaTarefa.find('.horasTarefaView').html($('#horasTarefa').val());

        $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', $('.tarefaAgendada').length+1).draggable();

        $('td.Tarefa').append($novaTarefa);
    });

    $('#calendar').fullCalendar({
        defaultView: 'Month',
        events: [
            // events go here
        ],
        resources: [
            // resources go here
        ]
        // other options go here...
    });

    //$('.tarefaAgendada').
});

function adicionaTarefa(event) {
    alert('teste');
}