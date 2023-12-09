<?php
require('Connection.php');

session_start();

// Retrieve customer's appointment history from the database
$customerID = $_SESSION['CID'];
$sql = "SELECT DISTINCT Appointment.AppointmentID, VIN, Address, Date, Status,Invoice.InvoiceID, Invoice.TotalAmount FROM Location, Appointment, invoice_detail, invoice WHERE Location.LocID=appointment.LocID AND invoice.InvoiceID = invoice_detail.InvoiceID AND invoice_detail.AppointmentID=Appointment.AppointmentID AND CustomerID = '$customerID'";
$result = mysqli_query($conn, $sql);

// Display appointment history table
echo "<h1>My Appointment History</h1>";
echo "<table>";
echo "<tr><th>Appointment ID</th><th>Vehicle VIN</th><th>Location</th><th>Date</th><th>InvoiceID</th><th>Price</th><th>Status</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>".$row['AppointmentID']."</td><td>".$row['VIN']."</td><td>".$row['Address']."</td><td>".$row['Date']."</td><td>".$row['InvoiceID']."</td><td>".$row['TotalAmount']."</td><td>".$row['Status']."</td></tr>";
}
echo "</table>";


// Allow user to search for appointments based on different criteria
echo "<h2>Search Appointments</h2>";
echo "<form method='get'>";
echo "<label>Search by Vehicle VIN:</label>";
echo "<input type='text' name='vin'>";
echo "<br>";
echo "<label>Search by Service Type:</label>";
echo "<input type='text' name='serviceType'>";
echo "<br>";
echo "<label>Search by Appointment Status:</label>";
echo "<input type='text' name='AppointmentStatus'>";
echo "<br>";
echo "<label>Search by Date:</label>";
echo "<input type='date' name='date'>";
echo "<br>";
echo "<input type='submit' value='Search'>";
echo "</form>";

// Handle search form submission
if(isset($_GET['vin']) || isset($_GET['serviceType']) || isset($_GET['date'])) {
  $vin = $_GET['vin'];
  $serviceType = $_GET['serviceType'];
  $date = $_GET['date'];
  $appointmentstatus= $_GET['AppointmentStatus'];
  
  $sql = "SELECT Appointment.AppointmentID, VIN, Service_Type, Vehicle_Type, Address, Date, Status,Invoice.InvoiceID, Invoice.TotalAmount FROM Location, Appointment, invoice_detail, invoice WHERE Location.LocID=appointment.LocID AND invoice.InvoiceID = invoice_detail.InvoiceID AND invoice_detail.AppointmentID=Appointment.AppointmentID AND CustomerID = '$customerID'";
  if(!empty($vin)) {
    $sql .= " AND VIN = '$vin'";
  }
  if(!empty($serviceType)) {
    $sql .= " AND Appointment.AppointmentID IN (SELECT AppointmentID FROM Invoice_Detail WHERE Service_Type = '$serviceType')";
  }
  if(!empty($date)) {
    $sql .= " AND Date = '$date'";
  }
  if(!empty($appointmentstatus)) {
    $sql .= " AND Appointment.Status = '$appointmentstatus'";
  }
  
  $result = mysqli_query($conn, $sql);
  
  // Display search results table
  echo "<h2>Search Results</h2>";
  echo "<table>";
echo "<tr><th>Appointment ID</th><th>Vehicle VIN</th><th>Service Type</th><th>Vehicle Type</th><th>Location</th><th>Date</th><th>InvoiceID</th><th>Price</th><th>Status</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>".$row['AppointmentID']."</td><td>".$row['VIN']."</td><td>".$row['Service_Type']."</td><td>".$row['Vehicle_Type']."</td><td>".$row['Address']."</td><td>".$row['Date']."</td><td>".$row['InvoiceID']."</td><td>".$row['TotalAmount']."</td><td>".$row['Status']."</td></tr>";
}
echo "</table>";
}

mysqli_close($conn);
?>

<HTML>
<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin-top: 30px;
			margin-bottom: 50px;
			max-width: 500px;
			margin-left: auto;
			margin-right: auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		}
		label {
			font-weight: bold;
			display: block;
			margin-bottom: 10px;
		}
		input[type="date"] {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-bottom: 20px;
		}
		button[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}
		button[type="submit"]:hover {
			background-color: #0062cc;
		}
		table {
			margin-top: 30px;
			margin-bottom: 50px;
			max-width: 800px;
			margin-left: auto;
			margin-right: auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		}
		thead tr {
			background-color: #007bff;
			color: #fff;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		td:first-child, th:first-child {
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}
		td:last-child, th:last-child {
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}
	</style>
        <button onclick="window.location.href='index.php'">Back</button>
</HTML>
