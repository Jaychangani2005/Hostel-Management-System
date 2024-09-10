<html>
    <body>
        <form id="login" method="post" name="login" action="<?php $_PHP_SELF ?>">
        <input type="text" class="" placeholder="Enter your username" required name="username">
        <input type="password" class="" placeholder="Enter your password" name="password" required>
        <button class="" name="login" type="submit">Login</button>
        </form>
<?php
   if(isset($_POST['username']) && isset($_POST['password']))
   {
    $user = $_POST["username"];
	$pwd = $_POST["password"];
    $conn=mysqli_connect("localhost","root","","hostel");
    if($conn)
    {
        $sql="Select id,password from admin where id='$user' and password='$pwd'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num>0)
        {
		    session_start();
		    $_SESSION['adminid']=$user;
            header("Location: admin/Admin.php");
        }
        else
        {
              echo "<script>alert('Invalid Details');</script>";
        }
    }
   }
