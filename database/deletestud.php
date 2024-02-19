<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <?php
    
    require_once './db_connection.php';

    // Check if student_id parameter is set
    if (isset($_GET['student_id'])) {
        $student_id = $_GET['student_id'];

        // Delete student record from the database
        $sql = "DELETE FROM students WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $student_id);
        if ($stmt->execute()) {
            // Student deleted successfully
            echo "<div class='success-message' style='text-align: center;'>Student deleted successfully</div>";
            echo "<br>";

            echo "<div  style='text-align: center;'>
        <a class='back-link' href='student_report_form.php'>Back to Student Records</a><br>
        <br>
    </div>";
        } else {
            echo "Error deleting student: " . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Student ID not provided";
    }
    ?>


</body>

</html>