<?php
session_start();
if(!isset($_SESSION['UserId']))
{
header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/footer.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .user-info p {
            font-size: 20px;
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

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="margin-left: auto;">


                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <a class="nav-link" href="Products.php">PRODUCTS</a></li>
                    <a class="nav-link active" href="#">CART</a></li>
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
    <div class="container-fluid-lg py-5" style="background-color: #faeeea;">
        <p align="center" style="font-family: fantasy; font-size: 3rem;">

            MyCart🛒
        </p>








        <div
            class="container h-100 d-flex align-items-sm-none align-items-center justify-content-center w-100 flex-sm-row flex-column  gap-5">
            <div class=" d-flex align-items-center flex-column w-75 my-2"
                style="max-height: 100vh; overflow-y: scroll;">
                <?php
        include './connection.php';
        $display = true;
     $UserId = $_SESSION['UserId'];
       $query = "SELECT products.Product_Name,products.Product_Id,products.Product_Des,products.Product_Img,products.Quantity as PQuantity,products.Product_Price,cart.Quantity,cart.Cart_Id FROM products INNER JOIN cart ON products.Product_Id = cart.Product_Id WHERE cart.UserId=".$UserId;
       $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0)
  {
       while($row = mysqli_fetch_assoc($result))
       {
 extract($row);
      
          echo'  <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="'.$Product_Img.'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'.$Product_Name.'</h5>
                            <p class="card-text">'.$Product_Des.'.</p>
                            <div class="d-flex flex-column px-3">
                                <p class="card-text"><small class="text-muted">Price: '.$Product_Price.'</small></p>
                                <div class="mb-3 d-flex align-items-center w-100 gap-2 flex-wrap">
                                    <label for="Quantity" class="form-label ">Quantity:</label>
                                    <div class="w-50">
                                        <input type="number" class="form-control w-100" class="Quantity" 
                                        id="Quantity-'.$Product_Id.'"
                                         value="'.$Quantity.'" onchange="update_qty('.$Cart_Id.','.$Product_Id.')" min="1" max="'.$PQuantity.'">
                                    </div>
                                </div>
                                <div class="w-100 d-flex align-items-end justify-content-end">
                               
                                <a href="./removecart.php?del='.$Product_Id.'" class="w-100" align="right"> <button class="btn btn-primary mx-auto" name="remove">Remove❌</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
             }
            }
            else  {
                 echo '
                      
                      <h1> No Products added to the Cart!...</h1>
                      <br>
                      
                      <a href="./products.php" class="my-3">Go to Products!..</a>';
                      $display = false;
            }
?>

            </div>
            <?php
if($display)
{?>
            <div class="table-responsive w-50 mx-2 p-4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                <div class="user-info " align=>
                    <h4>Customer-Information:</h4>
                    <h5>
                        <?php
    echo $_SESSION['Name'];
    ?>
                    </h5>
                    <p>
                        <?php
    echo $_SESSION['Address'];
    ?>
                    </p>
                    <p>
                        <?php
    echo $_SESSION['Email'];
    ?>
                    </p>

                    <h4>Product-Information:</h4>
                </div>


                <table class="table">
                    <thead>
                        <tr class="bg-success">

                            <th scope="col" style="color:white;">Product</th>
                            <th scope="col" style="color:white;">Price</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="cart-table">

                        <!-- <tr class="bg-light" id="cart-table">
                    </tr> -->



                    </tbody>
                    <tbody id="total">

                    </tbody>
                </table>


                <div class="w-100" align="center">

                    <a href="./insertorder.php" class="w-100"> <button class="btn btn-primary mx-auto">Order
                            Now</button></a>



                </div>


                <?php } ?>


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