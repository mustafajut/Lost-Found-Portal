<?php
include("php/config.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="script.js"></script>
    <title>Report Lost</title>
</head>

<body>
    <?php require 'nav.php'; ?>
    <div class="container" style="margin-top: 100px;">
        <div class="box form-box">

            <?php
            // Fetch all category names from the category table
            $categoryQuery = "SELECT category_name FROM category";
            $categoryResult = mysqli_query($con, $categoryQuery);
            $categories = array();
            while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                $categories[] = $categoryRow['category_name'];
            }

            if (isset($_POST['submit'])) {
                $litemName = $_POST['litemName'];
                $liCategory = $_POST['category_name'];
                $LostDate = $_POST['LostDate'];
                $lLostLocation = $_POST['lLostLocation'];
                $lLostTime = $_POST['lLostTime'];
                $lItemDescription = $_POST['lItemDescription'];
                $Contact = $_POST['Contact'];
                // $categorylost = $_POST['category_name']; // Added missing semicolon here

                // Validate and process the file upload
                if (isset($_FILES["itemimage"]) && $_FILES["itemimage"]["error"] == 0) {
                    $itemimage = $_FILES["itemimage"]["name"]; //getting the image name from client machine
                    /* 
                        ###Set image name with current time###
                        $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
                        $randomName = "IMG_" . date("his") . "." . $imageFileType; 
                    */
                    $tempName = $_FILES["itemimage"]["tmp_name"]; //temporary file name of the file on the server.
                    $imageName = $itemimage; //set the the image name with current name
                    $targetDirectory = "upload/" . $imageName; //declaring the folder in which the image will be store
                    move_uploaded_file($tempName, $targetDirectory); //move the image in that folder
                }

                // Fetch categoryId based on category name
                $categoryQuery = "SELECT category_id FROM category WHERE category_name = '$liCategory'";
                $categoryResult = mysqli_query($con, $categoryQuery);
                if ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                    $categoryId = $categoryRow['category_id'];

                    // Insert data into reportlost table with the obtained categoryId
                    $query = "INSERT INTO reportlost (litemName, LostDate, lLostLocation, lLostTime, lItemDescription, Contact, itemimage, category_name) VALUES ('$litemName', '$LostDate', '$lLostLocation', '$lLostTime', '$lItemDescription', '$Contact', '$targetDirectory', '$liCategory')";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        echo "<div class='message'>
                            <p>Form submitted successfully!</p>
                        </div> <br>";
                        echo "<a href='testlostcard.php'><button class='btn'>Go to Lost</button>";
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                } else {
                    echo "Error: Category not found";
                }
            } else {
            ?>
                <header>Report Lost</header>
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="field input">
                        <label for="litemName">Item Name</label>
                        <input type="text" id="litemName" name="litemName" placeholder="Enter Item name.." required>
                        <span class="formerror"></span>
                    </div>

                    <div class="field input">
                        <label for="category">Category</label>
                        <select id="category" name="category_name" required style="    height: 60px;
    width: 100%;
    font-size: 1.3rem;
    padding: 0 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    color: gray;">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php } ?>
                        </select>
                        <span class="formerror"></span>
                    </div>

                    <div class="field input">
                        <label for="LostDate" required>Lost Date</label>
                        <input type="date" id="LostDate" name="LostDate" required>
                    </div>
                    <div class="field input">
                        <label for="lLostLocation">Lost Location</label>
                        <input type="text" id="lLostLocation" name="lLostLocation" placeholder="Enter Lost Location.." required maxlength="12">
                    </div>
                    <br>
                    <div class="field input">
                        <label for="lLostTime">Lost Time</label>
                        <div style="display: inline-flex; align-items: center;">
                            <input type="radio" id="lmorning" name="lLostTime" value="Morning" checked required style="transform: scale(0.5); margin-right: 5px;">
                            <label for="lmorning" style="transform: scale(0.8); margin-right: 15px;">Morning</label>
                            <input type="radio" id="lafternoon" name="lLostTime" value="Afternoon" style="transform: scale(0.5); margin-right: 5px;">
                            <label for="lafternoon" style="transform: scale(0.8); margin-right: 15px;">Afternoon</label>
                            <input type="radio" id="levening" name="lLostTime" value="Evening" style="transform: scale(0.5); margin-right:5px;">
                            <label for="levening" style="transform: scale(0.8); margin-right: 5px;">Evening</label>
                        </div>
                    </div>
                    <br>
                    <div class="field input">
                        <label for="lItemDescription">Item Description</label>
                        <textarea id="lItemDescription" name="lItemDescription" placeholder="Write Brief Detail about item.." style="height:200px" required ></textarea>
                    </div>
                    <div class="field input">
                        <label for="phone">Contact Information</label>
                        <input type="tel" id="phone" name="Contact" placeholder="0300-0000000" required maxlength="12" pattern="[0-9]{4}-[0-9]{7}">
                    </div>
                    <div class="field input">
                        <label for="itemimage">Select Image File:</label>
                        <input type="file" name="itemimage" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="form-btn" name="submit" value="Submit" required>
                    </div>
                </form>
        </div>
    <?php
            } ?>
    </div>
</body>

</html>
