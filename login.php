<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Admin Login</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <div class="box-wrapper"> <!-- Unique wrapper name -->
        <form id="auth-form" method="post" name="authForm" action="<?php $_PHP_SELF ?>">
            <h2>Admin & Student Login</h2>
            <input type="text" placeholder="ID" required name="uname">
            <input type="password" placeholder="Password" name="upass" required>
            <button name="authSubmit" type="submit">Access Panel</button>
            <h4>&nbsp;</h4>
            <a href="forgot-password.php">Forgot Password?</a>
        </form>
    </div>

    <?php
       if(isset($_POST['uname']) && isset($_POST['upass'])) {
            $user = $_POST["uname"];
            $pwd = $_POST["upass"];
            $conn = mysqli_connect("localhost", "root", "", "hostel");

            if ($conn) {
                // Check for Admin Login (plaintext comparison)
                $sql_admin = "SELECT id, password FROM admin WHERE id='$user' AND password='$pwd'";
                $result_admin = mysqli_query($conn, $sql_admin);
                $num_admin = mysqli_num_rows($result_admin);

                // Check for Student Login (hashed password comparison)
                $sql_student = "SELECT id, password FROM students WHERE id='$user'";
                $result_student = mysqli_query($conn, $sql_student);
                $num_student = mysqli_num_rows($result_student);

                if ($num_admin > 0) {
                    // Admin login
                    session_start();
                    $_SESSION['adminid'] = $user;
                    header("Location: admin/Admin.php");
                } 
                elseif ($num_student > 0) {
                    // Student login
                    $row = mysqli_fetch_assoc($result_student);
                    $dbpass = $row['password'];

                    // Verify the student's password
                    if (password_verify($pwd, $dbpass)) {
                        session_start();
                        $_SESSION['studentid'] = $user;
                        header("Location: student/Student.php");
                    } else {
                        echo "<script>alert('Invalid Login Credentials for Student');</script>";
                    }
                } 
                else {
                    // Invalid credentials for both admin and student
                    echo "<script>alert('Invalid Login Credentials');</script>";
                }
            } else {
                echo "<script>alert('Database connection failed');</script>";
            }
       }
    ?>
</body>
</html>
