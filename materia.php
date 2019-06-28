<?php
require_once 'admin/protection.php';
require_once 'admin/controller/tarefaController.php';
include_once 'assets/templates/header.php';
if (isset($_GET['id'])) {
    $mat = $materia->getMateriaById($_GET['id'])->fetch(PDO::FETCH_OBJ);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $mat->name ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $mat->name ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header ">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Tarefas</h3>
                    </div>
                    <div class="box-body">
                        <ul class="todo-list">
                            <?php foreach ($todasTarefas as $task) { ?>
                                <li>
                                    <span class="text"><?= $task->name ?></span>
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                    <div class="tools">
                                        <i class="fa fa-edit" data-toggle="modal" data-target="#modal-editar-<?= $task->id ?>"></i>
                                        <i class="fa fa-trash-o" data-toggle="modal" data-target="#modal-excluir-<?= $task->id ?>"></i>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-adicionar"><i class="fa fa-plus"></i> Adicionar item</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Notas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tarefa</th>
                                    <th>Progresso</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                                <?php 
                                    $i = 0;
                                    $total = 0;
                                    $p = 0;
                                    $pp = 0;
                                    foreach($todasTarefas as $t) {
                                        $i++;
                                        $perc = $t->nota / $t->total * 100;
                                        $cor = $perc >= 60 ? 'success' : 'danger';
                                        $cor2 = $perc >= 59 ? 'green' : 'red';
                                        $total += $t->total;
                                        $p += $t->nota;
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$t->name?></td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-<?=$cor?>" style="width: <?=$perc?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-<?=$cor2?>"><?=$perc?>%</span></td>
                                </tr>
                                <?php
                                    }
                                if($todasTarefas){
                                    $pp = number_format(($p / $total * 100), 2);
                                    $cor3 = $pp >= 60 ? 'green' : 'red';
                                }
                                ?>
                                <tr>
                                    <td colspan="2"><strong>Total<strong></td>
                                    <td colspan="1"><?=$p?> / <?=$total?></td>
                                    <td colspan="1"><span class="badge bg-<?=$cor3?>"><?=$pp?>%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Adição de tarefa -->

    <div class="modal fade" id="modal-adicionar" style="display: none;">
        <div class="modal-dialog">
            <form action="materia.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Adicionar Tarefa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-check-square-o"></i></span>
                                <input name="nome" type="text" class="form-control" placeholder="Nome">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                                <input name="valor" type="text" class="form-control" placeholder="Valor">
                            </div>
                            <br>

                            <h5>Data e Tempo de Inicio</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        <input name="data_inicio" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input name="tempo_inicio" type="time" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <h5>Data e Tempo Final</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        <input name="data_final" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input id="" name="tempo_final" type="time" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                                <input name="cor" class="jscolor form-control" value="#3f4fff">
                            </div>
                            <br>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button name="adicionar" type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Moda de Exclusão de tarefa -->
    <?php foreach ($todasTarefas as $task) { ?>
        <div class="modal fade " id="modal-excluir-<?= $task->id ?>" style="display: none;">
            <div class="modal-dialog">
                <form action="materia.php?id=<?= $_GET['id'] ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Exclusão de tarefa</h4>
                        </div>
                        <div class="modal-body">
                            <p>Você realmente deseja excluir a tarefa <?= $task->name ?> ?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?= $task->id ?>">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                            <button name="excluir" type="submit" class="btn btn-primary">Sim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <!-- Modal de Edição de tarefa -->
    <?php foreach ($todasTarefas as $task) { ?>
        <div class="modal fade" id="modal-editar-<?= $task->id ?>" style="display: none;">
            <div class="modal-dialog">
                <form action="materia.php?id=<?= $_GET['id'] ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Editar Tarefa</h4>
                        </div>
                        <div class="box-body">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-check-square-o"></i>  Nome</span>
                                <input name="nome" type="text" class="form-control" value="<?= $task->name ?>">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i>  Valor</span>
                                <input name="valor" type="text" class="form-control" value="<?= $task->total ?>">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i>  Nota</span>
                                <input name="nota" type="text" class="form-control" value="<?= $task->nota ?>">
                            </div>
                            <br>

                            <h5>Data e Tempo de Inicio</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        <input name="data_inicio" type="date" class="form-control" value="<?=(explode(" ",$task->data_ini)[0])?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input name="tempo_inicio" type="time" class="form-control" value="<?=(explode(" ",$task->data_ini)[1])?>">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <h5>Data e Tempo Final</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        <input name="data_final" type="date" class="form-control" value="<?=(explode(" ",$task->data_fin)[0])?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input id="" name="tempo_final" type="time" class="form-control" value="<?=(explode(" ",$task->data_fin)[1])?>">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                                <input name="color" class="jscolor form-control" value="<?=$task->color?>">
                            </div>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?=$task->id?>">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                            <button name="editar" type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <?php include_once 'assets/templates/footer.php'; ?>
    <script src="assets/dist/js/jscolor.js"></script>s