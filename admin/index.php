<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Ticket Reservation</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="login.css">

	</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<a class="navbar-brand" href="../index.php"> Online Train Ticketing</a>
		<ul class="nav navbar-nav">
			<li>
				<a href="#"></a>
			</li>
			<li>
				<a href="#"></a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	      <li><a href="../"><span class="glyphicon glyphicon-backward"></span> Return Home</a></li>
	    </ul>
	</div>
</nav>

<div class="col-md-3"></div>
<div class="col-md-8">
<div class="login-form">
    <form id="form-login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
		
            <input type="text" class="form-control" id="un" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="../registration.php">Create an Account</a></p>
</div>

</div>



<?php require_once('modal/message.php'); ?>

<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).on('submit', '#form-login', function(event) {
		event.preventDefault();
	
		var un = $('#un').val();
		var pwd = $('#pwd').val();

		$.ajax({
				url: '../data/login.php',
				type: 'post',
				dataType: 'json',
					data: {
						un: un,
						pwd : pwd
					},
				success: function (data) {
					
					if(data.valid == true){
						window.location = data.url;
					}else{
						$('#modal-message').find('#body-cont').text(data.msg);
						$('#modal-message').modal('show');
						$('#un').val("");
						$('#pwd').val("");
						$('#un').focus();
					}
				},
				error: function(){
					alert('Error: L99+');
				}//
			});
	});

</script>

</body>
</html>