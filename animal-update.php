<?php
include("connection.php");

$query = "SELECT * FROM animal as A, species as S, buildings as B, enclosures as E WHERE A.species_id= S.species_id AND A.building_id=B.building_id AND A.enclosure_id=E.enclosure_id ORDER BY Aname ASC";

$result = mysqli_query($conn, $query);


$query2 = "SELECT * FROM  `species`  ";
$result1 = mysqli_query($conn, $query2);

$speciesTypesOptions = "";
while ($row = $result1->fetch_assoc()) {
	$speciesTypesOptions .= "<option value='" . $row['species_id'] . "'>" . $row['name'] . "</option>";
}
$query3 = "SELECT * FROM  `buildings`  ";
$result2 = mysqli_query($conn, $query3);

$BuildingTypesOptions = "";
while ($row = $result2->fetch_assoc()) {
	$BuildingTypesOptions .= "<option value='" . $row['building_id'] . "'>" . $row['Bname'] . "</option>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Animals Update</title>
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
	<h1>Animals Update</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Change Name</th>
				<th>Species</th>
				<th>Change Species</th>
				<th>Birth Year</th>
				<th>Change Birth Year</th>
				<th>Status</th>
				<th>Update Status</th>
				<th>Building Name</th>
				<!-- <th>Change Building </th> -->
				<th>Enclosure Size</th>
				<!-- <th>Actions</th> -->
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['AName']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="ChangeName" value="">
							<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="update_Animal_name" value="Update">
						</form>
					</td>
					<td><?php echo $row['name']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="speciesType" id="speciesType">
								<?php echo $speciesTypesOptions; ?>
									
								</select>
								<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="update_speciesType" value="Update">
							</div>
							
						</form>
					</td>
					<td><?php echo $row['birth_year']; ?></td>
					<td>
						<form method="POST">
							<input type="text" name="ChangeYear" value="">
							<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="update_Animal_year" value="Update">
						</form>
					</td>
					<td><?php echo $row['Astatus']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="statusOpt" id="status">
									<option value="Old">Old</option>
									<option value="Young">Young</option>
									<option value="Sick">Sick</option>
									<option value="Healthy">Healthy</option>
								</select>
								<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
								<input type="submit" name="update_animal" value="Update">
							</div>

						</form>
					</td>
					<td><?php echo $row['Bname']; ?></td>
					<!-- <td>
						<form method="POST">
							<div>
								<select name="buiildingType" id="buiildingType">
								<?php echo $BuildingTypesOptions; ?>
									
								</select>
								<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="update_buildingType" value="Update">
							</div>
							
						</form>
					</td> -->
					<td><?php echo $row['sqft']; ?> sq. ft</td>
					<!-- <td>
						<form method="post">
							<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="delete_animal" value="Delete">
						</form>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php
	if (isset($_POST['delete_animal'])) {
		$aid = $_POST['aid'];
		$query = "DELETE FROM animal WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		//header("Refresh:0");
	}
	if (isset($_POST['update_animal'])) {
		$aid = $_POST['aid'];
		$status = $_POST['statusOpt'];
		$query = "UPDATE animal SET Astatus ='$status' WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_speciesType'])) {
		$aid = $_POST['aid'];
		$status = $_POST['speciesType'];
		$query = "UPDATE animal SET species_id ='$status' WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_Animal_name'])) {
		$aid = $_POST['aid'];
		$status = $_POST['ChangeName'];
		$query = "UPDATE animal SET AName ='$status' WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	if (isset($_POST['update_buildingType'])) {
		$aid = $_POST['aid'];
		$status = $_POST['buiildingType'];
		$query = "UPDATE animal SET building_id ='$status' WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		//header("Refresh:5");
	}
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>