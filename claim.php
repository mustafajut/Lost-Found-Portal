<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
  header("Location: index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Claim</title>
</head>

<body>
    <?php require 'nav.php'; ?>
    <div class="container" style="margin-top: 100px;">
        <div class="box form-box">

            <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $cname = $_POST['cname'];
            $ccontact = $_POST['ccontact']; 
            $lostitemname = $_POST['lostitemname'];
            $lostitemdate = $_POST['lostitemdate'];
            $lostitemlocation = $_POST['lostitemlocation'];
            $lostitemdesc = $_POST['lostitemdesc'];
            $proofimage = $_POST['proofimage'];
            $additioninfo = $_POST['additioninfo'];

            mysqli_query($con,"INSERT INTO lostclaim(cname,ccontact,lostitemname,lostitemdate,lostitemlocation,lostitemdesc,proofimage, additioninfo)           
 VALUES('$cname','$ccontact','$lostitemname','$lostitemdate','$lostitemlocation','$lostitemdesc','$proofimage','$additioninfo')") or die("Error Occurred");

            echo "<div class='message'>
                      <p>Form Submitted successfully!</p>
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Go to Home page </button></a>";
         

         }
        else {
            ?>
            <header>Claim Item</header>

            <div class="container" style="margin-top: 80px;">
                <div class="box form-box">
                    <form action="" method="post">
                        <div class="field input">
                            <label for="cname">Claimant's Name</label>
                            <input type="text" id="cname" name="cname" placeholder="Enter Your Name.." required>
                        </div>
                        <div class="field input">
                            <label for="ccontact">Contact Information</label>
                            <input type="tel" id="ccontact" name="ccontact" placeholder="Enter Your Contact Number.."
                                required>
                        </div>
                        <div class="field input">
                            <label for="lname">Item Name</label>
                            <input type="text" id="lname" name="lostitemname" placeholder="Enter Item Name.." required>
                        </div>
                        <div class="field input">
                            <label for="ldate">Date</label>
                            <input type="date" id="ldate" name="lostitemdate" required>
                        </div>
                        <div class="field input">
                            <label for="llocation">Location</label>
                            <input type="text" id="llocation" name="lostitemlocation" placeholder="Enter Location.."
                                required>
                        </div>
                        <div class="field input">
                            <label for="ldescription">Item Description</label>
                            <textarea id="ldescription" name="lostitemdesc"
                                placeholder="Write Brief Description of Item.." style="height:200px"
                                required></textarea>
                        </div>
                        <div class="field input">
                            <label for="limage">Proof Image</label>
                            <input type="file" id="limage" name="proofimage">
                        </div>
                        <div class="field input">
                            <label for="additionalinfo">Additional Information</label>
                            <textarea id="additionalinfo" name="additioninfo"
                                placeholder="Any additional information you'd like to provide.."
                                style="height:200px"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="btn" name="submit" value="Claim">
                        </div>
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
</body>

</html>