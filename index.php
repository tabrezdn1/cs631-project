<?php
  require('connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    .popup-container {z-index: 9999;}
    .popup-container {
      z-index: 9999;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }/*
    *{font-family: 'Merienda', cursive;}
    .h-font{font-family: 'Poppins', sans-serif;}*/
    
        
  </style>
</head>
<body>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <header>
    <h2>Turtleback Zoo</h2>
   
    <?php
    /*
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
          echo "
          <div class='user'>
            $_SESSION[username] - <a href='logout.php'> LOGOUT</a>
          </div>
          ";
      }
      */
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true) {
        echo "<div class='dropdown'>
                  <button class='btn dropdown-toggle' type='button' id='userDropdown' data-bs-toggle='dropdown' aria-expanded='false' style='color: white;'>
                      $_SESSION[username]
                  </button>
                  <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='userDropdown'>
                  <li><a class='dropdown-item' id='editProfileBtn' href='EditCustomerProfile.php' name='edit_profile'>Edit Profile</a></li>
                    <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                  </ul>
              </div>";
         }
    
    
      else
      {
          echo "
          <div class='sign-in-up'>
          <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
          <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
          <button type='button' onclick=\"popup('admin-popup')\">ADMIN LOGIN</button>
          </div>
          ";
      }
    ?>
  </header>

  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
    </div>
  </div>

   <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="text" placeholder="Address" name="address">
	    <input type="text" placeholder="Phone Number" name="phone">
		<input type="text" placeholder="Credit Card Number" name="credit">
	   <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>
  <div class="popup-container" id="admin-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>ADMIN LOGIN</span>
          <button type="reset" onclick="popup('admin-popup')">X</button>
        </h2>
        <input type="text" placeholder="Employee ID" name="Emp_ID">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="admin">LOGIN</button>
      </form>
    </div>
  </div>

  <?php
 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
 {
   echo "<br><h2 style='text-align : center'> WELCOME TO WODDY'S AUTOMOTION - $_SESSION[username]</h2>";

   echo "<div class='row'>
           <div class='col-lg-3 text-center mt-5'>
             <a href='AddVehicle.php' class='btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none'>Add Vehicle </a> 
           </div>
           <div class='col-lg-3 text-center mt-5'>
             <a href='MyVehicle.php' class='btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none'>My Vehicle </a> 
           </div>
           <div class='col-lg-3 text-center mt-5'>
             <a href='CreateAppointment.php' class='btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none'>Create Appointment </a> 
           </div>
           <div class='col-lg-3 text-center mt-5'>
             <a href='MyAppointment.php' class='btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none'>My Appointment </a> 
           </div>
         </div>";
 }
 ?>


  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

<br>
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR SERVICES</h2>
<h3 class="text-center"> We provide following Services for SUV and SEDAN Cars.</h3> <br><br>

<div class="container"> 
  <div class="row"> 
    <div class="col-lg-3 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://img.freepik.com/free-photo/professional-washer-blue-uniform-washing-luxury-car-with-water-gun-open-air-car-wash_496169-333.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">CAR WASH</h5>
          <p class="card-text">Keep your car shining and protected</p>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://toyota-servicecenters.com/assets/img/toyota/toyota_service_center_center_brakes.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">BRAKE SERVICE</h5>
          <p class="card-text">A car with a well-maintained brake can cross thousands of miles without getting replaced. Furthermore, a regular inspection ensures optimum safety and secures cars from unnecessary clashing.</p>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://assets.firestonecompleteautocare.com/content/dam/bsro-sites/fcac/blog/images/2022/01-jan/pouring-motor-oil-into-engine.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">OIL REPLACE</h5>
          <h6> $70 </h6>
          <p class="card-text">Reduce and Remove any excess dirt that can build-up in your engine from use</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://www.gcoc.ca/wp-content/uploads/2021/01/header-image-battery-test.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">BATTERY SERVICE</h5>
          <p class="card-text">Today's vehicles are loaded with technology. That's why it's more important than ever to ensure your battery operates at peak performance.</p>
        </div>
      </div>
    </div> 
  </div> 
</div>






</body>
</html>