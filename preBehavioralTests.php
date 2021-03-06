<!-- Including the side menu -->
<?php include('./sideMenu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Pre-Behavioral Tests</title>

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
      <?php 
		session_start();
		
		$user = $_SESSION["id"];
		$name = $_SESSION["name"];
		$_SESSION["test"] = 'Pre';
		
	  renderSideMenu('PreBehavioral', $name , $user) 
	  
	  ?>

      <div class="col home-page d-flex align-items-center justify-content-around">


        <div class="card w-25 h-50 border-0 shadow">
          <div class="card-body">
            <h5 class="card-title">STROOP TEST</h5>
            <p class="card-text mt-5">The Stroop Test is a neuropsychological test extensively used to improve reaction time. 
           </p>
            <a href="./stroopTest" class="btn btn-warning  mt-5">Start Test</a>
          </div>
        </div>


        <div class="card w-25 h-50 border border-0 shadow">
          <div class="card-body">
            <h5 class="card-title">DIGIT SPAN TEST</h5>
            <p class="card-text mt-5">The Digit Span Test is a neuropsychological test extensively used to improve working memory. 
           </p>
            <a href="./digitSpanTest" class="btn btn-warning mt-5">Start Test</a>
          </div>
        </div>


        <div class="card w-25 h-50 border border-0 shadow">
          <div class="card-body">
            <h5 class="card-title">GO / NO-GO TEST</h5>
            <p class="card-text mt-5"> The go/no-go is a cognitive task aimed at determining the ability of an individual to inhibit a response deemed inappropriate.</p>
            <a href="./go_no-goTest" class="btn btn-warning mt-5">Start Test</a>
          </div>
        </div>


      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>