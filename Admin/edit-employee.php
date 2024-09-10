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
            $employeeId=$_POST['employeeId'];
            $name=$_POST['employeeName'];
            $employeeMobile=$_POST['employeeMobile'];
            $employeeEmail=$_POST['employeeEmail'];
            $employeeDesignation=$_POST['employeeDesignation'];
            $employeeSalary=$_POST['employeeSalary'];


            $sql1="UPDATE  `employees` SET `name`='$name', `mobileNo`='$employeeMobile', `email`='$employeeEmail', `designation`='$employeeDesignation', `salary`='$employeeSalary' WHERE `id`='$employeeId'";
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