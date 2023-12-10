<?php
require('connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    
    
    $rate = $_POST['rate'];
    
    // Insert data into the animal table
    $query = "INSERT INTO `hourly_rate` (`rate`) 
    VALUES ('$rate')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "Rate added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Hourly Rate</title>
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
        <h2 class="text-center">Add Rate</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="rate">Rate:</label>
                <input type="text" class="form-control" name="rate" required>
            </div>
            
            
           
            
            <button type="submit" class="btn btn-primary">Add Rate</button>
            <button onclick="window.location.href='admin.php'">Back</button>
        </form>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UD2eueX9xDR5Iy53P35EdjHmMk/UaIghmLZmGMfHdO7OFuX9jCg7Df"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
