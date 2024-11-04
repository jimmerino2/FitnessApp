<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../components/Tables.php';
    renderHeader($conn);

    // Get memberID
    $sql = 'SELECT id FROM Member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    // Get member's enrollments
    $sql = 'SELECT E.ID AS enrollmentID, E.classID, C.className, E.startDate, E.endDate 
            FROM Enrollment E INNER JOIN Classes C ON E.classID = C.ID 
            WHERE memberID = ?
            ORDER BY E.startDate ASC';
    $enrollmentList = dataGetResultSql($sql, $pdo, [$memberID], ['enrollmentID', 'classID', 'className', 'startDate', 'endDate']);


    echo "<h2 style='text-align: center; font-size:48px;'>Enrollment Record</h2>";

    echo '<div style="min-height:500px; display: flex; align-items:center; justify-content:center; flex-direction: column;">';
    if (count($enrollmentList) !== 0) {
        foreach ($enrollmentList as $enrollment) {
            // Get price per month
            $sql = 'SELECT price FROM Classes WHERE id = ?';
            dataMapSql($sql, $conn, [$enrollment['classID']], $classPrice);

            // Get difference in months
            $startDate = new DateTime($enrollment['startDate']);
            $endDate = new DateTime($enrollment['endDate']);
            $interval = $startDate->diff($endDate);
            $totalMonths = ($interval->y * 12) + $interval->m;
            renderTable($enrollment['enrollmentID'], '', ['Class Name' => $enrollment['className'], 'Start Date' => $enrollment['startDate'], 'End Date' => $enrollment['endDate'], 'Monthly Price' => 'RM' . $classPrice, 'Total Price' => 'RM' . $totalMonths * $classPrice . '.00'], '../server/deleteRecord.php?enrollmentID');
        }
    } else {
        echo '<h1>No results found</h1>';
        renderBigButton('../pages/classes.php', '', 'Back to Classes', 'button', '#7AB2D3');
    }
    echo '</div>';

    renderFooter();
    ?>

</body>

</html>