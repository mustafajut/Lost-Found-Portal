<?php
include("php/config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">
    <title>Contact</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }
        h3 {
    color: #e89002;
    font-family: calibri;
    font-size: 2.5rem;
    text-align: center;
    margin-top: 5%;
  }
        /* Style inputs */
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 15px;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: rgba(0, 136, 169, 1);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: rgb(126, 225, 250);
            color: black;
        }

        /* Style the container/contact section */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }

        /* Create two columns that float next to eachother */
        .column {
            float: left;
            width: 50%;
            margin-top: 6px;
            padding: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            h3 {
    color: #e89002;
    font-family: calibri;
    font-size: 2rem;
    text-align: center;
    margin-top: 5%;
  }
            .column,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <div style="text-align:center">
        <h3>Contact Us</h3>
        <p  style="text-align:center">Swing by for a cup of coffee, or leave us a message:</p>
    </div>
    <div class="container">
        <div class="row">
        <?php
            if (isset($_POST['submit'])) {
                $Name = $_POST['Name'];
                $Email = $_POST['Email'];
                $Message = $_POST['Message'];
                  // Insert data into contactus table with the obtained categoryId
                  $query = "INSERT INTO contactus (Name, Email, Message) VALUES (?, ?, ?)";
                  $stmt = mysqli_prepare($con, $query);
                  mysqli_stmt_bind_param($stmt, 'sss', $Name, $Email, $Message);
                  $result = mysqli_stmt_execute($stmt);

                  if ($result) {
                      echo "<div class='message'>
                          <p>Thanks For Message!</p>
                      </div> <br>";
                
                  } else {
                      echo "Error: " . mysqli_error($con);
                  }
              } 
        
        ?>
            <div class="column"> <img src="lost.jpg" style="width:100%">
            </div>
            <div class="column">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <label for="Name">Name</label>
                    <input type="text" id="Name" name="Name" placeholder="Your name..">
                    <label for="Email">Email</label>
                    <input type="text" id="Email" name="Email" placeholder="Your last Email..">
                    <label for="Message">Message</label>
                    <textarea id="Message" name="Message" placeholder="Write something.." style="height:170px"></textarea>
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include 'footer.php';
?>

</html>