<?php
session_start();
$_SESSION['name'] ='deee';
$_SESSION['you'] ='deee';
$_SESSION['errors'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hype Hotel</title>
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	

<div class="continer">
	<div class="row">
		<div class="col-md-6 col-12 offset-2">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Customer Menu</h4>
				</div>
				<div class="card-body">
					<form action="./db/placeOrder.php" method="post">
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Order Name</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="order_name">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['name'];}?></span>
							</div>
						</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Table No</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="table_no">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['table_no'];}?></span>
							</div>
						</div>
						</div>
						<br>
						<h5 class="text-center">Order</h5>
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Drink</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="drink">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['drink'];}?></span>
							</div>
						</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Meal</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="meal">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['meal'];}?></span>
							</div>
						</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Desert</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="desert">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['desert'];}?></span>
							</div>
						</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-4">
								<label>Amount (Ksh)</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="amount">
								<span class="text-danger"><?php if($_SESSION['errors']){echo $_SESSION['errors']['amount'];}?></span>
							</div>
						</div>
						</div>
						<div class="form-group">
							<button class="btn btn-success float-right btn-block" type="submit">Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	<script src="js/jquery.js"></script>
	<script src="js/pcoded.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>