<?php
include_once __DIR__ . '/Buttons.php';
function renderTable($id, $title, $content, $deleteLink)
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

function renderAdminTable($id, $title, $content, $deleteLink)
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
        echo "<td><?php $value[adminConsultationID]  ?></td>";
    }
    echo "<td> ";renderSmallButton("$deleteLink=$id", '', 'Remove Record', 'button'); echo "</td>";
    echo "      </tr>
        </table>
        <div style='display:flex; justify-content:end; padding: 10px;'>";

    

    echo "</div></div>";
}
?>

<style>
    .container_parent {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 10px;
        max-width: 1400px;
        margin-inline: auto;
        /* Stack content vertically */
    }

    tr,
    td,
    th,
    table {
        border: 1px solid black;
        border-collapse: collapse;
        width:100%;
    }

    td,
    th {
        padding: 7.5px;
        text-align: left;
    }
    
    table{
        table-layout: fixed;
    }
</style>