<?php

require_once('./config/bdd.php');
$sql = "SELECT * FROM events";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" href="img/favicon.ico" type="image/icon ">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>


</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="consulta.php">Calendario</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./config/logout.php">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <!--/Navigation-->

    <!--Page Content-->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendario Salas de Reunion Recuperar</h1>
                <p class="lead"></p>
                <div id="calendar" class="col-centered">
					<div class="col-lg-12 text-center">
					<h2 class=”h2-error”>Salas <span class=”break”></span></h2>
						<table class="table table-responsive">
    						<thead>
        						<tr>
            					<th>Nombre</th>
            					<th>Capacidad</th>
            					<th>Recursos Tecnológicos</th>
        						</tr>
    						</thead>
    					<tbody>
        						<tr>
									<td style="color:#0071c5;">Sala 1</td>
									<td>5</td>
									<td>Tablero Móvil, Cámara Fija</td>
								</tr>
        						<tr>
									<td style="color:#40E0D0;">Sala 2</td>
									<td>10</td>
									<td>Proyector, Parlantes</td>
        						</tr>
        						<tr>
									<td style="color:#008000;">Sala 3</td>
									<td>5</td>
									<td>Ninguno </td>
								</tr>
								<tr>
									<td style="color:#FFD700;">Auditorio Guillermo Heredia </td>
									<td>18</td>
									<td>Proyector, Tablero, Consola, Equipo</td>
        						</tr>
   						 </tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
        <!-- /.row -->
		<!-- Ventana para consultar un evento -->
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Consultar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title"  disabled >
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Sala de reunion</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color"  disabled>
						  <option value="">Seleccionar</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Sala 1</option>
						  <option style="color:#FB2C00;" value="#FB2C00">&#9724; Sala 2</option>
						  <option style="color:#008000;" value="#008000">&#9724; Sala 3</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Auditorio Guillermo Heredia </option> 
						</select>
                    </div>
                    </div>
					<div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start"  disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end"  disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="reserva" class="col-sm-2 control-label">Reserva a nombre de:</label>
					<div class="col-sm-10">
					  <input type="text" name="reserva" class="form-control" id="reserva" disabled>
					</div>
				  </div>
				  </div>
			  
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<!-- /Ventana para consultar un evento -->

    <!-- scripts -->   
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/es.js'></script>
	
	
	<script>

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-DD-MM HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-DD-MM HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #start').val(moment(start).format('YYYY-DD-MM HH:mm:ss'));
					$('#ModalEdit #end').val(moment(end).format('YYYY-DD-MM HH:mm:ss'));
					$('#ModalEdit #reserva').val(event.reserva);
					$('#ModalEdit').modal('show');;
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				$reserva = explode(" ", $event['reserva']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
					reserva: '<?php echo $event['reserva'];?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-DD-MM HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-DD-MM HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		
	});

</script>


</body>