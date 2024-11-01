<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">
    <title>Document</title>
</head>

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Classes</h2>

                <?php
                session_start();
                include_once __DIR__ . '/../server/connectDB.php';
                include_once __DIR__ . '/../server/data.php';
                include_once __DIR__ . '/../components/ConsultantItem.php';
                session_start();
                $conn->select_db('fitnessapp');

                $currentDate = date('Y-m-d');
                $sql = 'SELECT * FROM Classes';
                $classes = dataGetResultSql($sql, $pdo, [], ['className', 'price', 'id']);
                $values = [];
                foreach ($classes as $class) {
                    $values[$class['id']] = $class['className'] . ' (RM' . $class['price'] . ')'; // Corrected format
                }


                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemRadio("Classes", "classID", $values);
                echo "
            <div class='form-item'>
                <h3 class='form-title'>Set Start Date</h3>
                <input type='date' id='startDate' name='startDate' min='$currentDate'class='form-input' required>
            </div>
            
            <div class='form-item'>
                <h3 class='form-title'>Set End Date</h3>
                <input type='date' id='endDate' name='endDate' class='form-input' required>
            </div>

            <script>
                const startDateInput = document.getElementById('startDate');
                const endDateInput = document.getElementById('endDate');

                // Function to update endDate minimum based on startDate
                startDateInput.addEventListener('change', function() {
                    const startDateValue = new Date(this.value);
                    if (startDateValue) {
                        // Add one month to startDate for endDate minimum
                        const minEndDate = new Date(startDateValue);
                        minEndDate.setMonth(minEndDate.getMonth() + 1);

                        // Format date as YYYY-MM-DD for the input field
                        const formattedDate = minEndDate.toISOString().split('T')[0];
                        endDateInput.min = formattedDate;
                    }
                });
            </script>
            ";

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('classes.php', '', 'Back', 'button', '#FF8080', 'black');
                renderSmallButton('', '', 'Submit', 'submit', '#1FAB89', 'black');

                ?>
            </div>
        </form>
    </div>
</body>

</html>

<?php
// Data passage
include_once __DIR__ . '/../server/data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $classID = $_POST['classID'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // memberID
    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    $sql = 'INSERT INTO Enrollment (memberID, classID, startDate, endDate) VALUES (?, ?, ?, ?)';
    dataInsertSql($sql, $conn, [$memberID, $classID, $startDate, $endDate]);

    echo '<meta http-equiv="refresh" content="0;url=record_enrollment.php">';
    exit();
}