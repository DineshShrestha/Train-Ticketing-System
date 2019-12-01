<?php 
require_once('data/get_origin.php');
require_once('data/get_destination.php');

 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Railway Ticket Rerservation</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: lightblue;">

<div class="container">

	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h4>
			 	<span class="btn btn-primary btn-block"><strong>SELECT STATION</strong> </span>
			 </h4>
				<div class="container">
					<form class="form-horizontal"  id="form-itinerary">
					  <div class="form-group">
					    <label for="">From:</label>
					    <select class="btn btn-default" id="orig-id">
					    <?php foreach($origins as $o): ?>
					    	<option value="<?= $o['origin_id']; ?>"><?= $o['origin_desc']; ?></option>
				    	<?php endforeach; ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="">Destination:</label>
					    <select class="btn btn-default" id="dest-id">
				    	<?php foreach($destinations as $d): ?>
					    	<option value="<?= $d['dest_id']; ?>"><?= $d['dest_destination']; ?></option>
				    	<?php endforeach; ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="">Departure Date:</label>
					    <input type="date" class="btn btn-default" id="dept-date">
					  </div>
					  <a href="index.php"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
					  <button type="submit" class="btn btn-success">NEXT
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).on('submit', '#form-itinerary', function(event) {
		event.preventDefault();
		/* Act on the event */
		var validate = "";
		var origin = $('select[id=orig-id]').val();
		var dest = $('select[id=dest-id]').val();
		var dept = $('input[id=dept-date]').val();

		if(dept.length == 0){
			alert('Please Select Departure Date!');
		}else{
			$.ajax({
					url: 'data/session_itinerary.php',
					type: 'post',
					dataType: 'json',
					data: {
						oid : origin,
						did : dest,
						dd : dept
					},
					success: function (data) {
						console.log(data);
						if(data.valid == true){
							window.location = data.url;
							console.log('sss');
						}
					},
					error: function(){
						alert('Error: L161+');
					}
				});
		}//end dept kung == 0


	});

</script>

</body>
</html>