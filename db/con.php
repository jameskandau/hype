<?php
class DbConnector{

	private $host;
	private $user;
	private $pass;
	private $db;

public function __construct($host,$user,$pass,$db)
{
	    $this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->db = $db;
}
	

	public function raiseCon(){
			$conn = new mysqli(
			$this->host,
			$this->user,
			$this->pass,
			$this->db
			);

		  if($conn->connect_error){
		   echo 'Connection Aborted'.$conn->connect_error;	
		   
		  }else{
		  	 return $conn;
		  	
		  }
			
	}


	public function createTable($connection){
		$sql = "CREATE TABLE IF NOT EXISTS orders(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			order_no VARCHAR(255) NOT NULL,
			table_no VARCHAR(255) NOT NULL,
			drink VARCHAR(255) NOT NULL,
			meal VARCHAR(255) NOT NULL,
			desert VARCHAR(255) NOT NULL,
			created_at TIMESTAMP,
			amount DECIMAL(9,0) NOT NULL,
			status VARCHAR(10)
		)";

		if($connection->query($sql) === TRUE){
			return 'Table Created Successfully';
			$connection->close();
		}
			return "Error Creating Table ".$connection->error;

	}




	public function addOrder($conn,array $request){
		$order =$request['order_name'];
		$table = $request['table_no'];
		$drink = $request['drink'];
		$meal = $request['meal'];
		$desert = $request['desert'];
		$amount = $request['amount'];
	
		try{
			$stmt = $conn->prepare("INSERT INTO orders (order_no,table_no,drink,meal,desert,amount) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param('sssssd',$order,$table,$drink,$meal,$desert,$amount);
		return $stmt->execute();

		echo "Data Inserted";
	   }catch(Exception $e){

	  }

	}


public function getOrders($conn){
	try{
		$stmt ='SELECT * FROM orders';
		$orders = $conn->query($stmt);
		$data = [];
		if($orders->num_rows > 0){
			while($row = $orders->fetch_assoc()){
				array_push($data,$row);
			}
		}

		return $data;
	   }catch(Exception $e){
		echo print_r($e->getMessage());
	  }
    }



}