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
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    include_once __DIR__ . '/../components/Tables.php';
    $conn->select_db('fitnessapp');
    session_start();
    renderHeader($conn);
    echo "<h2 style='text-align: center; font-size:48px;'>Consultation Record</h2>";

    $sql = 'SELECT id FROM Member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    // Get all consultations with nutritionist information in one query
    $sql = 'SELECT c.*, n.nutritionistName, n.nutritionistContact 
                FROM Consultation c
                JOIN Nutritionist n ON c.nutritionistID = n.id
                WHERE c.memberID = ?
                ORDER BY c.date ASC, c.time ASC';
    $consultationList = dataGetResultSql(
        $sql,
        $pdo,
        [$memberID],
        ['id', 'nutritionistID', 'date', 'time', 'comment', 'status', 'nutritionistName', 'nutritionistContact']
    );

    echo '<div style="min-height:500px; display: flex; align-items:center; justify-content:center; flex-direction: column;">';
    if (count($consultationList) !== 0) {
        foreach ($consultationList as $consultation) {
            renderTable(
                $consultation['id'],
                $consultation['date'] . '&nbsp&nbsp&nbsp' . $consultation['time'],
                [
                    'Consultant Name' => $consultation['nutritionistName'],
                    'Consultant Contact' => $consultation['nutritionistContact'],
                    'Comment Written' => $consultation['comment'],
                    'Price' => 'RM20.00',
                    'Status' => (!$consultation['status']) ? 'Pending Approval' : 'Approved'
                ],
                '../server/deleteRecord.php?consultationID'
            );
        }
    } else {
        echo '<h1>No results found</h1>';
        renderBigButton('../pages/consultation.php', '', 'Back to Consultation', 'button', '#7AB2D3');
    }
    echo '</div>';

    renderFooter();
    ?>
</body>

</html>