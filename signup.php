<!-- 
  Code for Sign Up Page
 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Sign Up</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  
    
  <!-- <h1 class="display-1 text-center py-2 text-warning font-weight-normal">NEUROFEEDBACK</h1> -->
  <div class="container-lg">
      
      <?php
          if (isset($_GET['msg']))
              
          {
              $msg=$_GET['msg'];
              echo $msg;
          }
      else
      {
          $msg=" ";
      }
      ?>
      
    <form  action="insert.php" method="POST" class="w-50 mx-auto border border-light rounded p-5 mt-5 shadow">
      <h3 class="text-center mb-4">Sign-Up Form</h3>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" aria-describedby="age" name="age" required>
      </div>
      <div class="form-group">
        <legend class="col-form-label">Gender</legend>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" value="male" name="gender" required>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="female"  value="female" name="gender" required>
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
      <button type="submit" class="btn btn-dark mb-2 d-block">Sign Up</button>
      <!-- Link to go to next page. TO BE REMOVED -->
     <!-- <a href="./preBehavioralTests.php">home</a> -->

       <!--<small><a href="index.php" class="text-dark">Already have an account? SignIn here!</a></small> -->
    </form>
  </div>
</body>

</html>

