<?php
require('connection.php');
session_start();

if (isset($_POST['report1'])) {
    $location = $_POST['location'];
    $date = $_POST['date'];
    
    $query = "SELECT AppointmentID, CustomerID, VIN, LocID, Date, Status
              FROM Appointment
              WHERE Date='$date' AND LocID='$location' AND Status='Pending'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Pending Service Appointments for $date at Location $location:</h3>";
        echo "<table><tr><th>Appointment ID</th><th>Customer ID</th><th>VIN</th><th>Date</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['AppointmentID']."</td><td>".$row['CustomerID']."</td><td>".$row['VIN']."</td><td>".$row['Date']."</td><td>".$row['Status']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No pending service appointments found for $date at Location $location.</h3>";
    }
}
?>

<h2>Report 1: Pending Service Appointments</h2>
<form method="POST" action="">
    <label for="location">Location:</label>
    <select name="location" id="location">
        <?php
        $query = "SELECT LocID, Address FROM location";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=".$row['LocID'].">".$row['Address']."</option>";
        }
        ?>
    </select>
    <label for="date">Date:</label>
    <input type="date" name="date" id="date">
    <input type="submit" name="submit" value="Generate Report">
</form>
