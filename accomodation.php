<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['departure_date'])){
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Train Ticketing</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: lightblue;">




<div class="container-fluid">
	<div class="col-md-2"></div>
	<div class="col-md-6 offset-4 mr-3">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 <span class="btn btn-primary btn-block"><strong>ACCOMODATION</strong> </span>
			 </h2>
				<div class="container-fluid">
					<form class="form-horizontal" role="form" id="form-acc">
					  <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span> 
							        Accomodation
							        </th>
							        <th>
							        	<center>
							        		Slots
							        	</center>
						        	</th>
							        <th>
							        	<center>
							        		Fare
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						   		<?php require_once('data/get_all_accomodations.php'); ?>
						   		<tr>
						   			<td>
						   				<input value="<?= $getSit['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getSit['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getSit['acc_slot'] - $totalSit['sit']; ?>
						   			</td>
						   			<td align="center"><?= $getSit['acc_price']; ?></td>
						   		</tr>

						   		<tr>
						   			<td>
						   				<input value="<?= $getTour['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getTour['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getTour['acc_slot'] - $totalTour['ecoT']; ?>
						   			</td>
						   			<td align="center"><?= $getTour['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getCab['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getCab['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getCab['acc_slot'] - $totalCab['ecoC']; ?>
						   			</td>
						   			<td align="center"><?= $getCab['acc_price']; ?></td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getDel['acc_id']; ?>" type="radio" name="acc">
						   				<?= $getDel['acc_type']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getDel['acc_slot'] - $totalDel['ecoD']; ?>
						   			</td>
						   			<td align="center"><?= $getDel['acc_price']; ?></td>
						   		</tr>
						    </tbody>
					    </table>
				      <div class="form-group">
					    <label for="">Total # of Passenger:</label>
					    <input type="number" min="1" class="form-control" name="totalPass" plactreholder="Total # of Passenger" autocomplete="off">
					  </div>
					  <button type="submit" class="btn btn-success"><a href="reserved.php"> Back <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
					  <button type="submit" class="btn btn-success">NEXT
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).on('submit', '#form-acc', function(event) {
		event.preventDefault();
		/* Act on the event */
		var acc = $('input[name="acc"]:checked').val();
		var totalPass = $('input[name="totalPass"]').val();

		if(acc == null){
			alert('Please Select Accomodation!');
		}else{
			// console.log(acc);
			if(totalPass.length == 0){
				alert('Please Enter Number of Passenger!');
			}else{
				$.ajax({
						url: 'data/session_accomodation.php',
						type: 'post',
						dataType: 'json',
						data: {
							acc : acc,
							tp : totalPass
						},
						success: function (data) {
							console.log(data.slot);
							// 	window.location = "passenger.php";
							if(data.slot >= 0){
								window.location = "passenger.php";
							}else{
								alert('Not Enough Slot!');
							}
						},
						error: function(){
							alert('Error: L175+');
						}
					});
			}//end totalPass
		}//end acc == null
	});

</script>

</body>
</html>


<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>