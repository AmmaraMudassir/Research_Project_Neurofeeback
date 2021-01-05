<!-- Including the side menu -->
<?php include('./sideMenu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Testing</title>

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
      <!-- Renders a side menu with pre Behavioral as active page -->
      <?php session_start();
		
		$user = $_SESSION["id"];
		$name = $_SESSION["name"];
		renderSideMenu('Testing', $name , $user) 
	  
	  ?>

      <div class="col home-page d-flex align-items-center justify-content-around">

        <div class="card w-25 h-50 border border-0 shadow ml-5">
          <div class="card-body">
            <h5 class="card-title">CUSTOMIZED TESTS</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./customizedTests.php" class="btn btn-warning">Start Tests</a>
          </div>
        </div>


        <div class="card w-25 h-50 border border-0 shadow mr-5">
          <div class="card-body">
            <h5 class="card-title">BUILT IN TESTS</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./builtinTests.php" class="btn btn-warning">Start Tests</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>