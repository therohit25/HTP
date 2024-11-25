<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        
        </style>


</head>
<body>

<?php
 if(isset($_POST['submit']))
 {
    include '../connection.php';
    $name=$_POST['name'];
    $pwd=$_POST['password'];

$query="SELECT * FROM `adminlogin` WHERE User_Name='$name' AND Password='$pwd'";


$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
if($count==1)
{
  
    
   
    session_start();
    $_SESSION['Id']=$row["Id"];
    $_SESSION['Name']=$row["User_Name"];
  
    $name= $_SESSION['Name'];
  
    echo "<script> 
    alert('Welcome , $name');
    
                     window.location.href='userlist.php';
                   
                     </script>";
 
 

}

else{   
  echo "<script> alert('Login failed');
 </script>";

}





 
    

 }

 ?>




<div class="container w-100 d-flex justify-content-center align-items-center flex-column" style="height:90vh;">
    <form action="" method="post" class="w-50">
        <h1 align=center>LOGIN</h1>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
    
        </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control " id="exampleInputEmail1">
  
    
  </div>
  
  <button type="submit" name="submit"  class="btn btn-primary w-100">Submit</button>
         
  </div>


</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">

    </script>
</body>
</html>

