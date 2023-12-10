<?php
require('connection.php'); 

$query1= "SELECT * FROM  `species`  "; 
    $result = mysqli_query($conn, $query1);
  
    $speciesOptions = "";
    while ($row = $result->fetch_assoc()) {
        $speciesOptions .= "<option value='" . $row['species_id'] . "'>" . $row['name'] . "</option>";
    }

    $query2= "SELECT * FROM  `buildings`  "; 
    $result = mysqli_query($conn, $query2);
  
    $buildingOptions = "";
    while ($row = $result->fetch_assoc()) {
        $buildingOptions .= "<option value='" . $row['building_id'] . "'>" . $row['Bname'] . "</option>";
    }

    $query3= "SELECT * FROM  `enclosures`  "; 
    $result = mysqli_query($conn, $query3);
  
    $enclosureOptions = "";
    while ($row = $result->fetch_assoc()) {
        $enclosureOptions .= "<option value='" . $row['enclosure_id'] . "'>" . $row['sqft'] . " sq. ft</option>";
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $Aname = $_POST['Aname'];
    $Birth = $_POST['Birth'];
    $SType = $_POST['SType'];
    $Type = $_POST['Type'];
    $BType = $_POST['BType'];
    $EType = $_POST['EType'];

    
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
                    <?php echo $speciesOptions; ?>
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
                    <?php echo $buildingOptions; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="EType">Enclosure :</label>
                <select class="form-control" name="EType" required>
                    <option value="">Select Enclosure</option>
                    <?php echo $enclosureOptions; ?>
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
