<?php
require('connection.php');
session_start();

// Get the selected vehicle and location
$vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
$location = mysqli_real_escape_string($conn, $_POST['location']);

// Get the selected services
$services = $_POST['services'];

// Get the selected date
$date = mysqli_real_escape_string($conn, $_POST['date']);

$sql = "SELECT COUNT(*) as count FROM appointment WHERE `VIN` = '$vehicle' AND `Status` = 'Scheduled' OR 'Status'='Service Started'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
  echo '<div class="container mt-5"><div class="alert alert-danger" role="alert">Error creating appointment: Vehicle is already in a service.</div></div>';
  exit;
}

// Create the appointment
$sql = "INSERT INTO `appointment` (`CustomerID`, `VIN`, `LocID`, `Date`) VALUES ('$_SESSION[CID]', '$vehicle', '$location', '$date')";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Get the appointment ID
  $appointment_id = mysqli_insert_id($conn);

  // Get the appointment status
  $sql = "SELECT `Status` FROM `appointment` WHERE `AppointmentID` = '$appointment_id'";
  $status_result = mysqli_query($conn, $sql);
  $status_row = mysqli_fetch_assoc($status_result);
  $status = $status_row['Status'];

  // Get the vehicle make and model
  $sql = "SELECT `Manufacturer`, `Model` FROM `vehicle` WHERE `VIN` = '$vehicle'";
  $vehicle_result = mysqli_query($conn, $sql);
  $vehicle_row = mysqli_fetch_assoc($vehicle_result);
  $make = $vehicle_row['Manufacturer'];
  $model = $vehicle_row['Model'];

  // Get the location address
  $sql = "SELECT `Address` FROM `location` WHERE `LocID` = '$location'";
  $location_result = mysqli_query($conn, $sql);
  $location_row = mysqli_fetch_assoc($location_result);
  $address = $location_row['Address'];

  // Insert the services in the invoice_detail table
  $invoice_id = rand(1,100000); // generate a unique invoice id
  foreach ($services as $service) {
    $service_type = mysqli_real_escape_string($conn, $service);
    $sql = "SELECT `Type` FROM `vehicle` WHERE `VIN` = '$vehicle'";
    $vehicle_result = mysqli_query($conn, $sql);
    $vehicle_row = mysqli_fetch_assoc($vehicle_result);
    $vehicle_type = $vehicle_row['Type'];
    $sql = "INSERT INTO `invoice_detail` (`AppointmentID`, `Service_Type`, `Vehicle_Type`, `Price`, `InvoiceID`) 
            VALUES ('$appointment_id', '$service_type', '$vehicle_type', 
                    (SELECT p.PartPrice+so.LabourRate
                     FROM part p, service_offered so, parts_usedin_service pus
                     WHERE so.ServiceType=pus.ServiceType and so.VehicleType=pus.VehicleType and p.PartID=pus.PartID 
                     AND pus.ServiceType = '$service_type' AND pus.VehicleType = '$vehicle_type'),
                    '$invoice_id')";
    mysqli_query($conn, $sql);
}
}

// Show the confirmation message
?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointment Confirmed</title>
  <style>
    /* Add your CSS code here */
    .container {
      max-width: 800px;
      margin: 0 auto;
    }
    .card {
      margin-top: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
    }
    .card-body {
      padding: 20px;
    }
    .alert {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4>Appointment Confirmed</h4>
      </div>
      <div class="card-body">
        <p>Thank you for choosing our services. Your appointment has been confirmed.</p>
        <ul>
          <li>Appointment ID: <?php echo $appointment_id; ?></li>
          <li>Vehicle: <?php echo "$make $model"; ?></li>
          <li>Location: <?php echo $address; ?></li>
          <li>Date: <?php echo $date; ?></li>
          <li>Status: <?php echo $status; ?></li>
          <li>Services:</li>
          <ul>
            <?php foreach ($services as $service) { ?>
              <li><?php echo $service; ?></li>
            <?php } ?>
          </ul>
        </ul>
        <p>Please note down the appointment ID for future reference. You can view your appointments on your <a href="index.php">dashboard</a>.</p>
      </div>
    </div>
  </div>
</body>
</html>
