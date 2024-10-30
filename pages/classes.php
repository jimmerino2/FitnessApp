<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title{
            background:linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.3)), url("../asset/image/classTitleImg.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
        .paragraph{
            text-align: center;
            background-color: #fcfaef;
            }
            .paragraph h1{
            margin-top: 20px;
            font-size: 60px;
            }
            .paragraph p{
            font-size: 24px;
            }
        .enrollmentRecord{
            text-align: center;
            background-color: #fcfaef;
            font-size: 24px;
        }
    </style>
</head>

<body style="margin:0px;">
    <?php
    session_start();
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../components/HomepageItem.php';
    renderHeader($conn);
    ?>
    <div class = "title">
         <h1 style="font-size: 30px; text-align: center; color: darkblue;">Our Classes</h1>
            <?php
            renderClassBoxFlex();
            ?>
    </div>
    <div class="paragraph">
         <h1>Class 1</h1>
         <p>xxxxxxxxxxxxxxxxxxxxxxx</p>
         <p>xxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            
    </div>
    <div class="paragraph">
        <h1>Class 2</h1>
        <p>xxxxxxxxxxxxxxxxxxxxxxx</p>
        <p>xxxxxxxxxxxxxxxxxxxxxxxxxx</p>
    </div>
    <div class="enrollmentRecord">
        <?php
            

            if (isset($_SESSION['userinput']) && $_SESSION['userinput']) {
                // Fetch member name and other details if needed
                $sql = 'SELECT memberName, ID FROM member WHERE email = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $_SESSION['userinput']);
                $stmt->execute();
                $stmt->bind_result($username, $memberID);
                $stmt->fetch();
                $stmt->close();
            
                // Check if a valid member ID was returned
                if ($memberID) {
                    // Display enrollments for the logged-in member
                    $sql = "SELECT C.className, E.startDate, E.endDate 
                            FROM Enrollment E 
                            INNER JOIN Classes C ON E.classID = C.ID 
                            WHERE E.memberID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i', $memberID);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "Class: " . $row["className"] . " - Start Date: " . $row["startDate"] . " - End Date: " . $row["endDate"] . "<br>";
                        }
                    } else {
                        echo "No enrollments found.";
                    }
                    $stmt->close();
                } else {
                    echo "Member not found.";
                }
            } else {
                
            }
            
        ?>
    </div>
</body>

</html>