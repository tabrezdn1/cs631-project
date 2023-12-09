<?php
include("connection.php");
$query = "SELECT i.InvoiceID, i.TotalAmount, i.DatePaid, i.InvoiceStatus, MIN(id.AppointmentID) AS AppointmentID
          FROM invoice i
          INNER JOIN invoice_detail id ON i.InvoiceID = id.InvoiceID
          GROUP BY i.InvoiceID, i.TotalAmount, i.DatePaid, i.InvoiceStatus";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice Status Update</title>
	<style>
		table, th, td {
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
	<h1>Invoice Status Update</h1>
	<table>
		<thead>
			<tr>
				<th>Invoice ID</th>
				<th>Total Amount</th>
				<th>Date Paid</th>
				<th>Invoice Status</th>
				<th>Appointment ID</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['InvoiceID']; ?></td>
					<td><?php echo $row['TotalAmount']; ?></td>
					<td><?php echo ($row['DatePaid'] !== null) ? $row['DatePaid'] : "N/A"; ?></td>
					<td><?php echo $row['InvoiceStatus']; ?></td>
					<td><?php echo $row['AppointmentID']; ?></td>
					<td>
						<?php if ($row['InvoiceStatus'] === 'PENDING') { ?>
							<form method="post" action="">
								<input type="hidden" name="invoice_id" value="<?php echo $row['InvoiceID']; ?>">
								<input type="submit" name="update_status" value="Mark as Paid">
							</form>
						<?php } else { ?>
							Marked as Paid
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php
		if (isset($_POST['update_status'])) {
			$invoice_id = $_POST['invoice_id'];
			$query = "UPDATE invoice SET InvoiceStatus = 'PAID', DatePaid = NOW() WHERE InvoiceID = $invoice_id";
			mysqli_query($conn, $query);
			header("Refresh:0");
		}
	?>
<br> <br> <button onclick="window.location.href='admin.php'">Back</button>


</body>
</html>
