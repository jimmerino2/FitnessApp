<?php
function renderFormItemText($title = "Title", $name = "Name", $placeholder = "Placeholder")
{
    echo "
    <div style='padding: 5px; width: 70%'>
        <h3>$title</h3>
        <input type='text' name='$name' placeholder='$placeholder' style='height:20px; width: 100%'>
    </div>
    ";
}

function renderFormItemRadio($title = "Title", $name, $values)
{
    echo "
    <div style='padding: 5px; width: 70%'>
        <h3>$title</h3>
    ";
    foreach ($values as $value => $label) {
        echo "<input type='radio' name='$name' value='$value' style='width: auto; margin: 0px 20px 10px 0px'>$label<br>";
    }
    echo "</div>";
}

function renderFormItemCalendar($title = "Title", $name)
{
    echo "
    <div style='padding: 5px; width: 70%'>
        <h3>$title</h3>
        <input type='date' name='$name' style='width: 100%; height: 25px'>
    </div>
    ";
}