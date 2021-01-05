<!DOCTYPE html>
<html lang="en">
<?php include('./sideMenu.php') ?> 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Customized Tests</title>

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
  if (isset($_GET["band"]) || isset($_GET["channel"])) {
    session_start();
    if (isset($_GET["band"])) {
      $band = $_GET["band"];
      $_SESSION['band'] = $band;
    }
    if (isset($_GET["channel"])) {
      $channel = $_GET["channel"];
      $_SESSION['channel'] = $channel;
    }
  }

  if (!isset($_GET["band"]) || !isset($_GET["channel"])) {
    echo ('
    <form class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-4">
      <div class="bands py-4 pr-0 pl-4 shadow rounded w-50">
        <h2 class="text-center mb-5 mr-3">Select Band</h2>
        <div class="d-flex w-100 flex-wrap pl-5">
          <div class="form-group w-25">
            <input type="checkbox" value="delta" name="band">
            <label>Delta</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="theta" name="band">
            <label>Theta</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="alpha" name="band">
            <label>Alpha</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="smr" name="band">
            <label>SMR</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="beta" name="band">
            <label>Beta</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="highbeta" name="band">
            <label>HighBeta</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="gamma" name="band">
            <label>Gamma</label>
          </div>
        </div>
      </div>
      <div class="channels py-4 pr-0 pl-4 shadow rounded w-50 mt-3">
        <h2 class="text-center mb-5 mr-3">Select channel</h2>
        <div class="d-flex w-100 flex-wrap pl-5">
          <div class="form-group w-25">
            <input type="checkbox" value="1" name="channel"> <label>Channel 1</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="2" name="channel">
            <label>Channel 2</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="3" name="channel">
            <label>Channel 3</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="4" name="channel">
            <label>Channel 4</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="5" name="channel">
            <label>Channel 5</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="6" name="channel">
            <label>Channel 6</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="7" name="channel">
            <label>Channel 7</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="8" name="channel">
            <label>Channel 8</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="9" name="channel">
            <label>Channel 9</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="10" name="channel">
            <label>Channel 10</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="11" name="channel">
            <label>Channel 11</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="12" name="channel">
            <label>Channel 12</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="13" name="channel">
            <label>Channel 13</label>
          </div>
          <div class="form-group w-25">
            <input type="checkbox" value="14" name="channel">
            <label>Channel 14</label>
          </div>
        </div>
      </div>
      <button type="submit" class="mt-3 px-5 btn btn-lg btn-warning shadow-sm">Submit</button>
    </form>
    ');
  }

  ?>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>