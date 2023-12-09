<?php
include 'connection.php';

// Fetch all services offered from the database
$sql = "SELECT * FROM service_offered";
$result = mysqli_query($conn, $sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $serviceType = $_POST["serviceType"];
  $vehicleType = $_POST["vehicleType"];
  $labourRate = $_POST["labourRate"];

  // Update the service's labour rate in the database
  $sql = "UPDATE service_offered SET LabourRate = '$labourRate' WHERE ServiceType = '$serviceType' AND VehicleType = '$vehicleType'";
  if (mysqli_query($conn, $sql)) {    
    // Redirect to this page to refresh the table with updated data
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  } else {
    $errorMsg = "Error updating service labour rate: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Service Labour Rate</title>
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

  <h1>Update Service Labour Rate</h1>

  <?php
  if (isset($errorMsg)) {
    echo "<p style='color:red'>$errorMsg</p>";
  }
  ?>

<table>
  <tr>
    <th>Service Type</th>
    <th>Vehicle Type</th>
    <th>Labour Rate</th>
    <th>Update</th>
  </tr>
  <?php
  // Display a row for each service offered with an editable labour rate field
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $serviceType = $row["ServiceType"];
      $vehicleType = $row["VehicleType"];
      $labourRate = $row["LabourRate"];
      echo "<tr>
        <td>$serviceType</td>
        <td>$vehicleType</td>
        <td>$labourRate</td>
        <td>
          <form method='post'>
            <input type='hidden' name='serviceType' value='$serviceType'>
            <input type='hidden' name='vehicleType' value='$vehicleType'>
            <input type='number' name='labourRate' value='$labourRate'>
            <input type='submit' value='Update'>
          </form>
        </td>
      </tr>";
    }
  } else {
    echo "<tr><td colspan='4'>No services found</td></tr>";
  }
  ?>
</table>

  <td><a href='admin.php'>Back</a></td>

</body>
</html>
