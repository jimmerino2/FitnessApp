<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">
</head>

<body>
    <div class="form_container">
        <form id='regiForm' name='registerForm' method='POST'>
            <div style='justify-items:center;'>
                <h2 style="margin-bottom: 25px;">Register Form</h2>

                <div style="width: 70%;"><a href="form_login.php">Have an
                        account? Log in
                        instead.</a></div>

                <?php
                include_once __DIR__ . '/../components/FormItem.php';
                include_once __DIR__ . '/../components/Buttons.php';
                renderFormItemText("Name", "name", "Enter Your Name");
                renderFormItemText("Contact Number", "contact", "0123456789");
                renderFormItemEmail("Email", "email", "xxx@gmail.com");
                renderFormItemPassword("Set Password (10+ Characters)", "pass", "Enter Password");
                renderFormItemPassword("Confirm Password", "pass_conf", "Confirm Password");
                renderFormItemRadio("Gender", "gender", ['m' => "Male", 'f' => "Female"]);
                renderFormitemCalendar("Date of Birth", 'birthday');

                renderSmallButton('home_page.php', '', 'Back', 'button', '#FF8080', 'black');
                renderSmallButton('', '', 'Register', 'submit', '#1FAB89', 'black');
                ?>
            </div>
        </form>
    </div>

</body>

</html>

<?php
include_once __DIR__ . '/../server/connectDB.php';
include_once __DIR__ . '/../server/data.php';
$conn->select_db('fitnessapp');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errMsg = '';
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_check = $_POST['pass_conf'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $error = false;

    // Check Contact Number
    if (!preg_match('/^\d{10,11}$/', $contact)) {
        $errMsg .= "Contact Number must have 10 or 11 numbers.";
        $error = true;
    }

    // Check if email is unique
    $sql = "SELECT email FROM member WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $sql);
    $stmt_check->bind_param('s', $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    // Check password length >= 10
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

    // Insert if emails are unique
    if ($stmt_check->num_rows > 0) {
        $errMsg .= "\nEmail already exists.";
        $error = true;
    }

    if (!$error) {
        $sql = "INSERT INTO member (memberName, memberContact, memberPassword, gender, email, DOB) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = dataInsertSql($sql, $conn, [$name, $contact, $hashed_pass, $gender, $email, $birthday]);
        if ($stmt->affected_rows > 0) {
            echo '<meta http-equiv="refresh" content="0;url=form_login.php">';
        }
    } else {
        echo "<script>alert(" . json_encode(trim($errMsg)) . ");</script>";
    }

    $stmt_check->close();
    if (isset($stmt)) {
        $stmt->close();
    }
}
?>