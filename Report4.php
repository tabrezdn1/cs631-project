<!DOCTYPE html>
<html>
<head>
	<title>5 best days (in terms of total revenue)</title>
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
	<h1>5 best days (in terms of total revenue)</h1>
	<p>For a given month compute the 5 best days (in terms of total revenue)</p>
	<div class="container">
		<form method="POST">
			<div class="form-group">
				<label for="month">Month:</label>
				<input type="month" class="form-control" name="month" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
		</form>

		<?php
		require('connection.php');
		session_start();

		if(isset($_POST['submit'])) {
			$month = $_POST['month'];
			list($year, $month) = explode('-', $month);
			// $month = intval($month);

			$query="SELECT day(date_time) as day, sum(revenue) as revenue from revenue_events where month(date_time)=$month and year(date_time)=$year group by day(date_time) order by revenue desc limit 5";
			$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result) > 0) {
				echo '<table class="table table-striped">';
				echo '<thead><tr><th>Day</th><th>Revenue</th><th>Month</th></tr></thead>';
				echo '<tbody>';
				while($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['day'].'</td>';
				echo '<td>'.$row['revenue'].'</td>';  
				echo '<td>'.$month.'</td>';
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