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

	$username = $_POST['username'];
	$password = $_POST['password'];
    $sql = "UPDATE login SET password = ? WHERE username = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss",$username,$password);
	$result=$stmt->execute();
      if($result){
		?> <script> alert("Record was Successfully Updated in the Database."); </script>
	<?php
	}else{ ?>
		<script> alert("The Update Operation was Unsuccessful"); </script>
	<?php
	}
}
?>