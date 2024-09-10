<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Add Employee</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $firstStudentId=$_POST['firstStudentId'];
            $secondStudentId=$_POST['secondStudentId'];
            // list($roomNo, $bedNo) = explode(' ', $studentRoom);

            $sql="SELECT `roomNo`, `bedNo` FROM `roomsallocation` WHERE `studentId`=$firstStudentId";
            $result=mysqli_query($conn,$sql);
            $studentRecord1 = mysqli_fetch_row($result);
            $room1=$studentRecord1[0];
            $bed1=$studentRecord1[1];

            $sql1="SELECT `roomNo`, `bedNo` FROM `roomsallocation` WHERE `studentId`=$secondStudentId";
            $result1=mysqli_query($conn,$sql1);
            $studentRecord2 = mysqli_fetch_row($result1);
            $room2=$studentRecord2[0];
            $bed2=$studentRecord2[1];

            $sql2="UPDATE `roomsallocation` SET `studentId`='$firstStudentId' WHERE `roomNo`='$room2' and `bedNo`='$bed2'";
            $result2=mysqli_query($conn,$sql2);

            $sql3="UPDATE `roomsallocation` SET `studentId`='$secondStudentId' WHERE `roomNo`='$room1' and `bedNo`='$bed1'";
            $result3=mysqli_query($conn,$sql3);

            $sql4="UPDATE students SET `roomNo`='$room2' WHERE id='$firstStudentId'";
            $result4=mysqli_query($conn,$sql4);

            $sql5="UPDATE students SET `roomNo`='$room1' WHERE id='$secondStudentId'";
            $result5=mysqli_query($conn,$sql5);
        }
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>
