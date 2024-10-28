<?php
function renderNutritionistDropdownBox($image, $name, $study, $contact, $desc, $buttonId, $popupID)
{
    echo "
    <div class='container_parent'>
        <img src='" . htmlspecialchars($image) . "' style='width: 160px;'>
        <div class='container_child'>
            <h1 style='margin: 4px 0px;'>$name</h1>
            <h2 style='margin: 4px 0px;'>$study</h2>
            <h4 style='margin: 8px 0px;'>$contact</h4>
            <h4 style='margin: 8px 0px;'>RM20</h4>
            <div style='position: absolute; bottom: 0; right: 0;'>
                <button id='$buttonId' onclick='toggleForm(\"$buttonId\", \"$popupID\")'>Show details</button>
            </div>
        </div>
        <div id='$popupID' class='popup' style='display: none;'>
            <div class='container_child'>
                <p style='margin: 8px 0px;'>$desc</p>
            </div>
            <div style='position: absolute; bottom: 5%; right: 1.5%;'>
                <div style='position: relative; width: 100%; height: 100%; background-color:blue;'> ";
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
                </div>
            </div>
        </div>
    </div>
";

}

function renderNutritionistPreview($image, $name, $study)
{
    echo "<div class='container_parent'>
    <img src='" . htmlspecialchars($image) . "' style='width: 160px;'>
    <div class='container_child'>
        <h1 style='margin: 6px 4px;'>$name</h1>
        <h3 style='margin: 6px 4px;'>$study</h2>
        <h3 style='margin: 6px 4px;'>RM20</h4>
    </div>
</div>";
}
?>

<style>
    .container_parent {
        display: flex;
        border: 1px solid black;
        position: relative;
        padding: 10px;
        margin: 20px;
        /* Stack content vertically */
    }

    .container_child {
        width: 100%;
        position: relative;
        margin: 0px 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .popup {
        width: 100%;
        border: solid 1px black;
        padding: 10px;
        display: none;
        /* Hide by default */
        margin-top: 10px;
    }

    .popup.show {
        display: block;
        /* Displayed when active */
    }

    button {
        padding: 6px;
    }
</style>

<script>
    function toggleForm(buttonId, popupId) {
        var popup = document.getElementById(popupId);
        var button = document.getElementById(buttonId);

        if (popup.style.display === 'none' || popup.style.display === '') {
            popup.style.display = 'block';
            button.innerText = "Hide Details";
        } else {
            popup.style.display = 'none';
            button.innerText = "Show Details";
        }
    }
</script>