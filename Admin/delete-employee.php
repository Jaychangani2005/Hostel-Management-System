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
            $deleteEmployeeId=$_POST['deleteEmployeeId'];
            $sql1="DELETE FROM `employees` WHERE `id`=$deleteEmployeeId";
            $result1=mysqli_query($conn,$sql1);
        }
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>