<?php
include('connections.php');
 
    

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 /*$name = mysqli_real_escape_string($connection, $_REQUEST['name']);
$password = mysqli_real_escape_string($connection, $_REQUEST['password']);
$msg=" ";
// Attempt insert query execution
$sql = "INSERT INTO login (username,password) VALUES ('$name', '$password')";

if(mysqli_query($connection, $sql)){
 
    $result=mysqli_query($connection,"select id from login where password='$password'");
    
    echo $result;
   // $msg="Welcome. You can signin to your account now.Your ID is.$result'";
   
} else{
    $msg="This user already exists try using another name or password";
}
$connection->close(); */
 //header("Location:index.php?msg=$msg");

		if(isset($_POST['name']))
        { 
		    //get the name,age,gender,userdate from the fields 
			$name=$_POST['name'];
			$age=$_POST['age'];
			$gender=$_POST['gender'];
			$password=$_POST['password'];

		   //get last id value for the user based on the gender from db then increment it
			$sql="select value from rel where Gender='$gender'";
            $result=$connection->query($sql)or die($connection->error);
            $row = $result->fetch_assoc();
            $index=$row['value'];
            $index=$index+1;

            echo $gender;
            
		   //insert the data for the user into db and update its id in the 'rel' table
			$date = date("d/m/Y");
			
			$sql="insert into user_info(id,username,password,age,gender,date) values($index,'$name','$password',$age,'$gender','$date')";
			if ($connection->query($sql)) {
				$msg="Welcome your ID is $index";
				$que="update rel set value=$index where Gender='$gender'";
               
				$connection->query($que)or die($connection->error);
			}
			$structure = 'UserData/'.$index;
			if (!mkdir($structure, 0, true)) {
				die('Failed to create folders...');
			}
			else {
				echo "Error: " . $sql . "<br>" . $connection->error;
			}
			
        }

      header("Location:index.php?msg=$msg");
  ?>