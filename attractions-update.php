<?php
include("connection.php");

$query = "SELECT * FROM revenue_types as R, buildings as B where R.building_id=B.building_id AND Rtype='Animal Show'";

$result = mysqli_query($conn, $query);
$query2= "SELECT * FROM  `buildings`  "; 
    $result1 = mysqli_query($conn, $query2);
  
    $buildingTypesOptions = "";
    while ($row = $result1->fetch_assoc()) {
        $buildingTypesOptions .= "<option value='" . $row['building_id'] . "'>" . $row['Bname'] . "</option>";
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Attractions Update</title>
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
	<h1>Attraction Update</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Attraction Name</th>
				<th>Building Name</th>
				<th> Change Building Name</th>
				<th>Senior Ticket Price</th>
				<th>Change Senior Price</th>
				<th>Adult Ticket Price</th>
				<th>Change Adult Price</th>
				<th>Child Ticket Price</th>
				<th>Change Child Price</th>
				
				<th>Shows Per Day</th>
				<th>Change Shows Per Day</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td>
						<form method="POST">
							<div>
								<input type="text" name="newName" value="">
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
								<input type="submit" name="change_newName" value="Update">
							</div>
							
						</form>
					</td>
					<td><?php echo $row['Bname']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="BuildingName" id="BuildingName">
								<?php echo $buildingTypesOptions; ?>
									
								</select>
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
							<input type="submit" name="update_BuildingName" value="Update">
							</div>
							
						</form>
					</td>
					<td>$<?php echo $row['senior_price']; ?></td>
					<td>
						<form method="POST">
							<div>
								<input type="text" name="senior_price1" value="">
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
								<input type="submit" name="change_senior" value="Update">
							</div>
							
						</form>
					</td>
					<td>$<?php echo $row['adult_price']; ?></td>
					<td>
						<form method="POST">
							<div>
								<input type="text" name="adult_price1" value="">
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
								<input type="submit" name="change_adult" value="Update">
							</div>
							
						</form>
					</td>
					<td>$<?php echo $row['child_price']; ?></td>
					<td>
						<form method="POST">
							<div>
								<input type="text" name="child_price1" value="">
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
								<input type="submit" name="change_child" value="Update">
							</div>
							
						</form>
					</td>
					
					
					<td><?php echo $row['shows_per_day']; ?></td>
					<td>
						<form method="POST">
							<div>
								<input type="text" name="show_per_day1" value="">
								<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
								<input type="submit" name="change_shows" value="Update">
							</div>
							
						</form>
					</td>
					
					<!-- <td>
						<form method="post">
							<input type="hidden" name="rid" value="<?php echo $row['revenue_id']; ?>">
							<input type="submit" name="delete_revenue_id" value="Delete">
						</form>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php
	if (isset($_POST['delete_revenue_id'])) {
		$rid = $_POST['rid'];
		$query = "DELETE FROM revenue_types WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:0");
	}
	
	if (isset($_POST['change_senior'])) {
		$rid = $_POST['rid'];
		$status = $_POST['senior_price1'];
		$query = "UPDATE revenue_types SET senior_price ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['change_adult'])) {
		$rid = $_POST['rid'];
		$status = $_POST['adult_price1'];
		$query = "UPDATE revenue_types SET adult_price ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['change_child'])) {
		$rid = $_POST['rid'];
		$status = $_POST['child_price1'];
		$query = "UPDATE revenue_types SET child_price ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	
	if (isset($_POST['change_shows'])) {
		$rid = $_POST['rid'];
		$status = $_POST['show_per_day1'];
		$query = "UPDATE revenue_types SET shows_per_day ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['change_newName'])) {
		$rid = $_POST['rid'];
		$status = $_POST['newName'];
		$query = "UPDATE revenue_types SET name ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_BuildingName'])) {
		$rid = $_POST['rid'];
		$status = $_POST['BuildingName'];
		$query = "UPDATE revenue_types SET building_id ='$status' WHERE revenue_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>
