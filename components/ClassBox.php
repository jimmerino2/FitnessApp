<?php
include_once __DIR__ . '/Buttons.php';

function renderClassBox($text1, $text2)
{
    echo "
    <div style=\"flex: 1; border: 2px solid black; background-color: lightgreen; max-width: 20%; margin:20px; text-align: center;\">
    <h1 style=\"font-size: 30px\">$text1</h1><br>
    <p style=\"font-size:20px\">$text2</p>";

    renderMediumButton('', '', 'Class', '');
    echo "
    </div>
    ";
}

function renderNutBox($image, $name, $description)
{
    echo "
        <div class=\"container\" style=\"padding: 10px; border: 1px solid black; display: flex; justify-content: center; margin:10px 300px;\">
        <img src=\"$image\" style=\"border: 1px solid black; width: 25%; aspect-ratio: 1/1;\">
        <div class=\"nutriDesc\" style=\"flex:1; border: 1px solid black; margin: 10px\">
            <h2>$name</h2>
            <p>$description</p>
        </div>
        ";
    echo "<div style=\"display: flex; flex-direction: column; justify-content: flex-end;\">";
    renderSmallButton('', '', 'Next', '');
    echo "
    </div></div>";
}