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
            $name=$_POST['employeeName'];
            $employeeMobile=$_POST['employeeMobile'];
            $employeeEmail=$_POST['employeeEmail'];
            $employeeDesignation=$_POST['employeeDesignation'];
            $employeeSalary=$_POST['employeeSalary'];


            $sql1="INSERT INTO `employees`(`name`, `mobileNo`, `email`, `designation`, `salary`) VALUES ('$name','$employeeMobile','$employeeEmail','$employeeDesignation','$employeeSalary')";
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
