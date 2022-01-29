<?php

$host="localhost";
$user="root";
$password="";
$db="web";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="student")
	{	

		$_SESSION["username"]=$username;

		header("location:student.php");
        
	}

	elseif ($row["usertype"]=="teacher")
	{

		$_SESSION["username"]=$username;
		
	 header("location:teacher.php");
	}
    elseif ($row["usertype"]=="dean")
	{

		$_SESSION["username"]=$username;
		
	 header("location:dean.php");
	}
    elseif ($row["usertype"]=="principal")
	{

		$_SESSION["username"]=$username;
		header("location:principal.php");
	}
    

	else
	{
		
		echo '<script>alert("Username or password incorrect")</script>';
	}

}
?>
