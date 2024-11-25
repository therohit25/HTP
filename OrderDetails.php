<!doctype html>
<html lang="en">
<?php
session_start();
?>
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                    <div class="px-4">
                        <a href="./customerform.php" class="w-100"><button class="btn btn-primary"> Sell
                                Product</button></a>

                    </div>

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
 
 
 
    <div class="container-fluid-lg d-flex justify-content-center align-items-center " >
  <div class="container d-flex flex-column align-items-center  overflow-auto py-5">

  <?php 
echo'<h1 align="left " class="display-5 fw-bold text-uppercase w-100" >Order Details</h1>';
$Total_Price = $_GET['TotalPrice'];
     include './connection.php';
         $query = "SELECT products.Product_Name,products.Product_Price,products.Product_Des,products.Product_Img,order_list.Quantity,order_list.Time from order_list
INNER JOIN products ON products.Product_Id = order_list.Product_Id WHERE order_list.Order_Id = ".$_GET['OrderId'];
       $result= mysqli_query($conn,$query);
       while($row = mysqli_fetch_array($result))
       {
        extract($row);
  echo '
<div class="card  text-center my-3" style="width:25vw;">
    <img class="card-img-top" src="'.$Product_Img.'" alt="Product Image">
    <div class="card-body">
        <h4 class="card-title">'.$Product_Name.'</h4>
        <p class="card-text">Text</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><span class="fw-bold text-uppercase">Product Price</span> : &nbsp; '.$Product_Price.'</li>
        <li class="list-group-item"><span class="fw-bold text-uppercase">Product Description</span> : &nbsp; '.$Product_Des.'</li>
        <li class="list-group-item"><span class="fw-bold text-uppercase">Quantity</span> : &nbsp; '.$Quantity.'</li>
    </ul>
</div>';
       }

echo'<h1 class="display-5 fw-bold text-uppercase w-100 text-center" >Total Price:&nbsp; '.$Total_Price.'</h1>';
?>


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