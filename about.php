<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>L&F About</title>
</head>
<style>
    *{
      margin: 0;
      padding: 0;
    }
    .site-footer {
      background-color: #002379;
      padding: 45px 0 20px;
      font-size: 15px;
      line-height: 24px;
      color: #fff;
    }
    .site-footer hr {
      border-top-color: #bbb;
      opacity: 0.5;
    }
    .site-footer hr.small {
      margin: 20px 0;
    }
    .site-footer h6 {
      color: #FEB941;
      font-size: 16px;
      text-transform: uppercase;
      margin-top: 5px;
      letter-spacing: 2px;
    }
    .site-footer a {
      color: #fff;
    }
    .site-footer a:hover {
      color: #FEB941;
      text-decoration: none;
    }
    .footer-links {
      padding-left: 0;
      list-style: none;
    }
    .footer-links li {
      display: block;
    }
    .footer-links a {
      color: #fff;
    }
    .footer-links a:active,
    .footer-links a:focus,
    .footer-links a:hover {
      color: #FEB941;
      text-decoration: none;
    }
    .footer-links.inline li {
      display: inline-block;
    }
    .site-footer .social-icons {
      text-align: right;
    }
    .site-footer .social-icons a {
      width: 40px;
      height: 40px;
      line-height: 40px;
      margin-left: 6px;
      margin-right: 0;
      border-radius: 100%;
      background-color: #6DC5D1;
    }
    .copyright-text {
      margin: 0;
    }
    @media (max-width: 991px) {
      .site-footer [class^="col-"] {
        margin-bottom: 30px;
      }
    }
    @media (max-width: 767px) {
      .site-footer {
        padding-bottom: 0;
      }
      .site-footer .copyright-text,
      .site-footer .social-icons {
        text-align: center;
      }
    }
    .social-icons {
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
    }
    .social-icons li {
      display: inline-block;
      margin-bottom: 4px;
    }
    .social-icons li.title {
      margin-right: 15px;
      text-transform: uppercase;
      color: #96a2b2;
      font-weight: 700;
      font-size: 13px;
    }
    .social-icons a {
      background-color: #eceeef;
      color: #ffff;
      font-size: 16px;
      display: inline-block;
      line-height: 44px;
      width: 44px;
      height: 44px;
      text-align: center;
      margin-right: 8px;
      border-radius: 100%;
      transition: all 0.2s linear;
    }
    .social-icons a:active,
    .social-icons a:focus,
    .social-icons a:hover {
      color: #fff;
      background-color: #29aafe;
    }
    .social-icons.size-sm a {
      line-height: 34px;
      height: 34px;
      width: 34px;
      font-size: 14px;
    }
    .social-icons a.facebook:hover {
      background-color: #3b5998;
    }
    .social-icons a.whatsapp:hover {
      background-color: #33f933;
    }
    .social-icons a.linkedin:hover {
      background-color: #007bb6;
    
    }
    @media (max-width: 767px) {
      .social-icons li.title {
        display: block;
        margin-right: 0;
        font-weight: 600;
      }
    }
  </style>
<body>
<?php
    include 'nav.php';
    ?>
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
    We understand the frustration and inconvenience that comes with losing valuable belongings. That's why we've created a centralized hub where users can report lost items with detailed descriptions, including location, date and any identifying features.
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
    <br>
    <p>
    At LOST & FOUND, we're committed to providing a user-friendly, secure, and reliable platform for our community. We prioritize the privacy and security of our users' information, and we strive to foster a culture of trust and collaboration among our members. Every lost item reported and found item listed brings us one step closer to achieving our goal of reuniting lost items with their owners.
    </p>
    <br />
  </div>

  <!-- footer -->
  <!-- <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Lost & Found is an initiative to help users report their belonging items. Lost & Found focuses on providing the most efficient and user-friendly platform for everyone. We will help people to report and find their items.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li>Bags</li>
            <li>Books</li>
            <li>Stationery</li>
            <li>Watch</li>
            <li>Mobile</li>
            <li>Earpods</li>
            <li>Others</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="reportlost.php">Report Lost</a></li>
            <li><a href="reportfound.php">Report Found</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved by 
            <a href="#">L&F</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li class="title">Follow Us</li>
            <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>

          </ul>
        </div>
      </div>
    </div>
  </footer> -->
  <?php
    include 'footer.php';
    ?>
</body>
</html>