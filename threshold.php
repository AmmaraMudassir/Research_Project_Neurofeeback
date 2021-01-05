<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Threshold</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <!-- Styles -->
  <style>
    body {
      height: 100vh;
      overflow-y: hidden;
    }

    body>form {
      height: 100vh;
    }
  </style>

  <!-- Body -->
  <?php
  if (isset($_GET["protocol"])) {
    session_start();
    $protocol = $_GET["protocol"];
    $_SESSION["protocol"] = $protocol;
	// echo $_SESSION["protocol"][0];
	// echo $_SESSION["file"];
  } ?>

  <form action="./feedback.php" id="threshold" class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-4">
    <div class="p-4 shadow rounded w-50 d-flex flex-column align-items-center justify-content-center">
      <h2 class="text-center mb-5">Select Threshold value </h2>
      <!-- <img src="./assets/images/emotive.png" alt="brain"> -->
      <input class="form-center mt-3" type="number" name="threshold" value= "threshold" id="thresh" min="1" max="100">
      <button class="mt-5 px-5 btn btn-lg btn-warning shadow-sm" type="submit" id="threshbtn">Submit</button>
      </div>
      </form>
    
     
      
    
    
  


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>