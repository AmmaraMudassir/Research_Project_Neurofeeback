<!-- Including the side menu -->
<?php include('./sideMenu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Post Baseline Calculation</title>

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
		renderSideMenu('PostBaseline', $name , $user) 
	  
	  ?>

      <div class="col home-page d-flex align-items-center justify-content-center">
        <div class="w-50 h-50 shadow">
          <h3 class="mx-2 mt-3 px-2 pt-3 pb-4 text-center d-block"> POST BASELINE CALCULATION</h3>
          <time id="timer" class="display-1 pb-4 my-5 text-center d-block">02:30</time>
          <div class="btn-grp d-flex align-items-center justify-content-center">
            <button id='postbaseline-start' class="w-25 m-3 btn btn-lg btn-warning">START</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
    var h2 = document.getElementById('timer'),
      start = document.getElementById('postbaseline-start'),
      seconds = 30,
      minutes = 02,
      t;

    function add() {
      seconds--;
      if (minutes == 02 && seconds == 00) {
        seconds = 60;
        minutes = 01;
      }

      if (minutes == 01 && seconds == 00) {
        seconds = 60;
        minutes = 00;
      }
      if (minutes == 00 && seconds == 00) {
        clearTimeout(t);
        return;
      }
      
      h2.textContent = (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

      timer();
    }

    function timer() {
      t = setTimeout(add, 1000);
      
    }

    function startPy() {
      $.ajax({
        type: "POST",
        url: 'baseline/run_baseline.php',
        success: function(){
          window.location.href='baseline/postpyTomysql.php';
        }
      });
      console.log("Run");
    }
    start.onclick = function() {
      startPy();
      timer();
    
    }

  </script>



</body>

</html>