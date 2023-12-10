<?php
include 'connection.php';

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
    button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		button:hover {
			background-color: #3e8e41;
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
     
      if (!empty($enclosure_id)) {
       
        echo "<tr><td>$hourly_rate_id</td><td>$rate</td></tr>";
      } else {
        echo "<tr><td>$hourly_rate_id</td><td>$rate</td></tr>";
      }
    }
    echo "</table>";
  } else {
    echo "No items found ";
  }
  ?>

<button onclick="window.location.href='admin.php'">Back</button>
</body>
</html>
