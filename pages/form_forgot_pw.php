<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <form id='forgotForm' name='forgotForm' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem;'>
        <div style='justify-items:center;'>
            <h2>Forgot Password</h2>

            <?php
            include_once __DIR__ . '/../components/FormItem.php';
            include_once __DIR__ . '/../components/Buttons.php';
            renderFormItemText('Email Address', 'email', 'Enter email');
            echo '<br>(Better verification system soon)<br>';
            renderFormItemPassword('New Password', 'pass', 'Enter password');
            renderFormItemPassword('Confirm Password', 'pass_conf', 'Confirm password');

            echo "<div style='padding: 20px;'>";
            renderSmallButton('', '', 'Confirm', 'submit');
            renderSmallButton('', '', 'Reset', 'reset');
            renderSmallButton('form_login.php', '', 'Log In Instead', 'button');
            echo "</div>";
            ?>
        </div>
    </form>
</body>

</html>

<?php
include_once __DIR__ . '/../server/connectDB.php';
$conn->select_db('fitnessapp');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_conf = $_POST['pass_conf'];
    $errMsg = '';
    $error = '';

    // Check if email exists
    $sql = "SELECT email FROM member WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $sql);
    $stmt_check->bind_param('s', $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    // If email exists
    if (!($stmt_check->num_rows > 0)) {
        echo '<script>alert("No such account exists.")</script>';
        $error = true;
    }

    // If password length >= 10
    if (strlen($pass) < 10) {
        $errMsg .= "\nPassword must have 10 or more characters";
        $error = true;
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    }

    // Check password and check password are same
    if ($pass !== $pass_check) {
        $errMsg .= "\nPasswords do not match.";
        $error = true;
    }

    // Run if no error
    if (!$err) {
        $sql = "UPDATE member SET memberPassword = ? WHERE email = ?;";
        $stmt_check = mysqli_prepare($conn, $sql);
        $stmt_check->bind_param('ss', $hashed_pass, $email);
        $stmt_check->execute();
        header('Location:home_page.php');
        exit();
    }
}
?>