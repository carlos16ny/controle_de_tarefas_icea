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
 <script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
 <script src="assets/bower_components/moment/min/moment.min.js"></script>
 <script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
 <script src="assets/dist/js/adminlte.min.js"></script>

 <script src="assets/bower_components/moment/moment.js"></script>
 <script src="assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
 <script src="assets/bower_components/fullcalendar/dist/locale/pt-br.js"></script>
 
<script>


totalEvents = [];

function loadEvents(events){
  [...events].forEach(ev => {
    totalEvents.push({
      title          : ev.name,
      start          : ev.data_ini,
      end            : ev.data_fin,
      backgroundColor: "#" + ev.color,
      borderColor    : '#000000'
    });
  });
}

$(function () {
    let xml = new XMLHttpRequest();
    let dados = {
      matricula : <?=$_SESSION['aluno_matricula']?>,
    }
    var url = "./admin/controller/getAllEvents.php";
    xml.open("POST", url, true);
    xml.setRequestHeader("Content-type", "application/json");
    xml.onreadystatechange = () => {
        if (xml.readyState == 4 && xml.status == 200) {
            request = JSON.parse(xml.responseText);
            loadEvents(request);
            loadCallendar();
        }
    }
    xml.send(JSON.stringify(dados));
});

function loadCallendar() {
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
      events    : totalEvents,
    })
  }
</script>

 </body>

 </html>