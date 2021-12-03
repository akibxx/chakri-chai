<?php
session_start();
if(isset($_SESSION['$Email'])){
	header('location:Admin/index.php');
} 
if(isset($_SESSION['$UserEmail_job'])){
	header('location:JobSeeker/index.php');
} 
if(isset($_SESSION['$UserEmail_emp'])){
	header('location:Employer/index.php');
} 
?>
<?php
// Create connection
$conn = new mysqli("localhost","root","","chakri");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="design/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" a href="index.php">
    <img src="./design/logo.PNG" width="140" height="30" class="d-inline-block align-top" alt="">
    <span class="web-name">চাকরি চাই !</span>
<?php
$sql = "SELECT * FROM news_master";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { ?> 
    <tr>
        <td><marquee behavior="scroll" width="200%" direction="left" scrollamount="12"><?php echo $row["News"];?></marquee></td>  
      </tr>
  <?php }
} else {
  echo "0 results";
}
$conn->close();
?>
  </a>
</nav>




<!-- navbar -->
<div class="">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" a href="index.php"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" a href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="TopJobs.php">Top Companies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AboutUs.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="SearchJob.php#">Searching a Job?</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" a href="registration.php">Don't have an account? Register Here!</a>
        </div>
      </li>
      <li class="nav-item">
        <button class="btn show-login btn-outline-success my-2 my-sm-0"> <a href="#">Login</a></button>
      </li>
    </ul>
    
  </nav>
</div>
<!-- Login pop up -->

<div class="popup">
   <div class="close-btn">&times;</div>
   <div class="form">
     <h2>Log in</h2>
     <form method="post" action="login.php">
     <div class="form-element">
       <label for="Email">Email</label>
       <input type="text" id="txtEmail" name="txtEmail"  placeholder="Enter email">
     </div>
     <div class="form-element">
       <label for="Password">Password</label>
       <input type="Password" id="txtPassword" name="txtPassword"  placeholder="Enter password">
     </div>
     <div class="form-element">
     <tr>
        <td>User Type*</td>
      </tr>
      <tr>
        <td><label>
            <select name="cmbUser" id="cmbUser">
              <option value="JobSeeker">JobSeeker</option>
              <option value="Employer">Employer</option>
              <option value="Administrator">Administrator</option>
            </select>
          </label></td>
      </tr>
     </div>
     <div class="form-element">
       <input type="checkbox" id="remember-me">
       <label for="remember-me">Remember me</label>
     </div>
     <div class="form-element">
      <button>Sign in</button>    
     </div>
     <div class="form-element">
       <a href="Forget.php">Forgot password?</a>
     </div>
   </div>
</form>
 </div>
<!-- Banner -->
<!-- slider -->
<div class="container">
    <button type="button" class="btn btn-primary btn-lg btn-block">Gallery</button>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./img/banner1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./img/banner2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./img/banner3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>





    <!-- Top Companies -->
    <button type="button" class="btn btn-danger btn-lg btn-block">Top Companies</button>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">ACI</h5>
            <p class="card-text">Imperial Chemical Industries, a British multinational established a Branch in the then East Pakistan which was converted into a company after liberation, named ICI Bangladesh Manufacturers Limited. In 1992 ICI divested its investment in Bangladesh to the Management, when its name was changed to Advanced Chemical Industries (ACI) Limited.</p>
            <a href="https://www.aci-bd.com/" class="btn btn-primary">Read More </a>
          </div>
        </div>
      </div>
    
    <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">BEXIMCO</h5>
            <p class="card-text">Today the BEXIMCO Group ("BEXIMCO" or the "Group") is the largest private sector group in Bangladesh. BEXIMCO was founded in the 1970's by two brothers – Ahmed Sohail Fasihur Rahman and Salman Fazlur Rahman.</p>
            <a href="https://www.beximco.com/" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">BASHUNDHARA</h5>
            <p class="card-text">The Bashundhara Group has started operation as a real estate venture known as "Bashundhara" under the aegis of the group's first concern - the East-West Property Development (Pvt) Ltd in 1987.</p>
            <a href="http://www.bashundharagroup.com/" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">PRAN</h5>
            <p class="card-text">The journey of PRAN started from 1981 and its evolution to one of the top food manufacturing companies that have set the grounds for development for any potentialities.</p>
            <a href="https://www.pranfoods.net/" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>
	</div>

<!--footer -->
<footer class="container-fluid text-center text-white bg-dark">
    <p>All Right reserved By Eastern University</p>
  </footer>





<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>