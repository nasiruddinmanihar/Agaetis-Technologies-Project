<?php
// Include the database connection file
require_once './db_connection.php';

// Check if student_id parameter is set
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $batch = $_POST["batch"];
        $email = $_POST["email"];

        // Update student record in the database
        $sql = "UPDATE students SET first_name=?, last_name=?, batch=?, email=? WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $first_name, $last_name, $batch, $email, $student_id);

        if ($stmt->execute()) {
            // Student deleted successfully
            echo "<div class='success-message' style='text-align: center;'>Student Updated successfully</div>";
            echo "<br>";
            echo "<div  style='text-align: center;'>
        <a class='back-link' href='student_report_form.php'>Back to Student Records</a><br>
        <br>
    </div>";

        } else {
            echo "Error updating student: " . $conn->error;
        }



    }

    // Retrieve student record from the database
    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Student record found, display update form
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Student</title>
            <link rel="stylesheet" href="./style.css">
        </head>

        <body>
            <div class="container">
                <h2>Update Student</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?student_id=' . $student_id; ?>"
                    method="post">
                    <!-- Input fields for updating student data -->
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>
                    <br>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required> <br>
                    <br>
                    <label for="batch">Batch/Class:</label>
                    <input type="text" id="batch" name="batch" value="<?php echo $row['batch']; ?>" required> <br>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required> <br>
                    <br>
                    <input type="submit" value="Update">
                </form>
            </div>
        </body>

        </html>
        <?php
    } else {
        echo "Student record not found";
    }



    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Student ID not provided";
}
?>