<?php
include 'connection.php';


  // Default to today's date if no date is selected
  $sql = "SELECT * FROM hourly_rate";
  $result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>
<head>
  <title>View Hourly Rates</title>
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

  <h1>View Hourly Rates</h1>

  

  <?php
  // Display table of appointments
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Hourly Rate ID</th><th>Rate</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      $hourly_rate_id = $row['hourly_rate_id'];
      $rate = $row['rate'];
     
      

      // // Get invoice details for the appointment
      // $sql2 = "SELECT Service_Type, Vehicle_Type, Price FROM invoice_detail WHERE AppointmentID = '$appointmentID'";
      // $result2 = mysqli_query($conn, $sql2);

      // $services = array();
      // // Store service details in array
      // if (mysqli_num_rows($result2) > 0) {
      //   while($row2 = mysqli_fetch_assoc($result2)) {
      //     $serviceType = $row2['Service_Type'];
      //     $vehicleType = $row2['Vehicle_Type'];
      //     $price = $row2['Price'];
      //     $services[] = "$serviceType ($vehicleType) - $price";
      //   }
      // }

      // Display appointment details and associated invoice details
      if (!empty($enclosure_id)) {
       
        echo "<tr><td>$hourly_rate_id</td><td>$rate</td></tr>";
      } else {
        // Display appointment details without invoice details
        echo "<tr><td>$hourly_rate_id</td><td>$rate</td></tr>";
      }
    }
    echo "</table>";
  } else {
    // No appointments found for selected date
    echo "No items found ";
  }
  ?>

  <a href="admin.php"><button>Back</button></a>
  
</body>
</html>
