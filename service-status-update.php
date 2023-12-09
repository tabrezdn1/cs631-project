<?php
require('connection.php');
session_start();

if(isset($_POST['update_status'])) {
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE appointment SET Status = 'Service Started' WHERE AppointmentID = '$appointment_id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $message = "Appointment status updated successfully!";
    } else {
        $error = "Error updating appointment status: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM appointment WHERE Status = 'Scheduled'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Woody's Automotive - Service Status Update</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-eSPX5ZJnk5Q+2Ssd5dcjK4lB0znRks+ai0z4C4qBmKil5ZCQ5KNm+xSjdLmLRP4YnRz+4sjn4H4ICl15XESjKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
		}
		.card {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			margin-bottom: 30px;
		}
		.card-header {
			background-color: #007bff;
			color: #fff;
			font-weight: bold;
			font-size: 24px;
			border-bottom: none;
		}
		.card-body {
			padding: 30px;
		}
		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
			font-weight: bold;
			padding: 12px 20px;
			font-size: 16px;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 10px;
			transition: all 0.3s ease;
		}
		.btn-primary:hover {
			background-color: #0062cc;
			border-color: #0062cc;
		}
		.navbar {
			background-color: #343a40;
			border-bottom: none;
		}
		.nav-link {
			color: #fff;
			font-weight: bold;
			font-size: 18px;
			margin-left: 10px;
			margin-right: 10px;
			transition: all 0.3s ease;
		}
		.nav-link:hover {
			color: #007bff;
		}
	</style>
</head>
<body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">Ongoing Appointment Status Update</div>
				<div class="card-body">
					<?php
					if(isset($message)) {
						echo '<div class="alert alert-success">' . $message . '</div>';
					} elseif(isset($error)) {
						echo '<div class="alert alert-danger">' . $error . '</div>';
					}
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Appointment ID</th>
								<th>Customer ID</th>
								<th>VIN</th>
								<th>Location ID</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
								echo '<td>' . $row['AppointmentID'] . '</td>';
								echo '<td>' . $row['CustomerID'] . '</td>';
								echo '<td>' . $row['VIN'] . '</td>';
								echo '<td>' . $row['LocID'] . '</td>';
								echo '<td>' . $row['Date'] . '</td>';
								echo '<td>' . $row['Status'] . '</td>';
								echo '<td><form method="post"><input type="hidden" name="appointment_id" value="' . $row['AppointmentID'] . '"><button type="submit" name="update_status" class="btn btn-primary">Service Started</button></form></td>';
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
                    
                    <a href="admin.php" >Go to Admin Page</a>

				</div>
			</div>
		</div>
	</div>
</div>

                        </body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-d4jRTE+tGAmR4O1bXdz4Ga0dIqKqvMlTOgZf5V+M2Q5C5F5j5a5yGFr9iJTin1od0/+BRAXzB0hxbijBZQcM5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-mKuL7W1frhNlV7S79M0q3sJ6C2+MQQD7XgkG6vR8OxKzZ1g

                        </html>