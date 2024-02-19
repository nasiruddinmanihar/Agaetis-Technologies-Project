<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="./style.css">
    <script src="index.js"> </script>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .search-form {
            margin-right: 20px;
            display: flex;
        }

        .search-input {
            padding: 8px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border: 1px solid #ccc;
            border-right: none;
            
        }

        .search-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>



<body>
    <div class="navbar">
        <a href="../database/student_report_form.php"">View Student Records</a>
        <form class=" search-form" action="../database/searchbyname.php" method="GET">
            <input class="search-input" type="text" name="search" placeholder="Search by Name or ID">
            <button class="search-button" type="submit">Search</button>
            </form>
    </div>
    <div class="container">
        <h2>Student Report Form</h2>
        <form id="studentForm" action="../backend/process.php" method="post">
            <div>
                <label for="studentId">Student ID<span class="required">*</span>:</label>
                <input type="number" id="studentId" name="studentId" required>
            </div>
            <div>
                <label for="firstName">First Name<span class="required">*</span>:</label>
                <input type="text" id="firstName" name="firstName" pattern="[A-Za-z]+" required>
            </div>
            <div>
                <label for="lastName">Last Name<span class="required">*</span>:</label>
                <input type="text" id="lastName" name="lastName" pattern="[A-Za-z]+" required>
            </div>
            <div>
                <label for="batch">Batch/Class:</label>
                <input type="text" id="batch" name="batch">
            </div>
            <div>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="english">English (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="english" name="english" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="hindi">Hindi (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="hindi" name="hindi" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="math">Math (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="math" name="math" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="science">Science (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="science" name="science" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="history">History (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="history" name="history" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="geography">Geography (out of 100)<span class="required">*</span>:</label>
                <input type="number" id="geography" name="geography" min="0" max="100" step="0.01" required>
            </div>
            <div>
                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" maxlength="150"></textarea>
            </div>
            <button type="submit">Generate Report</button>

        </form>


</body>

</html>