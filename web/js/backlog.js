$(document).ready(function(){
    var jsonTarefas = $('#jsonTarefas').text();
    var modalTarefa = $('#modalTarefa');

    if(jsonTarefas != '') {
        jsonTarefas = JSON.parse(jsonTarefas);
        addTarefa(jsonTarefas);
    }

    $('td.Tarefa').droppable(function(){
        alert('trabaia cumpadi');
    });

    $('td.Desenvolvendo').droppable(function(){
        alert('Desenvolvi cumpadi');
        alert('Desenvolvi cumpadi');
    });

    $('td.Finalizado').droppable(function(){
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

    });

    body.on('click', '.editTarefa', function(e){
        e.preventDefault();
        $.get($(this).attr('href'), function(data){
            var jsonData = JSON.parse(data);
            modalTarefa.find('#tituloTarefa').val(jsonData.nome);
            modalTarefa.find('#descricaoTarefa').val(jsonData.descricao);
            modalTarefa.find('#horasTarefa').val(jsonData.hora);
            modalTarefa.find('#dataInicioTarefa').val(jsonData.dataInicio);
            modalTarefa.find('#dataFimTarefa').val(jsonData.dataFim);
            modalTarefa.find('#idTarefa').val(jsonData.id);

            modalTarefa.modal('show');
        });
    });

    modalTarefa.on('hide.bs.modal', function(){
        clearModalTarefa();
    });

    modalTarefa.on('show.bs.modal', function(ev){
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
    $.ajax({
        url: host+'/backlog/',
        data: data,
        error: function() {
            alert('Erro na requisição');
        },
        success: function(response) {
            addTarefa(response);
        }
    });
}

function addTarefa(jsonTarefas) {
    $.each(jsonTarefas, function(key, tarefa){
        var $novaTarefa = $('.tarefaView').clone();
        $novaTarefa.find('.tituloTarefaView').html(tarefa.nome);
        $novaTarefa.find('.descricaoTarefaView').html(tarefa.descricao);
        $novaTarefa.find('.horasTarefaView').html(tarefa.hora);
        $novaTarefa.find('.editTarefa').attr('href', 'http://agenda.local:8888/backlog/'+tarefa.id);
        $novaTarefa.find('.excluirTarefa').attr('href', 'http://agenda.local:8888/backlog/'+tarefa.id);
        $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', tarefa.id).draggable();

        $('.to_do_'+$('#projetoBacklog').attr('data-id')).append($novaTarefa);
    });
}

function clearModalTarefa() {
    var modalTarefa = $('#modalTarefa');
    modalTarefa.find('#tituloTarefa').val('');
    modalTarefa.find('#descricaoTarefa').val('');
    modalTarefa.find('#horasTarefa').val('');
    modalTarefa.find('#dataInicioTarefa').val('');
    modalTarefa.find('#dataFimTarefa').val('');
    modalTarefa.find('#idTarefa').val('');
}