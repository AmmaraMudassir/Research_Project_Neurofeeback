<?php



include('connections.php');



session_start();



$protocol=$_SESSION["protocol"];


$name=$_GET['name'];

$threshold=$_SESSION["threshold"]/100;

echo $threshold;

$id = $_SESSION["id"];

$date = date("d/m/Y");

$channel= 0;



$smr=0;
$alpha=0;


//for($i=0;$i<$protocol.length;$i++){


if($protocol=="incalphaptsd"){ //channel 4 consider

	

$sql = "SELECT channel10 from baselinemean where id=$id and date='$date' and bands='alpha'";



$query = mysqli_query( $connection , $sql) or trigger_error(mysqli_error($connection));

	$line = $query->fetch_assoc();

		var_dump($line);
		$mean=$line["channel10"];

		//$mean=$channel[3];

		echo '<br>'.$mean;

		$alpha=$mean*$threshold;

		echo '<br>'.$alpha;

		$alpha=$mean+$alpha;

		echo '<br>'.$alpha;

	

	$band = "alpha";

	$channel = 10;

	$thresh = $alpha;

	if ($name == "video") {

header("Location: video/index.html?band=$band&channel=$channel&thresh=$thresh");
};

if ($name == "progressbar") {
header("Location: progressbar/index.html?band=$band&channel=$channel&thresh=$thresh");

};


}



if($protocol=="incsmrptsd"){ //channel ?? consider

	

$sql = "SELECT channel11 from baselinemean where id=$id and date='$date' and bands='smr'";



$query = mysqli_query( $connection , $sql) or trigger_error(mysqli_error($connection));

	$line = $query->fetch_assoc();

		$mean=$line["channel11"];//write channel no.
		//$mean=$channel[3];

		echo '<br>'.$mean;

		$smr=$mean*$threshold;

		echo '<br>'.$smr;

		$smr=$mean-$smr;

		echo '<br>'.$smr;

	$band = "smr";

	$channel = 11;//whatever channel to be selected;

	$thresh = $smr;
	if ($name == "video") {

header("Location: video/index.html?band=$band&channel=$channel&thresh=$thresh");
};

if ($name == "progressbar") {
header("Location: progressbar/index.html?band=$band&channel=$channel&thresh=$thresh");

};

}

if($protocol=="incalphasmrptsd"){ //channel ?? consider

	

	$sql = "SELECT channel11 from baselinemean where id=$id and date='$date' and bands='smr'";
	$sq2 = "SELECT channel10 from baselinemean where id=$id and date='$date' and bands='alpha'";
	
	
	
	$query = mysqli_query( $connection , $sql) or trigger_error(mysqli_error($connection));
	
	$line = $query->fetch_assoc();
	
			$mean = $line["channel11"];//write channel no.
			//$mean=$channel[3];
	
			echo '<br>'.$mean;
	
			$smr=$mean*$threshold;
	
			echo '<br>'.$smr;
	
			$smr=$mean+$smr;
	
			echo '<br>'.$smr;

	$query = mysqli_query( $connection , $sq2) or trigger_error(mysqli_error($connection));
	
	$line = $query->fetch_assoc();

			$mean = $line["channel10"];//write channel no.
			//$mean=$channel[3];
	
			echo '<br>'.$mean;
	
			$alpha=$mean*$threshold;
	
			echo '<br>'.$alpha;
	
			$alpha=$mean+$alpha;
	
			echo '<br>'.$alpha;

		$band1 = "smr";
		$band2 = "alpha";
	
		$channel1 = 11;
		$channel2 = 10;//whatever channel to be selected;
	
		$thresh1 = $smr;
		$thresh2 = $alpha;

		if ($name == "video") {

			header("Location: video/index.html?band=$band1&channel=$channel1&thresh=$thresh1&band1=$band2&channel1=$channel2&thresh1=$thresh2");
		};

		if ($name == "progressbar") {
			header("Location: progressbar/index.html?band=$band1&channel=$channel1&thresh=$thresh1&band1=$band2&channel1=$channel2&thresh1=$thresh2");
		};
	
	}
	
	/* $myData->channel = $channelarr;
	$myData->bands = $bandarr;
	$myData->thresh = $thresharr;
	
	//$myJSON1 = json_encode($myData);
	//$myJSON2 = json_encode($channelarr);
	//$myJSON3 = json_encode($thresharr);
	
	//echo '<br>'.$myJSON1;
	//echo '<br>'.$myJSON2;
	//echo '<br>'.$myJSON3;
	
	$fp = fopen('progressbar/data.json', 'w');
	fwrite($fp, json_encode($myData));
	fclose($fp);
 */
/*
	echo '<br>';
	var_dump($bandarr);
	echo '<br>';
	var_dump($channelarr);
	echo '<br>';
	var_dump($thresharr);
*/


?>