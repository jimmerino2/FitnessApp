<?php
function renderFormItemText($title = "Title", $name = "Name", $placeholder = "Placeholder", $value)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <input type='text' name='$name' placeholder='$placeholder' class='form-input' value='$value' required>
    </div>
    ";
}
function renderFormItemTextarea($title = "Title", $name = "Name", $placeholder = "Placeholder", $value)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <textarea name='$name' placeholder='$placeholder' class='form-input'>$value</textarea>
    </div>
    ";
}

function renderFormItemRadio($title = "Title", $name, $values)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
    ";
    foreach ($values as $value => $label) {
        echo "<input type='radio' name='$name' value='$value' class='form-radio' required checked>$label<br>";
    }
    echo "</div>";
}

function renderFormItemSelect($title, $name, $values, $currentValue)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
            <select name='$name'>
    ";
    foreach ($values as $value => $label) {
        $selected = ($value == $currentValue) ? 'selected' : '';
        echo "
         <option value='$value' $selected>$label</option>
        ";
    }
    echo "</select></div>";
}

function renderFormItemCalendar($title = "Title", $name, $min, $max, $value)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <input type='date' name='$name' min='$min' max='$max' value= '$value'class='form-input' required>
    </div>
    ";
}
function renderFormItemTime($title = "Title", $name, $min = '', $max = '', $value = '', $isReq = false)
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>";

    $required = $isReq ? 'required' : '';

    echo "<input type='time' name='$name' min='$min' max='$max' value='$value' class='form-input' $required>";
    echo "</div>";
}


function renderFormItemEmail($title = "Title", $name = "Name", $placeholder = "Placeholder")
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <input type='email' name='$name' placeholder='$placeholder' class='form-input' required>
    </div>
    ";
}

function renderFormItemPassword($title = "Title", $name = "Name", $placeholder = "Placeholder")
{
    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <input type='password' name='$name' placeholder='$placeholder' class='form-input' required>
    </div>
    ";
}

function renderFormItemNumber($title = "Title", $name = "Name", $isReq, $min, $max)
{
    $required = $isReq ? 'required' : '';

    echo "
    <div class='form-item'>
        <h3 class='form-title'>$title</h3>
        <input type='number' name='$name' min=$min max=$max class='form-input' $required>
    </div>
    ";
}

?>

<style>
    .form-item {
        padding: 5px;
        width: 70%;
        margin-bottom: 15px;
    }

    .form-title {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .form-input,
    select {
        height: 25px;
        width: 100%;
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-radio {
        width: auto;
        margin: 0px 20px 10px 0px;
    }

    select {
        height: auto;
    }

    textarea {
        max-width: 100%;
    }
</style>