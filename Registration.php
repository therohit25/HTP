<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         <link rel="stylesheet" href="./css/footer.css">

    <style>
        #namval,
        #cpassval,
        #passval,
        #emailval,
        #contactval {
            color: red;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        }

        .my-heading {
            font-family: fantasy;
            font-size: 3rem;
            text-transform: uppercase;

        }

        #dot {
            width: 10px;
            height: 2px;
            background-color: black;
            animation: animate 1s 1s infinite alternate-reverse ease-in-out;
        }

        @keyframes animate {
            0% {
                transform: translateX(100px);
            }

            50% {
                transform: translateX(50px);
            }

            100% {
                transform: translateX(0px);
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
    <div class="main-container">

        <form action="Register.php" method="post" class="w-100" onsubmit="return submithandler()">

            <div class="outer-container my-5 w-100 d-flex justify-content-center align-items-center">
                <div class="form-container w-50">
                    <div class="d-flex flex-column">
                        <p class="my-heading" style="margin-bottom: 0;">Register
                        </p>
                        <div id="dot"></div>
                    </div>
                    <div style="color:black;">....</div>
                    <div class="mb-3 w-50">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control " onkeyup="nvalidate()"
                            id="exampleInputEmail1" placeholder="Name" id="name" required>
                        <!-- <span id="n1"></span> -->
                        <small class="fomr-text" id="namval"></small>
                    </div>
                    <div class="mb-3 w-50">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name=" email" class="form-control " id="email" aria-describedby="emailHelp"
                            placeholder="xyz40@mail.com" onkeyup="emailval()" required>

                        <small class="fomr-text" id="emailval"></small>
                    </div>

                    <div class="mb-3 w-50">
                        <label for="exampleInputContact" class="form-label"> Phone</label>
                        <input type="number" name="phone" class="form-control " id="Contact" placeholder="Mobile No."
                            onkeyup="Contactval()" required>

                        <small class="fomr-text" id="contactval"></small>
                    </div>

                    <div class="mb-3 w-50">
                        <label for="exampleInputAddress" class="form-label"> Address</label>
                        <input type="text" name=" address" class="form-control" id="Address" placeholder="Address"
                            required>

                        <small class="fomr-text" id="addresval"></small>
                    </div>
                    <div class="mb-3 w-50">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control " id="Password"
                            placeholder="Enter Strong Password" onkeyup="passVal()" required>
                        <small class="fomr-text" id="passval"></small>
                    </div>



                    <div class="mb-3 w-50">
                        <label for="exampleInputPassword2" class="form-label">Confirm-Password</label>
                        <input type="password" class="form-control " id="CPassword" placeholder="Re-Enter Password"
                            onkeyup="CpassVal()" required>
                        <small class="fomr-text" id="cpassval"></small>
                    </div>




                    <button type="submit" name="submit" class="btn btn-primary">Submit✔️</button>

                    <a href="login.php">sign in?</a>

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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

        </script>

    <script>
        let set1 = 0;
        let set2 = 0;
        let set3 = 0;
        let set4 = 0;
        let set5 = 0;
        function emailval() {
            let regemail = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            let email = document.getElementById('email').value;

            if (!email.match(regemail)) {
                document.getElementById("emailval").innerHTML = "⚠️Enter Valid Email";
                set1 = 0;
            }
            else {
                document.getElementById("emailval").innerHTML = ""
                set1 = 1
            }

        }
        function Contactval() {
            let contact = document.getElementById('Contact').value;
            if (contact.length < 10) {
                document.getElementById("contactval").innerHTML = "⚠️Enter  10 digits No.";
                set2 = 0
            }
            else {
                document.getElementById("contactval").innerHTML = ""
                set2 = 1
            }

        }

        function CpassVal() {

            let cpassword = document.getElementById('CPassword').value
            if (cpassword !== document.getElementById('Password').value) {
                document.getElementById("cpassval").innerHTML = "⚠️Password Not Matching";
                set3 = 0
            }
            else {
                document.getElementById("cpassval").innerHTML = ""
                set3 = 1
            }
        }
        function passVal() {
            let regpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            let password = document.getElementById('Password').value
            if (!password.match(regpass)) {
                document.getElementById("passval").innerHTML = "⚠️1 digit 1 symbol and 8-15 Characters ";
                set4 = 0
            }
            else {
                document.getElementById("passval").innerHTML = ""
                set4 = 1
            }
        }


        function nvalidate() {
            let regname = /^[a-zA-Z]+ [a-zA-Z]+$/;
            let x = document.getElementById("name").value;

            if (!x.match(regname)) {
                document.getElementById("namval").innerHTML = "⚠️Please enter Valid Name";
                set5 = 0
            }
            else {
                document.getElementById("namval").innerHTML = "";
                set5 = 1
            }

        }
        function submithandler() {
            if (set1 == 0 || set2 == 0 || set3 === 0 || set4 === 0 || set5 === 0) {
                return false
            }
            else { return true; }

        }
    </script>
</body>

</html>