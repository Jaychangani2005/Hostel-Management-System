<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Add Announcement</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $Title=$_POST['title'];
            $Description=$_POST['description'];


            $sql1="INSERT INTO `announcements`(`title`, `description`) VALUES ('$Title','$Description')";
            $result1=mysqli_query($conn,$sql1);
        }
        echo "<script>alert('Announcement Added');</script>";
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>