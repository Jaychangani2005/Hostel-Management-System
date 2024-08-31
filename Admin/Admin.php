<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php 
    session_start();
    if(isset($_SESSION['adminid']))
    {
        $conn=mysqli_connect("localhost","root","","hostel");

        $sql1="Select * from students";
        $num1=mysqli_num_rows(mysqli_query($conn,$sql1));

        $sql2="Select * from rooms";
        $num2=mysqli_num_rows(mysqli_query($conn,$sql2));

        $sql3="Select * from employees";
        $num3=mysqli_num_rows(mysqli_query($conn,$sql3));
    
    ?>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Admin</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#dashboard" onclick="showSection('dashboard')">Dashboard</a></li>
                <li><a href="#students" onclick="showSection('students')">Manage Students</a></li>
                <li><a href="#employees" onclick="showSection('employees')">Manage Employees</a></li>
                <li><a href="#rooms" onclick="showSection('rooms')">Rooms</a></li>
                <!-- <li><a href="#bookings" onclick="showSection('bookings')">Bookings</a></li> -->
                <li><a href="#addInstruction" onclick="showSection('addInstruction')">Add Instruction</a></li>
                <!-- New Menu Item -->
                <li><a href="#settings" onclick="showSection('settings')">Settings</a></li>
                <li><a href="logout.php" onclick="showSection('logout')">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Dashboard</h1>
            </header>
            <section id="dashboard" class="content-section">
                <h2>Dashboard</h2>
                <p>Overview of the system metrics and recent activities.</p>


                <div class="cardalin">

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Student
                            </p>
                            <p class="para">
                                <?php echo $num1 ?>
                            </p>
                            <button class="btn">View All ➜</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Rooms
                            </p>
                            <p class="para">
                                <?php echo $num2 ?>
                            </p>
                            <button class="btn">More Info ➜</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="content-card">
                            <p class="heading">Totel Employees
                            </p>
                            <p class="para">
                            <?php echo $num3 ?>
                            </p>
                            <button class="btn">More Info ➜</button>
                        </div>
                    </div>

                </div>


                <!-- Add dashboard content here -->
            </section>
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
                        <input type="tel" id="studentMobile" name="studentMobile" required>
                        <label for="studentEmail">Email:</label>
                        <input type="email" id="studentEmail" name="studentEmail" required>
                        <label for="studentParentsNo">Parents' Mobile No:</label>
                        <input type="tel" id="studentParentsNo" name="studentParentsNo" required>
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
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_row($result))
                              {
                                ?>
                                  <option value="<?php echo $row[0]." ".$row[1] ?>"><?php echo "Roomo no: ".$row[0]." ,Bed No: ".$row[1] ?></option>
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
                                while($row = mysqli_fetch_row($result3)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0]." - ".$row[1] ?></option>
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
                    <form method="post" action="search-student.php">
                        <label for="searchStudentId">Student ID Or Student Name:</label>
                        <input type="text" id="searchStudentId" name="searchStudentId" required>
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
                                while($row = mysqli_fetch_row($result3)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                                    <?php
                                }
                            ?>
                        </select>

                        <!-- <input type="text" id="deleteStudentId" name="deleteStudentId" required> -->
                        <button type="submit"><span>Delete</span></button>
                    </form>
                </div>
                <div id="searchEmployeeForm" class="form-container" style="display:none;">
                    <h3>Search Employee</h3>
                    <form method="post" action="search-employee.php">
                        <label for="searchEmployeeId">Employee ID Or Employee Name:</label>
                        <input type="text" id="searchEmployeeId" name="searchEmployeeId" required>
                        <button type="submit"><span>Search</span></button>
                    </form>
                </div>
                <!-- Add employee management content here -->
            </section>
            <!--  -->
            <section id="rooms" class="content-section" style="display:none;">
                <h2>Rooms</h2>
                <p>Manage rooms.</p>
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
                                while($row = mysqli_fetch_row($result3)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0]." - ".$row[1] ?></option>
                                    <?php
                                }
                            ?>
                        </select>

                        <label for="studentRoom">New Room No:</label>
                        <select id="studentRoom" name="studentRoom" required="true"> 
                        <?php 
                            $sql = "SELECT * FROM `roomsallocation` WHERE `allocationStatus` = 'Empty' ORDER BY `roomNo` ASC";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_row($result))
                              {
                                ?>
                                  <option value="<?php echo $row[0]." ".$row[1] ?>"><?php echo "Roomo no: ".$row[0]." ,Bed No: ".$row[1] ?></option>
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
                                while($row = mysqli_fetch_row($result3)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0]." - ".$row[1] ?></option>
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
                                while($row = mysqli_fetch_row($result3)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0]." - ".$row[1] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <button type="submit"><span>Submit</span></button>
                    </form>
                </div>
                <!-- Add room management content here -->
            </section>
            <section id="bookings" class="content-section" style="display:none;">
                <h2>Bookings</h2>
                <p>Manage bookings.</p>
                <button onclick="showForm('addBookingForm')">Add Booking</button>
                <div id="addBookingForm" class="form-container" style="display:none;">
                    <h3>Add Booking</h3>
                    <form>
                        <label for="userId">User ID:</label>
                        <input type="text" id="userId" name="userId" required>
                        <label for="roomId">Room ID:</label>
                        <input type="text" id="roomId" name="roomId" required>
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" required>
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" name="endDate" required>
                        <button type="submit"><span>Submit</span></button>
                    </form>
                </div>
                <!-- Add booking management content here -->
            </section>
            <section id="addInstruction" class="content-section" style="display:none;"> <!-- New Section -->
                <h2>Add Instruction</h2>
                <button onclick="showForm('addRuleForm')">Add Rule</button>
                <button onclick="showForm('addPhotoForm')">Add Photo</button>
                <div id="addRuleForm" class="form-container" style="display:none;">
                    <h3>Add Rule</h3>
                    <form>
                        <label for="ruleTitle">Rule Title:</label>
                        <input type="text" id="ruleTitle" name="ruleTitle" required>
                        <label for="ruleDescription">Description:</label>
                        <textarea id="ruleDescription" name="ruleDescription" required></textarea>
                        <button type="submit"><span>Submit</span></button>
                    </form>
                </div>
                <div id="addPhotoForm" class="form-container" style="display:none;">
                    <h3>Add Photo</h3>
                    <form>
                        <label for="photoTitle">Photo Title:</label>
                        <input type="text" id="photoTitle" name="photoTitle" required>
                        <label for="photoUpload">Upload Photo:</label>
                        <input type="file" id="photoUpload" name="photoUpload" accept="image/*" required>
                        <button type="submit"><span>Submit</span></button>
                    </form>
                </div>
                <!-- Add instruction management content here -->
            </section>
            <section id="settings" class="content-section" style="display:none;">
                <h2>Settings</h2>
                <p>System settings.</p>
                <!-- Add settings content here -->
            </section>
            <section id="logout" class="content-section" style="display:none;">
                
                <h2>Logout</h2>
                <p>You have been logged out.</p>
                Add logout content here
            </section>
        </main>
    </div>
    <script src="admin.js"></script>
    <?php }
    else
    {
        echo "<script>window.location.href ='http://localhost/hostel/login.php'</script>";
    } ?>
</body>

</html>