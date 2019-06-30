<?php
$dados = file_get_contents("php://input");
$dados = json_decode($dados);

require_once '../../models/database.php';
require_once '../../models/classTarefa.php';

$tarefa = new Tarefa();

$tarefas = $tarefa->getAllTasksByMatricula(array(":matricula" => $dados->matricula))->fetchAll(PDO::FETCH_OBJ);
echo json_encode($tarefas, JSON_UNESCAPED_UNICODE);

?>