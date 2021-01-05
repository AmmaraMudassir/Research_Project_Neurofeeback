<?php
include('connections.php');

session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {

	if (empty($_POST['userid']) || empty($_POST['password'])) {

		$error = "UserID or Password is empty";
	}

	else
	{
		// Define $username and $password
		$userid=$_POST['userid'];
		$password=$_POST['password'];

		// SQL query to fetch information of registerd users and finds user match.
		$query =mysqli_query( $connection,"select * from user_info where password='$password' AND id='$userid'")
		or trigger_error(mysqli_error($connection));

		$rows = mysqli_num_rows($query);
		if ($rows == 1) {

		//get name from db to be shown at the dashboard
			while($ans = $query->fetch_assoc()) {

				// Initializing Session will be needing later in report and dashboard
				$_SESSION["id"] = $ans["id"];
				$_SESSION["name"] = $ans["username"];
				$_SESSION["gender"] = $ans["gender"];
				$_SESSION["age"] = $ans["age"];

			}

		 // SQL query to insert login info; id and login date in the 'login' table
		$date = date("d/m/Y");

		$sql = "SELECT * from login where id = $userid AND date = '$date'";
		//echo 'yes';
		$query =mysqli_query( $connection,$sql)
		or trigger_error(mysqli_error($connection));

		$rows = mysqli_num_rows($query);
		if ($rows == 0) {
			echo 'yes';
		$query = mysqli_query( $connection , "INSERT INTO login (id,date) VALUES ($userid,'$date')")
		or trigger_error(mysqli_error($connection));

	}
		$date = date("d-m-Y");
		$structure = "UserData/$userid/$date";
		$_SESSION["structure"]=$structure;

		//echo $structure;
		// creating the folder
		if (!mkdir($structure, 0, true)) {
			header("location: preBehavioralTests.php"); // Redirecting To Other Page
		}

		header("location: preBehavioralTests.php"); // Redirecting To Other Page

	}
	else
		$error = "invalid Information";
			 $connection ->close();// Closing Connection
	}
}
