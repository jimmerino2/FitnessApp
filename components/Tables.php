<?php
include_once __DIR__ . '/Buttons.php';
function renderTableConsultationUser($id, $title, $content, $deleteLink)
{
    echo "
    <div class='container_parent'>
        <h2>$title</h2>
        <table>
            <tr>";

    foreach ($content as $header => $value) {
        echo "<th>$header</th>";
    }

    echo "      </tr>
            <tr>";

    foreach ($content as $header => $value) {
        echo "<td>$value</td>";
    }

    echo "      </tr>
        </table>
        <div style='display:flex; justify-content:end; padding: 10px;'>";

    renderSmallButton("$deleteLink=$id", '', 'Remove Record', 'button');

    echo "</div></div>";
}
?>

<style>
    .container_parent {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 10px;
        margin: 0px 20px;
        /* Stack content vertically */
    }

    tr,
    td,
    th,
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 7.5px;
        text-align: left;
    }
</style>