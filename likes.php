<?php session_start(); ?>

<?php if(!isset($_SESSION['username'])): ?>
      <?php header('Location:dashboard.php'); ?>
<?php else:?>
    <?php 
          
          include("config/db.php");
          $user_id = $_SESSION['id'];
          if (isset($_POST['like']))
          {
          	$like_query ="SELECT * FROM likes WHERE user_id='$user_id'";
 
            $like_result=mysqli_query($conn,$like_query) or die("ERROR");

            $check_query ="SELECT * FROM dislikes WHERE user_id='$user_id'";
 
            $check_dislikes=mysqli_query($conn,$check_query) or die("ERROR");
          	
          	if(mysqli_num_rows($like_result)==0)
          	{
          	$post_id = $_POST['id'];
          	$sql = "INSERT INTO likes(user_id,post_id) VALUES ('$user_id','$post_id')";

	          	if ($conn->query($sql))
	            {
	          		header("Location:view.php?id=".$post_id);

	          	}
	          	if(mysqli_num_rows($check_dislikes)!=0)
	          	{
	          		$post_id = $_POST['id'];
                	$sql = "DELETE FROM dislikes WHERE user_id='$user_id'";

	          	if ($conn->query($sql))
	            {
	          		header("Location:view.php?id=".$post_id);
	          	}
	          	}
	          	
             }
             else
             {
             	$post_id = $_POST['id'];
          	$sql = "DELETE FROM likes WHERE user_id='$user_id'";

	          	if ($conn->query($sql))
	            {
	          		header("Location:view.php?id=".$post_id);
	          	}

             }
         }

     ?>
<?php endif; ?>	