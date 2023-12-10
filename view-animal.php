<?php
include 'connection.php';

  $sql =  "SELECT * FROM animal as A, species as S, buildings as B, enclosures as E WHERE A.species_id= S.species_id AND A.building_id=B.building_id AND A.enclosure_id=E.enclosure_id";
  $result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>
<head>
  <title>View Animals</title>
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

  <h1>View Animals</h1>

  

  <?php
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Name</th><th>Species</th><th>Birth Year </th><th>Status</th><th>Building</th><th>Enclosure </th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
     
      $species = $row['name'];
      $name = $row['AName'];
      $birth_year = $row['birth_year'];
      $status = $row['Astatus'];
      $building_id = $row['Bname'];
      $enclosure_id = $row['sqft'];

      if (!empty($enclosure_id)) {
       
        echo "<tr><td>$name</td><td>$species</td><td>$birth_year</td><td>$status</td><td>$building_id</td><td>$enclosure_id sq. ft</td></tr>";
      } else {
        echo "<tr><td>$name</td><td>$species</td><td>$birth_year</td><td>$status</td><td>$building_id</td><td>No invoice details found</td></tr>";
      }
    }
    echo "</table>";
  } else {
    echo "No appointments found for ";
  }
  ?>

<button onclick="window.location.href='admin.php'">Back</button>
  
</body>
</html>
