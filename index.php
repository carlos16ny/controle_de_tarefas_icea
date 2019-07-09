<?php 
  require_once 'admin/controller/loginController.php';
  if(isset($_SESSION['aluno_matricula'])){
    header("Location: menu.php");
  }
  $erro = $_GET['erro'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Controle de Matérias | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<?php if(isset($erro) &&  $erro = 1) {?> 
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>Erro 101</h4>
    <p>O login deve ser realizado</p>
</div>
<?php } ?>
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Minha </b>AGENDA</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Login</p>
    <form action="index.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="matricula" class="form-control" placeholder="matricula">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" name="entrar" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
      </div>
    </form>

    <a href="register.php" class="text-center">Novo Aluno</a>

  </div>
</div>

<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
