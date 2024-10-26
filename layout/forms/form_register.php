<?php
include __DIR__ . '/../../components/forms/FormItem.php';


function renderFormRegister()
{
    echo "
    <form name='registerForm' action='#' method='POST' onsubmit='return validateFormRegister();' style='border: 1px solid black; padding: 15px; width: 40rem'>
        <div style='justify-items:center;'>
            <h2>Register Form</h2>";

    renderFormItemText("Name", "name", "Enter Your Name");
    renderFormItemText("Contact Number", "contact", "0123456789");
    renderFormItemEmail("Email", "email", "xxx@gmail.com");
    renderFormItemPassword("Set Password", "pass", "Enter Password");
    renderFormItemPassword("Confirm Password", "pass_conf", "Confirm Password");
    renderFormItemRadio("Gender", "gender", ['m' => "Male", 'f' => "Female", 'n' => "Prefer not to say"]);
    renderFormitemCalendar("Date of Birth", 'birthday');

    echo "
            <button type='submit' style='margin:10px; padding: 8px 15px;'>Register</button>
            <button type='button' onclick='' style='margin:10px; padding: 8px 15px;'>Cancel</button>
        </div>
    </form>
    ";
}
?>

<script>
    function validateFormRegister() {
        // Get form elements
        var name = document.forms["registerForm"]["name"].value;
        var contact = document.forms["registerForm"]["contact"].value;
        var email = document.forms["registerForm"]["email"].value;
        var pass = document.forms["registerForm"]["pass"].value;
        var pass_conf = document.forms["registerForm"]["pass_conf"].value;
        var gender = document.forms["registerForm"]["gender"].value;
        var birthday = document.forms["registerForm"]["birthday"].value;

        // All fields must be filled in
        if (name === "" || contact === "" || email === "" || pass === "" || pass_conf === "" || gender === "" || birthday === "") {
            alert("All fields must be filled out");
            return false;
        }

        // Passwords match
        if (pass !== pass_conf) {
            alert("Passwords do not match!");
            return false;
        }

        // Check Contact Number
        var contactPattern = /^\d{10}$/;
        if (!contactPattern.test(contact)) {
            alert("Contact number must be 10 digits.");
            return false;
        }

        return true;
    }
</script>