<?php
include_once __DIR__ . '/Buttons.php';
function renderTable($id, $title, $content, $deleteLink, $updateLink = null)
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

    renderSmallButton("$deleteLink=$id", '', 'Remove', 'button', '#FF8080', 'black');

    if ($updateLink !== null) {
        renderSmallButton("$updateLink=$id", '', 'Update', 'button', '#7AB2D3', 'black');
        // Add some margin between buttons
        echo "<span style='margin-right: 10px;'></span>";
    }

    echo "</div></div>";
}
?>

<style>
    .container_parent {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 20px;
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
        width: 100%;
    }

    td,
    th {
        padding: 10px;
        text-align: left;
    }

    table {
        table-layout: fixed;
    }

    th {
        background-color: #B9E5E8;
    }
</style>