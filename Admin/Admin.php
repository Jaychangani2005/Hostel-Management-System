<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['adminid'])) {
        $conn = mysqli_connect("localhost", "root", "", "hostel");

        $sql1 = "Select * from students";
        $num1 = mysqli_num_rows(mysqli_query($conn, $sql1));

        $sql2 = "Select * from rooms";
        $num2 = mysqli_num_rows(mysqli_query($conn, $sql2));

        $sql3 = "Select * from employees";
        $num3 = mysqli_num_rows(mysqli_query($conn, $sql3));

    ?>
        <div class="dashboard-container">
            <aside class="sidebar">
                <div class="sidebar-header">
                    <h2>Admin</h2>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="Admin.php" onclick="showSection('dashboard')">Dashboard</a></li>
                    <li><a href="#students" onclick="showSection('students')">Manage Students</a></li>
                    <li><a href="#employees" onclick="showSection('employees')">Manage Employees</a></li>
                    <li><a href="#rooms" onclick="showSection('rooms')">Manage Rooms</a></li>
                    <!-- <li><a href="#bookings" onclick="showSection('bookings')">Bookings</a></li> -->
                    <li><a href="#addRule" onclick="showSection('addRule')">Manage Rules</a></li>
                    <li><a href="#addAnnouncement" onclick="showSection('addAnnouncement')">Manage Announcements</a></li>
                    <li><a href="#viewFeedbacks" onclick="showSection('viewFeedbacks')">View Feedbacks</a></li>
                    <!-- New Menu Item -->
                    <!-- <li><a href="#settings" onclick="showSection('settings')">Settings</a></li> -->
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            <main class="main-content">
                <header class="header">
                    <h1>Dashboard</h1>
                </header>
                <?php
                if (isset($_GET['editStudentid'])) {
                ?>
                    <section id="editStudent" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Edit Student Details</h2>
                        <?php
                        $sid = $_GET['editStudentid'];
                        $sql4 = "Select * from students where id='$sid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Student ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                        ?>
                            <div id="editStudentForm" class="form-container">
                                <form method="post" action="edit-student.php">
                                    <label for="studentId">Id:</label>
                                    <input type="text" id="studentId" name="studentId" value="<?php echo $row4[0]; ?>" required readonly='true'>
                                    <label for="studentName">Name:</label>
                                    <input type="text" id="studentName" name="studentName" value="<?php echo $row4[2]; ?>" required>
                                    <label for="studentBirthDate">Birth Date:</label>
                                    <input type="date" id="studentBirthDate" name="studentBirthDate" value="<?php echo $row4[3]; ?>" required>
                                    <label for="studentMobile">Mobile No:</label>
                                    <input type="tel" id="studentMobile" name="studentMobile" value="<?php echo $row4[4]; ?>" required>
                                    <label for="studentEmail">Email:</label>
                                    <input type="email" id="studentEmail" name="studentEmail" value="<?php echo $row4[5]; ?>" required>
                                    <label for="studentParentsNo">Parents' Mobile No:</label>
                                    <input type="tel" id="studentParentsNo" name="studentParentsNo" value="<?php echo $row4[6]; ?>" required>
                                    <label for="studentFatherName">Father's Name:</label>
                                    <input type="text" id="studentFatherName" name="studentFatherName" value="<?php echo $row4[7]; ?>" required>
                                    <label for="studentMotherName">Mother's Name:</label>
                                    <input type="text" id="studentMotherName" name="studentMotherName" value="<?php echo $row4[8]; ?>" required>
                                    <label for="studentAddress">Address:</label>
                                    <input type="text" id="studentAddress" name="studentAddress" value="<?php echo $row4[9]; ?>" required>
                                    <label for="studentCollege">College Name:</label>
                                    <input type="text" id="studentCollege" name="studentCollege" value="<?php echo $row4[11]; ?>" required>
                                    <label for="studentDepartment">Department:</label>
                                    <input type="text" id="studentDepartment" name="studentDepartment" value="<?php echo $row4[12]; ?>" required>

                                    <label for="studentSem">Sem:</label>
                                    <input type="text" id="studentDepartment" name="sem" value="<?php echo $row4[13]; ?>" required>

                                    <button type="submit"><span>Submit</span></button>
                                </form>
                            </div>
                        <?php
                        }

                        ?>
                    </section>
                <?php
                } elseif (isset($_GET['viewStuentid'])) {
                ?>
                    <section id="viewStuentid" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Student Details</h2>
                        <?php
                        $sid = $_GET['viewStuentid'];
                        $sql4 = "Select * from students where id='$sid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Student ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                        ?>
                            <table align="center" class="" style="width: 70%; border-collapse: collapse;">

                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Id</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[0]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Name</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[2]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>DOB</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[3]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Mobile No</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[4]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Email</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[5]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Parents No</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[6]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Father's Name</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[7]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Mother's Name</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[8]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Address</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[9]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Room No</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[10]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>College Name</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[11]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Department</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[12]; ?></td>
                                </tr>
                                <tr style='border: 1px solid #ddd;'>
                                    <td style='padding: 10px;border: 1px solid #ddd;'>Sem</td>
                                    <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[13]; ?></td>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>
                    </section>
                <?php
                } elseif (isset($_GET['deleteStuentid'])) {
                ?>
                    <section id="deleteStuentid" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Delete Student</h2>
                        <?php
                        $sid = $_GET['deleteStuentid'];
                        $sql4 = "Select * from students where id='$sid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Student ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $studentId = $_GET['deleteStuentid'];
                            $sql1 = "DELETE FROM `students` WHERE `id`=$studentId";
                            $result1 = mysqli_query($conn, $sql1);

                            $sql2 = "UPDATE `roomsallocation` SET `allocationStatus`='Empty',`studentId`='' WHERE `studentId`=$studentId";
                            $result2 = mysqli_query($conn, $sql2);
                            echo "<script>window.location.href ='Admin.php'</script>";
                        }
                        ?>
                    </section>
                <?php
                } elseif (isset($_GET['editEmployeeid'])) {
                ?>
                    <section id="editStudent" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Edit Employee Details</h2>

                        <?php
                        $eid = $_GET['editEmployeeid'];
                        $sql4 = "Select * from employees where id='$eid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Employee ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                        ?>
                            <div id="editStudentForm" class="form-container">
                                <form method="post" action="edit-employee.php">
                                    <label for="employeeId">Id:</label>
                                    <input type="text" id="employeeId" name="employeeId" value="<?php echo $row4[0]; ?>" required readonly='true'>
                                    <label for="employeeName">Name:</label>
                                    <input type="text" id="employeeName" name="employeeName" value="<?php echo $row4[1]; ?>" required>

                                    <label for="studentMobile">Mobile No:</label>
                                    <input type="tel" id="employeeMobile" name="employeeMobile" value="<?php echo $row4[2]; ?>" required>

                                    <label for="employeeEmail">Email:</label>
                                    <input type="email" id="employeeEmail" name="employeeEmail" value="<?php echo $row4[3]; ?>" required>

                                    <label for="employeeDesignation">Designation:</label>
                                    <input type="text" id="employeeDesignation" name="employeeDesignation" value="<?php echo $row4[4]; ?>" required>

                                    <label for="employeeSalary">Salary:</label>
                                    <input type="text" id="employeeSalary" name="employeeSalary" value="<?php echo $row4[5]; ?>" required>

                                    <button type="submit"><span>Submit</span></button>
                                </form>
                            </div>
                    </section>
                <?php
                        }
                    } elseif (isset($_GET['viewEmployeeid'])) {
                ?>
                <section id="viewEmployeeid" class="content-section" style="display:block;">

                    <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Employee Details</h2>
                    <?php
                        $eid = $_GET['viewEmployeeid'];
                        $sql4 = "Select * from employees where id='$eid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Employee ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                    ?>
                        <table align="center" class="" style="width: 70%; border-collapse: collapse;">
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Id</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[0]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Name</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[1]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Mobile No</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[2]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Email</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[3]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Designation</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[4]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Salary</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[5]; ?></td>
                            </tr>
                            <tr style='border: 1px solid #ddd;'>
                                <td style='padding: 10px;border: 1px solid #ddd;'>Joining Date</td>
                                <td style='padding: 10px;border: 1px solid #ddd;'><?php echo $row4[6]; ?></td>
                            </tr>
                        </table>
                    <?php
                        }
                    ?>
                </section>
            <?php
                    } elseif (isset($_GET['deleteEmployeeid'])) {
            ?>
                <section id="deleteEmployeeid" class="content-section" style="display:block;">
                    <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Delete Employee</h2>
                    <?php
                        $eid = $_GET['deleteEmployeeid'];
                        $sql4 = "Select * from employees where id='$eid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Student ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $deleteEmployeeId = $_GET['deleteEmployeeid'];
                            $sql5 = "DELETE FROM `employees` WHERE `id`=$deleteEmployeeId";
                            $result5 = mysqli_query($conn, $sql5);
                            echo "<script>window.location.href ='Admin.php'</script>";
                        }
                    } elseif (isset($_GET['searchStudent'])) {
                    ?>
                    <section id="searchStudent" class="content-section" style="display:block;">

                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Search Details</h2>
                        <?php
                        $searchS = $_GET['searchStudent'];
                        $sql4 = "SELECT * FROM students WHERE `id` = '$searchS' OR `name` LIKE '%$searchS%'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Student Details Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                        ?>
                            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                                <thead style="background-color: #f2f2f2;">
                                    <tr>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">S. No</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Room No</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Mobile No</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row4 = mysqli_fetch_row($result4)) {
                                        echo "<tr style='border: 1px solid #ddd;'>";
                                        echo "<td style='padding: 10px;'>$i</td>";
                                        echo "<td style='padding: 10px;'>$row4[0]</td>";
                                        echo "<td style='padding: 10px;'>$row4[2]</td>";
                                        echo "<td style='padding: 10px;'>$row4[10]</td>";
                                        echo "<td style='padding: 10px;'>$row4[4]</td>";
                                        echo "<td style='padding: 10px;'>";
                                    ?>
                                        <div>
                                            <a href="Admin.php?editStudentid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                                            ||
                                            <a href="Admin.php?viewStuentid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: green;">View</a>
                                            ||
                                            <a href="Admin.php?deleteStuentid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                                        </div>
                                    <?php
                                        echo "</td></tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </section>
                <?php
                    } elseif (isset($_GET['searchEmployee'])) {
                ?>
                    <section id="searchEmployee" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Search Details</h2>
                        <?php
                        $searchE = $_GET['searchEmployee'];
                        $sql4 = "SELECT * FROM employees WHERE `id` = '$searchE' OR `name` LIKE '%$searchE%'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Employee Details Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                        ?>
                            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                                <thead style="background-color: #f2f2f2;">
                                    <tr>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Mobile No</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Designation</th>
                                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($row4 = mysqli_fetch_row($result4)) {
                                        echo "<tr style='border: 1px solid #ddd;'>";
                                        echo "<td style='padding: 10px;'>$row4[0]</td>";
                                        echo "<td style='padding: 10px;'>$row4[1]";
                                        echo "<td style='padding: 10px;'>$row4[2]</td>";
                                        echo "<td style='padding: 10px;'>$row4[4]</td>";
                                        echo "<td style='padding: 10px;'>";
                                    ?>
                                        <div>
                                            <a href="Admin.php?editEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                                            ||
                                            <a href="Admin.php?viewEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: green;">View</a>
                                            ||
                                            <a href="Admin.php?deleteEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                                        </div>
                                    <?php
                                        echo "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php

                        }
                        ?>
                    </section>
                <?php
                    } elseif (isset($_GET['editRuleid'])) {
                ?>
                    <section id="editRuleid" class="content-section" style="display:block;">
                        <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Edit Rule Details</h2>

                        <?php
                        $rid = $_GET['editRuleid'];
                        $sql4 = "Select * from rules where id='$rid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Rule with ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                        ?>
                            <div id="editRuleForm" class="form-container">
                                <form method="post" action="edit-rule.php">

                                    <label for="ruleId">Id:</label>
                                    <input type="text" id="ruleId" name="ruleId" value="<?php echo $row4[0]; ?>" required readonly='true'>

                                    <label for="ruleTitle">Rule Title:</label>
                                    <input type="text" id="ruleTitle" name="ruleTitle" value="<?php echo $row4[1]; ?>" required>

                                    <label for="ruleDescription">Description:</label>
                                    <input type="text" id="ruleDescription" name="ruleDescription" value="<?php echo $row4[2]; ?>" required></input>

                                    <button type="submit"><span>Submit</span></button>
                                </form>
                            </div>
                    </section>
                <?php
                        }
                    } elseif (isset($_GET['deleteRuleid'])) {

                        $rid = $_GET['deleteRuleid'];
                        $sql4 = "Select * from rules where id='$rid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Rule ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $sql5 = "DELETE FROM `rules` WHERE `id`=$rid";
                            $result5 = mysqli_query($conn, $sql5);
                            echo "<script>alert('Rule Data Deleted');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        }
                    } elseif (isset($_GET['editAnnouncementid'])) {
                ?>
                <section id="editAnnouncementid" class="content-section" style="display:block;">
                    <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Edit Rule Details</h2>

                    <?php
                        $aid = $_GET['editAnnouncementid'];
                        $sql4 = "Select * from announcements where id='$aid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Announcement with ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $row4 = mysqli_fetch_row($result4);
                    ?>
                        <div id="editAnnouncementForm" class="form-container">
                            <form method="post" action="edit-announcement.php">

                                <label for="announcementId">Id:</label>
                                <input type="text" id="announcementId" name="announcementId" value="<?php echo $row4[0]; ?>" required readonly='true'>

                                <label for="announcementTitle">Announcement Title:</label>
                                <input type="text" id="announcementTitle" name="announcementTitle" value="<?php echo $row4[1]; ?>" required>

                                <label for="announcementDescription">Description:</label>
                                <input type="text" id="announcementDescription" name="announcementDescription" value="<?php echo $row4[2]; ?>" required></input>

                                <button type="submit"><span>Submit</span></button>
                            </form>
                        </div>
                </section>
            <?php
                        }
                    } elseif (isset($_GET['deleteAnnouncementid'])) {

                        $aid = $_GET['deleteAnnouncementid'];
                        $sql4 = "Select * from announcements where id='$aid'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) == 0) {
                            echo "<script>alert('No Announcement ID Found');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        } else {
                            $sql5 = "DELETE FROM `announcements` WHERE `id`=$aid";
                            $result5 = mysqli_query($conn, $sql5);
                            echo "<script>alert('Announcement Data Deleted');</script>";
                            echo "<script>window.location.href ='Admin.php'</script>";
                        }
                    } else {
            ?>
            <section id="dashboard" class="content-section">
                <h2>Dashboard</h2>
                <!-- <p>Overview of the system metrics and recent activities.</p> -->


                <div class="cardalin">

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Student
                            </p>
                            <p class="para">
                                <?php echo $num1 ?>
                            </p>
                            <a href="#viewStudents" onclick="showSection('viewStudents')"><button class="btn">View All ➜</button></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Beds
                            </p>
                            <p class="para">
                                <?php echo $num2 * 3 ?>
                            </p>
                            <a href="#viewRooms" onclick="showSection('viewRooms')"><button class="btn">View All ➜</button></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Employees
                            </p>
                            <p class="para">
                                <?php echo $num3 ?>
                            </p>
                            <a href="#viewEmployees" onclick="showSection('viewEmployees')"><button class="btn">View All ➜</button></a>
                        </div>
                    </div>

                </div>


                <!-- Add dashboard content here -->
            </section>
        <?php
                    }
        ?>
        <section id="students" class="content-section" style="display:none;">
            <h2>Manage Students</h2>
            <button onclick="showForm('addStudentForm')">Add Student</button>
            <button onclick="showForm('deleteStudentForm')">Delete Student</button>
            <button onclick="showForm('searchStudentForm')">Search Student</button>
            <div id="addStudentForm" class="form-container" style="display:none;">
                <h3>Add Student</h3>
                <form method="post" action="add-student.php">
                    <label for="studentName">Name:</label>
                    <input type="text" id="studentName" name="studentName" required>
                    <label for="studentBirthDate">Birth Date:</label>
                    <input type="date" id="studentBirthDate" name="studentBirthDate" required>
                    <label for="studentMobile">Mobile No:</label>
                    <input type="tel" id="studentMobile" name="studentMobile" minlength="10" maxlength="10" pattern="[0-9]+" required>
                    <label for="studentEmail">Email:</label>
                    <input type="email" id="studentEmail" name="studentEmail" required>
                    <label for="studentParentsNo">Parents' Mobile No:</label>
                    <input type="tel" id="studentParentsNo" name="studentParentsNo" minlength="10" maxlength="10" pattern="[0-9]+" required>
                    <label for="studentFatherName">Father's Name:</label>
                    <input type="text" id="studentFatherName" name="studentFatherName" required>
                    <label for="studentMotherName">Mother's Name:</label>
                    <input type="text" id="studentMotherName" name="studentMotherName" required>
                    <label for="studentAddress">Address:</label>
                    <input type="text" id="studentAddress" name="studentAddress" required>

                    <label for="studentRoom">Room No:</label>
                    <select id="studentRoom" name="studentRoom" required="true">
                        <?php
                        $sql = "SELECT * FROM `roomsallocation` WHERE `allocationStatus` = 'Empty' ORDER BY `roomNo` ASC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_row($result)) {
                        ?>
                            <option value="<?php echo $row[0] . " " . $row[1] ?>"><?php echo "Roomo no: " . $row[0] . " ,Bed No: " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <label for="studentCollege">College Name:</label>
                    <input type="text" id="studentCollege" name="studentCollege" required>
                    <label for="studentDepartment">Department:</label>
                    <input type="text" id="studentDepartment" name="studentDepartment" required>

                    <label for="studentSem">Sem:</label>
                    <input type="text" id="studentDepartment" name="sem" required>

                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
            <div id="deleteStudentForm" class="form-container" style="display:none;">
                <h3>Delete Student</h3>
                <form method="post" action="delete-student.php">
                    <label for="deleteStudentId">Student ID:</label>
                    <select id="deleteStudentId" name="deleteStudentId" required>
                        <option value="" disabled selected>Select a student ID</option>
                        <?php
                        $sql3 = "SELECT `id`,`name` FROM `students` ORDER BY `id` ASC";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_row($result3)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] . " - " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <!-- <input type="text" id="deleteStudentId" name="deleteStudentId" required> -->
                    <button type="submit"><span>Delete</span></button>
                </form>
            </div>
            <div id="searchStudentForm" class="form-container" style="display:none;">
                <h3>Search Student</h3>
                <form method="get" action="Admin.php">
                    <label for="searchStudentId">Student ID Or Student Name:</label>
                    <input type="text" id="searchStudentId" name="searchStudent" required>
                    <button type="submit"><span>Search</span></button>
                </form>
            </div>
            <!-- Add student management content here -->
        </section>
        <!--  -->
        <section id="employees" class="content-section" style="display:none;">
            <h2>Manage Employees</h2>
            <button onclick="showForm('addEmployeeForm')">Add Employee</button>
            <button onclick="showForm('deleteEmployeeForm')">Delete Employee</button>
            <button onclick="showForm('searchEmployeeForm')">Search Employee</button>
            <div id="addEmployeeForm" class="form-container" style="display:none;">
                <h3>Add Employee</h3>
                <form method="post" action="add-employee.php">
                    <label for="employeeName">Name:</label>
                    <input type="text" id="employeeName" name="employeeName" required>

                    <label for="studentMobile">Mobile No:</label>
                    <input type="tel" id="employeeMobile" name="employeeMobile" required>

                    <label for="employeeEmail">Email:</label>
                    <input type="email" id="employeeEmail" name="employeeEmail" required>

                    <label for="employeeDesignation">Designation:</label>
                    <input type="text" id="employeeDesignation" name="employeeDesignation" required>

                    <label for="employeeSalary">Salary:</label>
                    <input type="text" id="employeeSalary" name="employeeSalary" required>

                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
            <div id="deleteEmployeeForm" class="form-container" style="display:none;">
                <h3>Delete Employee</h3>
                <form method="post" action="delete-employee.php">
                    <label for="deleteEmployeeId">Employee ID:</label>
                    <select id="deleteEmployeeId" name="deleteEmployeeId" required>
                        <option value="" disabled selected>Select Employee ID</option>
                        <?php
                        $sql3 = "SELECT `id` FROM `employees` ORDER BY `id` ASC";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_row($result3)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <button type="submit"><span>Delete</span></button>
                </form>
            </div>
            <div id="searchEmployeeForm" class="form-container" style="display:none;">
                <h3>Search Employee</h3>
                <form method="get" action="Admin.php">
                    <label for="searchEmployee">Employee ID Or Employee Name:</label>
                    <input type="text" id="searchEmployee" name="searchEmployee" required>
                    <button type="submit"><span>Search</span></button>
                </form>
            </div>
            <!-- Add employee management content here -->
        </section>
        <!--  -->
        <section id="rooms" class="content-section" style="display:none;">
            <h2>Manage Rooms</h2>
            <button onclick="showForm('addRoomForm')">Add Room</button>
            <button onclick="showForm('roomReallocationForm')">Room Reallocation</button>
            <button onclick="showForm('roomInterchangeForm')">Room Interchange</button>
            <div id="addRoomForm" class="form-container" style="display:none;">
                <h3>Add Room</h3>
                <form method="post" action="add-room.php">
                    <label for="roomNumber">Room Number:</label>
                    <input type="text" id="roomNumber" name="roomNumber" required>
                    <!-- <label for="capacity">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" required> -->
                    <label for="price">Price (Per Sem):</label>
                    <input type="text" id="price" name="price" required>
                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
            <!--  -->
            <div id="roomReallocationForm" class="form-container" style="display:none;">
                <h3>Room Reallocation</h3>
                <form method="post" action="room-reallocation.php">
                    <label for="StudentId">Student ID:</label>
                    <select id="StudentId" name="StudentId" required>
                        <option value="" disabled selected>Select a student ID</option>
                        <?php
                        $sql3 = "SELECT `id`,`name` FROM `students` ORDER BY `id` ASC";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_row($result3)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] . " - " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <label for="studentRoom">New Room No:</label>
                    <select id="studentRoom" name="studentRoom" required="true">
                        <?php
                        $sql = "SELECT * FROM `roomsallocation` WHERE `allocationStatus` = 'Empty' ORDER BY `roomNo` ASC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_row($result)) {
                        ?>
                            <option value="<?php echo $row[0] . " " . $row[1] ?>"><?php echo "Roomo no: " . $row[0] . " ,Bed No: " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
            <!--  -->
            <div id="roomInterchangeForm" class="form-container" style="display:none;">
                <h3>Room Interchange</h3>
                <form method="post" action="room-interchange.php">
                    <label for="firstStudentId">First Student:</label>
                    <select id="firstStudentId" name="firstStudentId" required>
                        <option value="" disabled selected>Select a student</option>
                        <?php
                        $sql3 = "SELECT `id`,`name` FROM `students` ORDER BY `id` ASC";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_row($result3)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] . " - " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <label for="secondStudentId">Second Student:</label>
                    <select id="secondStudentId" name="secondStudentId" required>
                        <option value="" disabled selected>Select a student</option>
                        <?php
                        $sql3 = "SELECT `id`,`name` FROM `students` ORDER BY `id` ASC";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_row($result3)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] . " - " . $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
            <!-- Add room management content here -->
        </section>

        <section id="addRule" class="content-section" style="display:none;">
            <h2>Manage Rules</h2>
            <button onclick="showForm('addRuleForm')">Add Rule</button>
            <a href="#viewRules" onclick="showSection('viewRules')"><button class="btn">View Rules</button></a>
            <div id="addRuleForm" class="form-container" style="display:none;">
                <h3>Add Rule</h3>
                <form method="post" action="add-rule.php">
                    <label for="ruleTitle">Rule Title:</label>
                    <input type="text" id="ruleTitle" name="ruleTitle" required>
                    <label for="ruleDescription">Description:</label>
                    <textarea id="ruleDescription" name="ruleDescription" required></textarea>
                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
        </section>
        <section id="viewRules" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Rules</h2>
            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Sr No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Rule title</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Rule Description</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql4 = "Select * from rules";
                    $result4 = mysqli_query($conn, $sql4);
                    $i = 0;
                    while ($row4 = mysqli_fetch_row($result4)) {
                        $i = $i + 1;
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$i</td>";
                        echo "<td style='padding: 10px;'>$row4[1]";
                        echo "<td style='padding: 10px;'>$row4[2]</td>";
                        echo "<td style='padding: 10px;'>";
                    ?>
                        <div>
                            <a href="Admin.php?editRuleid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                            ||
                            <a href="Admin.php?deleteRuleid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                        </div>
                    <?php
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section id="addAnnouncement" class="content-section" style="display:none;">
            <h2>Manage Announcement</h2>
            <button onclick="showForm('addAnnouncementForm')">Add Announcement</button>
            <a href="#viewAnnouncements" onclick="showSection('viewAnnouncements')"><button class="btn">View Announcements</button></a>
            <div id="addAnnouncementForm" class="form-container" style="display:none;">
                <h3>Add Announcement</h3>
                <form method="post" action="add-announcement.php">
                    <label for="title">Announcement Title:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                    <button type="submit"><span>Submit</span></button>
                </form>
            </div>
        </section>
        <section id="viewAnnouncements" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Announcements</h2>
            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Sr No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Announcement Title</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Announcement Description</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql4 = "Select * from announcements";
                    $result4 = mysqli_query($conn, $sql4);
                    $i = 0;
                    while ($row4 = mysqli_fetch_row($result4)) {
                        $i = $i + 1;
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$i</td>";
                        echo "<td style='padding: 10px;'>$row4[1]";
                        echo "<td style='padding: 10px;'>$row4[2]</td>";
                        echo "<td style='padding: 10px;'>";
                    ?>
                        <div>
                            <a href="Admin.php?editAnnouncementid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                            ||
                            <a href="Admin.php?deleteAnnouncementid=<?php echo $row4[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                        </div>
                    <?php
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section id="viewStudents" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Manage Students</h2>
            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">S. No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Room No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Mobile No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $sql3 = "Select * from students";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row3 = mysqli_fetch_row($result3)) {
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$i</td>";
                        echo "<td style='padding: 10px;'>$row3[0]</td>";
                        echo "<td style='padding: 10px;'>$row3[2]</td>";
                        echo "<td style='padding: 10px;'>$row3[10]</td>";
                        echo "<td style='padding: 10px;'>$row3[4]</td>";
                        echo "<td style='padding: 10px;'>";
                    ?>
                        <div>
                            <a href="Admin.php?editStudentid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                            ||
                            <a href="Admin.php?viewStuentid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: green;">View</a>
                            ||
                            <a href="Admin.php?deleteStuentid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                        </div>
                    <?php
                        echo "</td></tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section id="viewRooms" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Rooms Capacity</h2>
            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">S. No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">RoomNo - BedNo</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Price</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Status</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Student Id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $sql3 = "Select * from roomsallocation";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row3 = mysqli_fetch_row($result3)) {
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$i</td>";
                        echo "<td style='padding: 10px;'>$row3[0]";
                        echo " - ";
                        echo $row3[1];
                        echo "</td>";
                        $sql4 = "SELECT * FROM `rooms` WHERE `roomNo`='$row3[0]'";
                        $result4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_row($result4);
                        echo "<td style='padding: 10px;'>$row4[1]</td>";
                        echo "<td style='padding: 10px;'>$row3[2]</td>";
                        if ($row3[2] == "Occupied") {
                    ?>
                            <td style='padding: 10px;'><a href="Admin.php?viewStuentid=<?php echo $row3[3]; ?>" style="text-decoration: none; color: blue;"><?php echo $row3[3]; ?></a></td>
                    <?php
                        } else {
                            echo "<td style='padding: 10px;'>-</td>";
                        }
                        echo "</td></tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section id="viewEmployees" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">All Employees</h2>
            <table class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Mobile No</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Designation</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql3 = "Select * from employees";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row3 = mysqli_fetch_row($result3)) {
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$row3[0]</td>";
                        echo "<td style='padding: 10px;'>$row3[1]";
                        echo "<td style='padding: 10px;'>$row3[2]</td>";
                        echo "<td style='padding: 10px;'>$row3[4]</td>";
                        echo "<td style='padding: 10px;'>";
                    ?>
                        <div>
                            <a href="Admin.php?editEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: blue;">Edit</a>
                            ||
                            <a href="Admin.php?viewEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: green;">View</a>
                            ||
                            <a href="Admin.php?deleteEmployeeid=<?php echo $row3[0]; ?>" style="text-decoration: none; color: red;" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
                        </div>
                    <?php
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section id="viewFeedbacks" class="content-section" style="display:none;">
            <h2 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">View Feedbacks</h2>
            <table id="feedbacksTable" class="table cus-table" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Description</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Submitted By Student Id</th>
                        <th class="font-weight-bold" style="padding: 12px; border: 1px solid #ddd; text-align: left;">Date And Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql6 = "SELECT * FROM feedback ORDER BY id DESC";
                    $result6 = mysqli_query($conn, $sql6);
                    while ($row6 = mysqli_fetch_row($result6)) {
                        echo "<tr style='border: 1px solid #ddd;'>";
                        echo "<td style='padding: 10px;'>$row6[1]</td>";
                        echo "<td style='padding: 10px;'>";
                    ?>
                        <a href="Admin.php?viewStuentid=<?php echo $row6[2]; ?>" style="text-decoration: none; color: blue;">
                        <?php
                        echo $row6[2] . "</a></td>";
                        echo "<td style='padding: 10px;'>$row6[3]</td>"; // Assuming $row6[3] is the date column
                        echo "</tr>";
                    }
                        ?>
                </tbody>
            </table>

        </section>
            </main>
        </div>
        <script src="admin.js"></script>
    <?php } else {
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    } ?>
</body>

</html>
