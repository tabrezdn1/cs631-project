<?php
include 'connection.php';

  $sql =  "SELECT * FROM employees as E, hourly_rate as H where E.hourly_rate_id = H.hourly_rate_id";
  $result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>
<head>
  <title>View Employee</title>
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

  <h1>View Employee</h1>

  

  <?php
  // Display table of appointments
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Join Date</th><th>Street</th><th>City</th><th>State</th><th>Zip</th><th>Job Type</th><th>Hourly Rate</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
     
      $emp_id = $row['emp_id'];
      $sup_id = $row['sup_id'];
      $first_name = $row['first_name'];
      $middle_name = $row['middle_name'];
      $last_name = $row['last_name'];
      $start_date = $row['start_date'];
      $street = $row['street'];
      $city = $row['city'];
      $state = $row['state'];
      $zip = $row['zip'];
      
      $job_type =$row['job_type'];
      $rate = $row['rate'];
      
       
        echo "<tr><td>$first_name</td><td>$middle_name</td><td>$last_name</td><td>$start_date</td><td>$street</td><td>$city</td><td>$state</td><td>$zip</td><td>$job_type</td><td>$rate</td></tr>";
      
      
    }
    echo "</table>";
  } else {
    echo "No appointments found for ";
  }
  ?>

<button onclick="window.location.href='admin.php'">Back</button>
  
</body>
</html>
