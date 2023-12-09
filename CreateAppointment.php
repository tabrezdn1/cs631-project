<?php
  require('connection.php');
  session_start();

  // Get vehicles of the logged-in user
  $sql = "SELECT * FROM `vehicle` WHERE `CustomerID` = '$_SESSION[CID]'";
  $result = mysqli_query($conn,$sql);

  // Get locations from the location table
  $sql = "SELECT * FROM `location`";
  $location_result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid mt-5">
    <h2 class="text-center mb-4">Create Appointment</h2>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form action="BookAppointment.php" method="POST">
          <div class="form-group">
            <label for="vehicle">Select Your Vehicle:</label>
            <select class="form-control" id="vehicle" name="vehicle">
              <?php
                if($result && mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $dbvin = mysqli_real_escape_string($conn, $row['VIN']);
                    echo "<option value='$dbvin'>$dbvin</option>";
                  }
                } else {
                  echo "<option value=''>No vehicles found</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="location">Select Location:</label>
            <select class="form-control" id="location" name="location">
              <?php
                if($location_result && mysqli_num_rows($location_result) > 0) {
                  while($row = mysqli_fetch_assoc($location_result)) {
                    $location_id = mysqli_real_escape_string($conn, $row['LocID']);
                    $address = mysqli_real_escape_string($conn, $row['Address']);
                    echo "<option value='$location_id'>$address</option>";
                  }
                } else {
                  echo "<option value=''>No locations found</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="services">Select Service:</label>
            <select class="form-control" name="services[]" id="services" multiple required>
              <option value="OilChange">Oil Change</option>
              <option value="BrakeService">Brake Service</option>
              <option value="CarWash">Car Wash</option>
              <option value="BatteryChange">Battery Change</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date">Select A Date:</label>
            <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
          </div>
          <button type="submit" class="btn btn-primary">Book Appointment</button>
          <a href="index.php" class="btn btn-primary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>