<?php

require('connection.php');
session_start();

if(isset($_POST['purchase']))
{
    $item=mysqli_real_escape_string($conn,$_POST['food-item']);
    $quantity=mysqli_real_escape_string($conn,$_POST['food-item-q']);

    $query ="INSERT INTO `revenue_types` (`name`, `type`, `building_id`, `senior_price`, `adult_price`, `child_price`, `product`, `shows_per_day`) VALUES ('$item','Concession','1', '0','0','0','food','0')";
    $result= mysqli_query($conn,$query);
    
    if($result)
    {
        echo "
        <script>
            alert('$item - $quantity Successfully Added to Cart!');
            window.location.href='index.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Cannot run query');
            window.location.href='index.php';
        </script>
        ";
    }
 }

if(isset($_POST['login']))
{
   $email_username = mysqli_real_escape_string($conn, $_POST['email_username']);
   $query="SELECT * FROM `customer` WHERE `Email`='$email_username' OR `username`='$email_username'";
   $result=mysqli_query($conn,$query);
   
   if($result)
   {
       if(mysqli_num_rows($result)==1)
       {
           $result_fetch = mysqli_fetch_assoc($result);
           $pwd = mysqli_real_escape_string($conn, $_POST['password']);
           $dbuname = mysqli_real_escape_string($conn, $result_fetch['Username']);
           $dbpwd = mysqli_real_escape_string($conn, $result_fetch['Password']);
           $dbcustomerid =  mysqli_real_escape_string($conn, $result_fetch['CustomerID']);

           if($pwd==$dbpwd)
           { 
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$dbuname;
                $_SESSION['CID']=$dbcustomerid;
                header("location: index.php");
           }
           else
           {
                echo "
                <script>
                    alert('Incorrect Password');
                    window.location.href='index.php';
                </script>
                ";
           }
       }
       else
       {
           echo "
                <script>
                    alert('Email or Username Not Registered');
                    window.location.href='index.php';
                </script>
                ";
       }
   }
   else
   {
       echo "
                <script>
                    alert('Cannot run query');
                    window.location.href='index.php';
                </script>
                ";
   }
}

if(isset($_POST['register']))
{
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);

    $user_exist_query="SELECT * FROM `customer` WHERE `Username`='$username' OR `Email`='$email'";
    $result=mysqli_query($conn,$user_exist_query);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['Username']==$username)
            {
                echo "
                <script>
                    alert('$username - Username already taken');
                    window.location.href='index.php';
                </script>
                ";
            }   
            else
            {
                echo "
                <script>
                    alert('$email - Email already taken');
                    window.location.href='index.php';
                </script>
                ";
            }
        }
        else
        {
            $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
            $address=mysqli_real_escape_string($conn,$_POST['address']);
            $phone=mysqli_real_escape_string($conn,$_POST['phone']);
            $credit=mysqli_real_escape_string($conn,$_POST['credit']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);

            $query ="INSERT INTO `customer`(`Name`, `Address`, `Phone_Number`, `Credit_Card_No`, `Email`, `Password`, `Username`) VALUES ('$fullname','$address','$phone','$credit','$email','$password','$username')";
            
            if(mysqli_query($conn,$query))
            {
                echo "
                <script>
                    alert('Registration Successful');
                    window.location.href='index.php';
                </script>
                ";
            }
            else
            {
                echo "
                <script>
                    alert('Cannot run query');
                    window.location.href='index.php';
                </script>
                ";
            }
        }
    }
    else
    {
        echo "
        <script>
            alert('Cannot run query');
            window.location.href='index.php';
        </script>
        ";
    }
}

if(isset($_POST['admin']))
{
   $emp_id = mysqli_real_escape_string($conn, $_POST['Emp_ID']);
   $query="SELECT * FROM `manager` WHERE `EmpID`='$emp_id' ";
   
   $result=mysqli_query($conn,$query);
   
   if($result)
   {
       if(mysqli_num_rows($result)==1)
       {
           //echo "<script>alert('Row found');</script>";
           $result_fetch = mysqli_fetch_assoc($result);
           $pwd = mysqli_real_escape_string($conn, $_POST['password']);
           $dbpwd = mysqli_real_escape_string($conn, $result_fetch['Password']);
           $dbemployeeid =  mysqli_real_escape_string($conn, $result_fetch['EmpID']);

           if($pwd==$dbpwd)
           {
            if ($pwd == $dbpwd) {
               
                //$_SESSION['username']=$dbuname;
                $_SESSION['EID']=$dbemployeeid;
                header("Location: Admin.php");
                exit();
            }
            
           }
           else
           {
                echo "
                <script>
                    alert('Incorrect Password');
                    window.location.href='index.php';
                </script>
                ";
           }
       }
       else
       {
           echo "
                <script>
                    alert('Wrong Employee ID');
                    window.location.href='index.php';
                </script>
                ";
       }
   }
   else
   {
       echo "
                <script>
                    alert('Cannot run query');
                    window.location.href='index.php';
                </script>
                ";
   }
}

if(isset($_POST['Add_Vehicle_Submit']))
{
    // Check if any required fields are empty
    if(empty($_POST['VIN']) || empty($_POST['MFG']) || empty($_POST['Color']) || empty($_POST['model']) || empty($_POST['year']) || empty($_POST['Type']))
    {
        echo "
        <script>
            alert('Please fill out all required fields');
            window.location.href='AddVehicle.php';
        </script>
        ";
        exit;
    }
    
    $VIN=mysqli_real_escape_string($conn,$_POST['VIN']);
    $MFG=mysqli_real_escape_string($conn,$_POST['MFG']);
    $Color=mysqli_real_escape_string($conn,$_POST['Color']);
    $Model=mysqli_real_escape_string($conn,$_POST['model']);
    $Year=mysqli_real_escape_string($conn,$_POST['year']);
    $Type=mysqli_real_escape_string($conn,$_POST['Type']);
    
    $query ="INSERT INTO `vehicle`(`VIN`, `Manufacturer`, `Color`, `Model`, `Year`, `Type`, `CustomerID`) VALUES ('$VIN','$MFG','$Color','$Model','$Year','$Type','$_SESSION[CID]')";
    if(mysqli_query($conn,$query))
    {
        echo "
        <script>
            alert('Registration Successful');
            window.location.href='AddVehicle.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Cannot run query');
            window.location.href='index.php';
        </script>
        ";
    }
}

if(isset($_POST['Edit_Customer_Submit']))
{
    
    $dbuname1 = mysqli_real_escape_string($conn, $result_fetch['Username']);
    echo ("$dbuname1");
    /*
    $query ="INSERT INTO `vehicle`(`VIN`, `Manufacturer`, `Color`, `Model`, `Year`, `Type`, `CustomerID`) VALUES ('$VIN','$MFG','$Color','$Model','$Year','$Type','$_SESSION[CID]')";
    if(mysqli_query($conn,$query))
    {
        echo "
        <script>
            alert('Registration Successful');
            window.location.href='AddVehicle.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Cannot run query');
            window.location.href='index.php';
        </script>
        ";
    }
    */
}

?>