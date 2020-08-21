
<?php
session_start();
include("config/db.php");


if (isset($_POST['register']))
{
	$username =$_POST['username'];
	$email =$_POST['email'];
	$password =$_POST['password'];
	$role_1="0";

	if ($username !=='' && $email!=='' && $password!=='') 
	{
		$pwd_hash = sha1($password);
		$stmt_r=$conn->prepare("INSERT INTO users (username,email,password,user_role) VALUES(?,?,?,?)");

			$stmt_r->bind_param("ssss",$username,$email,$pwd_hash,$role_1);
		  $stmt_r->execute();

	}
	else
	{
		
		 echo '<div class="container pt-2">';
		 echo  '<div class="alert alert-danger text-center text-dark">';
		 echo  '<p>Please fill all thje details for succesful Registration</p>';
		 echo  '</div>';
		 echo  '</div>';
		 
	}




}




 if(isset($_POST['login']))
  {
       $email = $_POST['email'];
    
      $password=$_POST['password'];
      if($email!='' && $password!='')
      {
      	$pass=sha1($password);
      	$sql="SELECT * FROM users WHERE email ='$email' AND password ='$pass'";
      	$result=mysqli_query($conn, $sql) or die("Error");

      	if(mysqli_num_rows($result)>0)
      	{
      		while ($row = mysqli_fetch_assoc($result))
      	    {
      	    	$id=$row['id'];
      	    	$username=$row['username'];
      	    	$email=$row['email'];
      	    	$password=$row['password'];
              $user_role=$row['user_role'];
      	    	


      			$_SESSION['id']=$id;
      			$_SESSION['username']=$username;
      			$_SESSION['email']=$email;
      			$_SESSION['password']=$password;
            $_SESSION['user_role']=$user_role;

      			header('Location:dashboard.php');
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

 <?php include "inc/header.php" ?>
<h1 class="bg-primary text-center pt-2 mt-2 pb-4 text-light">Login or Register Here</h1>

<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6">


<!---Registration Box--->
<div class="container-fluid pt-2">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <h3 class="modal-title text-justify text-light">Register</h3>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="index.php" method="POST">
     <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name= "username" placeholder="Enter Username" class="form-control" id="username" aria-describedby="emailHelp">
    </div>


    <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email Address" id="email">
    </div>

    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
    </div>


    <input type="submit" name ="register" value="Register" class="btn btn-primary">

    <button type="reset" class="btn btn-light">Cancel</button>

      <div class="pt-5 text-center">
      	
           

      </div>


    </form>



      </div>  
</div>
</div>
</div>




<div class="col-lg-6 col-sm-6 col-md-6">


<!---Login Box--->
<div class="container-fluid pt-2">
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


    <input type="submit" name ="login" value="Login" class="btn btn-primary">

    <button type="reset" class="btn btn-light">Cancel</button>

      <div class="pt-5 text-center">
      	
           

      </div>


     </form>

       

      </div>  
</div>
</div>
</div>
</div>

<div class="text-center bg-dark container-fluid text-light pb-3 my-5 mt-5">
   <h3>Login as from Prime to get prime access for lifetime</h3>
   <form action="prime.php" method="POST">
     
   <input type="submit" name ="prime" value="Prime" class="btn btn-primary px-5">

   </form>
</div>
    <?php include "inc/footer.php" ?>
   <?php endif; ?>