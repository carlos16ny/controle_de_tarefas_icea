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
        
    }elseif(isset($_POST['concluir'])){
        $dados = array(
            ":id_materia" => $_POST['id_materia'],
            ":matricula" => $_SESSION['aluno_matricula']
        );
        $result = $materia->concluirMateria($dados);
    }elseif(isset($_POST['concluirsemestre'])){
        $materiasParaConcluir = $materia->getMateriasCursando($_SESSION['aluno_matricula'])->fetchAll(PDO::FETCH_OBJ);
        $result = ComputaSemestre($materiasParaConcluir);
    }elseif(isset($_POST['restart'])){
        $dados = array(
            ":id_materia" => $_POST['id_materia'],
            ":matricula" => $_SESSION['aluno_matricula']
        );
        $result = $materia->restartMateria($dados);
        $result = $materia->activateMateria($dados);
    }


    function ComputaSemestre($materiasParaConcluir){
        $mat = new Materia();
        foreach ($materiasParaConcluir as $m) {
            try{
                $r = $mat->getResultMateria(array(":matricula" => $_SESSION['aluno_matricula'], ":materia" => $m->id))->fetch(PDO::FETCH_OBJ);
                if($r->resultado >= 60){
                    $mat->concluirMateria(array(":matricula" => $_SESSION['aluno_matricula'], ":id_materia" => $m->id));
                }else{
                    $mat->reprovarMateria(array(":matricula" => $_SESSION['aluno_matricula'], ":id_materia" => $m->id));
                }
            }catch(ErrorException $e){
                return 0;
            }
        }
        return 1;
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