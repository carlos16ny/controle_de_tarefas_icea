<?php 
require_once 'models/database.php';
require_once 'models/classLogin.php';

session_start();

if (isset($_SESSION)) {
  session_unset();
  session_destroy();
}
$login = new Login();


if(isset($_POST['entrar'])) {
  
    $matricula = $_POST['matricula'];
  $senha = $_POST['senha'];

    $login->setMatricula($matricula);
    $login->setSenha($senha);

    $count = $login->existsLogin()->fetch(PDO::FETCH_OBJ);
    if (count($count) = 1){
        $_SESSION['matricula'] = $count->registration;
        $_SESSION['name'] = $count->name;
        $_SESSION['email'] = $count->email;
    } else {
        $error = 1;
    }
    
}
