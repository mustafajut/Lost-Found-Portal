<!-- 
<?php
session_start();
include("php/config.php");

?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <title>L&F Portal</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h2>Lost & Found</h2>

        </div>
        <div class="menu">
            <span><img src="menu.png" alt="menu"></span>
        </div>
        <div class="nav-links">
            <ul>
                <li><a class="actives" href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="testlostcard.php">Lost</a></li>
                <li><a href="Foundpagecard.php">Found</a></li>
                <li><a href="contact.php">Contact US</a></li>
                <li><a href="index.php" class="lgbtn">Login</a></li>

                <!-- <p class="close">X</p> -->
                <span class="close"><img src="close.png" alt="X"></span>
            </ul>
        </div>



        <?php
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");
    
            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Phone = $result['Phone'];
                $res_id = $result['Id'];
            }
            echo '<a class="edit" href="edit.php"><img src="avatar.png" alt="Profile" style="width:40px; border-radius:50%; margin-right: -70px;"></a>';
            echo '<a class="btn" href="php/logout.php">Logout</a>';
        } else {
            echo '<a class="btn" href="index.php">Login</a>';
        }
        ?>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="navgsap.js"></script>
</body>

</html>