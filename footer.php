<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <link rel="stylesheet" href="./style/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
      *{
      margin: 0;
      padding: 0;
    }
    .links {
            display: flex;
            justify-content: center; /* Center items horizontally */
        }

        .links ul {
            display: inline-flex; /* Display as inline flex */
            list-style-type: none; /* Remove default list styles */
            padding: 0;
            margin: 0;
            color: #e89002; 
        }

        .links ul li {
            margin-right: 10px; /* Adjust spacing between list items */
        }

        .links ul li a {
            text-decoration: none;
            color: #e89002; /* Link color */
            padding: 10px 15px; /* Padding around link text */
            border: 1px solid #ccc; /* Border around each link */
            border-radius: 5px; /* Rounded corners for the links */
            transition: all 0.3s ease; /* Smooth transition on hover */
        }

        .links ul li a:hover {
            background-color: #f0f0f0; /* Background color on hover */
            
        }
        @media screen and (max-width: 600px) {

            *{
      margin: 0;
      padding: 0;
    }
            .links {
            display: flex;
            justify-content: center; /* Center items horizontally */
        }

        .links ul {
            display: inline-flex; /* Display as inline flex */
            list-style-type: none; /* Remove default list styles */
            padding: 0;
            margin: 0;
            color: #e89002; 
        }

        .links ul li {
            margin-right: 10px; /* Adjust spacing between list items */
        }

        .links ul li a {
            text-decoration: none;
            color: #e89002; /* Link color */
            padding: 5px 10px; /* Padding around link text */
            border: 1px solid #ccc; /* Border around each link */
            border-radius: 5px; /* Rounded corners for the links */
            transition: all 0.3s ease; /* Smooth transition on hover */
        }

        .links ul li a:hover {
            background-color: #f0f0f0; /* Background color on hover */
            
        }

    .links ul li {
        margin-right: 0; /* Remove right margin for stacked layout */
        margin-bottom: 5px; /* Add bottom margin for spacing */
    }
}
</style>
</head>

<body>
    <!-- <section id="form-1">
        <section class="formsec2">
            <h1 style="font-weight: bold; font-size: 2rem;">Contact US</h1>
            <p style="font-size: 1rem;">Please fill out the form below in order to get any assistance.
            </p>
            <form class="f1">
                <div>
                    <input type="text" name="name" placeholder="Name"><label for="name">Feild is required</label>
                    <input type="email" name="email" id="" placeholder="Email"><label for="email">Feild is required</label>
                    <input type="tel" name="phone" placeholder="Phone"><label for="phone">Feild is required</label>
                </div>
                <div class="f2">
                    <textarea name="msg" id="" cols="30" rows="5" placeholder="Message"></textarea>
                    <label for="msg">Feild is required</label>
                </div>
            </form>
            <input type="text" name="Message" id="" placeholder="Message"> -->
    <!-- <div><button type="button">Send</button></div>
        </section> -->
    </section>
    <section id="last-sec">
        <section id="footer">
            <div>

                <div>
                    <p style="font-size: 2.2em; color: #e89002; margin=0;">Get in touch
                    </p>
                    <p>
                        Join us in our mission to make the world a little brighter by bringing lost items back to where
                        they belong. Together, we can make a difference, one lost item at a time. </p>

                    <div class="last-contacts">
                        <div class="phone">
                            <ion-icon name="call-outline"></ion-icon>
                            Phone <br> +92 300 8333727
                        </div>
                        <div class="email">
                            <ion-icon name="mail-open-outline"></ion-icon>
                            E-mail <br> mustafajut01@gmail.com
                        </div>
                        <div class="skype">
                            <ion-icon name="logo-linkedin"></ion-icon>
                            LinkedIN <br> @mustafajut01

                        </div>

                    </div>

                    <div class="links">
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="testlostcard.php">Lost</a></li>
                            <li><a href="Foundpagecard.php">Found</a></li>
                            <li><a href="contact.php">Contact US</a></li>
                        </ul>
                    </div>




                    <div class="rights">Copyright &copy; 2024 | <b>L&F</b> </div>
                </div>

        </section>


    </section>
</body>

</html>