<?php 
session_start(); 
error_reporting( E_ALL );
ini_set('display_errors', 1);
if(!isset($_SESSION['aluno_matricula'])){
    header("Location: index.php?erro=1");
  }
?>