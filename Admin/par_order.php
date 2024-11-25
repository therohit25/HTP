<?php
if(!isset($_GET['orderid']))
{
header("location:order_det.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Details</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .profile-img {
        width: 10vw;
        border-radius: 50px;
        /* height: vh; */
      }

      .profile-img img {
        width: 100%;
        overflow: hidden;
        border-radius: 10%;
      }

      .left-panel-ele {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      }

      .left-panel {
        width: 30vw;
        height: 100vh;
        display: flex;
      }

      .img-back {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 100%;
        height: 100%;
        z-index: 1;
        padding: 5%;
      }

      .img-back::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url(./img/adminback.jpg);
        /* background-color: black; */
        opacity: 0.4;
        z-index: -1;

        background-position: 100%;
        object-fit: cover;
        background-repeat: no-repeat;
      }

      .img-width img {
        width: 100%;
        object-fit: cover;
        /* overflow: hidden; */
        height: 100%;
        border-radius: 50%;
      }

      .box {
        width: 100%;
        display: flex;
        background: linear-gradient(
          3deg,
          hsl(229, 90%, 77%) 51%,
          hwb(229 56% 2%) 51%
        );
      }

      .img-width {
        height: 20vh;
        width: 20vh;
        border-radius: 50%;
        overflow: hidden;
      }

      .admin-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
      }

      .admin-nav-ul {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 2rem;
        /* margin-top: 22%; */
        flex: 1;
        height: 100%;
        padding: 0;
      }

      .admin-nav-ul li a {
        text-decoration: none;
        color: #00000079;
        font-weight: 700;
      }
      .admin-nav-ul li:hover {
        background: linear-gradient(
          45deg,
          hsl(229, 86%, 80%) 51%,
          hsl(229, 90%, 77%) 51%,
          hwb(229 56% 2%) 51%
        );
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      }

      .admin-nav-ul li {
        list-style: none;
        width: 70%;
        text-align: center;
        padding: 2%;
        border-radius: 10px;
        cursor: pointer;
      }

      .right-panel {
        width: 100%;
        display: flex;
        justify-content: center;
      }

      .right-panel-box {
        width: 65vw;

        height: 95vh;
        overflow-y: scroll;
      }
      .tab-act {
        background: linear-gradient(
          45deg,
          hsl(229, 86%, 80%) 51%,
          hsl(229, 90%, 77%) 51%,
          hwb(229 56% 2%) 51%
        );
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      }
    </style>
  </head>

  <body>
    <div class="box">
      <div class="left-panel">
        <div class="left-panel-ele">
          <div class="img-back">
            <div class="img-width">
              <img src="./img/admin.png" alt="Reload" srcset="" />
            </div>
          </div>
          <!-- <div style="height: 100%"> -->
          <div class="admin-nav">
            <ul class="admin-nav-ul">
              <li>
                <i class="fa-solid fa-users"></i>
                <a href="userlist.php"> Registered Users</a>
              </li>
              <li>
                <i class="fa-solid fa-bag-shopping"></i>
                <a href="productlist.php">Products</a>
              </li>
              <li class="tab-act">
                <i class="fa-solid fa-list-check"></i>
                <a href="order_det.php">Orders Details</a>
              </li>
              <li>
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <a href="/">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="right-panel">
        <div class="right-panel-box">
          <div class="container-fluid bg-transparent py-3">
            <table
              class="table w-100 table-bordered table-hover table-responsive table-striped table-bg-dark"
            >
              <thead>
                <tr class="table-dark opacity-75">
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Quantity</th>
                
                  <!-- <th scope="col">Quantity</th> -->
                  <!-- <th scope="col">Product Name</th> -->
                </tr>
              </thead>

              <tbody>
                <?php
                include ('../connection.php');

 
$query = "SELECT * from registration WHERE UserId=".$_GET['uid'];
$result = mysqli_query($conn,$query);
$row1 = mysqli_fetch_assoc($result);

         $query = "SELECT products.Product_Name,products.Product_Price,order_list.Quantity,order_list.Time from order_list
INNER JOIN products ON products.Product_Id = order_list.Product_Id WHERE order_list.Order_Id = ".$_GET['orderid'];

 $sum = 0;
        $result= mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0) { 
            // <th scope="row">'.$User_Name.'</th>
            $counter = 1;
          while($row =
                mysqli_fetch_assoc($result))
                 { extract($row); echo '
                
                    <tr class="table-info">
                      <th scope="row">'.$counter.'</th>
                      <td>'.$Product_Name.'</td>
                      <td>'.$Product_Price.'</td>
                      <td>'.$Quantity.'</td>
                    
                    </tr>
                    ';
                    $sum += $Product_Price;
                    $counter++;
            } 
            
              }
                 ?>
              </tbody>
            </table>
            <?php
            echo'

            <div class="d-flex flex-column gap-2 justify-content-center my-5">
                <h1>Order Details </h1>
                <div class="uname d-flex flex-column gap-2">
             <div class="d-flex gap-2">   Name: <strong>   '.$row1["User_Name"].'</strong></div>
             <div class="d-flex gap-2">    Address  <strong>'.$row1["User_Address"].'</strong></div>
                </div>
                <div class="total-sum">
                   <address> Total:<strong>'.$sum.'</strong></address>
                </div>
            </div>'; ?>

          </div>
        </div>
      </div>
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
