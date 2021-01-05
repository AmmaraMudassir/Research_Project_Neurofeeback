<?php

/*
	Sends data from js to php then saves it db

*/

session_start();
//"DOCUMENT_ROOT" provides website root folder i.e:D:/xampp/htdocs
//add in the wesite folder and file to access it 
include('../connections.php');

$times =array();

//get the variables
	$id = $_SESSION["id"];
	$test = $_SESSION["test"];
	echo $test;
	$times = $_POST['t_array'];
	$score = $_POST['Score'];
	$t_time = $_POST['time'];	
	
	$date = date("d/m/Y");

	
//send in to db
$sql = "INSERT INTO strooptest (id,totalScore,totalTime,date,behavioralTest) VALUES($id,$score,$t_time,'$date','$test')";
$connection->query($sql);

$que = 0;
$n = count($times);

//loop through $times array and insert in db
for ($x=0;$x<$n;$x++){
	$que = $que +1;
	$sql = "INSERT INTO s_question (id,question,time,date) VALUES($id,$que,$times[$x],'$date')";
	$connection->query($sql);
}

?>
