<?php 
session_start();
?>
<!doctype html>
<html lang="en">

  <head>
  <title>ZOOM RIDES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>
  <style>
    .box{
    
    position:center;
    top: 50%;
    left: 50%;
    padding: 12px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
    display: flex;
    align-content: center;
    width: 600px;
    height: 200px;
    margin-top: 100px;
    margin-left: 350px;
}

.box .imgBx{
    width: 150px;
    flex:0 0 150px;
}

.box .imgBx img{
    max-width: 150%;
}

.box .content{
    padding-left: 100px;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;
}

.utton{
    width: 240px;
    height: 40px;
   
    background: blue;
    border:none;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.de{
    float: left;
    clear: left;
    display: block;
}


.de li a:hover{
    color:black;

}
.de .lis:hover{
    color: white;
}
  </style>
    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.php"><img src="images/Logo.png" height="100"></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <li class="active"><a href="listing.php" class="nav-link">Listing</a></li>
                  <li><a href="testimonials.php" class="nav-link">Testimonials</a></li>
                  <li><a href="feedback.php" class="nav-link">Feedback</a></li>
                  <li><a href="about.php" class="nav-link">About</a></li>
                  <li><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      
      <div class="hero inner-page" style="background-image: url('images/background.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Listings</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Home</a> <span class="mx-2">/</span> <strong>Listings</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>
  


<!--header End -->
<?php 
    require_once('connection.php');
    

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from bikes where AVAILABLE='Y'";
    $bikes= mysqli_query($con,$sql2);
    
    // $row=mysqli_fetch_assoc($cars);   
    ?>
<!--- Main Contain start --->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Bike Listings</strong></h2>    
          </div>
        </div>
        
        <div class="row">
        <ul class="de">
    <?php
        while($result= mysqli_fetch_array($bikes))
        {
            // echo $result['CAR_ID'];
            // echo $result['AVAILABLE'];
            
    ?>    
    
    
    <form method="POST">
    <div class="box">
       <div class="imgBx">
            <img src="images/<?php echo $result['BIKE_IMG']?>">
        </div>
        <div class="content">
            <?php $res=$result['BIKE_ID'];?>
            <h1><?php echo $result['BIKE_NAME']?></h1>
            <h2>Fuel Type : <a><?php echo $result['FUEL_TYPE']?></a> </h2>
            <h2>CAPACITY : <a><?php echo $result['CAPACITY']?></a> </h2>
            <h2>Rent Per Day : <a>₹<?php echo $result['PRICE']?>/-</a></h2>
            <button type="submit"  name="booknow" class="utton" style="margin-top: 5px;"><a href="booking.php?id=<?php echo $res;?>">book</a></button>
        </div>
    </div></form></li>
    <?php
        }
    
    ?>
              <?php 
                require_once('connection.php');
                    

                $value = $_SESSION['email'];
                
                $sql="select * from users where EMAIL='$value'";
                $name = mysqli_query($con,$sql);
                $rows=mysqli_fetch_assoc($name);
              ?>  
            </ul>
          </div>
        </div>  
      </div>
    </div>

    <div class="site-section bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-md-0">
            <h2 class="mb-0 text-white">What are you waiting for?</h2>
            <p class="mb-0 opa-7">Rent now, anywhere anytime.</p>
          </div>
          <div class="col-lg-5 text-md-right">
            <a href="#" class="btn btn-primary btn-white">Rent a bike now</a>
          </div>
        </div>
      </div>
    </div>

      
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">About Us</h2>
              <p>ZOOM BIKES IS HERE TO REDEFINE THE WAY YOU TRAVEL!<BR>
                RENT A BIKE ON AN DAILY, WEEKLY OR EVEN MONTHLY BASIS.
                WE ALSO HAVE LONG TERM LEASING SOLUTIONS FOR BUSINESSES WHO ARE INTO LAST MILE DELIVERY THROUGH TWO WHEELERS.</p>
              <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Quick Links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Resources</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Support</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Company</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
              &copy;<script>document.write(new Date().getFullYear());</script> ZOOM RIDES INDIA PVT.LTD. ALL RIGHTS RESERVED
              </p>
              </div>
            </div>

          </div>
        </div>
      </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>