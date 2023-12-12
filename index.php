<?php
  require('connection.php');
  session_start();

  $query = "SELECT * FROM `revenue_types` where Rtype='Animal Show' or Rtype='Zoo Admission' "; 
  $result = mysqli_query($conn, $query);

  $options = "";
  while ($row = $result->fetch_assoc()) {
      $options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
  }

  $food_query = "SELECT * FROM `revenue_types` where Rtype='Concession' "; 
  $result = mysqli_query($conn, $food_query);

  $food_options = "";
  while ($row = $result->fetch_assoc()) {
      $food_options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turtleback Zoo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    .popup-container {z-index: 9999;}
    .popup-container {
      z-index: 9999;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
    
        
  </style>
</head>
<body>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <header>
    <h2>Turtleback Zoo</h2>
   
    <?php
    
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
          <button type='button' onclick=\"popup('login-popup')\">SHOP</button>
          <button type='button' onclick=\"popup('register-popup')\">BOOK TICKETS</button>
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
          <span>Food & Shopping</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <label>Food Item:</label>
    				<select name="food-item" id="food-item">
              <?php echo $food_options; ?>
    				</select>
            <div>
            <label>Quantity</label>
            <input type="number" name="food-item-q">
            </div>
        <button type="submit" class="register-btn" name="purchase">PURCHASE</button>
      </form>
    </div>
  </div>

   <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>TICKETS</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="email" placeholder="E-mail" name="email">
        <label for="ticket-type">Type:</label>
    				<select name="ticket-name" id="ticket-name">
              <?php echo $options; ?>
    				</select>
            <div>
            <label for="ticket-for">Ticket for:</label>
    				<select name="ticket-for" id="ticket-for">
        			<option value="Adult">Adult</option>
        			<option value="Child">Child</option>
       		    <option value="Senior">Senior</option>
    				</select>
            </div>
            <label>Quantity</label>
            <input type="number" name="ticket-q">
        <button type="submit" class="register-btn" name="register">BUY TICKETS</button>
      </form>
    </div>
  </div>
  <div class="popup-container" id="admin-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>ADMIN</span>
          <button type="reset" onclick="popup('admin-popup')">X</button>
        </h2>
        <input type="text" placeholder="Employee ID" name="Emp_ID">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="admin">LOGIN</button>
      </form>
    </div>
  </div>

  
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
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Turtleback Zoo Services</h2>
<h3 class="text-center"> We provide the following services.</h3> <br><br>

<div class="container"> 
  <div class="row"> 
    <div class="col-lg-4 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://images.unsplash.com/photo-1435034568314-8303dbda4b8c?q=80&w=3573&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Animal Shows</h5>
          <p class="card-text">Educational and entertaining presentations featuring diverse zoo inhabitants.</p>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://images.unsplash.com/photo-1602097944182-c43423a8056d?q=80&w=3774&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Concessions</h5>
          <p class="card-text">Culinary delights for zoo visitors, from snacks to meals.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card h-100" style="width: 18rem;">
        <img src="https://images.unsplash.com/photo-1635070636690-d887c1a77e7b?q=80&w=3571&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Zoo entry </h5>
          <p class="card-text">Entry passes for a captivating wildlife experience and conservation support.</p>
        </div>
      </div>
    </div> 
  </div> 
</div>


</body>
</html>