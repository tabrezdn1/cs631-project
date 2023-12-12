<?php
require('connection.php'); 
$query1= "SELECT * FROM  `hourly_rate`  "; 
    $result = mysqli_query($conn, $query1);
  
    $hourlyRateOptions = "";
    while ($row = $result->fetch_assoc()) {
        $hourlyRateOptions .= "<option value='" . $row['hourly_rate_id'] . "'>$" . $row['rate'] . "</option>";
    }

    $query2= "SELECT * FROM  `revenue_types`  "; 
    $result = mysqli_query($conn, $query2);
  
    $revenueTypesOptions = "";
    while ($row = $result->fetch_assoc()) {
        $revenueTypesOptions .= "<option value='" . $row['revenue_id'] . "'>" . $row['name'] . "</option>";
    }
    $query3= "SELECT * FROM  `employees`  where emp_id BETWEEN 1 AND 5"; 
    $result3 = mysqli_query($conn, $query3);
  
    $ManagerTypesOptions = "";
    while ($row = $result3->fetch_assoc()) {
        $ManagerTypesOptions .= "<option value='" . $row['emp_id'] . "'>" . $row['first_name'] ." " . $row['middle_name'] ." " .$row['last_name'] ."</option>";
    }
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $start_date = $_POST['start_date'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $job_type = $_POST['job_type'];
    $hourly_rate_id = $_POST['hourly_rate_id'];
    $sup_id = $_POST['sup_id'];
    $revenue_id = $_POST['revenue_id'];

    // Insert data into the animal table
    $query = "INSERT INTO `employees` (`first_name`, `middle_name`, `last_name`, `start_date`, `street`, `city`, `state`, `zip`, `job_type`, `hourly_rate_id`, `sup_id`, `revenue_id`) 
    VALUES ('$first_name', '$middle_name', '$last_name', '$start_date', '$street', '$city', '$state', '$zip', '$job_type', '$hourly_rate_id', '$sup_id', '$revenue_id')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "Employee added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    <style>
    
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Add Employee</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" class="form-control" name="middle_name" required>
            </div>
            <div class="form-group">
                <label for="first_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="start_date">Join Date:</label>
                <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" name="street" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" required>
            </div>
            <div class="form-group">
                <label for="zip">Zip:</label>
                <input type="text" class="form-control" name="zip" required>
            </div>
            <div class="form-group">
                <label for="job_type">Job Type:</label>
                <select class="form-control" name="job_type" required>
                    <option value="">Select Job Type</option>
                    <option value="Caretaker">Animal Care Specialist</option>
                    <option value="Veterinarian">Veterinarian</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Ticket Seller">Ticket Seller</option>

                </select>
            </div>
            <div class="form-group">
                <label for="hourly_rate_id">Hourly Rate:</label>
                <select class="form-control" name="hourly_rate_id" required>
                    <option value="">Select Hourly Rate</option>
                    <?php echo $hourlyRateOptions; ?>
                  
                </select>
            </div>
            <div class="form-group">
                <label for="sup_id">Supervisor:</label>
                <select class="form-control" name="sup_id" required>
                    <option value="">Select Supervisor</option>
                    <?php echo $ManagerTypesOptions; ?>
                    
                    
                    
                </select>
            </div>
            <div class="form-group">
                <label for="revenue_id">Working Area:</label>
                <select class="form-control" name="revenue_id">
                    <option value="">Select Area</option>
                    <?php echo $revenueTypesOptions; ?>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
            <button onclick="window.location.href='admin.php'">Back</button>
        </form>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
