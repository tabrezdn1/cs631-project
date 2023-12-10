<?php
require('connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $Aname = $_POST['Aname'];
    $Birth = $_POST['Birth'];
    $SType = $_POST['SType'];
    $Type = $_POST['Type'];
    $BType = $_POST['BType'];
    $EType = $_POST['EType'];

    // Validate inputs (add more validation if needed)

    // Insert data into the animal table
    $query = "INSERT INTO `animal` (`AName`, `birth_year`, `building_id`, `species_id`, `Astatus`, `enclosure_id`) 
    VALUES ('$Aname', '$Birth', '$BType', '$SType', '$Type', '$EType')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "Animal added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Animal</title>
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
        <h2 class="text-center">Add Animal</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="Aname">Animal Name:</label>
                <input type="text" class="form-control" name="Aname" required>
            </div>
            <div class="form-group">
                <label for="Birth">Birth Year:</label>
                <input type="text" class="form-control" name="Birth" required>
            </div>
            <div class="form-group">
                <label for="SType">Species:</label>
                <select class="form-control" name="SType" required>
                    <option value="">Select Species</option>
                    <!-- Add options based on your actual species values -->
                    <option value="1">Mammals</option>
                    <option value="2">Reptiles</option>
                    <option value="3">Amphibians</option>
                    <option value="4">Birds</option>
                    <option value="5">Fish</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Type">Status:</label>
                <select class="form-control" name="Type" required>
                    <option value="">Select Status</option>
                    <option value="Old">Old</option>
                    <option value="Young">Young</option>
                    <option value="Sick">Sick</option>
                    <option value="Healthy">Healthy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="BType">Building :</label>
                <select class="form-control" name="BType" required>
                    <option value="">Select Building</option>
                    <!-- Add options based on your actual building values -->
                    <option value="1">Main Zoo Building</option>
                    <option value="3">Aquarium</option>
                    <option value="2">Aviary</option>
                    <option value="4">Reptile House</option>
                </select>
            </div>
            <div class="form-group">
                <label for="EType">Enclosure :</label>
                <select class="form-control" name="EType" required>
                    <option value="">Select Enclosure</option>
                    <!-- Add options based on your actual building values -->
                    <option value="1">5000</option>
                    <option value="3">3000</option>
                    <option value="2">7000</option>
                    <option value="4">4000</option>
                    <option value="5">5500</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Animal</button>
            <button onclick="window.location.href='admin.php'">Back</button>
        </form>
    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
