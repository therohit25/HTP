<?php
session_start();
if(!isset($_SESSION['Id']))
{
  header('location:Admin_login.php');
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
                  <th scope="col">UserName</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Time</th>
                  <th scope="col">Order Details</th>
                  <!-- <th scope="col">Quantity</th> -->
                  <!-- <th scope="col">Product Name</th> -->
                </tr>
              </thead>

              <tbody>
                <?php
                include ('../connection.php');

         $query = "SELECT orders_det.Order_Id,orders_det.Total_Price,orders_det.Time,registration.User_Name,registration.UserId from orders_det
INNER JOIN registration ON orders_det.User_Id = registration.UserId";
//          $query = "SELECT products.Product_Name,products.Product_Price,orders.Order_Id,orders.Quantity,orders.Time,registration.User_Name from orders 
// INNER JOIN products ON orders.Product_Id = products.Product_Id INNER JOIN registration ON orders.UserId = registration.UserId";

        $result= mysqli_query($conn,$query);
       
        if(mysqli_num_rows($result)>0) { 
          while($row =
                mysqli_fetch_assoc($result)) { extract($row); echo '
                <tr class="table-info">
                  <th scope="row">'.$Order_Id.'</th>
                  <th scope="row">'.$User_Name.'</th>
                  <td>'.$Total_Price.'</td>
                  <td>'.$Time.'</td>
                  <td> <a href="par_order.php?orderid='.$Order_Id.'&uid='.$UserId.'">See Detail</a> </td>
                  
                </tr>
             
                '; } 
              }
                 ?>
              </tbody>
            </table>
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
