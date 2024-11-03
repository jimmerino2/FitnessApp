<?php
include_once __DIR__ . '/../components/Buttons.php';
function renderSearchBar($text)
{
    echo "<div class='searchBarContainer'>
    <form action='' method='GET' class='searchBar'>
        <input type='text' name='search' value='" . (isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '') . "' placeholder='$text'>
    ";
    renderSmallButton('', '', 'Search', 'submit', '#7AB2D3', '');
    echo "</form>
    </div>";
}
?>
<style>
    .searchBarContainer {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .searchBar input[type="text"] {
        padding: 8px;
        font-size: 16px;
        width: 600px;
    }
</style>