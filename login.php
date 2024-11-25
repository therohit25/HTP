<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <link rel="stylesheet" href="./css/footer.css">
        <style>
            body{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
          .container{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
          }
          form a{
            font-size:20px;
            margin-top:15px;
          }
           .form-container {
            padding: 2% 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: linear-gradient(45deg, hsl(229, 86%, 80%) 51%, hsl(229, 90%, 77%) 51%, hwb(229 56% 2%) 51%);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        #message {
            color: red;
        }

        form a {
            font-size: 20px;
            margin-top: 15px;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(270deg, rgb(34, 181, 254) 0.00%, rgb(255, 186, 214) 100.00%);
height: 100vh;
        }

        .my-heading {
            font-family: fantasy;
            font-size: 3rem;
            text-transform: uppercase;

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
                <div class="logo  mt-2 mr-auto">
                    <!-- <img src=".//img/LOGO.png" alt=""> -->
                    <p class="card-head text-white">HTP🔭</p>
                </div>

             
                <ul class="navbar-nav  mb-2 mb-lg-0" style="margin-left: auto;">


                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
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
<?php
 if(isset($_POST['submit']))
 {
    include './connection.php';
    $email=$_POST['email'];
    $pwd=$_POST['password'];

$query="SELECT * FROM `registration` WHERE Email='$email' AND Password='$pwd'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
if($count==1)
{
  
    
   
    session_start();
    $_SESSION['UserId']=$row["UserId"];
    $_SESSION['Name']=$row["User_Name"];
    $_SESSION['Email']=$row["Email"];
    $_SESSION['Phone']=$row["Phone"]; 
    $_SESSION['Address']=$row["User_Address"];
    
    
    echo "<script> 
    var name='".$_SESSION['Name']." ';
    alert('welcome ' +name);
    
                     window.location.href='index.php';
                   
                     </script>";
 
 

}

else{
  echo "<script> alert('Login failed');
 </script>";

}





 
    

 }

 ?>
  <div class="main-container">

    <form action="login.php" method="post" class="w-100">
   

 <div class="outer-container my-5 w-100 d-flex justify-content-center align-items-center">
 <div class="form-container w-50">
                    <div class="d-flex flex-column">
                        <p class="my-heading" style="margin-bottom: 0;">LOGIN
                        </p>
                        <div id="dot"></div>
                    </div>
                     <div style="color:black;">....</div>
<div class="mb-3 w-50">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name=" email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"    placeholder="xyz40@mail.com"  required>
    
        </div>
  <div class="mb-3 w-50">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control " id="password" placeholder="Enter Strong Password" required>
  
    
  </div>
  
  <div class="w-50 my-4">
  <button type="submit" name="submit"  class="btn btn-primary w-100">Submit</button>
  </div>
  <a href="registration.php" >sign up?</a>         
  </div>
</div>
</div>

</form>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">

    </script>
</body>

</html>







