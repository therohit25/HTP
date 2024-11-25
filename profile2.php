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
    <title>Profile\Order History</title>
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
    <div class="container-fluid-lg d-flex justify-content-center align-items-center" style="height: 100vh;background-color: #faeeea;">
        <div class="w-75">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="true" href="./profile.php">Personal Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./profile2.php">Orders History</a>
                        </li>   
                    </ul>
                </div>
                <div class="card-body" style="overflow-y: auto; height:70vh;">

                    <p class="card-text" >
                    <div class="p-5 mb-4 bg-light rounded-3">
                        <div class="container-fluid py-5 d-flex justify-content-center align-items-center gap-3 flex-column" >
                         <?php
                         
                          include './connection.php';
                      

         $query = "SELECT orders_det.Total_Price,orders_det.Time,order_list.Product_Id,order_list.Quantity,products.Product_Name,products.Category,products.Product_Des,products.Product_Price,products.Product_Img,products.Product_Img,order_list.Order_Id from order_list INNER JOIN products ON products.Product_Id = order_list.Product_Id INNER JOIN orders_det ON order_list.Order_Id = orders_det.Order_Id Where orders_det.User_Id=".$_SESSION['UserId']."
GROUP BY order_list.Product_Id, order_list.Quantity, products.Product_Name, products.Category, products.Product_Des, products.Product_Price, products.Product_Img,order_list.Order_Id,orders_det.Total_Price
ORDER By order_list.Order_Id";
        //  $query = "SELECT orders_det.Total_Price,orders_det.Time,order_list.Product_Id,order_list.Quantity,products.Product_Name,products.Category,products.Product_Des,products.Product_Price,products.Product_Img,products.Product_Img,order_list.Order_Id from order_list INNER JOIN products ON products.Product_Id = order_list.Product_Id INNER JOIN orders_det ON orders_det.User_Id = order_list.UserId Where order_list.UserId=".$_SESSION['UserId']." GROUP BY order_list.Product_Id, order_list.Quantity, products.Product_Name, products.Category, products.Product_Des, products.Product_Price, products.Product_Img,order_list.Order_Id ORDER By order_list.Order_Id";
        //  $query = "SELECT orders_det.Total_Price,orders_det.Time,order_list.Product_Id,order_list.Quantity,products.Product_Name,products.Category,products.Product_Des,products.Product_Price,products.Product_Img,products.Product_Img,orders_det.Order_Id from order_list INNER JOIN products ON products.Product_Id = order_list.Product_Id INNER JOIN orders_det ON orders_det.User_Id = order_list.UserId Where order_list.UserId=".$_SESSION['UserId']." ORDER By orders_det.Order_Id";
         $prevprice = 0;
        // $query = "
        // SELECT orders_det.Total_Price,orders_det.Time,order_list.Product_Id,order_list.Quantity,products.Product_Name,products.Product_Des,products.Product_Price,products.Product_Img,products.Product_Img,orders_det.Order_Id from orders_det INNER JOIN order_list ON orders_det.User_Id = order_list.UserId INNER JOIN products ON products.Product_Id = order_list.Product_Id";
 $result= mysqli_query($conn,$query);
 
 $tempid = 0;

 $count=0;
        if(mysqli_num_rows($result)>0) { 


          while($row =mysqli_fetch_assoc($result))
           { 
            
              extract($row); 
      
  if( $tempid != $Order_Id and $tempid != 0)
{
    
echo'<h1 align="center" class="display-5 fw-bold text-uppercase w-100 my-2 py-3" style="border: 1px solid rgba(0,0,0,.125); background-color: #fff;">Total Price : &nbsp; '.$prevprice.'</h1>';
}
if( $tempid != $Order_Id)
{
    
echo'<p align="left " class="card-head  fw-bold text-uppercase w-100 my-2 " style="font-size:3rem;">Ordered  On : '.$Time.'</p>';
}
 
    //       echo' 
          
    //       <div class="card w-50">
  
    //         <img class="card-img-top" src="'.$Product_Img.'" alt="Card image cap">
    //         <div class="card-body">
    //              <h4 class="card-title text-uppercase">     Product Name &nbsp; : '.$Product_Name.'</h4>
    //                       <p class="card-text"><span class="fw-bold text-uppercase">Total Cost</span> : &nbsp; '.$Total_Price.'</p>
                
             
    //             <p class="card-text"><span class="fw-bold text-uppercase">Quantity</span>: &nbsp; '.$Quantity.'</p>
             
    //             <p class="card-text"><span class="fw-bold text-uppercase">Product Price</span>: &nbsp; '.$Product_Price.'</p>
    //            </div>
    //    </div>
            
    //            ';
    echo '
    <div class="card  text-center my-3" style="width:25vw;">
    <img class="card-img-top" src="'.$Product_Img.'" alt="Product Image">
    <div class="card-body">
        <h4 class="card-title">'.$Product_Name.'</h4>
        <p class="card-text">'.$Category.'</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><span class="fw-bold text-uppercase m-0">Product Price</span> : &nbsp; '.$Product_Price.'</li>
        <li class="list-group-item"><span class="fw-bold text-uppercase m-0">Product Description</span> : &nbsp; '.$Product_Des.'</li>
        <li class="list-group-item"><span class="fw-bold text-uppercase m-0">Quantity</span> : &nbsp; '.$Quantity.'</li>
    </ul>
</div>
    ';
         
       
       
           $tempid = $Order_Id;
           $prevprice = $Total_Price;
            $count++;
           if(mysqli_num_rows($result) == $count)
{
 
    echo'<h1 align="center" class="display-5 fw-bold text-uppercase w-100 my-2 py-3" style="border: 1px solid rgba(0,0,0,.125); background-color: #fff;">Total Price : &nbsp; '.$Total_Price.'</h1>';
  
}
        
            }
              }
              else{
                echo'<h1 align="center" class="display-5 fw-bold text-uppercase w-100 my-2 py-3" style="border: 1px solid rgba(0,0,0,.125); background-color: #fff;">No Orders Yet</h1>';
              }
            
                         ?>
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