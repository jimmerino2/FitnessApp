<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;">
    <?php
    include 'C:\xampp\htdocs\FitnessApp\layout\forms\form_register.php';

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div style='text-align: center;'>";
        echo "<h3>Form Submitted</h3>";
        echo "<p>Name: " . htmlspecialchars($_POST['name']) . "</p>";
        echo "<p>Contact: " . htmlspecialchars($_POST['contact']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p>Pass1: " . htmlspecialchars($_POST['pass']) . "</p>";
        echo "<p>Pass2: " . htmlspecialchars($_POST['pass_conf']) . "</p>";
        echo "<p>Gender: " . htmlspecialchars($_POST['gender']) . "</p>";
        echo "<p>Date of Birth: " . htmlspecialchars($_POST['birthday']) . "</p>";
        echo "</div>";
    } else {
        renderFormRegister();
    }
    ?>
</body>

</html>