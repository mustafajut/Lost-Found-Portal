<?php
session_start();
// Include the database configuration file
include("php/config.php");
if (!isset($_SESSION['valid'])) {
  header("Location: index.php");
}
else
// Define the number of results per page
$results_per_page = 6;

// Get the current page number from the URL, default is 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$start_from = ($page - 1) * $results_per_page;

// Fetch data from the database with limit and offset
$resulte = mysqli_query($con, "SELECT * FROM reportfound LIMIT $start_from, $results_per_page");

// Fetch the total number of records
$total_results = mysqli_query($con, "SELECT COUNT(*) AS total FROM reportfound");
$total_rows = mysqli_fetch_assoc($total_results)['total'];

// Calculate total pages
$total_pages = ceil($total_rows / $results_per_page);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Found Items</title>
    <style>
        h3 {
            color: #e89002;
            font-family: calibri;
            font-size: 2.5rem;
            text-align: center;
            margin-top: 5%;
        }

        /* Style for card container */
        #more {
            display: none;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(3, minmax(33%, 1fr));
            gap: 25px;
        }

        /* Style for individual card */
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style for card image */
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Style for card content */
        .card-content {
            padding: 20px;
        }

        /* Style for card title */
        .card-content h2 {
            margin-top: 0;
        }

        /* Style for card details */
        .card-content p {
            margin: 5px 0;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: rgba(0, 136, 169, 1);
            border-radius: 20px;
            border: none;
            font-weight: bold;
        }

        .btn:hover {
            background-color: black;
            color: rgb(0, 218, 196);
        }

        @media screen and (max-width: 768px) {
            h3 {
                color: #e89002;
                font-family: calibri;
                font-size: 2rem;
                text-align: center;
                margin-top: 5%;
            }

            .card-container {
                margin-top: 300px;
                display: grid;
                grid-template-columns: repeat(1, minmax(90%, 1fr));
                gap: 25px;
            }
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 20px;
            text-decoration: none;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #000;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination .active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <?php require 'nav.php'; ?>
    <h3>Found Items</h3>
    <a href="Reportfound.php"><button class="btn" style="margin-top: 2%;">Report Found Items</button></a>
    <div class="container">
        <!-- style="margin-top: 100px;" -->
        <div class="card-container">
            <?php
            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($resulte)) {
                $id = $row['fitemId'];
            ?>
                <div class="card">
                    <!-- <img src="<?php echo $row['fitemimage']; ?>" alt="Item Image"> -->
                    <div class="card-content">
                        <h2><?php echo $row['fitemName']; ?></h2>
                        <p>Category: <?php echo $row['category_name']; ?></p>
                        <p>Found Date: <?php echo $row['FDate']; ?></p>
                        <p>Found Location: <?php echo $row['fLocation']; ?></p>
                        <p>Found Time: <?php echo $row['fTime']; ?></p>
                        <span id="dots-<?php echo $id; ?>">...</span><span id="more-<?php echo $id; ?>" style="display:none;">
                            <p>Contact: <?php echo $row['Contact']; ?></p>
                            <p>Description: <?php echo $row['fItemDescription']; ?></p>
                            <a href="claim.php"><button class="btn">Claim</button></a>
                        </span>
                        <button onclick="myFunction(<?php echo $id; ?>)" id="myBtn-<?php echo $id; ?>" class="btn">More Details</button>

                    </div>
                </div>
            <?php
            }
            // Free result set
            mysqli_free_result($resulte);
            ?>
        </div>
    </div>
    <br>
    <!-- Pagination -->
    <div class="pagination" style="margin-top: 20px;">
        <?php if ($page > 1) { ?>
            <a href="Foundpagecard.php?page=<?php echo $page - 1; ?>" class="btn">Previous</a>
        <?php } else { ?>
            <span class="btn" style="cursor: not-allowed;">Previous</span>
        <?php } ?>

        <?php
        // Display the page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo '<span class="btn active">' . $i . '</span>';
            } else {
                echo '<a href="Foundpagecard.php?page=' . $i . '" class="btn">' . $i . '</a>';
            }
        }
        ?>

        <?php if ($page < $total_pages) { ?>
            <a href="Foundpagecard.php?page=<?php echo $page + 1; ?>" class="btn">Next</a>
        <?php } else { ?>
            <span class="btn" style="cursor: not-allowed;">Next</span>
        <?php } ?>
    </div><br><br><br>
    <?php
    include 'footer.php';
    ?>
</body>
<script>
    function myFunction(id) {
        var dots = document.getElementById("dots-" + id);
        var moreText = document.getElementById("more-" + id);
        var btnText = document.getElementById("myBtn-" + id);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "More Details";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Less Details";
            moreText.style.display = "inline";
        }
    }
</script>

</html>