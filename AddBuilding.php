<?php
require('connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $Bname = $_POST['Bname'];
    
    $Type = $_POST['Type'];
    

    // Insert data into the animal table
    $query = "INSERT INTO `buildings` (`Bname`, `type`) 
    VALUES ('$Bname', '$Type')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "Building added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Building</title>
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
        <h2 class="text-center">Add Building</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="Bname">Building Name:</label>
                <input type="text" class="form-control" name="Bname" required>
            </div>
            
            
            <div class="form-group">
                <label for="Type">Type:</label>
                <select class="form-control" name="Type" required>
                    <option value="">Select Status</option>
                    <option value="Exhibit">Exhibit</option>
                    <option value="Aquatic">Aquatic</option>
                    <option value="Aviary">Aviary</option>
                    <option value="Interactive">Interactive</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Building</button>
            <button onclick="window.location.href='admin.php'">Back</button>
        </form>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
