<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from crud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

if(isset($_POST['submit'])) 
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $sql="update crud set id='$id',name='$name',email='$email',mobile='$mobile',password='$password'
    where id=$id";

    $result=mysqli_query($con,$sql);
    if($result)
{
   // echo "Data updated Successfully";
header('location:display.php');
}    
else
{
die(mysqli_error($con));
}
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>







  <div class="container my-5" > 
    //margin=5

   <form method="post" >
  <div class="mb-3">
    <label >Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name"  autocomplete= "off"value=<?php echo $name ;?>>
  </div>
  <div class="mb-3">
    <label >Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" value=<?php echo $email ;?> autocomplete= "off">
  </div>
  <div class="mb-3">
    <label >Mobile</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile"  value=<?php echo $mobile ;?> autocomplete= "off">
  </div>
  <div class="mb-3">
    <label >Password</label>
    <input type="text" class="form-control" placeholder="Enter your password" name="password" value=<?php echo $password ;?> autocomplete= "off">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">update</button>
</form>

</div>

  </body>
</html>