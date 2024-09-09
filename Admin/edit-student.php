<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Edit Student</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $id=$_POST['studentId'];
            $name=$_POST['studentName'];
            $dob=$_POST['studentBirthDate'];
            $studentMobile=$_POST['studentMobile'];
            $studentEmail=$_POST['studentEmail'];
            $studentParentsNo=$_POST['studentParentsNo'];
            $studentFatherName=$_POST['studentFatherName'];
            $studentMotherName=$_POST['studentMotherName'];
            $address=$_POST['studentAddress'];
            $studentCollege=$_POST['studentCollege'];
            $studentDepartment=$_POST['studentDepartment'];
            $sem=$_POST['sem'];

            $sql1="UPDATE `students` SET `name`='$name', `dob`='$dob', `mobileNo`='$studentMobile', `email`='$studentEmail', `parentsNo`='$studentParentsNo', `fathersName`='$studentFatherName', `mothersName`='$studentMotherName', `address`='$address', `collegeName`='$studentCollege', `department`='$studentDepartment', `Sem`='$sem' WHERE `id`='$id'";
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