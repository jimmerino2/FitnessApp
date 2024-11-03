<?php
function renderNutritionistDropdownBox($image, $name, $study, $contact, $desc, $buttonId, $popupID)
{
    echo "<div id='container{$buttonId}'>
    <div class='container_parent'>
        <img src='" . htmlspecialchars($image) . "' style='width: 160px; height:160px;'>
        <div class='container_child'>
            <h2>$name</h1>
            <h3 style;'>$desc</h4>
            <h3 style;>RM20</h4>
            <div style='position: absolute; bottom: 0; right: 0;'>
                <button id='$buttonId' onclick='toggleForm(\"$buttonId\", \"$popupID\")'>Show details</button>
            </div>
        </div>
        <div id='$popupID' class='popup'>
            <div class='container_child'>
                <h3>Academic Record</h3>
                <h4>$study</h4>
                <br>
                <h3>Contact</h3>
                <h4>$contact</h4>
                <br>
            </div>
            <div style='position: absolute; bottom: 5%; right: 1.5%;'>
                <div style='position: relative; width: 100%; height: 100%; margin: 20px;'> ";

    // Check for login before scheduling
    if (isset($_SESSION['userinput']) && $_SESSION['userinput']) {
        echo
            "
            <a href='../pages/form_consultation.php?consultantContact=" . urlencode($contact) . "'>
                <button>Request to Meet</button>
            </a>
            ";
    } else {
        echo "
            <a href='../pages/form_login.php'>
                <button>Request to Meet</button>
            </a>
            ";
    }
    echo "
                </div></div>
            </div>
        </div>
    </div>
";

}

function renderNutritionistPreview($image, $name, $study)
{
    echo "<div class='container_parent preview'>
    <img src='" . htmlspecialchars($image) . "' style='width: 160px;'>
    <div class='container_child'>
        <h2 style='margin: 6px 4px;'>$name</h1>
        <h3 style='margin: 6px 4px;'>$study</h2>
        <h4 style='margin: 6px 4px;'>RM20</h4>
    </div>
</div>";
}
?>

<style>
    .container_parent {
        display: flex;
        background-color: white;
        border: solid 1px black;
        position: relative;
        padding: 15px;
        margin: 20px;
        width: 35vw;
        border: none;
        border-radius: 2.5%;
        /* Stack content vertically */
    }

    .container_child {
        width: 100%;
        position: relative;
        margin: 10px;
        display: flex;
        flex-direction: column;
    }

    .popup {
        top: 175px;
        left: 0%;
        width: 100%;
        border-radius: 2.5%;
        background-color: #B9E5E8;
        position: absolute;
        display: none;
        margin-top: 10px;
        z-index: 2;
    }

    .preview {
        background-color: #7AB2D3;
    }

    button {
        padding: 8px 20px;
        font-weight: bold;
        margin: 5px;
        cursor: pointer;
        border: none;
        border-radius: 15%;
        font-size: 15px;
        background-color: #7AB2D3;
    }

    .popup.show {
        display: block;
        /* Displayed when active */
    }

    button {
        padding: 6px;
    }

    h1,
    h2,
    h3,
    h4 {
        margin: 5px 0px;
    }
</style>

<script>
    function toggleForm(buttonId, popupId) {
        var popup = document.getElementById(popupId);
        var button = document.getElementById(buttonId);
        var container = document.getElementById('container' + buttonId);

        if (popup.style.display === 'none' || popup.style.display === '') {
            popup.style.display = 'block'; // Show the popup
            popup.style.opacity = '1'; // Ensure opacity is set to 1
            container.style.height = '400px'; // Set container height when popup is visible
            button.innerText = "Hide Details"; // Change button text
        } else {
            popup.style.display = 'none'; // Hide the popup
            popup.style.opacity = '0'; // Optional: set opacity to 0 when hiding
            container.style.height = 'auto'; // Reset container height when popup is hidden
            button.innerText = "Show Details"; // Change button text back
        }
    }
</script>