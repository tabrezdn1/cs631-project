<?php
include 'connection.php';

// Fetch all parts from the database
$sql = "SELECT * FROM part";
$result = mysqli_query($conn, $sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $partID = $_POST["partID"];
  $partPrice = $_POST["partPrice"];

  // Update the part's price in the database
  $sql = "UPDATE part SET PartPrice = '$partPrice' WHERE PartID = '$partID'";
  if (mysqli_query($conn, $sql)) {    
    // Redirect to this page to refresh the table with updated data
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  } else {
    $errorMsg = "Error updating part price: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Part Price</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <h1>Update Part Price</h1>

  <?php
  if (isset($errorMsg)) {
    echo "<p style='color:red'>$errorMsg</p>";
  }
  ?>

<table>
  <tr>
    <th>Part ID</th>
    <th>Name</th>
    <th>Part Price</th>
    <th>Update</th>
  </tr>
  <?php
  // Display a row for each part with an editable price field
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $partID = $row["PartID"];
      $name = $row["Name"];
      $partPrice = $row["PartPrice"];
      echo "<tr>
        <td>$partID</td>
        <td>$name</td>
        <td>$partPrice</td>
        <td>
          <form method='post'>
            <input type='hidden' name='partID' value='$partID'>
            <input type='number' name='partPrice' value='$partPrice'>
            <input type='submit' value='Update'>
          </form>
        </td>
      </tr>";
    }
  } else {
    echo "<tr><td colspan='4'>No parts found</td></tr>";
  }
  ?>
</table>


  <td><a href='admin.php'>Back</a></td>

</body>
</html>
