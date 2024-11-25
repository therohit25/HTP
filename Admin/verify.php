<?php ;
    include ('../connection.php');
    $query = "Update products set verified='Done' where product_id=".$_GET['ProductId'];
  $result= mysqli_query($conn,$query);
  if($result)
  {
   echo "<script> 
    alert('Product Verified Successfully');
    
                     window.location.href='productlist.php';
                   
                     </script>";
  }
  else
  {
    echo mysqli_error($conn);
  }
?>