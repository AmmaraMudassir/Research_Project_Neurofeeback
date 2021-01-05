<!-- Including the side menu -->
<?php include('./sideMenu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Report</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <!-- Styles -->
  <style>
    .home-page {
      /* border: solid 1px blue; */
      min-height: 100vh;
    }
  </style>

  <!-- Body -->
  <div class="container-fluid">
    <div class="row">
      <!-- Renders a side menu with report as active page -->
      <?php

      session_start();
      $user = $_SESSION["id"];
      $name = $_SESSION["name"];
	   if (isset($_GET["protocol"])) {
			$protocol = $_GET["protocol"];
			$_SESSION["protocol"] = $protocol;
	   }
      renderSideMenu('Report', $name, $user)

      ?>

      <div class="col home-page d-flex align-items-center justify-content-around">

        <div class="card w-25 h-50 border border-0 shadow ml-5">
          <div class="card-body">
            <h5 class="card-title">SINGLE DAY REPORT</h5>
            <p class="card-text">Please select a date.</p>
            <form class="form d-flex-right px-9 mb-5" method="POST" action = "report/singledayreport.php">
			<select name = "date" style="width: 200px" class="form-control" >
              <?php
              include('connections.php');

              $id = $_SESSION["id"];
              $sql = "Select date from login where id=$id";

              $result = $connection->query($sql) or die($connection->error);
              while ($row = $result->fetch_assoc()) {
                echo '<option value='.'"'.$row["date"].'"'.'>' . $row["date"] . '</option>';
              };

            ?>
			</select></br></br>
			<button type="submit" class="btn btn-warning">Submit</button>
            </form>
          			

          </div>
        </div>


        <div class="card w-25 h-50 border border-0 shadow mr-5">
          <div class="card-body">
            <h5 class="card-title">DURATIONAL REPORT</h5>
				<p class="card-text">Please select a duration.</p>
				<form class="form d-flex-right px-9 mb-3" action="report/durationalreport.php" method="POST">
				  <p class="text-left mt-3"> From: </p>
					<select name="startdate" style="width: 200px" class="form-control" >
					  <?php

					  include('connections.php');

					  echo '';

					  $id = $_SESSION["id"];
					  $sql = "Select date from login where id=$id";

					  $result = $connection->query($sql) or die($connection->error);
					  while ($row = $result->fetch_assoc()) {
						echo '<option value='.'"'.$row["date"].'"'.'>' . $row["date"] . '</option>';
					  };

					  echo '';
					  ?>
					  </select>
				<!--</form>
				
				<form class="form d-flex-right px-9 mb-3" action="report/durationalreport.php" method="POST">-->
				  <p class="text-left mt-3"> Till: </p>
					<select name="tilldate" style="width: 200px" class="form-control" >
					  <?php

					  include('connections.php');

					  $id = $_SESSION["id"];
					  $sql = "Select date from login where id=$id";

					  $result = $connection->query($sql) or die($connection->error);
					  while ($row = $result->fetch_assoc()) {
						echo '<option value='.'"'.$row["date"].'"'.'>' . $row["date"] . '</option>';
					  };

					  ?>
					</select> </br>
				   <button type="submit" class="btn btn-warning">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>