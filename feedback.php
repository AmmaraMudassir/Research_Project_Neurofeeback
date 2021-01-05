<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Feedback</title>

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

  if (isset($_GET["threshold"])) {
    session_start();
    $threshold = $_GET["threshold"];
    $_SESSION["threshold"] = $threshold;
  // echo $_SESSION["threshold"];
  }
  ?>
 
  <form  class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-4">
    <div class="p-4 shadow rounded w-50 d-flex flex-column align-items-center justify-content-center">
      <h2 class="text-center mb-5">Select Type of Feedback </h2>
      <div>
        <div class="form-group">
          <input required type="radio" value="movingball" name="feed">
          <label class="pl-2">Moving Ball</label>
        </div>
        <div class="form-group">
          <input required type="radio" value="progressbar" name="feed">
          <label class="pl-2">Progress Bar</label>
        </div>
        <!-- <div class="form-group">
          <input required type="radio" value="speedometer" name="feed">
          <label class="pl-2">Speedometer</label>
        </div> -->
        <div class="form-group">
          <input required type="radio" value="video" name="feed">
          <label class="pl-2">Video</label>
        </div>
        <div class="form-group">
          <input required type="radio" value="audio" name="feed">
          <label class="pl-2">Audio</label>
        </div>
      </div>
      <button onclick="goToTest()" class="mt-5 px-5 btn btn-lg btn-warning shadow-sm" type="submit" id="feedbtn">Submit</button>
    </div>
  </form>
 <?php
 session_start();
   $app = $_SESSION['app'];
  echo $app;
?>

  <script>
  
    function goToTest() {
      var app = '<?php echo $app; ?>';
      var radio = document.querySelector('input[type="radio"]:checked');
      var name = radio.value;
     if ( app == 'peakperformance' ){
       console.log(app);
       event.preventDefault();
        window.location.href = "peak_perform.php?name="+name;
     }
      if ( app == 'PTSD' ){
       console.log(app);
       event.preventDefault();
        window.location.href = "ptsd.php?name="+name;
      }

      //
      // if (name === 'video') {
      //   event.preventDefault();
      //   window.location.href = 'peak_perform.php?name=video'	
      // }
      // else if (name === 'progressbar') {
      //   event.preventDefault();
      //   window.location.href = 'peak_perform.php?name=progressbar'	
      // }
    }
  </script>



 <!-- Scripts -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>