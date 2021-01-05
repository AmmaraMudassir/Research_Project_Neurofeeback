<!DOCTYPE html>
<html lang="en">

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
    session_start(); 
    ?>

    
      <form action="./customizethreshold.php" id="peakpro"  class="fluid-container d-flex flex-column align-items-center justify-content-center p-5 mt-4">
        <div class="p-4 shadow rounded w-50">
          <h1 class="text-center mb-5">Select Protocol</h1>
          <div class="pl-5" id="mydiv">  
            
          </div>
        <div class= "container text-center">
        <button class="mt-3 px-5 btn btn-lg btn-warning shadow-sm" type="submit" id="pro">
          Submit
        </button>
        </div>
        </div>
        <p class="mt-5"> Above information is taken from:</p>
            <div class="form-group">
             <a href="https://pdfs.semanticscholar.org/25b2/80e2a6c0d27e9b2fe8f65ec6077dd78da472.pdf?_ga=2.245211661.900554138.1585125444-2108098455.1576136369" 
             target ="_blank"> Neurofeedback: A Comprehensive Review on System Design, Methodology and Clinical Applications </a>
             </div>
      </form>
    
  ?>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script>
var mycount=localStorage.getItem('cha');
  var array = []
  for(var i=0;i<mycount;i++)
{
  array.push(localStorage.getItem("a"+i));
}
var k=0;
var div1=document.getElementById("mydiv")
for (var i=0;i <(mycount*2);i++)
{
var cdiv=document.createElement("div");
cdiv.class="form-group";
var ip=document.createElement("input");
ip.type="checkbox";
ip.name="protocol";
var label=document.createElement("label");
if(i >= (mycount*2)/2)
{
  for (var j = k; j <= k ; j++) {
label.textContent="Decrease "+array[j];
} 
k++;
}
else
{
for (var j = i; j <= i ; j++) {
label.textContent="Increase "+array[j];
}
}
cdiv.appendChild(ip);
cdiv.appendChild(label);
div1.appendChild(cdiv);
}
sessionStorage.setItem('ch', mycount);
</script>
</html>