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
                renderFormItemText('Member Name', 'memberName', '', '');
                renderFormItemText('Member Email', 'email', '', '');
                renderFormItemSelect('Nutritionist Name', 'nutritionistID', $nutritionistOptions, '');
                renderFormItemCalendar('Set Date', 'consultationDate', $currentDate, '', value: '');
                renderFormItemTime('Set Time', 'consultationTime', '', '', value: '');
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
    $memberName = $_POST['memberName'];
    $memberEmail = $_POST['email'];
    $nutritionistID = $_POST['nutritionistID'];
    $date = $_POST['consultationDate'];
    $time = $_POST['consultationTime'];
    $comment = $_POST['comment'];
    $status = false;

    // Fetch or create member ID based on the entered member email
    $sql_member = 'SELECT id FROM member WHERE email = ?';
    $stmt_member = $conn->prepare($sql_member);
    $stmt_member->bind_param('s', $memberEmail);
    $stmt_member->execute();
    $result_member = $stmt_member->get_result();

    if ($result_member->num_rows > 0) {
        // If member exists, fetch the ID
        $memberID = $result_member->fetch_assoc()['id'];
    } else {
        // If member does not exist, insert new member and get the ID
        $sql_insert_member = 'INSERT INTO member (memberName, email) VALUES (?, ?)';
        $stmt_insert_member = $conn->prepare($sql_insert_member);
        $stmt_insert_member->bind_param('ss', $memberName, $memberEmail);
        $stmt_insert_member->execute();
        $memberID = $stmt_insert_member->insert_id;
    }

    $sql = 'INSERT INTO Consultation (memberID, nutritionistID, date, time, comment, status) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt_consultation = $conn->prepare($sql);
    $stmt_consultation->bind_param('iissss', $memberID, $nutritionistID, $date, $time, $comment, $status);
    $stmt_consultation->execute();

    echo '<meta http-equiv="refresh" content="0;url=admin.php">';
    exit();
}
