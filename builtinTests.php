<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | BuiltIn Tests</title>

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
  if (isset($_GET["app"])) {
    $app = $_GET["app"];
    session_start();
    $_SESSION['app'] = $app;
  }

  if (!isset($_GET["app"])) {
    echo ('
    <form class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-4">
      <div class="builtin p-4 shadow rounded w-50">
        <h2 class="text-center mb-5">Select Test</h2>
        <div class="pl-5">
          <div class="form-group">
            <input type="radio" value="adhd" name="app">
            <label class="pl-2">ADHD</label>
          </div>
          <div class="form-group">
            <input type="radio" value="Depression" name="app">
            <label class="pl-2">Depression</label>
          </div>
          <div class="form-group">
          <input type="radio" value="PTSD" name="app">
          <label class="pl-2">PTSD</label>
        </div>
          <div class="form-group">
            <input type="radio" value="peakperformance" name="app">
            <label class="pl-2">Peak Performance</label>
          </div>
        </div>
      </div>
      <button type="submit" class="mt-5 px-5 btn btn-lg btn-warning shadow-sm">Submit</button>
    </form>
    ');
  } elseif ($app == 'peakperformance') {
    echo ('
      <form action="./threshold.php" id="peakpro" class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-2">
        <div class="p-2 shadow rounded w-50">
          <h1 class="text-center mb-3">Select Protocol</h1>
          <div class="pl-3">
            <div class="form-group">
              <input type="radio" name="protocol" value="incbeta">
              <label>Protocol 1</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>
            <div class="form-group">
              <input type="radio" name="protocol" value="redtheta">
              <label>Protocol 2</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>
            
          </div>
          </div>
          
        <div class= "container text-center">
        <button onclick="check()" class="mt-2 px-3 btn btn-lg btn-warning shadow-sm" type="submit" id="pro">
          Submit
        </button>
        </div>
       
        <p class="mt-5"> Above information is taken from:</p>
            <div class="form-group">
             <a href="https://pdfs.semanticscholar.org/25b2/80e2a6c0d27e9b2fe8f65ec6077dd78da472.pdf?_ga=2.245211661.900554138.1585125444-2108098455.1576136369" 
             target ="_blank"> Neurofeedback: A Comprehensive Review on System Design, Methodology and Clinical Applications </a>
             </div>
      </form>
    ');
  }
  elseif ($app == 'PTSD') {
    echo ('
      <form action="./threshold.php" id="peakpro" class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-2">
        <div class="p-2 shadow rounded w-50">
          <h1 class="text-center mb-3">Select Protocol</h1>
          <div class="pl-3">
            <div class="form-group">
              <input type="radio" name="protocol" value="incalphaptsd">
              <label>Protocol 1</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>
            <div class="form-group">
              <input type="radio" name="protocol" value="incsmrptsd">
              <label>Protocol 2</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>  
          </div>
          </div>
          
        <div class= "container text-center">
        <button onclick="check()" class="mt-2 px-3 btn btn-lg btn-warning shadow-sm" type="submit" id="pro">
          Submit
        </button>
        </div>
       
        <p class="mt-5"> Above information is taken from:</p>
            <div class="form-group">
             <a href="https://pdfs.semanticscholar.org/25b2/80e2a6c0d27e9b2fe8f65ec6077dd78da472.pdf?_ga=2.245211661.900554138.1585125444-2108098455.1576136369" 
             target ="_blank"> Neurofeedback: A Comprehensive Review on System Design, Methodology and Clinical Applications </a>
             </div>
      </form>
    ');
  }
  elseif ($app == 'Depression') {
    echo ('
      <form action="./threshold.php" id="peakpro" class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-2">
      <div class="p-2 shadow rounded w-50">
        <h1 class="text-center mb-3">Select Protocol</h1>
        <div class="pl-3">
          <div class="form-group">
            <input type="radio" name="protocol" value="incalphaptsd">
            <label>Protocol 1</label>
            <img src="assets/images/increasebetaFC5.jpg" alt="">
          </div>
          <div class="form-group">
            <input type="radio" name="protocol" value="incsmrptsd">
            <label>Protocol 2</label>
            <img src="assets/images/increasebetaFC5.jpg" alt="">
          </div>  
        </div>
        </div>
        
      <div class= "container text-center">
      <button onclick="check()" class="mt-2 px-3 btn btn-lg btn-warning shadow-sm" type="submit" id="pro">
        Submit
      </button>
      </div>
     
      <p class="mt-5"> Above information is taken from:</p>
          <div class="form-group">
           <a href="https://pdfs.semanticscholar.org/25b2/80e2a6c0d27e9b2fe8f65ec6077dd78da472.pdf?_ga=2.245211661.900554138.1585125444-2108098455.1576136369" 
           target ="_blank"> Neurofeedback: A Comprehensive Review on System Design, Methodology and Clinical Applications </a>
           </div>
    </form>
      ');
  }
  elseif ($app == 'adhd') {
        echo ('
        <form action="./threshold.php" id="peakpro" class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-2">
        <div class="p-2 shadow rounded w-50">
          <h1 class="text-center mb-3">Select Protocol</h1>
          <div class="pl-3">
            <div class="form-group">
              <input type="radio" name="protocol" value="incalphaptsd">
              <label>Protocol 1</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>
            <div class="form-group">
              <input type="radio" name="protocol" value="incsmrptsd">
              <label>Protocol 2</label>
              <img src="assets/images/increasebetaFC5.jpg" alt="">
            </div>  
          </div>
          </div>
          
        <div class= "container text-center">
        <button onclick="check()" class="mt-2 px-3 btn btn-lg btn-warning shadow-sm" type="submit" id="pro">
       
        
        </div>
       
        <p class="mt-5"> Above information is taken from:</p>
            <div class="form-group">
             <a href="https://pdfs.semanticscholar.org/25b2/80e2a6c0d27e9b2fe8f65ec6077dd78da472.pdf?_ga=2.245211661.900554138.1585125444-2108098455.1576136369" 
             target ="_blank"> Neurofeedback: A Comprehensive Review on System Design, Methodology and Clinical Applications </a>
             </div>
      </form>
        ');
  }
  ?>

  <script>
    function check() {
      var checkBoxes = document.querySelectorAll('input[type="radio"]');
      var isChecked = false;
      for (var i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked) {
          isChecked = true;
        };
      };
      if (!isChecked) {
        alert('Please, select one option!');
        event.preventDefault()
      }
    }
  </script>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>