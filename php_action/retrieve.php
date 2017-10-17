<?php 

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datatables_crud";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection 
if($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
	//echo "Successfully Connected";
}

//create array
$output = array('data' => array());

$sql = "SELECT * FROM members";
$query = $connect->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {
	
	//var_dump($row);
	$output['data'][] = array(
		$x,
		$row['fname'],
		$row['lname'],
		$row['contact'],
		$row['active'],
	
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);