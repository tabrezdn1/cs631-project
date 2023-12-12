<?php
include("connection.php");

$query = "SELECT * FROM  hourly_rate ";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Hourly Rate Update</title>
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
	<h1>Hourly Rate Update</h1>
	<table>
		<thead>
			<tr>
				<th>Hourly Rate ID</th>
				<th>Rate</th>
				<th>Update Rate</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['hourly_rate_id']; ?></td>
					<td><?php echo $row['rate']; ?></td>
					
					<td>
						<form method="POST">
							<input type="text" name="newRate" value="">
							<input type="hidden" name="rid" value="<?php echo $row['hourly_rate_id']; ?>">
							<input type="submit" name="update_rate" value="Update">
						</form>
					</td>
					
					<!-- <td>
						<form method="post">
							<input type="hidden" name="rid" value="<?php echo $row['hourly_rate_id']; ?>">
							<input type="submit" name="delete_rate" value="Delete">
						</form>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php
	if (isset($_POST['delete_rate'])) {
		$rid = $_POST['rid'];
		$query = "DELETE FROM hourly_rate WHERE hourly_rate_id = $rid";
		mysqli_query($conn, $query);
		//header("Refresh:0");
	}
	if (isset($_POST['update_rate'])) {
		$rid = $_POST['rid'];
		$newRate = $_POST['newRate'];
		$query = "UPDATE hourly_rate SET rate ='$newRate' WHERE hourly_rate_id = $rid";
		mysqli_query($conn, $query);
		// header("Refresh:0");
	}
	?>

	<br> <br>
	<button onclick="window.location.href='admin.php'">Back</button>
</body>

</html>
