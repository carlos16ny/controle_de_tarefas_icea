<?php require_once 'admin/protection.php'; ?>
<?php include_once 'assets/templates/header.php'; ?>
<?php include_once 'admin/controller/materiaController.php' ?>
<div class="content-wrapper">
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
        <div class="col-lg-12">
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
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Periodo</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php 
                                        $a = "1";
                                        foreach($obrigatorias as $ob) {
                                    ?>
                                        <tr>
                                            <td><?=$ob['id']?></td>
                                            <td><?=$ob['name']?></td>
                                            <td><?=$ob['semester']?></td>
                                            <td><span class="label label-success">Aprovado</span></td>
                                        </tr>
                                    <?php
                                        if($a != $ob['semester']){
                                            echo '<tr><td colspan="4" class="bg-blue"></td></tr>';
                                        }
                                        $a = $ob['semester'];
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box">
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

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include_once 'assets/templates/footer.php'; ?>
    <script src="assets/dist/js/jscolor.js"></script>