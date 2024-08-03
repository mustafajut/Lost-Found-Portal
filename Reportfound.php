<?php
include("php/config.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Report Found</title>

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
                $fitemName = $_POST['fitemName'];
                $fiCategory = $_POST['fiCategory']; 
                $FDate = $_POST['FDate'];
                $fLocation = $_POST['fLocation'];
                $fTime = $_POST['fTime'];
                $fItemDescription = $_POST['fItemDescription'];
                $Contact = $_POST['Contact'];
                //$fitemimage = $_POST['fitemimage'];

                // Fetch categoryId based on category name
                $categoryQuery = "SELECT category_id FROM category WHERE category_name = '$fiCategory'";
                $categoryResult = mysqli_query($con, $categoryQuery);
                if ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                    $categoryId = $categoryRow['category_id'];

                    // Insert data into reportfound table with the obtained categoryId
                    $query = "INSERT INTO reportfound (fitemName, category_name, FDate, fLocation, fTime, fItemDescription, Contact) VALUES ('$fitemName', '$fiCategory', '$FDate', '$fLocation', '$fTime', '$fItemDescription', '$Contact')";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        echo "<div class='message'>
                                <p>Form Submitted successfully!</p>
                              </div> <br>";
                        echo "<a href='Foundpagecard.php'><button class='btn'>Go to Found</button>";
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                } else {
                    echo "Error: Category not found";
                }
            } else {
            ?>
                <header>Report Found</header>
                <form action="" method="post" autocomplete="off">
                    <div class="field input">
                        <label for="fitemName">Item Name</label>
                        <input type="text" id="fitemName" name="fitemName" placeholder="Enter Item name.." required>
                        <span class="formerror"></span>
                    </div>

                    <div class="field input">
                        <label for="category">Category</label>
                        <select id="category" name="fiCategory" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php } ?>
                        </select>
                        <span class="formerror"></span>
                    </div>

                    <div class="field input">
                        <label for="FDate" required>Found Date</label>
                        <input type="date" id="FDate" name="FDate" required>
                    </div>
                    
                    <div class="field input">
                        <label for="fLocation">Found Location</label>
                        <input type="text" id="fLocation" name="fLocation" placeholder="Enter Found Location.." required maxlength="12">
                    </div>

                    <br>
                    <div class="field input">
                        <label for="fTime">Found Time</label>
                        <div style="display: inline-flex; align-items: center;">
                            <input type="radio" id="fmorning" name="fTime" value="Morning" checked required style="transform: scale(0.5); margin-right: 5px;">
                            <label for="fmorning" style="transform: scale(0.8); margin-right: 15px;">Morning</label>
                            <input type="radio" id="fafternoon" name="fTime" value="Afternoon" style="transform: scale(0.5); margin-right: 5px;">
                            <label for="fafternoon" style="transform: scale(0.8); margin-right: 15px;">Afternoon</label>
                            <input type="radio" id="fevening" name="fTime" value="Evening" style="transform: scale(0.5); margin-right:5px;">
                            <label for="fevening" style="transform: scale(0.8); margin-right: 5px;">Evening</label>
                        </div>
                    </div>
                    <br>

                    <div class="field input">
                        <label for="fItemDescription">Item Description</label>
                        <textarea id="fItemDescription" name="fItemDescription" placeholder="Write Brief Detail about item.." style="height:200px" required></textarea>
                    </div>
                    <div class="field input">
                        <label for="phone">Contact Information</label>
                        <input type="tel" id="phone" name="Contact" placeholder="0300-0000000" required maxlength="12" pattern="[0-9]{4}-[0-9]{7}">
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
