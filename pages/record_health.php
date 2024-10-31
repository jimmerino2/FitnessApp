<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Record</title>
  <style>
    table,
    th,
    td {
      border: solid 2pt black;
      text-align: center;
      margin: 5px;
      padding: 10px;
    }

    .fixedButton {
      position: fixed;
      bottom: 0px;
      right: 0px;
      padding: 20px;
    }

    .roundedFixedBtn {
      height: 60px;
      line-height: 80px;
      width: 60px;
      font-size: 2em;
      font-weight: bold;
      border-radius: 50%;
      background-color: #4CAF50;
      color: white;
      text-align: center;
      cursor: pointer;
    }
  </style>
</head>

<body style="margin: 0px;">
  <?php
  session_start();
  include_once __DIR__ . '/../server/connectDB.php';
  $conn->select_db('fitnessapp');
  include_once __DIR__ . '/../layout/header.php';
  include_once __DIR__ . '/../components/Tables.php';
  include_once __DIR__ . '/../layout/footer.php';

  renderHeader($conn);
  $sql = 'SELECT id FROM Member WHERE email = ?';
  dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);
  $sql = 'SELECT HR.id AS healthID, weight, date, time, water, E.exerciseType, E.calPerMin, startTime, endTime FROM healthRecord HR INNER JOIN exercise E ON HR.exerciseID = E.id WHERE memberID = ?';
  $healthList = dataGetResultSql($sql, $pdo, [$memberID], ['healthID','weight','date','time','water','exerciseType','calPerMin','startTime','endTime']);
  renderFixedButton('../pages/form_health.php', '../asset/image/record.png');

  echo "<h2 style='text-align: center; font-size:48px;'>Health Record</h2>";

  if (count($healthList) !== 0) {
    foreach ($healthList as $health) {
    $duration = strtotime($health['endTime']) - strtotime($health['startTime']);
    $durationDecimal = $duration / 60; // Convert seconds to mins
    $totalCal = $durationDecimal * $health['calPerMin'];

    renderTable($health['healthID'], $health['date'] . '&nbsp&nbsp&nbsp' . $health['time'], ['Weight' => $health['weight'], 'Water Intake' => $health['water'], 'Exercise' => $health['exerciseType'], 'Duration' => gmdate("H:i", $duration), 'Calories Burnt' => $totalCal] ,'../server/deleteRecord.php?healthID');
    }
} else {
    echo 'no results lol';
}
  ?>

  <?php
  renderFooter();
  ?>

</body>

</html>