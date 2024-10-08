<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Edit Announcement</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $Id=$_POST['announcementId'];
            $Title=$_POST['announcementTitle'];
            $Description=$_POST['announcementDescription'];


            $sql1="UPDATE  `announcements` SET `title`='$Title', `description`='$Description' WHERE `id`='$Id'";
            $result1=mysqli_query($conn,$sql1);

        }
        echo "<script>alert('Announcement data edited');</script>";
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>