<?php
include("connection.php");

$query = "SELECT * FROM  buildings ";

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
	<h1>Building Update</h1>
	<table>
		<thead>
			<tr>
				<th>Building ID</th>
				<th>Building Name</th>
				<th>Type</th>
				<th>Update Type</th>
				
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['building_id']; ?></td>
					<td><?php echo $row['Bname']; ?></td>
					<td><?php echo $row['type']; ?></td>
					<td>
						<form method="POST">
							<div>
								<select name="typeOpt" id="status">
									<option value="Exhibit">Exhibit</option>
									<option value="Aviary">Aviary</option>
									<option value="Aquatic">Aquatic</option>
									<option value="Interactive">Interactive</option>
								</select>
								<input type="hidden" name="bid" value="<?php echo $row['building_id']; ?>">
							<input type="submit" name="update_animal" value="Update">
							</div>
							
						</form>
					</td>
					
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
		$bid = $_POST['bid'];
		$status = $_POST['typeOpt'];
		$query = "UPDATE buildings SET type ='$status' WHERE building_id = $bid";
		mysqli_query($conn, $query);
		// header("Refresh:0");
	}
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>
