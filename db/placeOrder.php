<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	
</body>
</html>
<?php
session_start();

require_once("./con.php");

$errors = [];
$order =[];


if(isset($_POST['order_name']) && $_POST['order_name'] != ''){
	$order['order_name'] = $_POST['order_name'];
}else{
	$errors['name'] = 'Please Supply order name';
}

if(isset($_POST['table_no']) && $_POST['table_no'] != ''){
	$order['table_no'] = $_POST['table_no'];
}else{
	$errors['table_no'] = 'Please Supply Table No';
}

if(isset($_POST['drink']) && $_POST['drink'] != ''){
	$order['drink'] = $_POST['drink'];
}else{
	$errors['drink'] = 'Please Supply drink name';
}

if(isset($_POST['meal']) && $_POST['meal'] != ''){
	$order['meal'] = $_POST['meal'];
}else{
	$errors['meal'] = 'Please Supply meal';
}

if(isset($_POST['desert']) && $_POST['desert'] != ''){
	$order['desert'] = $_POST['desert'];
}else{
	$errors['desert'] = 'Please Supply desert';
}


if(isset($_POST['amount']) && $_POST['amount'] != ''){
	$order['amount'] = $_POST['amount'];
}else{
	$errors['amount'] = 'Please Supply order amount';
}



if(!$errors){

	session_destroy();
	$driver = new DbConnector('127.0.0.1','root','hacker90','hotel');
$conn = $driver->raiseCon();


//run this scripts once to create table
// $createTable = $driver->createTable($conn);

//Insert form data to database

$placeOrder= $driver->addOrder($conn,$order);

echo '<div class="alert alert-success">Order Placed Successfully</div>';

}else{
$_SESSION['errors'] = $errors;
header('Location:/index.php');
	echo '<div class="alert alert-danger">';
	foreach ($errors as $key => $value) {
		echo '<li>' . $value . '<li>';
	}
	echo '</div>';
}



