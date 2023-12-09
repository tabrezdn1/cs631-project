<!DOCTYPE html>
<html>
<head>
	<title>Pending Service Appointments Report</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
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
	<h1>Pending Service Appointments Report</h1>
	<div class="container">
		<form method="POST">
			<div class="form-group">
				<label for="start_date">Select Date:</label>
				<input type="date" class="form-control" name="start_date" required>
			</div>
			<div>
			<label for="location">Location:</label>
    				<select name="location" id="location">
        			<option value="Newark">Newark</option>
        			<option value="Harrison">Harrison</option>
       		     <option value="Kearny">Kearny</option>
        			<option value="Newyork">Newark</option>
    				</select>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
		</form>

		<?php
		require('connection.php');
		session_start();

		if(isset($_POST['submit'])) {
			$date = $_POST['start_date'];
			$location = $_POST['location'];

            $query = "SELECT DISTINCT AppointmentID, CustomerID, VIN, A.LocID, Date, Status FROM Appointment A,Location L WHERE Date='$date' AND L.Address='$location' AND Status='Service Started' OR Status='Scheduled'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h3 class='report-heading'>Pending Service Appointments for $date at Location $location:</h3>";
    echo "<table class='report-table'><tr><th>Appointment ID</th><th>Customer ID</th><th>VIN</th><th>Date</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['AppointmentID']."</td><td>".$row['CustomerID']."</td><td>".$row['VIN']."</td><td>".$row['Date']."</td><td>".$row['Status']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3 class='report-heading'>No pending service appointments found for $date at Location $location.</h3>";
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
<button onclick="window.location.href='admin.php'">Back</button>
</html>

