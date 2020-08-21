
<?php
session_start();

include("config/db.php");
include ("inc/header.php");


if (isset($_POST['p_login']))
{

$email = $_POST['email'];
 
  $password=$_POST['password'];
  if($email!='' && $password!='')
      {

       $pass=sha1($password);
        $sql_c="SELECT * FROM users WHERE email='$email' AND password='$pass'";
       $result=mysqli_query($conn, $sql_c) or die("Error");
      

       
      if(mysqli_num_rows($result)>0)
      { 

        $pass=sha1($password);
       $sql="UPDATE users SET user_role='1' WHERE email='$email' AND password='$pass'";
       $result=mysqli_query($conn, $sql) or die("Error");

     echo '<div class="container pt-2">';
     echo  '<div class="alert alert-success text-center text-dark">';
     echo  '<p>Prime Login succesfull. Now you can post in our forum </p>';
     echo  '<a href="index.php"><u>CLICK HERE TO GO TO LOGIN PAGE AS A PRIME MEMBER</u></a>';
     echo  '<p>NEXT TIME YOU LOGIN YOU WILL BE BENEFITED AS PRIME BLOGGER</p>';
     echo  '</div>';
     echo  '</div>';
         
      }
       else
       {

          echo '<div class="container pt-2">';
          echo  '<div class="alert alert-danger text-center text-dark">';
          echo  '<p>Register First to enjoy prime benefit </p>';
          echo  '<a href="index.php"><u>CLICK HERE TO VISIT REGISTER AND LOGIN PAGE</u></a>';
          echo  '</div>';
          echo  '</div>';

       }



      } 


      else
      {
     echo '<div class="container pt-2">';
     echo  '<div class="alert alert-danger text-center text-dark">';
     echo  '<p>Login denied. Please check the credentials</p>';
     echo  '</div>';
     echo  '</div>';
      }



}
 
?>


 <?php if(isset($_SESSION['username'])): ?>
 	<?php header('Location:dashboard.php'); ?>
 <?php else:?>

 
<h1 class="bg-primary text-center pt-2 mt-2 pb-4 text-light">Fill login details to enjoy prime benefits</h1>

<div class="row">
<div class="col-lg-2 col-sm-1 col-md-3"></div>

<div class="col-lg-8 col-sm-10 col-md-6 mb-5">

<div class="container-fluid pt-2 mb-5">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <h3 class="modal-title text-justify text-light">Login</h3>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="" method="POST">
     <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name= "email" placeholder="Enter Email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>


    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
    </div>


    <input type="submit" name ="p_login" value="Login" class="btn btn-primary">

    <button type="reset" class="btn btn-light">Cancel</button>

      <div class="pt-5 text-center">
      	
           

      </div>


     </form>

       

      </div>  
</div>
</div>
</div>

</div>

<div class="text-center bg-dark container-fluid text-light pb-3 pt-3 mt-5">
   <h3>Login to join Prime</h3>
   
</div>
    <?php include "inc/footer.php" ?>
   <?php endif; ?>