<?php
include 'connection.php';

// Get all appointments for the selected date
if (isset($_POST['date'])) {
  $date = $_POST['date'];
  $sql = "SELECT * FROM appointment WHERE Date = '$date'";
  $result = mysqli_query($conn, $sql);
} else {
  // Default to today's date if no date is selected
  $sql = "SELECT * FROM appointment";
  $result = mysqli_query($conn, $sql);
  $date = "all dates";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>View Appointments</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <h1>View Appointments</h1>

  <form method="post">
    <label for="date">Select Date:</label>
    <input type="date" name="date" value="<?php echo $date; ?>">
    <input type="submit" value="View Appointments">
  </form>

  <?php
  // Display table of appointments
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Appointment ID</th><th>Customer ID</th><th>VIN</th><th>Location ID</th><th>Date</th><th>Status</th><th>Services</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      $appointmentID = $row['AppointmentID'];
      $customerID = $row['CustomerID'];
      $VIN = $row['VIN'];
      $locID = $row['LocID'];
      $date = $row['Date'];
      $status = $row['Status'];

      // Get invoice details for the appointment
      $sql2 = "SELECT Service_Type, Vehicle_Type, Price FROM invoice_detail WHERE AppointmentID = '$appointmentID'";
      $result2 = mysqli_query($conn, $sql2);

      $services = array();
      // Store service details in array
      if (mysqli_num_rows($result2) > 0) {
        while($row2 = mysqli_fetch_assoc($result2)) {
          $serviceType = $row2['Service_Type'];
          $vehicleType = $row2['Vehicle_Type'];
          $price = $row2['Price'];
          $services[] = "$serviceType ($vehicleType) - $price";
        }
      }

      // Display appointment details and associated invoice details
      if (!empty($services)) {
        $services_str = implode(", ", $services);
        echo "<tr><td>$appointmentID</td><td>$customerID</td><td>$VIN</td><td>$locID</td><td>$date</td><td>$status</td><td>$services_str</td></tr>";
      } else {
        // Display appointment details without invoice details
        echo "<tr><td>$appointmentID</td><td>$customerID</td><td>$VIN</td><td>$locID</td><td>$date</td><td>$status</td><td>No invoice details found</td></tr>";
      }
    }
    echo "</table>";
  } else {
    // No appointments found for selected date
    echo "No appointments found for $date";
  }
  ?>

  <a href="admin.php"><button>Back</button></a>
  
</body>
</html>
