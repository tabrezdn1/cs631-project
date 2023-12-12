<?php
include 'connection.php';

  $sql =  "SELECT * FROM buildings b join revenue_types r where b.building_id=r.building_id AND Rtype='Animal Show'";
  $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>View Attractions</title>
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

  <h1>View Attractions</h1>

  

  <?php
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Name</th><th>Building Name</th><th>Senior Price</th><th>Adult Price</th><th>Child Price</th><th>Shows per day</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
     
      $name = $row['name'];
      $building_name = $row['Bname'];
      $senior_price = $row['senior_price'];
      $adult_price = $row['adult_price'];
      $child_price = $row['child_price'];
      $shows_per_day = $row['shows_per_day'];

      echo "<tr><td>$name</td><td>$building_name</td><td>$senior_price</td><td>$adult_price</td><td>$child_price</td><td>$shows_per_day</td></tr>";

      
    }
    echo "</table>";
  } else {
    echo "No appointments found for ";
  }
  ?>

<button onclick="window.location.href='admin.php'">Back</button>
  
</body>
</html>
