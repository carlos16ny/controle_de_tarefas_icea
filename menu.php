<?php require_once 'admin/protection.php'; ?>
<?php include_once 'assets/templates/header.php'; ?>
<!-- fullCalendar -->
<link rel="stylesheet" href="assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
<link rel="stylesheet" href="assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
<!-- Theme style -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Tarefas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Calendário</li>
    </ol>
  </section>
  <section class="content">
    <section class="col-lg-12">

      <div class="box box-warning">
        <div class="box-body" style="display: block;">
          <div id="calendar"></div>
        </div>
      </div>

    </section>
  </section>
  <?php include_once 'assets/templates/footer.php'; ?>