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
    $conn->select_db('fitnessapp');
    renderHeader($conn);
    ?>
</body>

</html>