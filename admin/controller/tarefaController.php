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
    if ($result) {
        echo '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Tudo certo por aqui =)</h4>
                    <p>Inserção realizada com sucesso</p>
                </div>
                ';
    } else {
        echo '
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Ops! Ocorreu algum erro!</h4>
                <p>Não foi possível inserir a tarefa</p>
            </div>
            ';
    }
} elseif (isset($_POST['excluir'])) { 

    $id = $_POST['id'];
    $result = $tarefa->deleteTask($id);

    if ($result) {
        echo '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Tudo certo por aqui =)</h4>
                    <p>Exclusão realizada com sucesso</p>
                </div>
                ';
    } else {
        echo '
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Ops! Ocorreu algum erro!</h4>
                <p>Não foi possível excluir a tarefa</p>
            </div>
            ';
    }

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
    if ($result) {
        echo '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Tudo certo por aqui =)</h4>
                    <p>Edição realizada com sucesso</p>
                </div>
                ';
    } else {
        echo '
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Ops! Ocorreu algum erro!</h4>
                <p>Não foi possível editar a tarefa</p>
            </div>
            ';
    }
}
$todasTarefas = $tarefa->getAllTasksByAluno($dados1)->fetchAll(PDO::FETCH_OBJ);
?>
