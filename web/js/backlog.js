var projetoId;

$(document).ready(function(){
    var jsonTarefas = $('#jsonTarefas').text();
    var modalTarefa = $('#modalTarefa');
    projetoId = $('#projetoBacklog').attr('data-id');

    if(jsonTarefas != 'Array' && jsonTarefas.length > 0) {
        jsonTarefas = JSON.parse(jsonTarefas);
        addTarefa(jsonTarefas);
    }

    $('td.to_do_'+projetoId).droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            updateStatusBacklog({
                id:event.toElement.getAttribute('id'),
                idStatus:event.target.getAttribute('data-id')
            });
        }
    });

    $('td.progress_'+projetoId).droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            updateStatusBacklog({
                id:event.toElement.getAttribute('id'),
                idStatus:event.target.getAttribute('data-id')
            });
        }
    });

    $('td.done_'+projetoId).droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            updateStatusBacklog({
                id:event.toElement.getAttribute('id'),
                idStatus:event.target.getAttribute('data-id')
            });
        }
    });

    body.on('click', '#salvarBacklog', function(){
        var typeRequest = 'post';
        var idTarefa = $('#idTarefa').val();
        if(idTarefa != '') {
            typeRequest = 'put';
        }

        salvaBacklog({
            id: idTarefa,
            nome:$('#tituloTarefa').val(),
            descricao:$('#descricaoTarefa').val(),
            horas:$('#horasTarefa').val(),
            dataInicio:$('#dataInicioTarefa').val(),
            dataFim:$('#dataFimTarefa').val(),
            projetoId: $('#projetoBacklog').attr('data-id')
        }, typeRequest);
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

    body.on('click', 'a.excluirTarefa', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            data: [],
            dataType: 'json',
            type:'delete',
            error: function() {
                alert('Erro na requisiçao!');
            },

            success:function(response, status, jqXHR) {
                if(jqXHR.status == '200') {
                    $('div#'+response.id).remove();
                    alert('Excluido com sucesso!');
                }
            },
        });
    });
});

function salvaBacklog(data, typeRequest) {
    $.ajax({
        url: host+'/backlog/',
        data: data,
        type:typeRequest,
        error: function() {
            alert('Erro na requisição');
        },
        success: function(response, textStatus) {
            if(textStatus == 'success') {
                location.reload();
            } else {
                alert('Erro no retorno do servidor');
            }
        }
    });
}


function updateStatusBacklog(data) {
    $.ajax({
        url: host+'/status_tarefa/',
        data: data,
        type:'post',
        error: function() {
            alert('Erro na requisição');
        },
        success: function(response, textStatus) {
            if(textStatus == 'success') {
            } else {
                alert('Erro no retorno do servidor');
            }
        }
    });
}

function addTarefa(jsonTarefas) {
    if(jsonTarefas)
    $.each(jsonTarefas, function(key, tarefa){
        var $novaTarefa = $('.tarefaView').clone();
        $novaTarefa.find('.tituloTarefaView').html(tarefa.nome);
        $novaTarefa.find('.descricaoTarefaView').html(tarefa.descricao);
        $novaTarefa.find('.horasTarefaView').html(tarefa.hora);
        $novaTarefa.find('.editTarefa').attr('href', 'http://agenda.local:8888/backlog/'+tarefa.id);
        $novaTarefa.find('.excluirTarefa').attr('href', 'http://agenda.local:8888/backlog/'+tarefa.id);
        $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', tarefa.id).draggable(
            { containment: ".table-bordered",
                revert: "invalid",
                scroll: true });

        $('tbody.table-bordered').find('[data-id="'+tarefa.statusId+'"]').append($novaTarefa);
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