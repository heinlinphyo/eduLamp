
<?php 

  include_once "includes/header.php"; 
  include_once "config/connect.php";

  $page = "calendar";

   session_start();
    if(isset($_SESSION['username'])){
      $user=$_SESSION['username'];
    }
    else{
      $user="";
    }

    if($user){

    }
    else{
      header("location:logout.php");
      }


$sql = "SELECT id, title, description, start, end, color FROM events WHERE user='$user' ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

 ?>

	<!-- FullCalendar -->
	<link href='vendor/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
   
   <style type="text/css">
   	.fc-content > .fc-title{ color: white !important; }
   </style>

<div class="wrapper">
	<?php
	   include_once "includes/sidebar.php";
	   include_once "includes/navbar.php";
  	?>


<!-- Page Content -->
    <div class="container bg-white text-info">

        <div class="row">
            <div class="col-lg-12 text-center">
			<div style="height:20px"></div>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form class="form-horizontal" method="POST" action="calendar/addEvent.php">
			
			  <div class="modal-header">
			  <h4 class="modal-title" id="myModalLabel">Add Event</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title" autocomplete="off">
					</div>
				  </div>
				  <div class="form-group">
					<label for="description" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" name="description" class="form-control" id="description" placeholder="Description" autocomplete="off">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="container">
				  <div class="row">
				  <div class="form-group">
					<label for="start" class="col-sm-12 control-label">Start date</label>
					<div class="col-sm-12">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-12 control-label">End date</label>
					<div class="col-sm-12">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
    </div>
  </div>
</div>
		
		<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form class="form-horizontal" method="POST" action="calendar/editEventTitle.php">
			
			  <div class="modal-header">
			  <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="description" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" name="description" class="form-control" id="description" placeholder="Description">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-2">
						  <label onclick="toggleCheck('check1');" class="label-off" for="check1" id="check1_label">
						  Delete
						</label>
						<input class="nocheckbox" type="checkbox" id="check1" name="delete">
						</div>
					</div>
					<script>
					function toggleCheck(check) {
						if ($('#'+check).is(':checked')) {
							$('#'+check+'_label').removeClass('label-on');
							$('#'+check+'_label').addClass('label-off');
						} else {
							$('#'+check+'_label').addClass('label-on');
							$('#'+check+'_label').removeClass('label-off');
						}
					}		  
					</script>
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->



	<script src='vendor/fullcalendar/js/moment.min.js'></script>
	
	<!-- FullCalendar -->
	<script src='vendor/fullcalendar/js/fullcalendar.min.js'></script>

	<script>

	 $(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next, today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay, listWeek'
			},
			height: 590,
			businessHours: {
			  dow: [ 1, 2, 3, 4, 5 ],

			  start: '8:00',
			  end: '17:00',
			},
			nowIndicator: true,

			scrollTime: '08:00:00',

			editable: true,
			navLinks: true,
			eventLimit: true, // allow "more" link when there are too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventAfterRender: function(eventObj, $el) {
				var request = new XMLHttpRequest();
				request.open('GET', '', true);
				request.onload = function () {
					$el.popover({
						title: eventObj.title,
						content: eventObj.description,
						trigger: 'hover',
						placement: 'top',
						container: 'body'
					});
				}
			request.send();
			},
	
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #description').val(event.description);
					$('#ModalEdit #color').val(event.color);
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
					description: '<?php echo $event['description']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'calendar/editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});

</script>

</div><!-- wrapper end -->
<?php include_once('includes/footer.php'); ?>