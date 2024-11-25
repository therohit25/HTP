<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href=".//css/aboutUs.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/footer.css">
    <style>
        a {
            margin-left: 15px;


        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark jon-header bg-dark">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="logo  mt-2 ">
                    <!-- <img src=".//img/LOGO.png" alt=""> -->
                    <p class="card-head text-white">HTP🔭</p>
                </div>

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">


                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <a class="nav-link" href="Products.php">PRODUCTS</a></li>
                    <a class="nav-link " href="Cart.php">CART</a></li>
                    <a class="nav-link active" href="#">ABOUT US</a></li>
                    <a class="nav-link" href="#">CONTACT US</a></li>

                    <?php
                              
                               
                              if(isset($_SESSION['Name']))
                          {
                        
                          
                        echo '
                          <div class="rounded-5 text-center mx-3" style=" background: linear-gradient(45deg, hsl(229, 86%, 80%) 51%, hsl(229, 90%, 77%) 51%, hwb(229 56% 2%) 51%);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;border-radius: 50%; width:38px;">
                        <a class="nav-link" href="profile.php" style="font-size: 1.5rem; margin:0px;">
                            👨🏻
                        </a>
                    </div>
                        <div class=" px-1" >
                              <a href="./logout.php" class="w-100"><button class="btn btn-secondary"> Log-out
                                      </button></a>
                    
                          </div>';
                        }
                        else{
                            echo '  <div class="px-2" >
                                <a href="./login.php" class="w-100"><button class="btn btn-secondary"> Log-in
                                        </button></a>
                            </div>';
                        }
                        
                        
                            ?>



                </ul>

            </div>
        </div>
    </nav>

    <div class="about-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-img">
                        <img src=".//img/kiara.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1">
                    <div class="about-text">
                        <h2>ABOUT US</h2>
                        <p>Here at HTP, we endeavor to be more than an online retailer and a destination, an experience
                            for you to come and pamper
                            yourself with all your fashion needs. You can buy new as well as pre-owned fashion for all.
                            We desire to inspire, update
                            and inform you of current fashion trends.

                            Let’s face it!! We love to shop and the more we shop, the more stuff we attain and the more
                            stuff we attain, we forget about them
                            and push to the back of our wardrobes.</p>
                        <a href="index.php">HOME</a>
                        <a href="products.php">PRODUCTS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-area">
        <div class="container">
            <div class="row " style="margin-bottom:5rem;">
                <div class="col-lg-4">
                    <div class="about-img">
                        <img src=".//img/aboutIMG.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1">
                    <div class="about-text">
                        <h2>OUR MISSION</h2>
                        <p>Our mission is to build a trusted Indian online shopping site with real people behind real
                            profiles – a place to browse and
                            be inspired as well as buy and sell pre-owned designer fashion clothes. Fashion doesn’t come
                            at a cost. Whether it’s
                            the environmental impact of fast fashion or the inaccessibility to the most luxury market,
                            Etashee.com aspires to an alternative.
                            Extend the life of your wardrobe by buying and selling recycled clothing. We aspire to offer
                            our customers an emporium of
                            women’s fashion at swoon-worthy prices. Above all, we want to offer a hassle free shopping
                            experience which is why we
                            uphold a no fuss return policy on every item.</p>
                        <a href="index.php">HOME</a>
                        <a href="products.php">PRODUCTS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-start">
        <div class="footer-end flex-sm-row flex-column">
            <div class=" pl-5  d-flex  justify-content-center flex-sm-row flex-column w-100 text-center"
                style="gap:2rem;">
                <p class="card-head">HTP</p>

                <p class="px-sm-0 px-2 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae iure cum ad ipsam harum quas
                    reiciendis
                    dolorum facilis, officia ducimus!

                </p>
            </div>
            <div id="q-links">

                <h3>
                    Quick Links
                </h3>
                <ul>

                      <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <!-- <div id="address">
    
                    <h3>
                        Address
                    </h3>
                    <p>
                        IMCC Kothrud, Pune,
                        <br>
                        India
                    </p>
                </div> -->
            <div id="social-media">

                <h3>
                    Follow Us
                </h3>
                <div class="flex-img">

                    <i class="fab fa-facebook fa-fw"></i>
                    <i class="fab fa-instagram fa-fw"></i>
                    <i class="fab fa-linkedin fa-fw"></i>
                    <i class="fab fa-twitter fa-fw"></i>
                </div>

            </div>
        </div>
        <div id="cp-right">
            <p style="font-family: fantasy; font-size: 1.5rem;">
                &#169 All reserved To Hunt The PreOwned....
            </p>
        </div>
    </footer>
  <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="./cart.js"></script>
</body>

</html>