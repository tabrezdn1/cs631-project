<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Turtleback Zoo - Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="./index.php">Turtleback Zoo</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Animal</div>
					<div class="card-body">
					<div class="d-flex justify-content-between">
					<a href="view-animal.php"><button type="button" class="btn btn-primary">View</button></a>
					<a href="AddAnimal.php"><button type="button" class="btn btn-primary">Add</button></a>
					<a href="animal-update.php"><button type="button" class="btn btn-primary">Update</button></a>
					
				</div>

					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Building</div>
					<div class="card-body">
					<div class="d-flex justify-content-between">
					<a href="view-building.php"><button type="button" class="btn btn-primary">View</button></a>
					<a href="AddBuilding.php"><button type="button" class="btn btn-primary">Add</button></a>
					<a href="building-update.php"><button type="button" class="btn btn-primary">Update</button></a>
					
				</div>

					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Employee</div>
					<div class="card-body">
					<div class="d-flex justify-content-between">
					<a href="view-employee.php"><button type="button" class="btn btn-primary">View</button></a>
					<a href="AddEmployee.php"><button type="button" class="btn btn-primary">Add</button></a>
					<a href="employee-update.php"><button type="button" class="btn btn-primary">Update</button></a>
					
				</div>

					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Hourly Rates</div>
					<div class="card-body">
					<div class="d-flex justify-content-between">
					<a href="view-hourlyrates.php"><button type="button" class="btn btn-primary">View</button></a>
					<a href="AddHourlyRates.php"><button type="button" class="btn btn-primary">Add</button></a>
					<a href="hourlyrates-update.php"><button type="button" class="btn btn-primary">Update</button></a>
					
				</div>

					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Attractions</div>
					<div class="card-body">
					<div class="d-flex justify-content-between">
					<a href="view-attractions.php"><button type="button" class="btn btn-primary">View</button></a>
					<a href="AddAttractions.php"><button type="button" class="btn btn-primary">Add</button></a>
					<a href="attractions-update.php"><button type="button" class="btn btn-primary">Update</button></a>
					
				</div>

					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">Reports and Statistics</div>
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<a href="Report1.php"><button type="button" class="btn btn-primary" name="report1">Revenue by source</button></a>
							<a href="Report2.php"><button type="button" class="btn btn-primary" name="report2">Animal by species</button></a>
							<a href="Report3.php"><button type="button" class="btn btn-primary" name="report3">Top 3 Attractions</button></a>
							<a href="Report4.php"><button type="button" class="btn btn-primary" name="report4">5 Highest Revenue Days in Month</button></a>
							<a href="Report5.php"><button type="button" class="btn btn-primary" name="report5">Average Revenue</button></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
	</HTML>
