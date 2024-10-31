<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title{
            background:linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.3)), url("../asset/image/classTitleImg.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            position: sticky;
            top:165.5px;
        }
        .paragraph{
            text-align: center;
            background-color: #fcfaef;
            }
            .paragraph h1{
            margin-top: 20px;
            font-size: 60px;
            }
            .paragraph p{
            font-size: 24px;
            }
        .enrollmentRecord{
            text-align: center;
            background-color: #fcfaef;
            font-size: 24px;
        }
    </style>
</head>

<body style="margin:0px;">
<body style="margin:0px;">
    <?php
    session_start();
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../components/HomepageItem.php';
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../components/HomepageItem.php';
    renderHeader($conn);
    renderFixedButton('../pages/record_enrollment.php', '../asset/image/record.png');
    ?>
    <div class = "title">
         <h1 style="font-size: 30px; text-align: center; color: darkblue;">Our Classes</h1>
            <?php
            renderClassBoxFlex();
            ?>
    </div>
    <div class="paragraph">
         <h1>Class 1</h1>
         <p>xxxxxxxxxxxxxxxxxxxxxxx</p>
         <p>xxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            
    </div>
    <div class="paragraph">
        <h1>Class 2</h1>
        <p>xxxxxxxxxxxxxxxxxxxxxxx</p>
        <p>xxxxxxxxxxxxxxxxxxxxxxxxxx</p>
    </div>
</body>

</html>