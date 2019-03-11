
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orders</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	
</body>
</html>
<?php


require_once('./db/con.php');

$driver = new DbConnector('127.0.0.1','root','hacker90','hotel');
$conn = $driver->raiseCon();
$stmts = $driver->getOrders($conn);


echo '<div class="card">';
echo '<div class="card-header">';
echo '<h4 class="text-center">Tonnies Hotel</h4>';
echo '</div>';
echo '<div class="card-body">';
echo '<div class="container">';

echo '<h5 class="text-muted">orders</h5>';
echo '<table class="table table-striped">';
echo '<thead>';
echo '<th>Id</th><th>Order No</th><th>Table No</th><th>Drink</th><th>Meal</th><th>Desert</th><th>Amount</th><th>Status</th><th>Created At</th><th>Action</th>';
echo '</thead>';
// print_r($stmts);
echo '<tbody>';
foreach ($stmts as $order) {
	echo '<tr>';
	echo '<td>' . $order['id'] . '</td>';
	echo '<td>' . $order['order_no'] . '</td>';
	echo '<td>' . $order['table_no'] . '</td>';
	echo '<td>' . $order['drink'] . '</td>';
	echo '<td>' . $order['meal'] . '</td>';
	echo '<td>' . $order['desert'] . '</td>';
	echo '<td>' . $order['amount'] . '</td>';
	echo '<td>' . $order['status'] . '</td>';
	echo '<td>' . $order['created_at'] . '</td>';
	echo '<td><a class="btn btn-warning btn-sm"><span class="text-white">edit</span></a><a class="btn btn-sm btn-danger ml-1"><span class="text-white">delete</span></a></td>';

	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';

// foreach ($stmts as $order) {
	
// }




