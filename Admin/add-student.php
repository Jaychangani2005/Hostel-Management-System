<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Add Student</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $name=$_POST['studentName'];
            $dob=$_POST['studentBirthDate'];
            $studentMobile=$_POST['studentMobile'];
            $studentEmail=$_POST['studentEmail'];
            $studentParentsNo=$_POST['studentParentsNo'];
            $studentFatherName=$_POST['studentFatherName'];
            $studentMotherName=$_POST['studentMotherName'];
            $address=$_POST['studentAddress'];
            $room=$_POST['studentRoom'];
            list($roomNo, $bedNo) = explode(' ', $room);
            $studentCollege=$_POST['studentCollege'];
            $studentDepartment=$_POST['studentDepartment'];
            $sem=$_POST['sem'];

            $month = date('m', strtotime($dob));
            $year = date('Y', strtotime($dob));
            $password = $month . $year;

            $sql1="INSERT INTO `students`(`password`, `name`, `dob`, `mobileNo`, `email`, `parentsNo`, `fathersName`, `mothersName`, `address`, `roomNo`, `collegeName`, `department`, `Sem`) VALUES ('$password','$name','$dob','$studentMobile','$studentEmail','$studentParentsNo','$studentFatherName','$studentMotherName','$address','$roomNo','$studentCollege','$studentDepartment','$sem')";
            $result1=mysqli_query($conn,$sql1);

            $sql2 = "SELECT `id` FROM `students` WHERE `dob` = '$dob' AND `name` = '$name' AND `mobileNo` = '$studentMobile'";
            $result2=mysqli_query($conn,$sql2);
            $row=mysqli_fetch_row($result2);
            $studentId=$row[0];

            $sql3="UPDATE `roomsallocation` SET `allocationStatus`='Occupied',`studentId`='$studentId' WHERE  `roomNo` = '$roomNo' AND `bedNo` = '$bedNo'";
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