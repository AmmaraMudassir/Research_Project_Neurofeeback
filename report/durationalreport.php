<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Report</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <!-- Styles -->
  <style>
    .span {
      display: block;
      width: 50%;
      background-color: #6663;
      height: 2px;
      margin: 10px 0;
    }

    .info {
      font-size: 20px;
    }

    #hide {
      position: relative;
      height: 12px;
      width: 100%;
      background-color: #fff;
      z-index: 100;
      top: -12px;
    }
  </style>

  <!-- Body -->

  <?php
  session_start();


  $name = $_SESSION["name"];
  $gender = $_SESSION["gender"];
  $age = $_SESSION["age"];
  
  ?>



  <h1 class="display-3 my-5 text-center h-25">REPORT</h1>
  <div class="d-flex flex-wrap justify-content-around mb-5">
    <div class="w-100 d-flex flex-column justify-content-center mb-5">
      <div class="info px-5 mb-3 w-75 mx-auto">
        <h2 class="mb-5 text-center">SUBJECT INFORMATION</h2>
        <p id="name" class="info mb-0 pl-3"><span class="font-weight-bold">Name :</span><?php echo  $name; ?> </p>
        <span class="span"></span>
        <p id="age" class="info mb-0 pl-3"><span class="font-weight-bold">Age :</span> <?php echo $age; ?> </p>
        <span class="span"></span>
        <p id="gender" class="info mb-0 pl-3"><span class="font-weight-bold">Gender :</span> <?php echo $gender; ?></p>
        <span class="span"></span>
      </div>
      <!-- <div class="form-group w-50 mx-auto mb-3">
        <label for="comment" class="font-weight-bold">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <div class="btn-grp mx-auto">
        <button class="btn btn-outline-warning" onclick="window.location.href='../prebaseline.php'">Go Back</button>
        <button id="print-btn" class="btn btn-warning">Print</button>
      </div> -->
    </div>

    <div class="px-5 w-50">
      <h2 class="text-center">Baseline Values</h2>
      <div style="height: 300px; max-width: 500px;" class="mx-auto" id="chartContainer_b">

      </div>
      <div id="hide"></div>
    </div>
    <div class="w-50">
       <!-- <h2 class="text-center">Behavioral Test</h2> ---> 
      <div style="height: 300px; width: 500px;" class="mx-auto">

      </div>
      <div id="hide"></div>
    </div> 

    <?php
	$protocol = $_SESSION["protocol"];

	if($protocol == "incbeta"){
		$band = "beta";
		$c_no = 4;
	}
	if($protocol == "redtheta"){
		$band = "theta";
		$c_no = 4;
	}
	if($protocol == "inalpha"){
		$band = "alpha";
		$c_no = 4;
	}
	if($protocol == "intheta"){
		$band = "theta";
		$c_no = 4;
	}
	if($protocol == "incalphaptsd"){
		$band = "alpha";
		$c_no = 10;
	}
	if($protocol == "incsmrptsd"){
		$band = "smr";
		$c_no = 11;
	}
	if($protocol == "incalphasmrptsd"){
		$band = "alpha";
		$c_no = 10;
		$band1 = "smr";
		$c_no1 = 11;
	}

    for ($x = 1; $x <= 14; $x++) {
      echo ('
        <div class="px-5 w-50">
          <h5 class="text-center">Trending of Neurofeedback ('. $band .' CHANNEL ' . $x . ')</h5>
          <div style="height: 300px; max-width: 500px;"  class="mx-auto" id="chartContainer' . $x . '">
          </div>
          <div id="hide"></div>
        </div>
        ');
    }
    ?>

  </div>


  <?php
  include('../connections.php');
  //get session variables to be used in sql
	$id = $_SESSION["id"];
	$protocol = $_SESSION["protocol"]; //[0] only for one index
	$app = $_SESSION["app"];
	$s_date = urldecode($_POST['startdate']);
    $e_date = urldecode($_POST['tilldate']);

//refer to band using protocol selected can be generalized
	$band = "";
	$c_no = 0;
	$band1 = "";
	$c_no1 = 0;
	
	if($protocol == "incbeta"){
		$band = "beta";
		$c_no = 4;
	}
	if($protocol == "redtheta"){
		$band = "theta";
		$c_no = 4;
	}
	if($protocol == "inalpha"){
		$band = "alpha";
		$c_no = 4;
	}
	if($protocol == "intheta"){
		$band = "theta";
		$c_no = 4;
	}
	if($protocol == "incalphaptsd"){
		$band = "alpha";
		$c_no = 10;
	}
	if($protocol == "incsmrptsd"){
		$band = "smr";
		$c_no = 11;
	}
	if($protocol == "incalphasmrptsd"){
		$band = "alpha";
		$c_no = 10;
		$band1 = "smr";
		$c_no1 = 11;
	}
	

// declaring arrays:
	//contains all mean values of channel  in between dates for pre n post baseline
    $prechannels =array();
	$postchannels = array();
	//contain mean values of all session in each date  
	$s_channels = array();	
	//contains mean values of all dates in between the given dates
	$datesData = array();
	//contains dates as string to be used in graph labeling
	$dates = array();
	//temporary array to store each date data to visualize in graph
	$d_sessions = array();
	//temporary variable containing each channel value of all dates from prebaseline 
	//used to be subtracted from respective session mean values
	$channel = 0;
	//to keep count of only unique dates
	$no = 0;
	//temporary array to hold session means of one date and one channel
	$means = array();
	//will hold datapoints for the visualization of graph
	$sessionPoints = array();


	//get prebasline and postbaseline values of channel for peak performance test to be visualized in graph
		$sql = "SELECT channel$c_no from baselinemean where id=$id and bands='$band' and date between '$s_date' and '$e_date' "; // channel needed from builtin tests protocol
		$result = $connection->query($sql) or die($connection->error);
		$dateCount = mysqli_num_rows($result);
		
		while($row = $result->fetch_assoc()){
			
			array_push($prechannels,$row['channel'.$c_no]);	
			
		}
	 	
		$sql = "SELECT channel$c_no from postbaselinemean where id=$id and bands='$band' and date between '$s_date' and '$e_date' "; // channel needed from builtin tests protocol
		$result = $connection->query($sql) or die($connection->error);

		while($row = $result->fetch_assoc()){
			array_push($postchannels,$row['channel'.$c_no]);
		}
		
	//get all dates in between given dates with the mentioned conditions 
	$sql = "SELECT date from $app where id=$id and protocol='$protocol' and date between '$s_date' and '$e_date'";
	$result = $connection->query($sql) or die($connection->error);
	$dateCount = mysqli_num_rows($result);
	
	//iterate through one date at a time 
	while($row = $result->fetch_assoc()){
		//push date string in $dates and keep it unique to avoid duplicates
		array_push($dates,$row['date']);
		$dates = array_unique($dates);
	}
	
	for($i=0;$i<count($dates);$i++){
		//iterate for one channel at a time
		for($x=1;$x<15;$x++){				
			//get all values of one channel of one date as it depends on no. of session performed in that date
			$sql = "SELECT channel$x from $app where id=$id and bands='$band' and protocol='$protocol' and date='$dates[$no]'";
			$result = $connection->query($sql)or die($connection->error);
			//iterate each value of a channel and push it in $means
			while($row = $result->fetch_assoc()){
				array_push($means,$row['channel'.$x]); 	
			}
			
			//to get average mean value of all session on a single date
			$sum=0;
			$a= count($means);
			// $a =array($a);
			// echo($a[0]);
			//iterate through $means and add all values to be stored in $sum
			for($index = 0; $index < count($means); $index++){
				$sum = $sum + $means[$index];
			}
			
			//get all channel values of a single date to subtract each channel from respective session channel 
			$sql = "SELECT channel$x from baselinemean where id=$id and bands='$band' and date='$dates[$no]'";
			$result = $connection->query($sql)or die($connection->error);
			//get one value of one channel in $channel
			while($row = $result->fetch_assoc()){
				$channel = $row['channel'.$x]; 				
			}
			
			//get average of $sum and subtract from $channel to get an overall mean of all session values in a date
				$sum = $sum/5;
				$sum = $sum - $channel;
			
			//push $sum in $s_channels to keep all channels value of one date in one array
			array_push($s_channels,round($sum,5));
			
			//reinitialize $means to be used for another channel
			$means = array();	
		}
		//var_dump($s_channels);
		//push $s_channels in another arrays $datesData to keep all dates all channel values in one multidimensional array
		array_push($datesData,$s_channels);
		//reinitialize $s_channels to be used by another date
		$s_channels = array();
		$no++;		
	}
	
	//iterate through $datesData and push in $sessionPoints 
	for($i=0;$i<14;$i++){
		for($x = 0; $x < count($datesData); $x++){			
			array_push($d_sessions,array("label" => $dates[$x], "y" => $datesData[$x][$i]));			
		}
		array_push($sessionPoints,$d_sessions);
		$d_sessions = array();
	}
	
	//intialize arrays for prebaseline and postbaseline visualization
	$dataPoints = array();
	$dataPoints1 = array();
	$points = array();
	$points1 = array();

	$count = count($prechannels);

	for($i=0;$i<$count;$i++){	
		array_push($points,array("label" => $dates[$i], "y" => $prechannels[$i]));
		array_push($points1,array("label" => $dates[$i], "y" => $postchannels[$i]));
	}	

$dataPoints = $points;
$dataPoints1 = $points1;

?>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
    window.onload = function() {
		var pre = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
		console.log(pre);
		var post = <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>;
		console.log(post);
		
	    var chart = new CanvasJS.Chart("chartContainer_b", {
			animationEnabled: false,
			exportEnabled: false,
			theme: "dark1", // "light1", "light2", "dark1", "dark2"
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				},
			data: [{
				type: "column",
				name: "Prebaseline",
				// indexLabel: "{y}",
				// yValueFormatString: "$#0.##",
				showInLegend: true,
				dataPoints: pre
				},{
				type: "column",
				name: "Post baseline",
				// indexLabel: "{y}",
				// yValueFormatString: "$#0.##",
				showInLegend: true,
				dataPoints: post
				}]
        });
	
        chart.render();
		
		var data = <?php 		
			echo json_encode($sessionPoints, JSON_NUMERIC_CHECK); 
			?>;
		//console.log(data);
		for (let i = 1; i <= 14; i++) {
			var chart1 = new CanvasJS.Chart(`chartContainer${i}`, {
			animationEnabled: false,
			exportEnabled: false,
			theme: "light1", // "light1", "light2", "dark1", "dark2"
			data: [{
			type: "line", //change type to bar, line, area, pie, etc
			//indexLabel: "{y}", //Shows y value on all Data Points
			indexLabelFontColor: "#5A5757",
			indexLabelPlacement: "outside",
			dataPoints: data[i-1]
				}]
			});
        chart1.render();
      }

    }
    </script>
    
     <div class="form-group w-75 mx-auto mb-3">
        <label for="comment" class="font-weight-bold">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" placeholder = "Enter your finding here.."></textarea>
      </div>
      <div class="btn-grp mx-auto">
        <button class="btn btn-outline-warning" onclick="window.location.href='../report.php'">Go Back</button>
        <button id="print-btn" class="btn btn-warning">Print</button>
      </div> 
      <script>
       $('#print-btn').click(function() {
      window.print()
    })
    </script>
</body>

</html>