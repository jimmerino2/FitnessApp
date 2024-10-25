<?php

include 'FormItem.php';
function renderFormRegister()
{
    echo "
    <form action='test_page.php' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem'>

    <div style='justify-items:center;'>
    <h2>Register Form</h2>";
    renderFormItemText("Name", "name", "Enter Your Name");
    renderFormItemText("Contact Number", "contact", "0123456789");
    renderFormItemText("Email", "email", "xxx@gmail.com");
    renderFormItemText("Set Password", "pass", "Enter Password");
    renderFormItemText("Confirm Password", "pass_conf", "Confirm Password");
    renderFormItemRadio("Gender", "gender", ['m' => "Male", 'f' => "Female", 'n' => "Prefer not to say"]);
    renderFormitemCalendar("Date of Birth", 'birthday');
    echo "
    <button type='submit' style='margin:10px; padding: 8px 15px;'>Register</button>
    <button onclick='' style='margin:10px; padding: 8px 15px;'>Cancel</button>
    </div>
    
    </form>
    ";
}


