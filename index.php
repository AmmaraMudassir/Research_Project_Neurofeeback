
<!-- 
  Code for Sign In Page
 -->

<?php
include('login-authentication.php');// Includes Login Script
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuro Feedback | Sign In</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    
  <h1 class="display-1 text-center py-5 text-warning font-weight-normal">NEURO FEEDBACK</h1>
  <div class="container-lg">  

      <?php
         if (isset($_GET['msg']))
         {
             $msg=$_GET['msg'];
             echo $msg;
         }
      else
      {
          echo " ";
      }
      
      ?>
      
    <form method="POST" class="w-50 w mx-auto border border-light rounded p-5 mt-5 shadow" action="">
      <h3 class="text-center mb-4">Sign-In Form</h3>
      <div class="form-group">
        <label for="registrationID">Registration ID</label>
        <input type="text" class="form-control" id="registrationID" aria-describedby="registrationID" name="userid">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-dark mb-2 d-block" value="login" name="submit">Sign In</button>
      <small>
        <a href="signup.php" class="text-dark">Don't have an account? Register here!</a>
      </small><br/>
        <span style="color:red"><?php echo $error; ?></span>
 
        
    </form>
      
    
      
  </div>

</body>

</html>