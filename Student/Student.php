<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="student.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['studentid'])) {
        $conn = mysqli_connect("localhost", "root", "", "hostel");
        $sid = $_SESSION['studentid'];
        $sql = "SELECT * FROM students WHERE id='$sid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
    ?>
        <div class="dashboard-container">
            <aside class="sidebar">
                <div class="sidebar-header">
                    <h2>Student</h2>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="Student.php" onclick="showSection('profile')">Profile</a></li>
                    <!-- <li><a href="#roomDetails" onclick="showSection('roomDetails')">Room Details</a></li> -->
                    <li><a href="#rules" onclick="showSection('rules')">Rules</a></li>
                    <li><a href="#announcements" onclick="showSection('announcements')">Announcements</a></li>
                    <li><a href="#feedback" onclick="showSection('feedback')">Submit Feedback</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            <main class="main-content">
                <header class="header">
                    <h1>Student Dashboard</h1>
                </header>
                <section id="profile" class="content-section">
                    <h2>Profile</h2>
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo $row[2] ?></p>
                        <p><strong>Birth Date:</strong><?php echo $row[3] ?></p>
                        <p><strong>Mobile No:</strong><?php echo $row[4] ?></p>
                        <p><strong>Email:</strong><?php echo $row[5] ?></p>
                        <p><strong>Parents' Mobile No:</strong><?php echo $row[6] ?></p>
                        <p><strong>Father's Name:</strong><?php echo $row[7] ?></p>
                        <p><strong>Mother's Name:</strong><?php echo $row[8] ?></p>
                        <p><strong>Address:</strong><?php echo $row[9] ?></p>
                        <p><strong>Room No:</strong><?php echo $row[10] ?></p>
                        <p><strong>College Name:</strong> <?php echo $row[11] ?></p>
                        <p><strong>Department:</strong><?php echo $row[12] ?></p>
                        <!-- <button onclick="editProfile()">Edit Profile</button> -->
                        <a href="#changePassword" onclick="showSection('changePassword')"><button>Change Password</button></a>
                    </div>
                </section>

                <section id="roomDetails" class="content-section" style="display:none;">
                    <h2>Room Details</h2>
                    <p>Room Number: 101</p>
                    <p>Capacity: 4</p>
                    <p>Room Type: Super Deluxe</p>
                    <!-- Add more room details content -->
                </section>

                <section id="rules" class="content-section" style="display:none;">
                    <?php
                    $sql3 = "SELECT * FROM rules";
                    $result3 = mysqli_query($conn, $sql3);
                    $num1 = mysqli_num_rows($result3);

                    if ($num1 == 0) {
                        echo "<p>No rules at the moment.</p>";
                    } else {
                    ?>
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Rules</h2>
                        <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #f2f2f2;">
                                <tr>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Rule No</th>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Rule Title</th>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Rule Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row3 = mysqli_fetch_row($result3)) {
                                    $i++;
                                    echo "<tr style='border: 1px solid #ddd;'>";
                                    echo "<td style='padding: 10px;'>" . $i . "</td>";
                                    echo "<td style='padding: 10px;'>" . $row3[1] . "</td>";
                                    echo "<td style='padding: 10px;'>" . $row3[2] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </section>

                <section id="announcements" class="content-section" style="display:none;">
                    <?php
                    $sql2 = "SELECT * FROM announcements ORDER BY id DESC";
                    $result2 = mysqli_query($conn, $sql2);
                    $num = mysqli_num_rows($result2);

                    if ($num == 0) {
                        echo "<p>No announcements at the moment.</p>";
                    } else {
                    ?>
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Announcements</h2>
                        <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #f2f2f2;">
                                <tr>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Sr No</th>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Announcement Title</th>
                                    <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Announcement Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Using correct query and fetching announcements
                                $i = 0;
                                while ($row2 = mysqli_fetch_row($result2)) { // Fetch each row as an associative array
                                    $i++;
                                    echo "<tr style='border: 1px solid #ddd;'>";
                                    echo "<td style='padding: 10px;'>" . $i . "</td>";
                                    echo "<td style='padding: 10px;'>" . $row2[1] . "</td>"; // Column name for title
                                    echo "<td style='padding: 10px;'>" . $row2[2] . "</td>"; // Column name for description
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </section>

                <section id="feedback" class="content-section" style="display:none;">
                    <h2>Submit Feedback</h2>
                    <form method="post" action="submit-feedback.php">
                        <label for="feedbackText">Your Feedback:</label>
                        <textarea id="feedbackText" name="feedbackText" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </section>
                <section id="changePassword" class="content-section" style="display:none;">
                    <div id="changePasswordForm" class="form-container">
                        <form method="post" action="change-password.php">
                            <h3>Change Password</h3>
                            <label for="currentPassword">Current Password:</label>
                            <input type="password" id="currentPassword" name="currentPassword" required>

                            <label for="newPassword">New Password:</label>
                            <input type="password" id="newPassword" name="newPassword" minlength="8" maxlength="16" required>

                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" minlength="8" maxlength="16" required>
                            <button type="submit"><span>Submit</span></button>
                        </form>
                    </div>
                </section>
                <section id="logout" class="content-section" style="display:none;">
                    <h2>Logout</h2>
                    <p>You have been logged out.</p>
                </section>
            </main>
        </div>
        <script src="Student.js"></script>
    <?php
    } else {
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    }
    ?>
</body>

</html>