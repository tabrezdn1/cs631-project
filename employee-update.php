<?php
include("connection.php");

$query = "SELECT * FROM employees as E, hourly_rate as H, revenue_types as R where E.hourly_rate_id = H.hourly_rate_id AND E.revenue_id=R.revenue_id ";

$result = mysqli_query($conn, $query);


	$query2= "SELECT * FROM  `revenue_types`  "; 
    $result1 = mysqli_query($conn, $query2);
  
    $revenueTypesOptions = "";
    while ($row = $result1->fetch_assoc()) {
        $revenueTypesOptions .= "<option value='" . $row['revenue_id'] . "'>" . $row['name'] . "</option>";
    }
	$query2= "SELECT * FROM  `hourly_rate`  "; 
    $result1 = mysqli_query($conn, $query2);
  
    $hourlyTypesTypesOptions = "";
    while ($row = $result1->fetch_assoc()) {
        $hourlyTypesTypesOptions .= "<option value='" . $row['hourly_rate_id'] . "'>" . $row['rate'] . "</option>";
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Employee Update</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
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
	<h1>Employee Update</h1>
	<table>
		<thead>
			<tr>
			
			<th>First Name</th>
			<th>Change First Name</th>
			<th>Middle Name</th>
			<th>Change Middle Name</th>
			<th>Last Name</th>
			<th>Change Last Name</th>
			<th>Join Date</th>
			<th>Change Join Date</th>
			<th>Street</th>
			<th>ChangeStreet</th>
			<th>City</th>
			<th>ChangeCity</th>
			<th>State</th><th>ChangeState</th>
			<th>Zip</th><th>ChangeZip</th>
			<th>Job Type</th>
			<th>Change Job Type</th>
			<th>Working Area</th>
			<th>Change Working Area</th>
			<th>Hourly Rate</th>
			<th>Change Hourly Rate</th>
			<!-- <th>Actions</th> -->
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					
					<td><?php echo $row['first_name']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newFName" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_FName" value="Update">
						</form>
					</td>
					
					<td><?php echo $row['middle_name']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newMName" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_MName" value="Update">
						</form>
					</td>
					<td><?php echo $row['last_name']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newLName" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_LName" value="Update">
						</form>
					</td>
					<td><?php echo $row['start_date']; ?></td>
					<td>
						<form method="POST">
							<input type="date" name="newDate" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_Date" value="Update">
						</form>
					</td>
					<td><?php echo $row['street']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newStreet" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_newStreet" value="Update">
						</form>
					</td>
					<td><?php echo $row['city']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newCity" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_newCity" value="Update">
						</form>
					</td>
					<td><?php echo $row['state']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newState" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_newState" value="Update">
						</form>
					</td>
					<td><?php echo $row['zip']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="newZip" value="">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_newZip" value="Update">
						</form>
					</td>
					<td><?php echo $row['job_type']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="JobType" id="JobType">
								<option value="Caretaker">Animal Care Specialist</option>
								<option value="Veterinarian">Veterinarian</option>
								<option value="Maintenance">Maintenance</option>
								
								<option value="Ticket Seller">Ticket Seller</option>
								<option value="Customer Service">Customer Service</option>
									
								</select>
								<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_employee_job_type" value="Update">
							</div>
							
						</form>
					</td>
					<td><?php echo $row['name']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="RevenueType" id="RevenueType">
								<?php echo $revenueTypesOptions; ?>
									
								</select>
								<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_RevenueType" value="Update">
							</div>
							
						</form>
					</td>
					<td><?php echo $row['rate']; ?></td>

					<td>
						<form method="POST">
							<div>
								<select name="hourlyRate" id="hourlyRate">
								<?php echo $hourlyTypesTypesOptions; ?>
									
								</select>
								<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="update_employee_hourly_rate" value="Update">
							</div>
							
						</form>
					</td>
					<!-- <td>
						<form method="post">
							<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
							<input type="submit" name="delete_employee" value="Delete">
						</form>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php
	if (isset($_POST['delete_employee'])) {
		$eid = $_POST['eid'];
		$query = "DELETE FROM employees WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:0");
	}
	if (isset($_POST['update_employee_hourly_rate'])) {
		$eid = $_POST['eid'];
		$hourlyRate = $_POST['hourlyRate'];
		$query = "UPDATE employees SET hourly_rate_id ='$hourlyRate' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_employee_job_type'])) {
		$eid = $_POST['eid'];
		$JobType = $_POST['JobType'];
		$query = "UPDATE employees SET job_type ='$JobType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_RevenueType'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['RevenueType'];
		$query = "UPDATE employees SET revenue_id ='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_FName'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newFName'];
		$query = "UPDATE employees SET  first_name='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_MName'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newMName'];
		$query = "UPDATE employees SET  middle_name='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_LName'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newLName'];
		$query = "UPDATE employees SET  last_name='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_Date'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newDate'];
		$query = "UPDATE employees SET  start_date='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_newStreet'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newStreet'];
		$query = "UPDATE employees SET  street='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_newCity'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newCity'];
		$query = "UPDATE employees SET  city='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_newState'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newState'];
		$query = "UPDATE employees SET  state='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_newZip'])) {
		$eid = $_POST['eid'];
		$RevenueType = $_POST['newZip'];
		$query = "UPDATE employees SET  zip='$RevenueType' WHERE emp_id = $eid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>
