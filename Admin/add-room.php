<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Add Room</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $roomNumber=$_POST['roomNumber'];
            $price=$_POST['price'];

                $sql2="INSERT INTO `rooms`(`roomNo`, `price`) VALUES ('$roomNumber','$price')";
                $result2=mysqli_query($conn,$sql2);

            for ($i=1; $i <= 3; $i++) { 
                $sql2="INSERT INTO `roomsallocation`(`roomNo`, `bedNo`, `allocationStatus`) VALUES ('$roomNumber','$i','Empty')";
                $result2=mysqli_query($conn,$sql2);
            }
        }
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>