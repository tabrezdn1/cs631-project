<?php
include("connection.php");

$query = "SELECT * FROM animal as A, species as S, buildings as B, enclosures as E WHERE A.species_id= S.species_id AND A.building_id=B.building_id AND A.enclosure_id=E.enclosure_id";

$result = mysqli_query($conn, $query);
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
				<th>Species</th>
				<th>Birth Year</th>
				<th>Status</th>
				<th>Update Status</th>
				<th>Building Name</th>
				<th>Enclosure Size</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['AName']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['birth_year']; ?></td>
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
					<td><?php echo $row['sqft']; ?> sq. ft</td>
					<td>
						<form method="post">
							<input type="hidden" name="aid" value="<?php echo $row['animal_id']; ?>">
							<input type="submit" name="delete_animal" value="Delete">
						</form>
					</td>
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
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>
