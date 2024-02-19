<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">

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

            </tr>


            <?php
            
            require_once './db_connection.php';

          
            $searchQuery = "";

            // Check if the search form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
                // Sanitize the search keyword
                $searchQuery = trim($_GET["search"]);
                $searchQuery = htmlspecialchars($searchQuery);
                // Query to search for students by name or ID
                $sql = "SELECT * FROM students WHERE first_name LIKE ? OR last_name LIKE ? OR student_id = ?";
                // Prepare the statement
                $stmt = $conn->prepare($sql);
                // Bind parameters
                $param = "%" . $searchQuery . "%";
                $stmt->bind_param("ssi", $param, $param, $searchQuery);
                // Execute the statement
                $stmt->execute();
                // Get result
                $result = $stmt->get_result();
            } else {
                // If search form is not submitted, fetch all students
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
            }

            // Check if there are any rows returned
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

                    echo "</tr>";


                }
            } else {
                echo "<tr><td colspan='15'>No records found</td></tr>";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>