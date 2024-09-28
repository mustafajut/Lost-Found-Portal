<?php
session_start();
$_SESSION['isLoggedIn'] = false;
// Check if the user is already logged in
//    if(isset($_SESSION['valid'])){
//        header("Location: home.php");
//        exit; // Stop script execution after redirecting
//    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>

<body>

    <?php
    include 'nav.php';
    ?>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("select error");
                // --  AND Password='$password' ") or die("Select Error");
                // $row = mysqli_fetch_assoc($result);

                // if (is_array($row) && !empty($row)) {
                $row = mysqli_fetch_assoc($result);

                if ($row && password_verify($password, $row['Password'])) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['Phone'] = $row['Phone'];
                    $_SESSION['id'] = $row['Id'];
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['type'] = $row["type"];
                    $_SESSION['user_signed_in'] = true;
                    // header("Location: home.php");
                    if ($row["type"] == "admin") {
                        header("location: ./admin/index.php");
                    } else {
                        header("location: home.php ");
                    }
                    // exit; // Stop script execution after redirecting

                } else {
                    echo "<div class='message'>
                            <p  style='color:red'>Wrong Username or Password</p>
                            <h5>Try Again</h5>
                            </div> <br><br>";
                            
                    // echo "<a href='index.php'><button class='btn'>Go Back</button>";
                }
            }
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required placeholder="Enter Your Email">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required placeholder="********">
                </div>
                <div>
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                <div class="field">
                    <input type="submit" class="form-btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>