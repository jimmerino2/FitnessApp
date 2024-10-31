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
  include_once __DIR__ . '/../layout/footer.php';

  renderHeader($conn);
  ?>

  <table style="width:95%">
    <tr>
      <th>Date: </th>
      <th>Time: </th>
    </tr>
    <tr>
      <td>Weight: </td>
      <td>Water Intake: </td>
      <td>Exercise Type: </td>
      <td>Duration: </td>
      <td>Calories Burnt: </td>
    </tr>
    <tr>
      <td>j</td>
      <td>i</td>
      <td>m</td>
      <td>m</td>
      <td>y</td>
    </tr>
  </table>
  <a class="fixedButton" href="form_enrollment.php" alt="Add Record">
    <div class="roundedFixedBtn"><i class="fa fa-phone"></i></div>
  </a>
  <?php
  renderFooter();
  ?>
</body>

</html>