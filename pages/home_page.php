<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         include 'C:\xampp\htdocs\FitnessWeb\components\Buttons.php';
         include 'C:\xampp\htdocs\FitnessWeb\layout\home\home_layout.php';
        
         renderAdvertise();
         echo "
         <h1 style=\"font-size: 30px; text-align: center;\">Our Classes</h1>
         ";
         renderClassBoxFlex();

         renderNutBox('','Name','Hi im a nutritionist');

    ?>
</body>
</html>