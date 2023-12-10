<?php
include 'connection.php';

$sql = "SELECT * FROM buildings";
  $result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>
<head>
  <title>View Buildings</title>
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

  <h1>View Buildings</h1>

  

  <?php
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Building ID</th><th>Building Name</th><th>Type</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      $building_id = $row['building_id'];
      $Bname = $row['Bname'];
      $type = $row['type'];

      if (!empty($enclosure_id)) {
       
        echo "<tr><td>$building_id</td><td>$Bname</td><td>$type</td></tr>";
      } else {
        echo "<tr><td>$building_id</td><td>$Bname</td><td>$type</td></tr>";
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
