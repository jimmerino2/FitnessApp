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
    include_once __DIR__ . '/../components/ConsultantItem.php';
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    renderHeader($conn);

    // Selecting all nutritionists
    $sql = 'SELECT * FROM Nutritionist';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Map data to array
    $nutritionists = [];
    foreach ($results as $row) {
        $nutritionists[] = [
            'nutritionistName' => $row['nutritionistName'],
            'nutritonistDesc' => $row['nutritonistDesc'],
            'nutritionistContact' => $row['nutritionistContact'],
            'studyRecord' => $row['studyRecord'],
        ];
    }
    ?>

    <div style="width: 80%">
        <?php
        // Showing nutritionists on page
        $total = 1;
        foreach ($nutritionists as $nutritionist) {
            renderNutritionistDropdownBox('../asset/image/nutritionist' . $total . '.png', $nutritionist['nutritionistName'], $nutritionist['studyRecord'], $nutritionist['nutritionistContact'], $nutritionist['nutritonistDesc'], 'button' . $total, 'popup1' . $total);
            $total++;
        }
        ?>
    </div>
</body>

</html>