<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin: 0px;">
    <?php
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    include_once __DIR__ . '/../components/Tables.php';
    $conn->select_db('fitnessapp');
    session_start();
    renderHeader($conn);
    echo "<h2 style='text-align: center; font-size:48px;'>Consultation Record</h2>";

    // Show all records that correspond to the user
    $sql = 'SELECT id FROM Member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);
    $sql = 'SELECT * FROM Consultation WHERE memberID = ?';
    $consultationList = dataGetResultSql($sql, $pdo, [$memberID], ['id', 'nutritionistID', 'date', 'time', 'comment', 'status']);

    if (isset($_SESSION['consultantContact'])) {
        $sql = 'SELECT nutritionistName FROM Nutritionist WHERE nutritionistContact = ?';
        dataMapSql($sql, $conn, [$_SESSION['consultantContact']], $consultantName);
        $sql = 'SELECT nutritionistContact FROM Nutritionist WHERE nutritionistContact = ?';
        dataMapSql($sql, $conn, [$_SESSION['consultantContact']], $consultantContact);
        foreach ($consultationList as $consultation) {
            renderTable($consultation['id'], $consultation['date'] . '&nbsp&nbsp&nbsp' . $consultation['time'], ['Consultant Name' => $consultantName, 'Consultant Contact' => $consultantContact, 'Comment Written' => $consultation['comment'], 'Status' => (!$consultation['status']) ? 'Pending Approval' : 'Approved'], '../server/deleteRecord.php?consultationID');
        }
    } else {
        echo 'no records lol';
    }

    ?>
</body>

</html>