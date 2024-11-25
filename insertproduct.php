<?php
if(isset($_POST['submit']))
{
    echo "Submited";
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['UserId']))
    {
    header("location:login.php");
    }
    $name = $_POST['pname'];
    if($_POST['cName'] != '')
    {

        $category = $_POST['cName'];
    }
    else
    {

        $category = $_POST['cname'];
    }
    

    $ProductDes = addslashes($_POST['ProductDes']);
    $date = $_POST['date'];
    $bprice=$_POST['bprice'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
 
    $UserId = $_SESSION['UserId'];

  $filename = $_FILES["PImg"]["name"] ;
        $tmp_filename = $_FILES["PImg"]["tmp_name"] ;
        $file_ext = explode(".",$filename);
    $filecheck = strtolower(end($file_ext));
    $file_extensions = array('png','jpg','jpeg');

  $billfile = $_FILES["Bill"]["name"] ;
        $tmp_Billfile = $_FILES["Bill"]["tmp_name"] ;
        $bill_ext = explode(".",$billfile);
    $billcheck = strtolower(end($bill_ext));
    $billfile_extensions = array('png','jpg','jpeg');


    if(in_array($filecheck,$file_extensions) && $_FILES["PImg"]["size"]<1053248)
    {
        $folder1 = "./Server_Storage/".$filename;
        move_uploaded_file($tmp_filename,$folder1);
           
    if(in_array($billcheck,$billfile_extensions) && $_FILES["Bill"]["size"]<1053248)
    {
         $folder2 = "./Server_Storage/".$billfile;
        move_uploaded_file($tmp_Billfile,$folder2);

       $query = "INSERT INTO Products(UserId,Product_Name,Product_Des,Category,Product_Img,Bill_Img,Product_Price,Buying_Price,Quantity) values (".$UserId.",'$name','$ProductDes','$category','$folder1','$folder2',".$price.",".$bprice.",".$quantity.")";
    
        $result = mysqli_query($conn,$query);
         if($result)
    {
 echo "Inserted Successfully";
       header("location:products.php");
    }
else
    {
        echo mysqli_error($conn);
    }}
}
else
    {
        echo "Error";
    }
}
else
    {
        echo "Error". mysqli_error($conn);
    }
?>