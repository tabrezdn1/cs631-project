<?php
  require('connection.php');
  session_start();

  // Get vehicles of the logged-in user
  $sql = "SELECT * FROM `vehicle` WHERE `CustomerID` = '$_SESSION[CID]'";
  $result = mysqli_query($conn, $sql);

  if(isset($_POST['update'])) {
    $Aname = mysqli_real_escape_string($conn, $_POST['vin']);
    $mnf = mysqli_real_escape_string($conn, $_POST['mnf']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $Stype = mysqli_real_escape_string($conn, $_POST['Stype']);
    $Btype = mysqli_real_escape_string($conn, $_POST['Btype']);

    // Update vehicle in the database
    $sql = "INSERT into `animal` VALUES `Aname`='$vin',`birth_year`='$mnf',`building_id`='$Btype',`species_id`='$Stype',`Type`='$type'";
    $result = mysqli_query($conn, $sql);

    if($result) {
      // Success message
      $_SESSION['success'] = "Vehicle details updated successfully";
    } else {
      // Error message
      $_SESSION['error'] = "Error updating vehicle details: " . mysqli_error($conn);
    }

    // Redirect back to the same page
    header("location: MyVehicle.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Vehicles</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h2 class="my-4">My Vehicles</h2>
    <table class="table">
      <thead>
        <tr>
          <th>VIN</th>
          <th>Manufacturer</th>
          <th>Model</th>
          <th>Year</th>
          <th>Color</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Display all vehicles of the logged-in user in a table
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['VIN']."</td>";
            echo "<td>".$row['Manufacturer']."</td>";
            echo "<td>".$row['Model']."</td>";
            echo "<td>".$row['Year']."</td>";
            echo "<td>".$row['Color']."</td>";
            echo "<td>".$row['Type']."</td>";
            echo "<td>
<form action='' method='post'>
<input type='hidden' name='vin' value='".$row['VIN']."'>
<button type='submit' name='edit' class='btn btn-sm btn-outline-primary'>Edit</button>
<button type='submit' name='delete' class='btn btn-sm btn-outline-danger ml-2'>Delete</button>
</form>
</td>";
echo "</tr>";
}
?>
</tbody>
</table>
<a href="addVehicle.php" class="btn btn-primary mb-4">Add Vehicle</a>
<a href="index.php" class="btn btn-primary mb-4">Go back</a>
<?php
// Display success message if set
if(isset($_SESSION['success'])) {
echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
unset($_SESSION['success']);
}
  // Display error message if set
  if(isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
  }

  // Handle edit request
  if(isset($_POST['edit'])) {
    $vin = mysqli_real_escape_string($conn, $_POST['vin']);

    // Get vehicle details from the database
    $sql = "SELECT * FROM `vehicle` WHERE `VIN`='$vin'";
    $result = mysqli_query($conn, $sql);
    $vehicle = mysqli_fetch_assoc($result);
?>
<form action='' method='post'>
  <h2 class='my-4'>Edit Vehicle</h2>
  <div class='form-group'>
    <label for='vin'>VIN</label>
    <input type='text' class='form-control' name='vin' value='<?php echo $vehicle['VIN']; ?>' readonly>
  </div>
  <div class='form-group'>
    <label for='mnf'>Manufacturer</label>
    <input type='text' class='form-control' name='mnf' value='<?php echo $vehicle['Manufacturer']; ?>' required>
  </div>
  <div class='form-group'>
    <label for='color'>Color</label>
    <input type='text' class='form-control' name='color' value='<?php echo $vehicle['Color']; ?>' required>
  </div>
  <div class='form-group'>
    <label for='model'>Model</label>
    <input type='text' class='form-control' name='model' value='<?php echo $vehicle['Model']; ?>' required>
  </div>
  <div class='form-group'>
    <label for='year'>Year</label>
    <input type='text' class='form-control' name='year' value='<?php echo $vehicle['Year']; ?>' required>
  </div>
  <div class='form-group'>
    <label for='type'>Type</label>
    <input type='text' class='form-control' name='type' value='<?php echo $vehicle['Type']; ?>' required>
  </div>
  <button type='submit' name='update' class='btn btn-primary'>Update</button>
  <a href='MyVehicle.php' class='btn btn-secondary'>Cancel</a>
</form>
<?php
// Display success message if set
if(isset($_SESSION['success'])) {
echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
unset($_SESSION['success']);
}
  // Display error message if set
  if(isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
  }
  ?>
<?php
  }
?>
</div>
</body>
</html>
