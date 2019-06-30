<?php
require_once 'models/database.php';
require_once 'models/classMateria.php';
require_once 'models/classTarefa.php';

$tarefa = new Tarefa();

$dados1 = array(
    ":matricula" => $_SESSION['aluno_matricula'],
    ":materia" => $_GET['id']
);

if (isset($_POST['adicionar'])) {
    $dados2 = array(
        ":matricula" => $_SESSION['aluno_matricula'],
        ":materia_id" => $_GET['id'],
        ":nome" => $_POST['nome'],
        ":valor" => $_POST['valor'],
        ":data_inicio" => $_POST['data_inicio'] . " " . $_POST['tempo_inicio'],
        ":data_final" => $_POST['data_final'] . " " . $_POST['tempo_final'],
        ":cor" => $_POST['cor'],
    );

    $result = $tarefa->insertTask($dados2);
    
} elseif (isset($_POST['excluir'])) { 

    $id = $_POST['id'];
    $result = $tarefa->deleteTask($id);


}elseif(isset($_POST['editar'])){
    $dados3 = array(
        ":id" => $_POST['id'],
        ":nome" => $_POST['nome'],
        ":valor" => $_POST['valor'],
        ":nota" => $_POST['nota'],
        ":data_inicio" => $_POST['data_inicio'] . " " . $_POST['tempo_inicio'],
        ":data_final" => $_POST['data_final'] . " " . $_POST['tempo_final'],
        ":cor" => $_POST['color'],
    );

    $result = $tarefa->editTask($dados3);

}
$todasTarefas = $tarefa->getAllTasksByAluno($dados1)->fetchAll(PDO::FETCH_OBJ);
?>
