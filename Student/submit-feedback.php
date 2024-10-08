<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Feedback</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['studentid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $feedback=$_POST['feedbackText'];
            $sid=$_SESSION['studentid'];
                $sql2="INSERT INTO `feedback`(`description`,`studentId`) VALUES ('$feedback','$sid')";
                $result2=mysqli_query($conn,$sql2);
        }
        echo "<script>alert('Feedback Submitted');</script>";
        echo "<script>window.location.href ='Student.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>