<!doctype html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['UserId']))
{
header("location:login.php");
}
?>

<head>
    <title>Profile\Personal Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link rel="stylesheet" href=".//css/style.css">

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

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="margin-left: auto;">


                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <a class="nav-link active" href="#">PRODUCTS</a></li>
                    <a class="nav-link" href="Cart.php">CART</a></li>
                    <a class="nav-link" href="aboutUs.php">ABOUT US</a></li>
                    <a class="nav-link" href="#">CONTACT US</a></li>


                    <?php
                              
                               
                              if(isset($_SESSION['Name']))
                          {
                        
                          
                        echo '
                          <div class="rounded-5 text-center mx-3" style=" background: linear-gradient(45deg, hsl(229, 86%, 80%) 51%, hsl(229, 90%, 77%) 51%, hwb(229 56% 2%) 51%);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;border-radius: 50%; ">
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
    <div class="container-fluid-lg d-flex justify-content-center align-items-center"
        style="height: 100vh;background-color: #faeeea;">
        <div class="w-75">
            <div class="card text-center ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="./profile.php">Personal Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./profile2.php">Orders History</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" style="overflow-y: auto; height: 70vh;">

                    <p class="card-text">
                    <div class="p-5 mb-4 bg-light rounded-3">
                        <h4 class="card-title display-5 fw-bold text-uppercase">Personal Details</h4>
                        <div class="container-fluid py-5">


                            <div class="d-flex align-items-center gap-5 flex-wrap">
                                <div class="d-flex align-self-start">
                                    <div>
                                        <img src="./img/userprof2.png" alt="profile" width="300">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex flex-column gap-2 justify-content-center ">



                                        <div class="d-flex gap-2 align-items-center justify-content center">
                                            <div class="fs-4 fw-bold">Name:</div>
                                            <div class="fs-4">
                                                <?= $_SESSION['Name'] ?>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center justify-content center">
                                            <div class="fs-4 fw-bold">Email:</div>
                                            <div class="fs-4">
                                                <?= $_SESSION['Email'] ?>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center justify-content center">
                                            <div class="fs-4 fw-bold">Phone:</div>
                                            <div class="fs-4">
                                                <?= $_SESSION['Phone'] ?>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center justify-content center">
                                            <div class="fs-4 fw-bold">Address:</div>
                                            <div class="fs-4">
                                                <?= $_SESSION['Address'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    </p>
                </div>
            </div>

        </div>

    </div>
    <footer class="footer-start ">
        <div class="footer-end flex-sm-row flex-column">
            <div class=" pl-5  d-flex  justify-content-center flex-sm-row flex-column w-100 text-center"
                style="gap:2rem;padding-left:2rem;">
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>