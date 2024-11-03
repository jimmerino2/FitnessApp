<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Consultation Record Addtion</h2>

                <?php
                include_once __DIR__ . '/../server/connectDB.php';
                include_once __DIR__ . '/../server/data.php';
                include_once __DIR__ . '/../components/ConsultantItem.php';
                $conn->select_db('fitnessapp');
                session_start();

                $currentDate = date('Y-m-d');

                $sql_nutritionists = "SELECT id, nutritionistName, nutritionistContact FROM Nutritionist";
                $nutritionists = $conn->query($sql_nutritionists);

                $nutritionistOptions = [];
                if ($nutritionists && $nutritionists->num_rows > 0) {
                    while ($row = $nutritionists->fetch_assoc()) {
                        $nutritionistOptions[$row['id']] = "{$row['nutritionistName']} (Contact: {$row['nutritionistContact']})";
                    }
                }

                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemText('Member Email', 'email', '', '');
                renderFormItemSelect('Nutritionist Name', 'nutritionistID', $nutritionistOptions, '');
                renderFormItemCalendar('Set Date', 'consultationDate', $currentDate, '', value: '');
                renderFormItemTime('Set Time', 'consultationTime', '', '', '', true);
                renderFormItemTextarea('Add comment (optional)', 'comment', 'What would you like the nutritionist to know?', value: '');

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('admin.php', '', 'Back', 'button', '#FF8080', 'black');
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
    $memberEmail = $_POST['email'];
    $nutritionistID = $_POST['nutritionistID'];
    $date = $_POST['consultationDate'];
    $time = $_POST['consultationTime'];
    $comment = $_POST['comment'];
    $status = false;

    // Check whether ID exists
    $sql = 'SELECT * FROM Member WHERE email = ?';
    $memberIDs = dataGetResultSql($sql, $pdo, [$memberEmail], ['id']);

    if (count($memberIDs) !== 0) {
        $memberID = $memberIDs[0]['id'];
        $sql = 'INSERT INTO Consultation (memberID, nutritionistID, date, time, comment, status) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt_consultation = $conn->prepare($sql);
        $stmt_consultation->bind_param('iissss', $memberID, $nutritionistID, $date, $time, $comment, $status);
        $stmt_consultation->execute();

        echo '<meta http-equiv="refresh" content="0;url=admin.php">';
        exit();
    } else {
        echo '<script>alert("No such member exists.")</script>';
    }
}
