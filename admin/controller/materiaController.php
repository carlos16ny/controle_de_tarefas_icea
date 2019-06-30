<?php

    require_once 'models/database.php';
    require_once 'models/classMateria.php';

    $materia = new Materia();

    if(isset($_POST['ativar'])){
        $dados = array(
            ":id_materia" => $_POST['id_materia'],
            ":matricula" => $_SESSION['aluno_matricula']
        );

        $result = $materia->activateMateria($dados);
        
    }

    $materiasAluno = $materia->getMateriasPorAluno(array(":matricula" => $_SESSION['aluno_matricula']))->fetchAll(PDO::FETCH_GROUP);
    $cat_materias  = $materiasAluno;
    $eletivas = $materiasAluno["Eletiva"];
    $obrigatorias = $materiasAluno["Obrigatória"];

    $concluidas = array();
    $cursando = array();
    $possoCursar = array();
    $reprovadas = array();

    foreach($eletivas as $e){
        if($e['status'] == 1){
            array_push($cursando, $e);
        }elseif($e['status'] == 2){
            array_push($concluidas, $e);
        }elseif($e['status'] == 3){
            array_push($reprovadas, $e);
        }else{
            array_push($possoCursar, $e);
        }
    }

    foreach($obrigatorias as $e){
        if($e['status'] == 1){
            array_push($cursando, $e);
        }elseif($e['status'] == 2){
            array_push($concluidas, $e);
        }elseif($e['status'] == 3){
            array_push($reprovadas, $e);
        }else{
            array_push($possoCursar, $e);
        }
    }
?>