<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home </title>
    <style>
        .logo img {

            width: 100px;
            height: 50px;

            border-radius: 50px;
        }

        .home-content {
            position: relative;
            height: 90vh;
            width: 100%;
            /* background-color: cyan; */

        }

        .home-content::before {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: -1;
            background-image: url('./img/banner.jpg');
            background-position: 100% 30%;

            background-size: cover;

        }

        .home-heading {
            font-size: 3rem;
            font-family: fantasy;
            text-transform: uppercase;
        }

        .small-heading {
            font-size: 1rem;
        }

        .home-des {
            font-family: cursive;
        }



        .card-front,
        .card-back {

            height: 50vh;
            width: 100%;

            transition: 2s all;
        }


        .card:hover>.card-front {
            /* opacity: 0; */
            filter: drop-shadow(blue 2px 1px);
            transform: rotateY(90deg);
            /* transition: 2s all; */
            cursor: pointer;
            /* filter: blur(5px); */
        }


        .card:hover>.card-back {
            opacity: 1;
            /* transition: 10s all; */
            cursor: pointer;
        }

        .card-front {

            position: relative;
            opacity: 1;
        }

        .card-back {
            position: absolute;
            opacity: 0;
            /* background: linear-gradient(45deg, #9696da, #6565e6, #babaf9); */
            background: linear-gradient(45deg, #7492a42e, hwb(203 59% 23% / 0.556), #babaf9);
            overflow: hidden;
            border-radius: 7px;
            left: 0px;
            top: 0px;
            box-shadow: 2px 3px 3px -2px;

        }

        .Services {
            background: #3c90c23b;
        }



        .card-des {
            font-family: cursive;
            font-size: 1.2rem;
        }

        .card-head {
            text-transform: uppercase;
            font-family: fantasy;
            font-size: 2rem;
        }

        .fashion-brunds {
            padding: 3% 0;
            position: relative;
            height: 100%;
            width: 100%;
            /* background-color: rgba(71, 163, 217, 0.231); */
        }

        .fashion-brunds::before {
            position: absolute;
            content: '';
            top: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: url('./img/fashion.jpg'), linear-gradient(45deg, blue, white);
            background-position: 100% 100%;
            background-size: cover;
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
                <div class=" mt-2 ml-5 ">

                    <p style="color:white">

                    </p>
                </div>

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="margin-left: auto;">


                    <li class="nav-item ">
                        <a class="nav-link active" href="#">HOME</a>
                    </li>
                    <a class="nav-link" href="Products.php">PRODUCTS</a></li>
                    <a class="nav-link" href="Cart.php">CART</a></li>
                    <a class="nav-link" href="aboutUs.php">ABOUT US</a></li>
                    <a class="nav-link" href="#">CONTACT US</a></li>




                    <?php
                          
                           
                          if(isset($_SESSION['Name']))
                          {
                        
                          
                        echo '
                          <div class="rounded-5 text-center mx-3" style=" background: linear-gradient(45deg, hsl(229, 86%, 80%) 51%, hsl(229, 90%, 77%) 51%, hwb(229 56% 2%) 51%);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;border-radius: 50%; width:38px;">
                        <a class="nav-link" href="profile.php" style="font-size: 1.5rem;">
                            👨🏻
                        </a>
                    </div>
                        <div class=" px-1" >
                              <a href="./logout.php" class="w-100"><button class="btn btn-secondary"> Log-out
                                      </button></a>
                    
                          </div>';
                        }
                    else{
                        echo '  <div class="text-center px-2" >
                            <a href="./login.php" class="w-100"><button class="btn btn-secondary"> Log-in
                                    </button></a>
                        </div>';
                    }
                    
                    
                        ?>



                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid-lg home-content ">
        <div class="container text-white d-flex justify-content-end align-items-center h-100">
            <div class="d-flex flex-column justify-content-center align-items-end">
                <p class="home-heading">Welcome to HTP <small class="small-heading">Hunt The PreOwned</small></p>
                <p class="home-des">Hunt One,Own One, Used Quality Products.</p>
                <a href="./Registration.php" class="w-100" align="center"><button class="btn btn-secondary">
                        Start-Shopping
                    </button></a>
            </div>
        </div>
    </div>


    <div class="Services py-5">
        <div class="home-heading mb-4" align="center">Our Products</div>
        <div class=" container ">
            <div class="row d-flex  flex-md-row flex-column justify-content-center align-items-center" style="gap:2rem">

                <div class="col card" style="border: none;background: #cce5f2; ">
                    <div class="card-front">
                        <img class="card-img-top w-100 h-100" src="./img/trend-1.jpg" alt="Title">
                    </div>
                    <div class="card-back d-flex flex-column gap-1 justify-content-center align-items-center">
                        <h4 class="text-center card-head">Ladies Kamiz</h4>
                        <p class="p-2 text-center card-des">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Fugit
                            accusamus illo
                            possimus praesentium illum dolor, velit quis, earum accusantium molestias tenetur beatae
                            culpa aliquam optio?</p>
                    </div>
                </div>
                <div class="col card" style="border: none;background: #cce5f2; ">
                    <div class="card-front">
                        <img class="card-img-top w-100 h-100" src="./img/trend-2.jpg" alt="Title">
                    </div>
                    <div class="card-back d-flex flex-column gap-1 justify-content-center align-items-center">
                        <h4 class="text-center card-head">Men Tshirt And Pants</h4>
                        <p class="p-2 text-center card-des">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Sapiente
                            reiciendis dolor consequuntur veniam nihil ducimus vitae, ratione repudiandae animi, neque
                            distinctio atque numquam, veritatis doloribus.</p>
                    </div>
                </div>
                <div class="col card " style="border: none;background: #cce5f2; ">
                    <div class="card-front">
                        <img class="card-img-top w-100 h-100" src="./img/trend-3.jpg" alt="Title">
                    </div>
                    <div class="card-back d-flex flex-column gap-1 justify-content-center align-items-center">
                        <h4 class="text-center card-head">Women Special Offers</h4>
                        <p class="p-2 text-center card-des">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Iure
                            consequuntur in excepturi illum! Eos voluptatibus explicabo esse repellat ea laudantium
                            ipsam nostrum facere earum exercitationem.</p>
                    </div>
                </div>
            </div>
            <div class="text-center w-auto my-5">
                <a href="./products.php"> <button class="btn btn-secondary">More Products</button></a>
            </div>
        </div>
    </div>
    <section class="fashion-brunds">

        <p class="home-heading " align="center"> Features</p>

        <div class="container">
            <div class="row text-center">

                <div class="col-lg-4">
                    <div class="brand-logo d-flex flex-column" style="gap: 2rem;">
                        <div>
                            <img src=".//img/Offer.jpg" alt="">
                        </div>
                        <div>
                            <p class="card-des font-5 text-white">SPECIAL OFFER</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="brand-logo d-flex flex-column" style="gap: 3rem;">
                        <div>
                            <img src=".//img/minOff.jpg" alt="">
                        </div>
                        <div>
                            <p class="card-des font-5 text-white">MIN .50% OFF</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="brand-logo d-flex flex-column" style="gap: 3rem;">
                        <div>
                            <img src=".//img/cartIMG.jpg" alt="">
                        </div>
                        <div>
                            <p class="card-des font-5 text-white">FREE DELEVERY</p>
                        </div>

                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="brand-logo d-flex flex-column" style="gap: 2rem;">
                        <div>
                            <img src=".//img/off.jpg" alt="">
                        </div>
                        <div>
                            <p>UP TO 65% OFF</p>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
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
</body>

</html>