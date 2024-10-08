<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Edit Rule</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $ruleId=$_POST['ruleId'];
            $ruleTitle=$_POST['ruleTitle'];
            $ruleDescription=$_POST['ruleDescription'];


            $sql1="UPDATE  `rules` SET `title`='$ruleTitle', `description`='$ruleDescription' WHERE `id`='$ruleId'";
            $result1=mysqli_query($conn,$sql1);

        }
        echo "<script>alert('Rule data edited');</script>";
        echo "<script>window.location.href ='Admin.php'</script>"; 
    }
    else{
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
  </body>
</html>