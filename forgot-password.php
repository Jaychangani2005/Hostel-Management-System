<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Password Reset</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <div class="box-wrapper"> <!-- Unique wrapper name -->
        <form id="auth-form" method="post" name="authForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h2>Student Reset Password</h2>
            <input type="text" placeholder="ID" required name="sid">
            <input type="date" placeholder="DOB" name="sdob" required>
            <input type="email" placeholder="Email" name="semail" required>
            <button name="authSubmit" type="submit">Reset Password</button>
        </form>
    </div>

    <?php
    // Include PHPMailer classes
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php'; // Make sure this path is correct

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the user input from the form
        $user = $_POST['sid'];
        $dob = $_POST['sdob'];
        $email = $_POST['semail'];

        // Sanitize input to prevent SQL injection
        $user = mysqli_real_escape_string($conn, $user);
        $dob = mysqli_real_escape_string($conn, $dob);
        $email = mysqli_real_escape_string($conn, $email);

        // Check if user exists
        $sql = "SELECT id, dob, email FROM students WHERE id='$user' AND dob='$dob' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            // Function to generate a random password
            function generateRandomPassword($length = 12) {
                return substr(bin2hex(random_bytes($length)), 0, $length);
            }

            // Function to reset the user password and send the email
            function resetUserPassword($email, $user) {
                global $conn;

                // Generate a new random password
                $new_password = generateRandomPassword();
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update password in the database
                $sql = "UPDATE students SET password = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $hashed_password, $user);
                $stmt->execute();

                // Set up PHPMailer
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com';                // Specify main SMTP server
                    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
                    $mail->Username   = 'hostelatib@gmail.com';          // Your Gmail email address
                    $mail->Password   = 'kwpc qhay eydk bqse';             // Your generated App Password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
                    $mail->Port       = 587;                              // TCP port to connect to

                    // Recipients
                    $mail->setFrom('hostelatib@gmail.com', 'Darshan Hostel');  // Sender's email and name
                    $mail->addAddress($email);                             // Add recipient email

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = "Your New Password";
                    $mail->Body    = "
                        <html>
                        <head>
                        <title>New Password</title>
                        </head>
                        <body>
                        <p>Your new password is: <strong>$new_password</strong></p>
                        <p>You can change it once you login</p>
                        </body>
                        </html>
                    ";

                    // Send the email
                    $mail->send();
                    echo "<script>alert('Password reset successful. Check your email for the new password.');</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

            // Call the function to reset the password and send the email
            resetUserPassword($email, $user);

        } else {
            echo "<script>alert('Invalid Student credentials');</script>";
        }
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
