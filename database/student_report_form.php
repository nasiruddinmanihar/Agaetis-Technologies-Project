<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        .update-link {
            color: green;

            text-decoration: none;

            font-weight: bold;

        }

        .update-link:hover {
            text-decoration: underline;
        }

        .delete-link:hover {
            text-decoration: underline;
        }


        .delete-link {
            color: red;

            text-decoration: none;

            font-weight: bold;

        }
    </style>

</head>

<body>
    <div class="navbar">
        <a href="student_report_form.php">View Student Records</a>
        <a href="../frontend/index.php">Go Back</a>
    </div>
    <div class="container">
        <h2>Student Report</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Batch/Class</th>
                <th>Email</th>
                <th>English</th>
                <th>Hindi</th>
                <th>Math</th>
                <th>Science</th>
                <th>History</th>
                <th>Geography</th>
                <th>Total Marks</th>
                <th>Percentage</th>
                <th>Grade</th>
                <th>Remarks</th>
                <th>Action</th> 
            </tr>
            <?php
            require_once './db_connection.php';

            $sql = "SELECT * FROM students";


            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["batch"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["english"] . "</td>";
                    echo "<td>" . $row["hindi"] . "</td>";
                    echo "<td>" . $row["math"] . "</td>";
                    echo "<td>" . $row["science"] . "</td>";
                    echo "<td>" . $row["history"] . "</td>";
                    echo "<td>" . $row["geography"] . "</td>";
                    echo "<td>" . $row["total_marks"] . "</td>";
                    echo "<td>" . $row["percentage"] . "</td>";
                    echo "<td>" . $row["grade"] . "</td>";
                    echo "<td>" . $row["remarks"] . "</td>";
                    echo "<td><a href='./updatestud.php?student_id=" . $row["student_id"] . "' class='update-link'>Update</a> | <a href='./deletestud.php?student_id=" . $row["student_id"] . "' class='delete-link' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a></td>"; // Update and Delete buttons
                    echo "</tr>";


                }
            } else {
                echo "<tr><td colspan='15'>No records found</td></tr>";
            }


            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>