<?php

    require_once 'models/database.php';
    require_once 'models/classMateria.php';

    $materia = new Materia();
    $materiasAluno = $materia->getMateriasPorAluno(array(":matricula" => $_SESSION['aluno_matricula']))->fetchAll(PDO::FETCH_GROUP);
    $cat_materias  = $materiasAluno;
    $eletivas = $materiasAluno["Eletiva"];
    $obrigatorias = $materiasAluno["Obrigatória"];
    $obrigatoria = array();
?>