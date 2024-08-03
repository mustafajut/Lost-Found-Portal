<?php
session_start();

include("php/config.php");
// if (!isset($_SESSION['valid'])) {
//   header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <title>Home</title>
</head>

<body>
  <?php
  include 'nav.php';
  ?>
  <div class="page-1">
    <h4>Your Trusted Lost and Found Solution</h4>
    <div class="btn-container">
      <a href="Reportlost.php"><button class="btn">Report Lost</button></a>
      <a href="Reportfound.php"><button class="btn">Report Found</button></a>
    </div>
    <img src="lostcover.jpg" alt="lost">
  </div>
  <div class="mian">
    <div class="intro">
      <!-- <h1>Lost & Found</h1><br>
      <h4>Your Trusted Lost and Found Solution</h4> -->
      <br><br>
      <p>
        The Lost and Found Website provides a solution by creating a
        centralized platform where users can report lost items and others can
        search for and return them.
      </p>
      <p>
        Our platform is designed to streamline the lost and found process, providing a user-friendly interface that allows individuals to report lost items with detailed descriptions and information. Likewise, those who have found items can use our platform to search for potential matches and connect with the rightful owners. Through our innovative approach, we're transforming the way lost items are reported, searched for, and reunited with their owners.
      </p><br><br>
      <p>
        At the heart of The Lost and Found Website is a commitment to community support and engagement. We believe that by coming together as a collective, we can increase the chances of recovering lost items and bring peace of mind to those who have experienced loss. Whether you're a forgetful individual in need of assistance or a conscientious finder looking to help others, our platform provides a space where everyone can play a part in the lost and found process.
      </p>
    </div>
    <div class="lost">
      <img class="lost" src="L& F.png" />
    </div>
  </div>

  <br><br><br><br><br>

  <div id="about">
    <h1>About Us</h1>
    <p>
      Your go-to platform for managing lost items efficiently and reuniting
      them with their rightful owners. Our mission is to provide a
      user-friendly interface where individuals can report lost items, search
      for found items, and connect with others to facilitate the return
      process.
    </p>
    <br />
    <p>
      At Lost and Found Portal, we understand the frustration and
      inconvenience that comes with losing valuable belongings. That's why
      we've created a centralized hub where users can report lost items with
      detailed descriptions, including location, date, and any identifying
      features. Our advanced search functionality enables users to browse
      through found items and filter results based on various criteria.
    </p>
    <br />
    <p>
      We believe in the power of community and collaboration when it comes to
      reuniting lost items with their owners. Our platform encourages users to
      communicate and coordinate efforts to ensure a successful return.
      Whether it's a lost wallet, a misplaced phone, or a cherished keepsake,
      Lost and Found Portal is here to help.
    </p>
    <br /><br />
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>