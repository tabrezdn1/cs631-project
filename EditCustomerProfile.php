<?php
require('connection.php');
session_start();
  
if(isset($_POST['update'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $creditcard = mysqli_real_escape_string($conn, $_POST['creditcard']);

    $sql = "UPDATE `customer` SET `Name`='$fullname',`Address`='$address',`Email`='$email',`Username`='$username',`Phone_Number`='$phone', `Credit_Card_No`='$creditcard' WHERE `CustomerID`='$_SESSION[CID]'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Success message
        $_SESSION['success'] = "Customer details updated successfully";
    } else {
        // Error message
        $_SESSION['error'] = "Error updating Customer details: " . mysqli_error($conn);
    }

    // Redirect back to the same page
    header("location: EditCustomerProfile.php");
    exit();
}

$sql = "SELECT * FROM `customer` WHERE `CustomerID`='$_SESSION[CID]'";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Customer Profile</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value=<?php echo $customer['Name']; ?> required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo  $customer['Address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php echo $customer['Email']; ?> required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value=<?php echo $customer['Username']; ?> required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value=<?php echo $customer['Phone_Number']; ?> required>
            </div>
            <div class="mb-3">
                        <label for="creditcard" class="form-label">Credit Card Number</label>
            <input type="text" class="form-control" id="creditcard" name="creditcard" value=<?php echo $customer['Credit_Card_No']; ?> required>
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href='index.php' class='btn btn-secondary'>Cancel</a>
    </form>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success mt-3">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger mt-3">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

