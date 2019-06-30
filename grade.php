<?php require_once 'admin/protection.php'; ?>
<?php include_once 'admin/controller/materiaController.php' ?>
<?php include_once 'assets/templates/header.php'; ?>
<div class="content-wrapper">

<?php

if(isset($result)){
    if($result){
        echo '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Tudo certo por aqui!</h4>
            <p>Modificações realizadas com sucesso.</p>
        </div>
        ';
    }else{
        echo '
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Ops! Ocorreu algum erro!</h4>
            <p>Tente novamente</p>
        </div>
        ';
    }
}

?>
    <section class="content-header">
        <h1>
            Matérias de <?= $_SESSION['aluno_curso'] ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="menu.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Grade curricular</li>
        </ol>
    </section>


    <section class="content">

        <div class="row" style="margin-bottom: 3rem; margin-top: 2rem;">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">

                        <button class="btn btn-success" data-target="#concluir" data-toggle="modal">Concluir Semestre</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Obrigatórias </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-grade table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Periodo</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                        <?php 
                                            $a = "1";
                                            foreach($obrigatorias as $ob) {

                                                if($ob['status'] == '1'){
                                                    $btnicon = 'stop';
                                                    $btntext = 'Concluir';
                                                    $labelcolor = 'warning';
                                                    $label = 'Cursando';
                                                    $link = 'data-toggle="modal" data-target="#materia-'. strtoupper($ob['id']) . '"';
                                                }else if($ob['status'] == '2'){
                                                    $btnicon = 'eye';
                                                    $btntext = 'Ver';
                                                    $labelcolor = 'success';
                                                    $label = 'Aprovado';
                                                    $link = 'href="materia.php?id=' . $ob['id'] . '"';
                                                }elseif($ob['status'] == '3'){
                                                    $btnicon = 'repeat';
                                                    $btntext = 'Recomeçar';
                                                    $labelcolor = 'danger';
                                                    $label = 'Reprovado';
                                                    $link = 'data-toggle="modal" data-target="#materia-'. strtoupper($ob['id']) . '"';
                                                }else{
                                                    $btnicon = 'play';
                                                    $btntext = 'Cursar';
                                                    $labelcolor = 'primary';
                                                    $label = 'Pendente';
                                                    $link = 'data-toggle="modal" data-target="#materia-'. strtoupper($ob['id']) . '"';
                                                }

                                            if($a != $ob['semester']){
                                                echo '<tr><td colspan="5" class="bg-blue"></td></tr>';
                                            }
                                            $a = $ob['semester'];
                                        ?>
                                            <tr>
                                                <td><?=$ob['id']?></td>
                                                <td><?=$ob['name']?></td>
                                                <td><?=$ob['semester']?></td>
                                                <td><span class="label label-<?=$labelcolor?>"><?=$label?></span></td>
                                                <td>
                                                    <a class="btn btn-app" <?=$link?> >
                                                        <i class="fa fa-<?=$btnicon?>"></i> <?=$btntext?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Eletivas </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Periodo</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                        <?php 
                                            foreach($eletivas as $ob) {
                                                if($ob['status'] == '1'){
                                                    $labelcolor = 'warning';
                                                    $label = 'Cursando';
                                                }else if($ob['status'] == '2'){
                                                    $labelcolor = 'success';
                                                    $label = 'Aprovado';
                                                }else{
                                                    $labelcolor = 'primary';
                                                    $label = 'Pendente';
                                                }
                                        ?>
                                            <tr>
                                                <td><?=$ob['id']?></td>
                                                <td><?=$ob['name']?></td>
                                                <td>-</td>
                                                <td><span class="label label-<?=$labelcolor?>"><?=$label?></span></td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fa fa-play"></i> Play
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </section>

    <?php foreach($cursando as $c) { ?>
        <div class="modal fade" id="materia-<?=$c['id']?>" style="display: none;">
          <div class="modal-dialog">
            <form action="grade.php" method="post">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Você deseja concluir a matéria <?=$c['id']?> ?</h4>
                </div>
                <div class="modal-body">
                    <p><?=$c['name']?></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_materia" value="<?=$c['id']?>">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" name="concluir" class="btn btn-primary">Sim</button>
                </div>
                </div>
            </form>
          </div>
        </div>
    <?php } ?>

    <?php foreach($reprovadas as $c) { ?>
        <div class="modal fade" id="materia-<?=$c['id']?>" style="display: none;">
          <div class="modal-dialog">
            <form action="grade.php" method="post">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Você deseja reiniciar a matéria <?=$c['id']?> ?</h4>
                </div>
                <div class="modal-body">
                    <p><?=$c['name']?></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_materia" value="<?=$c['id']?>">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                    <button type="submit" name="restart" class="btn btn-primary">Sim</button>
                </div>
                </div>
            </form>
          </div>
        </div>
    <?php } ?>

    <?php foreach($possoCursar as $c) { ?>
        <div class="modal fade" id="materia-<?=$c['id']?>" style="display: none;">
          <div class="modal-dialog">
            <form action="grade.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Deseja iniciar a matéria <?=$c['id']?> ?</h4>
                    </div>
                    <div class="modal-body">
                        <p><?=$c['name']?></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_materia" value="<?=$c['id']?>">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                        <button type="submit" name="ativar" class="btn btn-primary">Sim</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
    <?php } ?>
    <div class="modal fade" id="concluir" style="display: none;">
        <div class="modal-dialog">
            <form action="grade.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Deseja concluir o semestre composto pelas matérias:</h4>
                    </div>
                    <div class="modal-body">
                    <?php foreach($cursando as $c) { ?>
                        <p><?=$c['id']?> - <?=$c['name']?></p>
                    <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                        <button type="submit" name="concluirsemestre" class="btn btn-primary">Sim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php include_once 'assets/templates/footer.php'; ?>
    <script src="assets/dist/js/jscolor.js"></script>

