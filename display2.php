<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Timetable</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bgimg">
        <div class="navbar">
            <ul class="navbar list">
                <li><a href="profile.php?tab=dashboard" class="tablinks <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="profile.php?tab=profile" class="tablinks <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'profile') ? 'active' : ''; ?>">Profile</a></li>
                <li style="float:right"><a href="login.php" class="tablinks">Sign Out</a></li>
            </ul>
        </div>
<<<<<<< HEAD
=======
        <div class="form1">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <div><label for="sem">Semester:</label>
                    <select id="sem" name="sem" required onchange="updateClassOptions()">
                        <option value="">Select Semester</option>
                        <option value="o">Odd</option>
                        <option value="e">Even</option>
                    </select>
                    <label for="dept">Dept:</label>
                    <select id="dept" name="dept" required>
                        <option value="">Select Department</option>
                        <option value="CSE">CSE</option>
                        <option value="IT">IT</option>
                    </select>
                </div>
                <button type="submit" name="fetchTimetable">Fetch Timetable</button>
            </form>
        </div>
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
        <div class="timetable-container">
            <div class="timetable">
                <?php
                // Database connection
                require 'connection.php';
                // Check if the form was submitted to update the classtable
                if (isset($_POST['teachertable'])) {
                    header("Location: display3.php");
                }

                // Check if the form was submitted to truncate the input table
                if (isset($_POST['truncateInput'])) {
                    // Execute SQL query to truncate input table
                    $sql_truncate_input = "TRUNCATE TABLE input";
                    if ($conn->query($sql_truncate_input) === FALSE) {
                        echo "Error truncating input table: " . $conn->error;
                    } else {
                        // Redirect to input.php
                        header("Location: input.php");
                        exit;
                    }
                }
                if (isset($_POST['exportExcel'])) {
<<<<<<< HEAD
                    header("Location: demo.php");
=======
                    header("Location: input.php");
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
                }
                if (isset($_POST['new'])) {
                    header("Location: classtruncate.php");
                }

                // Fetch semester value from input table
<<<<<<< HEAD
                $sql_select_semester = "SELECT sem FROM input";
                $result_select_semester = $conn->query($sql_select_semester);

                if ($result_select_semester->num_rows > 0) {
                    $row = $result_select_semester->fetch_assoc();
                    $semester = $row['sem'];
                } else {
                    echo "No semester data found in the 'input' table";
                    exit; // Exit the script if semester data is not found
                }
                $sql_select_dept = "SELECT dept FROM input";
                $result_select_dept = $conn->query($sql_select_dept);

                if ($result_select_dept->num_rows > 0) {
                    $row = $result_select_dept->fetch_assoc();
                    $dept = $row['dept'];
                } else {
                    echo "No dept data found in the 'input' table";
                    exit; // Exit the script if semester data is not found
                }
                // Fetch all unique teachers
                $sql_select_teachers = "SELECT distinct teacher FROM classtable WHERE sem = '$semester' and dept='$dept'";
                $result_select_teachers = $conn->query($sql_select_teachers);

                if ($result_select_teachers->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Teacher</th>";

                    // Loop through each day and period combination
                    foreach (array("MON", "TUE", "WED", "THU", "FRI") as $day) {
                        for ($period = 1; $period <= 6; $period++) {
                            echo "<th>$day$period</th>";
                        }
                    }

                    echo "</tr>";

                    while ($row = $result_select_teachers->fetch_assoc()) {
                        $teacher = $row['teacher'];

                        echo "<tr>";
                        echo "<td>$teacher</td>";

                        // Fetch class values for each day/pno combination for the current teacher
                        foreach (array("MON", "TUE", "WED", "THU", "FRI") as $day) {
                            for ($period = 1; $period <= 6; $period++) {
                                $sql_select_class = "SELECT class FROM classtable WHERE day = '$day' AND pno = $period AND teacher = '$teacher' AND sem = '$semester'";
                                $result_select_class = $conn->query($sql_select_class);

                                if ($result_select_class->num_rows > 0) {
                                    $row_class = $result_select_class->fetch_assoc();
                                    $class = $row_class['class'];
                                    echo "<td>$class</td>";
                                } else {
                                    echo "<td></td>";
                                }
=======
                // $sql_select_semester = "SELECT sem FROM input";
                // $result_select_semester = $conn->query($sql_select_semester);

                // if ($result_select_semester->num_rows > 0) {
                //     $row = $result_select_semester->fetch_assoc();
                //     $semester = $row['sem'];
                // } else {
                //     echo "No semester data found in the 'input' table";
                //     exit; // Exit the script if semester data is not found
                // }
                // $sql_select_dept = "SELECT dept FROM input";
                // $result_select_dept = $conn->query($sql_select_dept);

                // if ($result_select_dept->num_rows > 0) {
                //     $row = $result_select_dept->fetch_assoc();
                //     $dept = $row['dept'];
                // } else {
                //     echo "No dept data found in the 'input' table";
                //     exit; // Exit the script if semester data is not found
                // }
                // Fetch all unique teachers
                // Handle form submission
                if (isset($_POST['fetchTimetable'])) {
                    $semester = $_POST['sem'];
                    $dept = $_POST['dept'];
                    $sql_select_teachers = "SELECT distinct teacher FROM classtable WHERE sem = '$semester' and dept='$dept'";
                    $result_select_teachers = $conn->query($sql_select_teachers);

                    if ($result_select_teachers->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>Teacher</th>";

                        // Loop through each day and period combination
                        foreach (array("MON", "TUE", "WED", "THU", "FRI") as $day) {
                            for ($period = 1; $period <= 6; $period++) {
                                echo "<th>$day$period</th>";
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
                            }
                        }

                        echo "</tr>";
<<<<<<< HEAD
                    }

                    echo "</table>";
                } else {
                    echo "No teachers found in the classtable for semester $semester";
                }

=======

                        while ($row = $result_select_teachers->fetch_assoc()) {
                            $teacher = $row['teacher'];

                            echo "<tr>";
                            echo "<td>$teacher</td>";

                            // Fetch class values for each day/pno combination for the current teacher
                            foreach (array("MON", "TUE", "WED", "THU", "FRI") as $day) {
                                for ($period = 1; $period <= 6; $period++) {
                                    $sql_select_class = "SELECT class FROM classtable WHERE day = '$day' AND pno = $period AND teacher = '$teacher' AND sem = '$semester' and dept='$dept'";
                                    $result_select_class = $conn->query($sql_select_class);

                                    if ($result_select_class->num_rows > 0) {
                                        $row_class = $result_select_class->fetch_assoc();
                                        $class = $row_class['class'];
                                        echo "<td>$class</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                }
                            }

                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No teachers found in the classtable for semester $semester";
                    }
                }
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
                ?>
            </div>
        </div>
        <div class="form">
<<<<<<< HEAD
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="teachertable">Class View</button>
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="truncateInput">Other Dept</button>
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="exportExcel">Export to Excel</button>
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="new">Clear</button>
            </form>
=======
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="teachertable">Class View</button>
            </form> -->
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="truncateInput">Other Dept</button>
            </form> -->
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;"> -->
            <button type="submit" name="exportExcel"><a href="input.php">Export to Excel</a></button>
            <!-- </form> -->
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center;">
                <button type="submit" name="new">Clear</button>
            </form> -->
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
        </div>
    </div>
</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 829cc57d27bbbc599b0eac90369f3c83aa3162a8
