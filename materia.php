<?php include_once 'assets/templates/header.php'; ?>
<!-- Controller recebe as informações dos forms submetidos

edit {
    id, nome, valor, pontos, data_inicio, data_final, color
}

add {
    nome, valor, pontos = null, data_inicio, data_final, color
}

remove {
    id
} -->


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Matéria
            <small>X</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Materia X</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">To Do List</h3>
                </div>
                <div class="box-body">
                    <ul class="todo-list ui-sortable">
                        <li>
                            <span class="text">Design a nice theme</span>
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <div class="tools">
                                <i class="fa fa-edit" data-toggle="modal" data-target="#modal-editar"></i>
                                <i class="fa fa-trash-o" data-toggle="modal" data-target="#modal-excluir"></i>
                            </div>
                        </li>
                        <li>
                            <span class="text">Make the theme responsive</span>
                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit" data-toggle="modal" data-target="#modal-editar"></i>
                                <i class="fa fa-trash-o" data-toggle="modal" data-target="#modal-excluir"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-adicionar"><i class="fa fa-plus"></i> Adicionar item</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Notas Materia X</h3>
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
                            <tr>
                                <td>1.</td>
                                <td>Prova 1</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Prova 2</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Prova 3</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Seminário</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">90%</span></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Total<strong></td>
                                <td colspan="2">57,9</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Adição de tarefa -->

    <div class="modal fade" id="modal-adicionar" style="display: none;">
        <div class="modal-dialog">

            <form action="materia.php" method="post">

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
                                    <input name="data_inicio" type="date" class="form-control" placeholder="Data">
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
                                    <input id="tf1" name="tempo_final" type="text" class="form-control timepicker">
                                </div>
                                </div>
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                                <input name="color" class="jscolor form-control" value="#3f4fff">
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

    <div class="modal fade " id="modal-excluir" style="display: none;">
        <div class="modal-dialog">
            <form action="materia.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Exclusão de tarefa</h4>
                    </div>
                    <div class="modal-body">
                        <p>Você realmente deseja excluir a tarefa X?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="id">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button name="remover" type="submit" class="btn btn-primary">Sim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de Edição de tarefa -->

    <div class="modal fade" id="modal-editar" style="display: none;">
        <div class="modal-dialog">
            <form action="materia.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Tarefa</h4>
                    </div>
                    <div class="box-body">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-check-square-o"></i></span>
                            <input name="nome" type="text" class="form-control" placeholder="Tarefa X">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                            <input name="valor" type="text" class="form-control" placeholder="23.00">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                            <input name="nota" type="text" class="form-control" placeholder="Nota">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            <input name="data_inicio" type="date" class="form-control" value="2019-06-10">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            <input name="data_final" type="date" class="form-control" value="2019-06-10">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                            <input name="color" class="jscolor form-control" value="#3f4fff">
                        </div>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="id">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button name="editar" type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include_once 'assets/templates/footer.php'; ?>
    <script src="assets/dist/js/jscolor.js"></script>
    <script>
    $('#tf1').pickatime({
        // 12 or 24 hour
        twelvehour: true,
        });
    </script>