$(document).ready(function(){

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
        $novaTarefa.find('.descricaoTarefaView').html($('#descricaoTarefa').val());
        $novaTarefa.find('.horasTarefaView').html($('#horasTarefa').val());
        $novaTarefa.removeClass('tarefaView').addClass('tarefaAgendada').attr('id', $('.tarefaAgendada').length+1).draggable();

        $('tr#projeto_'+$('#optionProjetoTarefa').val()+' td.to_do').append($novaTarefa);
    });

    $('#modalTarefa').on('show.bs.modal', function(ev){
        if($('.tituloBacklogProjeto').length > 0) {
            if($('#optionProjetoTarefa').length > 0) {
                $('#optionProjetoTarefa').remove();
            }
            var optionProjeto = '<select id="optionProjetoTarefa" class="form-control">';
            $('.tituloBacklogProjeto').each(function(){
                optionProjeto += '<option value="'+$(this).html()+'">'+$(this).html()+'</option>';
            });
            optionProjeto += '</select>';

            $(this).find('.modal-body').append(optionProjeto);
        } else {
            ev.preventDefault();
            alert('Cadastre projetos!');
        }

    });
});