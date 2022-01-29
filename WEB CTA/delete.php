<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'web';

$conn = new MySQLi($host,$user,$pass,$db_name);

if($conn->connect_error){
	die('database connection error:' .$conn->connect_error);
}



if(isset($_POST['submit'])){

	$usertype = $_POST['usertype'];
	$sql = "DELETE FROM login WHERE usertype = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$usertype);
	$result=$stmt->execute();

	if($result){
		?> <script> alert("Record Successfully Deleted from the Database."); </script>
	<?php
	}else{ ?>
		<script> alert("The delete Operation was Unsuccessful"); </script>
	<?php
	}
}
?>