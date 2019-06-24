<?php include_once 'admin/protection.php' ; ?>
<?php include_once 'assets/templates/header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Perfil do Usuário
      </h1>
      <ol class="breadcrumb">
        <li><a href="menu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="assets/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$_SESSION['aluno_nome']?></h3>

              <p class="text-muted text-center"><?=$_SESSION['aluno_curso']?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
          </div>
        </div>
      <div class="col-md-4"></div>
      </div>

    </section>
    <!-- /.content -->
<?php include_once 'assets/templates/footer.php' ?>