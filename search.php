<?php
include("php/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Search</title>
</head>

<body>



    <div class="conat">
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="text" placeholder="Search Here" name="search-box" id="search-box">
            <input type="submit" value="SEARCH" name="search" id="search">
        </form>
    </div>

    <div class="cont">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $searched = $_POST['search-box'];

            $sql = "select * from reportfound where match (fitemName) against ('$searched') AND `status`= 'true' ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $Item = $row['fitemName'];
                    $q_id = $row['fitemId'];


                    // Display the search result

                    echo '
                <div class="que">
                     
                     <h2>' . substr($Item, 0, 70) . '...<h2>
                     
                     <p>' . substr($desc, 0, 500) . '...</p>
                     <a class="bton" href="showQwA.php?qid=' . $q_id . '">Read More</a>
                     <p class="anker"><span >' . $row["genre"] . '</span>
                     <span>Date:' . $row["qdate"] . '</span></p></div>';
                }
            } else {

                echo  '<h2 class="title">No Result Found</h2>';
            }
        }


        ?>
    </div>
</body>

</html>