<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="navbar">
        <a href="../database/student_report_form.php">View Student Records</a>
        <a href="../frontend/index.php">Go Back</a>



    </div>
    <div class="container">
        <?php
        require_once '../database/db_connection.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $studentId = $_POST["studentId"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $batch = $_POST["batch"];
            $email = $_POST["email"];
            $english = $_POST["english"];
            $hindi = $_POST["hindi"];
            $math = $_POST["math"];
            $science = $_POST["science"];
            $history = $_POST["history"];
            $geography = $_POST["geography"];
            $remarks = $_POST["remarks"];

            // Calculate total marks
            $totalMarks = $english + $hindi + $math + $science + $history + $geography;
            $percentage = ($totalMarks / 600) * 100;

            // Calculate grade
            if ($percentage >= 75) {
                $grade = "Distinction";
            } elseif ($percentage >= 60) {
                $grade = "First Class";
            } elseif ($percentage >= 33) {
                $grade = "Pass";
            } else {
                $grade = "Fail";
            }
            ?>
            <h2>Student Report</h2>
            <table class="report">
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
                <tr>
                    <td>Student ID</td>
                    <td>
                        <?php echo $studentId; ?>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <?php echo $firstName . " " . $lastName; ?>
                    </td>
                </tr>
                <tr>
                    <td>Batch/Class</td>
                    <td>
                        <?php echo $batch; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>
                        <?php echo $english; ?>
                    </td>
                </tr>
                <tr>
                    <td>Hindi</td>
                    <td>
                        <?php echo $hindi; ?>
                    </td>
                </tr>
                <tr>
                    <td>Math</td>
                    <td>
                        <?php echo $math; ?>
                    </td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>
                        <?php echo $science; ?>
                    </td>
                </tr>
                <tr>
                    <td>History</td>
                    <td>
                        <?php echo $history; ?>
                    </td>
                </tr>
                <tr>
                    <td>Geography</td>
                    <td>
                        <?php echo $geography; ?>
                    </td>
                </tr>
                <tr>
                    <td>Total Marks</td>
                    <td>
                        <?php echo $totalMarks; ?>
                    </td>
                </tr>
                <tr>
                    <td>Percentage</td>
                    <td>
                        <?php echo $percentage . "%"; ?>
                    </td>
                </tr>
                <tr>
                    <td>Grade</td>
                    <td>
                        <?php echo $grade; ?>
                    </td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td>
                        <?php echo $remarks; ?>
                    </td>
                </tr>
            </table>


            <?php


            $stmt = $conn->prepare("INSERT INTO students (student_id, first_name, last_name, batch, email, english, hindi, math, science, history, geography, total_marks, percentage, grade, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssddddddddss", $studentId, $firstName, $lastName, $batch, $email, $english, $hindi, $math, $science, $history, $geography, $totalMarks, $percentage, $grade, $remarks);


            if ($stmt->execute()) {
                echo "<div class='success-message'>Record inserted successfully!</div>";
                echo "<br>";

            } else {
                echo "Error: " . $stmt->error;
            }


            $stmt->close();

            exit();


        }


        $conn->close();
        ?>



    </div>
</body>

</html>