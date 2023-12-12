<?php
require('connection.php'); // Include your database connection file
$query1= "SELECT * FROM  `buildings`  "; 
    $result = mysqli_query($conn, $query1);
  
    $BuildingOptions = "";
    while ($row = $result->fetch_assoc()) {
        $BuildingOptions .= "<option value='" . $row['building_id'] . "'>" . $row['Bname'] . "</option>";
    }

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $name = $_POST['name'];
    
    $bname = $_POST['bname'];
    $senior_price1 = $_POST['senior_price1'];
    $adult_price1 = $_POST['adult_price1'];
    $child_price1 = $_POST['child_price1'];
    
    $shows_per_day1 = $_POST['shows_per_day1'];
    

    // Validate inputs (add more validation if needed)

    // Insert data into the animal table
    $query = "INSERT INTO `revenue_types` (`name`, `Rtype`, `building_id`,`senior_price`, `adult_price`,  `child_price`,`product_price`, `shows_per_day`) 
    VALUES ('$name', 'Animal Show', '$bname', '$senior_price1', '$adult_price1', '$child_price1', '0.00', '$shows_per_day1')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "Attraction added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Attraction</title>
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
        <h2 class="text-center">Add Attraction</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">Attraction Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="bname">Building Name:</label>
                <select class="form-control" name="bname" required>
                    <option value="">Select Building</option>
                    <!-- Add options based on your actual species values -->
                    <?php echo $BuildingOptions; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="senior_price1">Senior Price:</label>
                <input type="text" class="form-control" name="senior_price1" >
            </div>

            <div class="form-group">
                <label for="adult_price1">Adult Price:</label>
                <input type="text" class="form-control" name="adult_price1" >
            </div>
            <div class="form-group">
                <label for="child_price1">Child Price:</label>
                <input type="text" class="form-control" name="child_price1" >
            </div>
            
            <div class="form-group">
                <label for="shows_per_day1">Shows Per Day:</label>
                <input type="text" class="form-control" name="shows_per_day1">
            </div>
            
            <button type="submit" class="btn btn-primary">Add Attraction</button>
            <button onclick="window.location.href='admin.php'">Back</button>
        </form>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
