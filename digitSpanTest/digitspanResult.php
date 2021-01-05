<?php

/*
	Sends data from js to php then saves it db

*/


session_start();
//"DOCUMENT_ROOT" provides website root folder i.e:D:/xampp/htdocs
//add in the website folder and file to access it 
include('../connections.php');

//get the variables
	$id = $_SESSION["id"];
	$score = $_GET["finalscore"];
	$test = $_SESSION["test"];
	$date = date("d/m/Y");

	
//send in to db
$sql = "INSERT INTO digitspantest(id,finalscore,date,behaviouraltest) VALUES($id,$score,'$date','$test')";
$query = mysqli_query( $connection , $sql) 
		or trigger_error(mysqli_error($connection));

//add : 
header("Location: ../preBehavioralTests.php");
//to redirect to next page
?>