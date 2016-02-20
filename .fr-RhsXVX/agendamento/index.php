<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=agendamento','root','root');

$query = 'SELECT * FROM status';

$res = $pdo->query($query);

$arrayCabecalho = array();

while($status = $res->fetch()) {
    $arrayCabecalho[] = $status['nome'];
}

?>

<html>
<title>
    Agendamento
</title>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- style agenda -->
    <link rel="stylesheet" type="text/css" href="css/agendamento.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js" type="application/javascript"></script>
    <script src="js/jquery-ui/jquery-ui.js" type="application/javascript"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">

    <script src="js/agendamento.js" type="application/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body class="body">
<table class="table table-bordered">
    <thead>
        <tr>
    <?php foreach($arrayCabecalho as $cabecalho):?>
            <th><?php echo $cabecalho ?><span class="glyphicon glyphicon-plus" id="<?php echo $cabecalho ?>"></span></th>
    <?php endforeach;?>
        </tr>
    </thead>
    <tbody class="table-bordered">
        <tr style="height: 100vh">
            <?php foreach($arrayCabecalho as $cabecalho):?>
                <td class="<?php echo $cabecalho ?>"></td>
            <?php endforeach;?>
        </tr>
    </tbody>
    <tfoot>
    </tfoot>
</table>

<div class="tarefaView">
    <h4 class="tituloTarefaView"></h4>
    <span class="descricaoTarefaView"></span>
    <span class="horasTarefaView"></span>
</div>
<!-- Modal -->
<div class="modal fade" id="modalTarefa" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastro Tarefa</h4>
            </div>
            <div class="modal-body">
                <form name="formTarefa" >
                    <div class="form-group">
                        <label for="tituloTarefa">Titulo</label>
                        <input type="text" name="tituloTarefa" id="tituloTarefa" class="form-control"/>
                        <label for="descricaoTarefa">Descrição</label>
                        <input type="text" name="descricaoTarefa" id="descricaoTarefa" class="form-control"/>
                        <label for="horasTarefa">Horas</label>
                        <input type="text" name="horasTarefa" id="horasTarefa" class="form-control">
                    </div>
                </form>
             </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default"  value="salvar" id="salvarFormulario">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>