<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <?php
    include_once __DIR__ . '/../layout/forms/form_register.php';
    renderFormRegister($conn);
    ?>
    <br><a href="login_jim.php">To Login</a>
    <br><a href="forgot_jim.php">To forgot</a>
</body>

</html>