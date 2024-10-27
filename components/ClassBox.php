<?php
include_once __DIR__ . '/Buttons.php';

function renderClassBox($text1, $text2)
{
    echo "
    <div style=\"flex: 1; border: 2px solid black; background-color: lightgreen; max-width: 20%; margin:20px; text-align: center;\">
    <h1 style=\"font-size: 30px\">$text1</h1><br>
    <p style=\"font-size:20px\">$text2</p>";

    renderHomeMediumButton('', '', 'Class', '');
    echo "
    </div>
    ";
}