</div>
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Sistema de controle de Notas UFOP - ICEA</strong>
  </footer>
 </div>
 <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
 <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="assets/bower_components/raphael/raphael.min.js"></script>
 <script src="assets/bower_components/morris.js/morris.min.js"></script>
 <script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
 <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
 <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
 <script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
 <script src="assets/bower_components/moment/min/moment.min.js"></script>
 <script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
 <script src="assets/dist/js/adminlte.min.js"></script>

 <script src="assets/bower_components/moment/moment.js"></script>
 <script src="assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
 <script src="assets/bower_components/fullcalendar/dist/locale/pt-br.js"></script>
 
<script>
  $(function () {
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendar').fullCalendar({
      firstDay : 1,
      header    : {
        left  : 'Ant, Prox, Hoje',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hoje',
        month: 'Mês',
        week : 'Semana',
        day  : 'Dias'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
      ],
    })
  })
</script>

 </body>

 </html>