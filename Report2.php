<?php
  require('connection.php');
  session_start();

  $query = "SELECT * FROM `species` "; 
  $result = mysqli_query($conn, $query);

  $options = "";
  while ($row = $result->fetch_assoc()) {
      $options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Report of the animal population by species</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1,p {
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin-top: 30px;
			margin-bottom: 50px;
			max-width: 500px;
			margin-left: auto;
			margin-right: auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		}
		label {
			font-weight: bold;
			display: block;
			margin-bottom: 10px;
		}
		input[type="date"] {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-bottom: 20px;
		}
		button[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}
		button[type="submit"]:hover {
			background-color: #0062cc;
		}
		table {
			margin-top: 30px;
			margin-bottom: 50px;
			margin-left: auto;
			margin-right: auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		}
		thead tr {
			background-color: #007bff;
			color: #fff;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		td:first-child, th:first-child {
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}
		td:last-child, th:last-child {
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}
	</style>
</head>
<body>
	<h1>Report of the animal population by species</h1>
	<p>Produce a report of the animal population by species, including totals by
status, total monthly food cost and costs for assigned veterinarians and
animal care specialists (assume a 40 hour work week)</p>
	<div class="container">
		<form method="POST">
			<div class="form-group">
				<label for="species">Species</label>
				<select name="species" id="species">
				<option value="">Select Species</option>
              	<?php echo $options; ?>
    			</select>			
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
		</form>

		<?php
		// require('connection.php');
		// session_start();

		if(isset($_POST['submit'])) {

			$name=$_POST['species'];
            $query = "SELECT
			s.name AS species_name,
			COUNT(a.animal_id) AS total_animals,
			SUM(CASE WHEN a.Astatus = 'Young' THEN 1 ELSE 0 END) AS young_animals,
			SUM(CASE WHEN a.Astatus = 'Sick' THEN 1 ELSE 0 END) AS sick_animals,
			SUM(CASE WHEN a.Astatus = 'Healthy' THEN 1 ELSE 0 END) AS healthy_animals,
			SUM(CASE WHEN a.Astatus = 'Old' THEN 1 ELSE 0 END) AS adult_animals,
			SUM(CASE WHEN a.Astatus IS NULL THEN 1 ELSE 0 END) AS unknown_status,
			SUM(s.food_cost) AS total_monthly_food_cost,
			round(SUM(CASE WHEN e.job_type = 'Veterinarian' THEN hr.rate * 40 ELSE 0 END) / COUNT(a.animal_id),2) AS total_hourly_cost_veterinarians,
			round(SUM(CASE WHEN e.job_type = 'Animal Care Specialist' THEN hr.rate * 40 ELSE 0 END)/ COUNT(a.animal_id),2) AS total_hourly_cost_animal_care_specialists FROM
			animal a
		JOIN
			species s ON a.species_id = s.species_id
		LEFT JOIN
			cares_for c on s.species_id = c.species_id
		LEFT JOIN
			employees e ON c.emp_id = e.emp_id
		LEFT JOIN
			hourly_rate hr ON e.hourly_rate_id = hr.hourly_rate_id
		WHERE s.name='$name'
		GROUP BY
			s.name;";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0) {
			echo '<table class="table table-striped">';
			echo '<thead><tr><th>Species</th><th>Total Population</th><th>Young Status</th><th>Healthy Status</th><th>Sick Status</th><th>Old Status</th><th>Total Montly Food Cost</th><th>Total Cost of Veterinarians</th><th>Total Hourly Cost of Animal Care Specialist</th></tr></thead>';
			echo '<tbody>';
			while($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>'.$row['species_name'].'</td>';
			echo '<td>'.$row['total_animals'].'</td>';
			echo '<td>'.$row['young_animals'].'</td>';
			echo '<td>'.$row['healthy_animals'].'</td>';  
			echo '<td>'.$row['sick_animals'].'</td>';    
			echo '<td>'.$row['adult_animals'].'</td>';  
			echo '<td>'.$row['total_monthly_food_cost'].'</td>';   
			echo '<td>'.$row['total_hourly_cost_veterinarians'].'</td>'; 
			echo '<td>'.$row['total_hourly_cost_animal_care_specialists'].'</td>';     
			echo '</tr>';
			}
		echo '</tbody></table>';
		} else {
		echo '<p>No transactions found.</p>';
		}
}
?>

</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-/+iGv48YFQWso8ceAd/4/lOofjEqt/Pz3Wq3iLuSf5K5wTwZ/LY8i52W9P9uzrm"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<button class="btn btn-primary" onclick="window.location.href='admin.php'">Back</button>
</html>

