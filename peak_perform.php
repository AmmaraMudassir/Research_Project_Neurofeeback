<?php



include('connections.php');



session_start();



$protocol=$_SESSION["protocol"];


$name=$_GET['name'];

$threshold=$_SESSION["threshold"]/100;

echo $threshold;

$id = $_SESSION["id"];

$date = date("d/m/Y");

$channel=array();



$beta=0;

$theta=0;


//for($i=0;$i<$protocol.length;$i++){


if($protocol=="incbeta"){ //channel 4 consider

	

$sql = "SELECT channel4 from baselinemean where id=$id and date='$date' and bands='beta'";



$query = mysqli_query( $connection , $sql) or trigger_error(mysqli_error($connection));

	$line = $query->fetch_assoc();

		var_dump($line);
		$mean=$line["channel4"];

		//$mean=$channel[3];

		echo '<br>'.$mean;

		$beta=$mean*$threshold;

		echo '<br>'.$beta;

		$beta=$mean+$beta;

		echo '<br>'.$beta;

	

	$band = "beta";

	$channel = 4;

	$thresh = $beta;

	

}



if($protocol=="redtheta"){ //channel ?? consider

	

$sql = "SELECT channel7 from baselinemean where id=$id and date='$date' and bands='theta'";



$query = mysqli_query( $connection , $sql) or trigger_error(mysqli_error($connection));

	$line = $query->fetch_assoc();

		$mean=$line["channel4"];//write channel no.
		//$mean=$channel[3];

		echo '<br>'.$mean;

		$theta=$mean*$threshold;

		echo '<br>'.$theta;

		$theta=$mean-$theta;

		echo '<br>'.$theta;

	$band = "theta";

	$channel = 0;//whatever channel to be selected;

	$thresh = $theta;

}
//}


  if ($name == "video") {

header("Location: video/index.html?band=$band&channel=$channel&thresh=$thresh");
};

if ($name == "progressbar") {
header("Location: progressbar/index.html?band=$band&channel=$channel&thresh=$thresh");

};



/* 





echo $_SESSION["file"];

$file = fopen($_SESSION["file"],'r');



$channel=array();



if($protocol=="incbeta"){ //channel 4 consider

	

	while(($line = fgetcsv($file,0,","))!== FALSE){

		

		//array_push($bands,$line[1]);

		array_push($channel,$line[5]);

       	

	}	

		//$beta=$bands[3];

		$mean=$channel[3];

		echo '<br>'.$mean;

		$beta=$mean*$threshold;

		echo '<br>'.$beta;

		$beta=$mean+$beta;

		echo '<br>'.$beta;

	

	$_SESSION["thresh"]=$beta;

	$_SESSION["band"]="beta";

	$_SESSION["channel"] = 4;

}





if($protocol=="redtheta"){ 

	while(($line = fgetcsv($file,0,","))!== FALSE){

		

		//array_push($bands,$line[1]);

		array_push($channel,$line[7]);//channel no+1]);

       	

	}	

		//$beta=$bands[3];

		$mean=$channel[3];

		echo '<br>'.$mean;

		$theta=$mean*$threshold;

		echo '<br>'.$theta;

		$theta=$mean-$theta;

		echo '<br>'.$theta;

		

	$_SESSION["thresh"]=$theta;

	$_SESSION["band"]="theta";

	$_SESSION["channel"] = 5;

}

 */



?>