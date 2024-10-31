<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Record</title>

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
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <form id='loginForm' name='loginForm' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem;'>
        <div style='justify-items:center;'>
            <h2>Health Record</h2>

            <?php
            include_once __DIR__ . '/../server/connectDB.php';
            include_once __DIR__ . '/../components/ConsultantItem.php';
            include_once __DIR__ . '/../layout/header.php';
            $conn->select_db('fitnessapp');

            include_once __DIR__ . '/../components/FormItem.php';
            renderFormItemTime('Set Time', 'recordTime');
            renderFormItemCalendar('Set Date', 'recordDate');

            renderFormItemText('Set Weight(kg)', 'weight', 'Example: 60');
            renderFormItemText('Set Water Intake(ml)', 'waterIntake', 'Example: 3000');

            renderFormItemSelect('Set Exercise', 'exerciseType', ['C' => 'Cardio', 'W' => 'Weight Lifting', 'Y' => 'Yoga', 'P' => 'Pilates']);

            include_once __DIR__ . '/../components/Buttons.php';
            renderSmallButton('record_health.php', '', 'Back', 'button');
            renderSmallButton('', '', 'Submit', 'submit');

            ?>
        </div>
    </form>
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

    echo '<meta http-equiv="refresh" content="0;url=home_page.php">';
    exit();
}