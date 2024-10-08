<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
</head>

<body>
    <?php
        session_start();
        if (isset($_SESSION['studentid'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newpass = $_POST['newPassword'];
                $confirmpass = $_POST['confirmPassword'];
                $currentpass = $_POST['currentPassword'];

                // Establish a connection to the database
                $conn = mysqli_connect("localhost", "root", "", "hostel");

                // Get the student ID from session
                $sid = $_SESSION['studentid'];

                // Fetch the hashed password from the database
                $sql = "SELECT password FROM students WHERE id='$sid'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($result);
                $dbpass = $row[0];

                // Verify the current password with the hashed password
                if (password_verify($currentpass, $dbpass)) {
                    // Check if new password matches confirm password
                    if ($newpass == $confirmpass) {
                        // Encrypt the new password
                        $hashed_newpass = password_hash($newpass, PASSWORD_DEFAULT);

                        // Update the password in the database
                        $sql1 = "UPDATE `students` SET `password`='$hashed_newpass' WHERE id='$sid'";
                        $result = mysqli_query($conn, $sql1);

                        if ($result) {
                            echo "<script>alert('Password updated successfully');</script>";
                            echo "<script>window.location.href ='Student.php'</script>";
                        } else {
                            echo "<script>alert('Error updating password. Please try again.');</script>";
                        }
                    } else {
                        echo "<script>alert('New Password and Confirm Password do not match.');</script>";
                        echo "<script>window.location.href ='Student.php'</script>";
                    }
                } else {
                    echo "<script>alert('Current password does not match the database record.');</script>";
                    echo "<script>window.location.href ='Student.php'</script>";
                }
            } else {
                echo "<script>window.location.href ='http://localhost/hostel/student/Student.php'</script>";
            }
        } else {
            echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
        }
    ?>
</body>
</html>
