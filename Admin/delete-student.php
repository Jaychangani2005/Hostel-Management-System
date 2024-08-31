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
            $studentId=$_POST['deleteStudentId'];
            $sql1="DELETE FROM `students` WHERE `id`=$studentId";
            $result1=mysqli_query($conn,$sql1);

            $sql2="UPDATE `roomsallocation` SET `allocationStatus`='Empty',`studentId`='' WHERE `studentId`=$studentId";
            $result2=mysqli_query($conn,$sql2);

        }
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>