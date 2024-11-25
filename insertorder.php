<?php
include 'connection.php';
 session_start();
$User_Id = $_SESSION['UserId'];
$query = "SELECT Order_Id FROM order_list Order by Order_Id DESC";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$currow = $row['Order_Id']+1;
$query = "INSERT INTO order_list (Order_Id,Product_Id,Quantity)
(SELECT ".$currow.",cart.Product_Id,cart.Quantity from cart where UserId =".$User_Id.")
";

$result = mysqli_query($conn, $query);

$query = "SELECT SUM(products.product_price * cart.Quantity) AS SUM FROM products INNER JOIN cart ON products.product_id = cart.product_id where cart.UserId =".$User_Id;
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total = $row['SUM'];

$query = "INSERT INTO orders_det (Order_Id,User_Id,Total_Price)
Values (".$currow.",".$User_Id.",".$total.")";
$result = mysqli_query($conn, $query);

if($result)
{
    $query = "DELETE FROM Cart WHERE UserId = ".$User_Id;
$result = mysqli_query($conn, $query);
if($result)
{
      echo "<script> alert('Order Placed Successfully');
                  window.location.href='products.php';</script>";
}
}
else
{
    echo mysqli_error($conn);
}
?>