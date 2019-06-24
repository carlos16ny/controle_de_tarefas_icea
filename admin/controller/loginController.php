<?php
session_start();

require_once 'models/database.php';
require_once 'models/classLogin.php';

$login = new Login();

if (isset($_POST['entrar'])) {

  $matricula = $_POST['matricula'];
  $senha = $_POST['senha'];

  $login->setMatricula($matricula);
  $login->setSenha($senha);

  $aluno = $login->existsLogin()->fetch(PDO::FETCH_OBJ);
  if($aluno){

    $_SESSION['aluno_matricula'] = $aluno->registration;
    $_SESSION['aluno_email'] = $aluno->email;
    $_SESSION['aluno_nome'] = $aluno->name . " " . $aluno->surname;
    $_SESSION['aluno_curso'] = $aluno->curso;

  }else{
    echo '
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Ops! Ocorreu algum erro!</h4>
        <p>Verifique suas informações e tente novamente</p>
      </div>
    ';
  }

}else if(isset($_POST['registrar'])){

  $dados = array(
    ":matricula" => $_POST['matricula'],
    ":nome" => $_POST['nome'],
    ":sobrenome" => $_POST['sobrenome'],
    ":email" => $_POST['email'],
    ":senha" => sha1($_POST['senha']),
    ":curso" => $_POST['curso'],
  );

  $result = $login->insertAluno($dados);
  if($result){
    echo '
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Aluno registrado com sucesso!</h4>
        <p>Retorne a página de login e aproveite a faculdade</p>
      </div>
    ';
  }else{
    echo '
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Ops! Ocorreu algum erro!</h4>
        <p>Verifique suas informações e tente novamente</p>
      </div>
    ';
  }
}

?>
