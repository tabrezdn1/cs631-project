<?php
  require('connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Vehicle</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php    
echo "<br><h2 style='text-align : center'> WELCOME TO WODDY'S AUTOMOTION -$_SESSION[username]($_SESSION[CID])</h2>";
?>
<div class="container-fluid mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow">
        <div class="card-header bg-dark text-white text-center">
          <h3>Add Vehicle</h3>
        </div>
        <div class="card-body">
        <form method="POST" action="login_register.php">
            <div class="form-group">
              <label for="VIN">VIN:</label>
              <input type="text" class="form-control" name="VIN" placeholder="Enter Vehicle Registration Number">
            </div>
            <div class="form-group">
              <label for="MFG">Manufacturer:</label>
              <input type="text" class="form-control" name="MFG" placeholder="Enter Manufacturer">
            </div>
            <div class="form-group">
              <label for="Color">Color:</label>
              <input type="text" class="form-control" name="Color" placeholder="Enter Color of Vehicle">
            </div>
            <div class="form-group">
              <label for="model">Model:</label>
              <input type="text" class="form-control" name="model" placeholder="Enter Model">
            </div>
            <div class="form-group">
              <label for="year">Year:</label>
              <input type="number" class="form-control" name="year" placeholder="Enter Year">
            </div>
            <div class="form-group">
              <label for="Type">Type:</label>
              <select class="form-control" name="Type">
                <option value="">Select Type</option>
                <option value="SUV">SUV</option>
                <option value="SEDAN">SEDAN</option>
              </select>
            </div>
            <a href="MyVehicle.php">
            <button type="submit" class="btn btn-dark btn-block" name="Add_Vehicle_Submit">Submit</button>
            </a>
            <a href="index.php" class="btn btn-secondary btn-block">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
      integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df
</body>
</html>