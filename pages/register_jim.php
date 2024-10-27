<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function hideFormRegi() {
            document.getElementById('regiForm').style.display = 'none';
        }
    </script>
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <form id='regiForm' name='registerForm' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem;'>
        <div style='justify-items:center;'>
            <h2>Register Form</h2>

            <br><a href="login_jim.php">To Login</a>
            <br><a href="forgot_jim.php">To forgot</a>

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

            renderSmallButton('', '', 'Register', 'submit');
            renderSmallButton('#', 'hideFormRegi()', 'Cancel', 'button');
            ?>
        </div>
    </form>

</body>

</html>

<?php
include_once __DIR__ . '/../server/connectDB.php';
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

    // Check Contact Number
    if (!preg_match('/^\d{10}$/', $contact)) {
        $errMsg .= "Contact Number must have 10 numbers.";
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
        $insert_sql = "INSERT INTO member (memberName, memberContact, memberPassword, gender, email, DOB) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $insert_sql);
        $stmt_insert->bind_param('ssssss', $name, $contact, $hashed_pass, $gender, $email, $birthday);
        $stmt_insert->execute();

        if ($stmt_insert->affected_rows > 0) {
            header("Location: test_page_jim.php");
            exit();
        }
    } else {
        echo "<script>alert(" . json_encode(trim($errMsg)) . ");</script>";
    }

    $stmt_check->close();
    if (isset($stmt_insert)) {
        $stmt_insert->close();
    }
}
?>