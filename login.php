<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Admin Login</title>
    <link rel="stylesheet" href="fancy_styles.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <div class="box-wrapper"> <!-- Unique wrapper name -->
        <form id="auth-form" method="post" name="authForm" action="<?php $_PHP_SELF ?>">
            <h2>Secure Admin Login</h2>
            <!-- Added type="email" for the email box -->
            <input type="email" placeholder="Enter your email" required name="uname">
            <input type="password" placeholder="Enter your secret code" name="upass" required>
            <button name="authSubmit" type="submit">Access Panel</button>
        </form>
    </div>

    <?php
       if(isset($_POST['uname']) && isset($_POST['upass'])) {
            $user = $_POST["uname"];
            $pwd = $_POST["upass"];
            $conn = mysqli_connect("localhost","root","","hostel");
            if($conn) {
                $sql = "SELECT id, password FROM admin WHERE id='$user' AND password='$pwd'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                    session_start();
                    $_SESSION['adminid'] = $user;
                    header("Location: admin/Dashboard.php"); // Custom admin path
                } else {
                    echo "<script>alert('Invalid Login Credentials');</script>";
                }
            }
       }
    ?>
</body>
</html>
