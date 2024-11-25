<?php
session_start();
if (!isset($_SESSION['UserId'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html >
    <html lang="en">

        <head>
            <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                <link rel="stylesheet" href=".//css/style.css">
                                    <link rel="stylesheet" href="./css/footer.css">
                                        <style>
                                            .cust-form {
                                                box - shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                                            padding: 2% 0;
                                            background: linear-gradient(120deg, #cce5f2, hsl(255, 80%, 76%));
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
                                                        <a class="nav-link active" href="Products.php">PRODUCTS</a></li>
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

                        <div class="container-fluid-lg py-5" style="background-color: #faeeea;">

                            <div class="container w-50 cust-form">
                                <p align="center" style="font-family: fantasy; font-size: 3rem;">Customer Form</p>
                                <div class="container h-100 d-flex align-items-center justify-content-center my-5">
                                    <form action="./insertproduct.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">

                                            <input type="text" class="form-control" id="ProductName" placeholder="Enter Product Name"
                                                name="pname" required>

                                        </div>
                                        <div class="mb-3">


                                            <textarea placeholder="Product Description" class="form-control" name="ProductDes"
                                                id="ProductDes" cols="30" rows="6" required></textarea>

                                        </div>
                                        <!-- <div class="mb-3">

                                            <input type="text" class="form-control" id="cName" placeholder="Enter Product Category"
                                                name="cname" required>

                                        </div> -->
                                        <?php
                                        include './connection.php';
                                        $query = "SELECT DISTINCT Category FROM products";
                                        $result = mysqli_query($conn,$query);

                                        echo'
                                        <div class="mb-3">
                                            <label for="cname" class="form-label">Category</label>
                                            <select class="form-select form-select-lg" name="cname" id="cname" required onchange="CheckCategory()">
                                                <option selected disabled>--Select Category--</option>';

                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    extract($row);
                                                echo '<option value="'.$Category.'">'.$Category.'</option>';
   }
                  
                ?>

                                                <option value="Other">Other</option>
                                            </select>

                                            <div class="my-3" id="cName">

                                                <input type="text" class="form-control" placeholder="Specify Product Category" name="cName">

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Enter Product Buying Date</label>
                                            <input type="date" class="form-control" id="Date" name="date" required>
                                        </div>

                                        <div class="mb-3">

                                            <input type="number" class="form-control" id="" placeholder=" Product buying  Price" name="bprice"
                                                required>
                                        </div>

                                        <div class="mb-3">

                                            <input type="number" class="form-control" id="Price" placeholder=" Selling price" name="price" required>
                                        </div>
                                        <div class="mb-3">

                                            <input type="number" class="form-control" id="Quantity" placeholder="Enter Product Quantity"
                                                name="quantity" required>
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Product Image</label>
                                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="PImg" required>
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Product Bill</label>
                                            <input class="form-control form-control-lg" id="Bill" type="file" name="Bill" required>
                                        </div>
                                        <div class="text-center w-100">

                                            <button type="submit" class="btn btn-primary my-5 w-100" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <footer class="footer-start">
                            <div class="footer-end flex-sm-row flex-column">
                                <div class="  d-flex  justify-content-center flex-sm-row flex-column w-100 text-center"
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

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                        <script>
                            function CheckCategory() {
                                console.log("Called CheckCategory")
            let category = document.getElementById("cname").value;

                            if (category === "Other") {
                                document.getElementById("cName").style.display = "block ";
                           
                            document.getElementsByName("cName")[0].required= true;

            }
                            else {
                                document.getElementById("cName").style.display = "none";
              
                            document.getElementsByName("cName")[0]['required']=false;
            }
        }

                            onload = CheckCategory();
                        </script>
                    </body>

                </html>