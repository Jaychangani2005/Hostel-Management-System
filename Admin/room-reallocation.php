<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Room Reallocation</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $studentId=$_POST['StudentId'];
            $studentRoom=$_POST['studentRoom'];
            list($roomNo, $bedNo) = explode(' ', $studentRoom);

            $sql1="UPDATE `roomsallocation` SET `allocationStatus`='Empty',`studentId`='' WHERE `studentId`='$studentId' ";
            $result1=mysqli_query($conn,$sql1);
            
            $sql2="UPDATE `roomsallocation` SET `allocationStatus`='Occupied',`studentId`='$studentId' WHERE  `roomNo` = '$roomNo' AND `bedNo` = '$bedNo'";
            $result2=mysqli_query($conn,$sql2);

            $sql3="UPDATE students SET `roomNo`='$roomNo' WHERE id='$studentId'";
            $result3=mysqli_query($conn,$sql3);
        }
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>
