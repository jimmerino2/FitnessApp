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
  include_once __DIR__ . '/../layout/title.php';
  include_once __DIR__ . '/../layout/footer.php';
  include_once __DIR__ . '/../components/SearchBar.php';

  renderHeader($conn);
  renderTitle('Health Record', 'Track your weight, water intake and other data to better understand your body', '../asset/image/record_health.png', '');
  echo '<br>';
  renderSearchBar('Search By Exercise');
  $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

  $sql = 'SELECT id FROM Member WHERE email = ?';
  dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

  $sql = 'SELECT HR.id AS healthID, weight, date, time, water, E.exerciseType, E.calPerMin, startTime, duration 
          FROM healthRecord HR INNER JOIN exercise E ON HR.exerciseID = E.id 
          WHERE memberID = ? AND E.exerciseType LIKE ?
          ORDER BY date desc, time desc';
  $healthList = dataGetResultSql($sql, $pdo, [$memberID, $search], ['healthID', 'weight', 'date', 'time', 'water', 'exerciseType', 'calPerMin', 'startTime', 'duration']);
  renderFixedButton('../pages/form_health.php', '../asset/image/plus.png');

  echo '<div style="min-height:400px; display: flex; align-items:center; justify-content:center; flex-direction: column;">';
  if (count($healthList) !== 0) {
    foreach ($healthList as $health) {
      renderTable($health['healthID'], $health['date'] . '&nbsp&nbsp&nbsp' . $health['time'], [
        'Weight' => $health['weight'] . 'kg',
        'Water Intake' => $health['water'] . 'ml',
        'Exercise' => $health['exerciseType'],
        'Duration' => $health['duration'] . 'min',
        'Calories Burned' => $health['duration'] * $health['calPerMin'] . ' cal'
      ], '../server/deleteRecord.php?healthID', '../pages/form_health_update.php?healthID');
    }

  } else {
    echo '<h1>No results found</h1>';
    echo '<h1>Add a record with the button at the bottom right of your screen.</h1>';
  }
  echo '</div>';
  ?>

  <?php
  renderFooter();
  ?>

</body>

</html>