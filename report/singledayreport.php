+
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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .span {
      display: block;
      width: 100%;
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
  $date = urldecode($_POST['date']);
  
  ?>



  <h1 class="display-3 my-5 text-center h-25">REPORT</h1>
  <div id="print-div" class="d-flex flex-wrap justify-content-around mb-5">
    <div class="w-100 d-flex flex-column justify-content-center mb-5">
      <div class="info px-5 mb-3 w-75 mx-auto">
        <h2 class="mb-5 text-center">SUBJECT INFORMATION</h2>
        <p id="name" class="info mb-0 pl-3"><span class="font-weight-bold">Name :</span><?php echo  $name; ?> </p>
        <span class="span"></span>
        <p id="age" class="info mb-0 pl-3"><span class="font-weight-bold">Age :</span> <?php echo $age; ?> </p>
        <span class="span"></span>
        <p id="gender" class="info mb-0 pl-3"><span class="font-weight-bold">Gender :</span> <?php echo $gender; ?></p>
		<span class="span"></span>
		<p id="date" class="info mb-0 pl-3"><span class="font-weight-bold"> Date :</span> <?php echo $date; ?></p>
        <span class="span"></span>
      </div>
      <!-- <div class="form-group w-50 mx-auto mb-3">
        <label for="comment" class="font-weight-bold">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <div class="btn-grp mx-auto">
        <button class="btn btn-outline-warning" onclick="window.location.href='../reportselection.php'">Go Back</button>
        <button id="print-btn" class="btn btn-warning">Print</button>
      </div> -->
    </div>

    <?php
	$protocol = $_SESSION["protocol"]; //[0] only for one index
	if($protocol == "incbeta"){
	$band = "beta";
	}
	if($protocol == "redtheta"){
	$band = "theta";
	}
	if($protocol == "inalpha"){
	$band = "alpha";
	}
	if($protocol == "intheta"){
	$band = "theta";
	}
	if($protocol == "incalphaptsd"){
		$band = "alpha";
		}

    for ($x = 1; $x <= 14; $x++) {
      echo ('
	  
        <div class="px-5 w-50">
          <h2 class="text-center">' . $band . ' channel ' . $x . '</h2>
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
	$id = $_SESSION["id"];
    $channels =array();
	$postchannels = array();
	$sessionchannels = array();
	$protocol = $_SESSION["protocol"]; //[0] only for one index
	if($protocol == "incbeta"){
	$band = "beta";
	}
	if($protocol == "redtheta"){
	$band = "theta";
	}
	if($protocol == "inalpha"){
	$band = "alpha";
	}
	if($protocol == "intheta"){
	$band = "theta";
	}
	if($protocol == "incalphaptsd"){
		$band = "alpha";
		}
	$count = 0;
	$app = $_SESSION["app"];
	
	$session1 =array();
	$session2 =array();
	$session3 =array();
	$session4 =array();
	$session5 =array();



	for($i=1;$i<15;$i++){
		
		$sql = "SELECT channel$i from baselinemean where id=$id and date='$date' and bands='$band'"; // band needed from builtin tests protocol
		$result=$connection->query($sql)or die($connection->error);

		while($row = $result->fetch_assoc()){
			array_push($channels,$row['channel'.$i]);
		}
	 	
		$sql = "SELECT channel$i from postbaselinemean where id=$id and date='$date' and bands='$band'"; // band needed from builtin tests protocol
		$result=$connection->query($sql)or die($connection->error);

		while($row = $result->fetch_assoc()){
			array_push($postchannels,$row['channel'.$i]);
		}
	
		$sql = "SELECT channel$i from $app where id=$id and date='$date' and bands='$band' and protocol = '$protocol'"; // band needed from builtin tests protocol
		$result=$connection->query($sql)or die($connection->error);

		while($row = $result->fetch_assoc()){
			array_push($sessionchannels,$row['channel'.$i]);	
			$count = mysqli_num_rows($result);
		}
			//var_dump($sessionchannels);
			
			if($count==1){
			array_push($session1,$sessionchannels[0]);
			}
			if($count==2){
			array_push(	$session1,$sessionchannels[0]);
			array_push(	$session2,$sessionchannels[1]);
			}
			if($count==3){
			array_push(	$session1,$sessionchannels[0]);
			array_push(	$session2,$sessionchannels[1]);
			array_push(	$session3,$sessionchannels[2]);
			}
			if($count==4){
			array_push(	$session1,$sessionchannels[0]);
			array_push(	$session2,$sessionchannels[1]);
			array_push(	$session3,$sessionchannels[2]);
			array_push(	$session4,$sessionchannels[3]);
			}
			if($count==5){
			array_push(	$session1,$sessionchannels[0]);
			array_push(	$session2,$sessionchannels[1]);
			array_push(	$session3,$sessionchannels[2]);
			array_push(	$session4,$sessionchannels[3]);
			array_push(	$session5,$sessionchannels[4]);
			}
		$sessionchannels = array();
		//var_dump($sessionchannels);
	}
//var_dump($session2);

	for($i=0;$i<14;$i++){
			if($count==1){
			  $dataPoints []= array(	
							array("label" => 'Pre Baseline', "y" => $channels[$i]),
							array("label" => 'Session 1', "y" => $session1[$i]),	
							array("label" => 'Post Baseline', "y" => $postchannels[$i]),
						  );
			}
			if($count==2){
			  $dataPoints []= array(	
							array("label" => 'Pre Baseline', "y" => $channels[$i]),
							array("label" => 'Session 1', "y" => $session1[$i]),
							array("label" => 'Session 2', "y" => $session2[$i]),						
							array("label" => 'Post Baseline', "y" => $postchannels[$i]),
						  );
			}
			if($count==3){
			  $dataPoints []= array(	
							array("label" => 'Pre Baseline', "y" => $channels[$i]),
							array("label" => 'Session 1', "y" => $session1[$i]),	
							array("label" => 'Session 2', "y" => $session2[$i]),
							array("label" => 'Session 3', "y" => $session3[$i]),
							array("label" => 'Post Baseline', "y" => $postchannels[$i]),
						  );	
			}
			if($count==4){
			  $dataPoints []= array(	
							array("label" => 'Pre Baseline', "y" => $channels[$i]),
							array("label" => 'Session 1', "y" => $session1[$i]),	
							array("label" => 'Session 2', "y" => $session2[$i]),
							array("label" => 'Session 3', "y" => $session3[$i]),
							array("label" => 'Session 4', "y" => $session4[$i]),
							array("label" => 'Post Baseline', "y" => $postchannels[$i]),
						  );
			}
			if($count==5){
			  $dataPoints []= array(	
							array("label" => 'Pre Baseline', "y" => $channels[$i]),
							array("label" => 'Session 1', "y" => $session1[$i]),	
							array("label" => 'Session 2', "y" => $session2[$i]),
							array("label" => 'Session 3', "y" => $session3[$i]),
							array("label" => 'Session 4', "y" => $session4[$i]),
							array("label" => 'Session 5', "y" => $session5[$i]),
							array("label" => 'Post Baseline', "y" => $postchannels[$i]),
						  );	
			}
	  }

?>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
	var data = <?php 		
			echo json_encode($dataPoints, JSON_NUMERIC_CHECK); 
			?>
			
    window.onload = function() {
		for (let i = 1; i <= 14; i++) {
        var chart = new CanvasJS.Chart(`chartContainer${i}`, {
          animationEnabled: false,
          exportEnabled: false,
          theme: "light1", // "light1", "light2", "dark1", "dark2"
          data: [{
            type: "column", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            dataPoints: data[i-1]
          }]
        });
        chart.render();
      }
    }
	</script>
	<div class="form-group w-50 mx-auto mb-3">
        <label for="comment" class="font-weight-bold">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    <div class="btn-grp mx-auto">
        <button class="btn btn-outline-warning" onclick="window.location.href='../reportselection.php'">Go Back</button>
        <button id="print-btn" class="btn btn-warning">Print</button>
    </div>
	<script>

    // print
    $('#print-btn').click(function() {
      // $("html").printThis({
      //   canvas: true,
      //   importCSS: true,
      //   importStyle: true,
      //   loadCSS: '../assets/bootstrap/css/bootstrap.min.css'
      // });
      window.print()
    })
  </script>

</body>

</html>