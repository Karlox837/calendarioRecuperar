<?php
session_start();
require_once('./config/bdd.php');
require_once('./config/session.php');


$sql = "SELECT * FROM events";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

$users = "SELECT * FROM usuarios";

$req2 = $bdd->prepare($users);
$req2->execute();

$usuarios = $req2->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/favicon.ico" type="image/icon ">

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
				<span class="icon-bar" data-target="#ModalUser">Usuarios</span>
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="index.php">Calendario</a>
				<a class="navbar-brand" data-toggle="modal" data-target="#ModalUser">Usuarios</a>
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
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
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
        <!-- /.row -->
		
		<!-- Modal -->
		<!-- Ventana para agregar evento -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Sala</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
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
					  <input type="text" name="start" class="form-control" id="start" >
					  <p class="note">Formato YYYY-DD-MM HH:mm:ss</p>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end">
					  <p class="note">Formato YYYY-DD-MM HH:mm:ss</p>
					</div>
				  </div>
				  <div class="form-group">
					<label for="reserva" class="col-sm-2 control-label">Reserva a nombre de:</label>
					<div class="col-sm-10">
					  <input type="text" name="reserva" class="form-control" id="reserva">
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>	
		<!-- /Ventana para agregar evento -->
		<!-- Ventana para editar o eliminar evento -->
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventAdmin.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label >
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha Inicial</label dis>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" >
					  <p class="note">Formato YYYY-DD-MM HH:mm:ss</p>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end">
					  <p class="note">Formato YYYY-DD-MM HH:mm:ss</p>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Sala</label>
					<div class="col-sm-10">
					  	<select name="color" class="form-control" id="color" >
						  <option value="">Seleccionar</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Sala 1</option>
						  <option style="color:#FB2C00;" value="#FB2C00">&#9724; Sala 2</option>
						  <option style="color:#008000;" value="#008000">&#9724; Sala 3</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Auditorio Guillermo Heredia </option>
						</select>
					</div>
					</div>
					<label for="reserva" class="col-sm-2 control-label">Reservo:</label>
					<div class="col-sm-10">
					  <input type="text" name="reserva" class="form-control" id="reserva" placeholder="reserva">
					</div>
					
				    <div class="form-group"> 
						
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
                  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
						  </div>
						</div>
					</div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<!-- /Ventana para editar o eliminar evento -->
		<!-- Modal  Para administrar usuarios -->
		<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEditUser.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar Usuarios</h4>
			  </div>
			  <div class="modal-body">
			  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
					</div>
				  </div>
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
					  <input type="text" name="login" class="form-control" id="login" placeholder="login">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Clave</label>
					<div class="col-sm-10">
						<input type="text" name="clave" class="form-control" id="clave" placeholder="Clave">
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Usuario</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

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
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
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
					$('#ModalEdit').modal('show');
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

</html>