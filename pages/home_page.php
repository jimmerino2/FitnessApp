<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin:0px;">
    <?php
    include __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    include __DIR__ . '/../layout/header.php';
    include __DIR__ . '/../components/Buttons.php';
    include __DIR__ . '/../layout/home/home_layout.php';
    renderHeader($conn);
    renderAdvertise();
    echo "
         <h1 style=\"font-size: 30px; text-align: center;\">Our Classes</h1>
         ";
    renderClassBoxFlex();
    renderNutBox('', 'Name', 'Hi im a nutritionist');
    renderClassBoxFlex();
    ?>
</body>

</html>