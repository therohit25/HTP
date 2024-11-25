<!doctype html>
<html lang="en">
<?php
session_start();

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link rel="stylesheet" href=".//css/style.css">
    <title>Products</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }



        .flex-box {
            display: flex;
            flex-wrap: wrap;
        }

        .prod-box {
            width: 30%;

        }

        #searchproduct {
            padding: 1%;
            border-radius: 5px;
            width: 100%;
        }



        @media only screen and (max-width: 600px) {
            .flex-box {
                flex-direction: column;
                width: 100%;
            }

            .prod-box {
                width: 75%;
                flex-wrap: wrap;
            }
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


    <div class="container-fluid-lg py-5" style="background-color: #faeeea;">
        <p align="center" style="font-family: fantasy; font-size: 3rem;">PRODUCTS</p>
        <!-- -->
  


  
    <form align="center " class="my-5 d-flex gap-2 justify-content-center align-items-center">
        <div class="w-50">
            
            <input type="search" name="searchproduct" id="searchproduct" placeholder="Search Products"
                class="form-control" required>
        </div>
 <?php
                         include './connection.php';
                  $query = "SELECT DISTINCT Category FROM products";
                  $result = mysqli_query($conn,$query);
              
                      echo'
                <div>
            
            <select class="form-select form-select-lg" name="cname" id="cname" required>
                <option selected >All</option>';

 while($row = mysqli_fetch_array($result))
{
 extract($row);
echo '<option value="'.$Category.'">'.$Category.'</option>';
   }
                  
                ?>
                  </select>


        </div>
        <div class="w-auto">
            <button class="btn-outline-primary p-2" name="search" style="border-radius: 5px;">Search🔍</button>
        </div>
        
    </form>


    <div class="container">




        <?php
       if(isset($_GET['searchproduct']))
       {
if($_GET["cname"] != "All")
{
    $query = "SELECT * FROM products WHERE verified='Done' AND (Product_Name LIKE '%".$_GET["searchproduct"]."%' OR Product_Price LIKE '%".$_GET["searchproduct"]."%') AND Category LIKE '%".$_GET["cname"]."'";
}

     else 
        {
$query = "SELECT * FROM products WHERE verified='Done' AND Product_Name LIKE '%".$_GET["searchproduct"]."%' OR Product_Price LIKE '%".$_GET["searchproduct"]."%' OR Category LIKE '%".$_GET["searchproduct"]."'";
        }
    }
        else
       { 
       $query = "SELECT * FROM products where verified='Done'";
       }
       $result = mysqli_query($conn,$query);
   
   
    if(mysqli_num_rows($result) > 0)
    {
          if(isset($_GET["search"]))
        {
              echo '<div class="text-justify my-5">
             <h1>'.mysqli_num_rows($result).' Results found!.. for '.$_GET["searchproduct"].':</h1>
            </div>';
        }
        echo ' <div class="flex-box g-2 justify-content-center align-items-center w-100">';
       while($row = mysqli_fetch_assoc($result))
       {
        extract($row);
       
        echo '
        
         <div
                class="prod-box card d-flex flex-column justify-content-center align-items-center p-2 g-2 border-2 m-2 flex-wrap" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
       
         <h1 class="text-center">'.$Product_Name.'</h1>
                <div class="prod-img w-25">
                   <a href="productinfo.php?productid='.$Product_Id.'" ><img src="'.$Product_Img.'" class="w-100" alt="Product" srcset=""></a>
                </div>
           <div class="prod-des p-2">
                  '.$Product_Des.'
                </div>
                <div class="d-flex g-5 flex-wrap w-100">
                <a href="./insertcart.php?productid='.$Product_Id.'" class="w-100"><button class="btn btn-primary my-2 w-100">Add to Cart🛒</button></a>
                <a href="./insertcart.php?productid='.$Product_Id.'&set=1" class="w-100"><button class="btn btn-secondary my-2 w-100">Buy Now💰</button></a>
                <!-- <button class="btn btn-secondary my-2 w-100">Buy Now💰</button> -->
                </div>
               
                <div class="card-footer d-flex w-100 justify-content-center flex-sm-row flex-wrap " style="padding-right: 4rem;">
                <div class="fs-4 d-flex align-items-center justify-content-space  " >
             <div class="fs-5" style="font-weight: 900;"> Limited Offer: </div>
                <!-- <div class="pl-1 position-relative"> <i class="fa-solid fa-indian-rupee-sign"></i>
                    '.$Product_Price.' 
                    <div class="badge rounded-pill bg-primary position-absolute top-0">'.$Quantity.'</div></div>
                </div> -->
                <div class="btn  position-relative">
                <del>'.$Buying_Price.'</del> 
            <i class="fa-solid fa-indian-rupee-sign"></i>  '.$Product_Price.'
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    '.$Quantity.' left
                    <span class="visually-hidden">unread messages</span>
                </span>
            </div>
               





                </div>
                </div>
              
                   </div>';
                // <strong>2 Left</strong>
            }
        }
        else
        {
            echo '<div class="text-center">
             <h1>No results found!.. for '.$_GET["searchproduct"].'</h1>
            </div>';
        }
            ?>


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