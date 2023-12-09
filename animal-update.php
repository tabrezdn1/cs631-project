<?php
include("connection.php");
// $query = "SELECT i.InvoiceID, i.TotalAmount, i.DatePaid, i.InvoiceStatus, MIN(id.AppointmentID) AS AppointmentID
//           FROM invoice i
//           INNER JOIN invoice_detail id ON i.InvoiceID = id.InvoiceID
//           GROUP BY i.InvoiceID, i.TotalAmount, i.DatePaid, i.InvoiceStatus";
$query = "SELECT * FROM animal as A JOIN species as S WHERE A.species_id= S.species_id";
$query1 = "SELECT distinct(*) FROM animal as A JOIN species as S WHERE A.species_id= S.species_id";
$result = mysqli_query($conn, $query);
$result1 =fetch_assoc($query1);
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
				<th>Animal ID</th>
				<th>Species ID</th>
				<th>Name</th>
				<th>Birth Year</th>
				<th>Status</th>
				<th>Building ID</th>
				<th>Enclosure ID</th>
				<th>Actions </th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['animal_id']; ?></td>
					<td><?php echo $row['species_id']; ?></td>
					<!-- <td><?php echo ($row['DatePaid'] !== null) ? $row['DatePaid'] : "N/A"; ?></td> -->
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['birth_year']; ?></td>
					<td>
						<!-- <div>
							<label for="location">Location:</label>
							<select name="location" id="location" value="<?php echo $row['status']; ?>">
								<option value="Newark">Old</option>
								<option value="Harrison">Young</option>
								<option value="Kearny">Sick</option>
								<option value="Newyork">Healthy</option>
							</select>
						</div> -->
						
						<select name="dropdown" id="dropdown">
							<?php
							// Loop through options and set the selected attribute for the default value
							while ($row = mysqli_fetch_assoc($result1)) {
								$optionId = $row['id'];
								$optionName = $row['status'];
								$selected = ($selectedValue == $optionId) ? 'selected' : '';
								echo "<option value=\"$optionId\" $selected>$optionName</option>";
							}
							?>
						</select>
					</td>
					<td><?php echo $row['building_id']; ?></td>
					<td><?php echo $row['enclosure_id']; ?></td>
					<td>

						<form method="post" action="">
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
		$query = "DELETE FROM animal  WHERE animal_id = $aid";
		mysqli_query($conn, $query);
		header("Refresh:0");
	}
	?>
	<br> <br> <button onclick="window.location.href='admin.php'">Back</button>


</body>

</html>