<?php
  require('connection.php');
  session_start();

//   $zoo_query = "SELECT * FROM `revenue_types` where type='Zoo Admission' "; 
//   $result = mysqli_query($conn, $zoo_query);

//   $zoo_options = "";
//   while ($row = $result->fetch_assoc()) {
//       $zoo_options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
//   }

  $show_query = "SELECT * FROM `revenue_types` where type='Animal Shows' "; 
  $result = mysqli_query($conn, $show_query);

  $show_options = "";
  while ($row = $result->fetch_assoc()) {
      $show_options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
  }

  $con_query = "SELECT * FROM `revenue_types` where type='Concession' "; 
  $result = mysqli_query($conn, $con_query);

  $con_options = "";
  while ($row = $result->fetch_assoc()) {
      $con_options .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Revenue by Location and Service Type</title>
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
			max-width: 800px;
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
	<h1>Average revenue for each attraction, concession, and total attendance</h1>
	<p>For a given time period (begin date and end date) compute the average
revenue for each attraction, concession, and total attendance</p>
	<div class="container">
		<form method="POST">
			<div class="form-group">
				<label for="start_date">Start Date:</label>
				<input type="date" class="form-control" name="start_date" required>
			</div>
			<div class="form-group">
				<label for="end_date">End Date:</label>
				<input type="date" class="form-control" name="end_date" required>
			</div>
			<div class="form-group">
				<label for="attraction">Select Attraction:</label>
				<select name="attraction" id="attraction">
				<option value="">Select Attraction</option>
              	<?php echo $show_options; ?>
    			</select>
			</div>	
			<div class="form-group">
				<label for="concession">Select Concession:</label>
				<select name="concession" id="concession">
				<option value="">Select Concession</option>
              	<?php echo $con_options; ?>
    			</select>
			</div>
			<div class="form-group">
			<label for="zoo">Zoo Attendance:</label>
				<select name="zoo" id="zoo">
				<option value="">No</option>
				<option value="Yes">Yes</option>
				</select>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
		</form>

		<?php
		require('connection.php');
		session_start();

		if(isset($_POST['submit'])) {
			$start_date = $_POST['start_date'];
			$end_date = $_POST['end_date'];
			$att_name= $_POST['attraction'];
			$con_name= $_POST['concession'];
			$zoo_name= $_POST['zoo'];
			if(strlen($att_name)>0){
				$name=$att_name;
			}if(strlen($con_name)>0){
				$name= $con_name;
			}if(strlen($zoo_name)>0){
				$name='Zoo Admission';
			}

			$query = "SELECT name, avg(revenue) as revenue from revenue_events where date(date_time) between '$start_date' and '$end_date' and name='$name' group by name order by revenue desc";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Name</th><th>Revenue</th><th><th>Type</th></tr></thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>'.$row['name'].'</td>';
      echo '<td>'.$row['revenue'].'</td>';  
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

