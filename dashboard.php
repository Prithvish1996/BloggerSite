<?php 

   session_start();
   
 ?>

 <?php include("inc/header.php") ?>

<?php
 $url = $_SERVER['PHP_SELF'];
 $seg=explode('/',$url);
 $path="http://localhost".$seg[0].'/'.$seg[1];
 
 $full_url=$path.'/'.'img'.'/'.'default_profile.png';


  ?>



<?php 
include("config/db.php");
$id=$_SESSION['id'];
 $query="SELECT * FROM profile WHERE user_role='$id'";

 $result=mysqli_query($conn,$query) or die("error");

 if (mysqli_num_rows($result)>0) 
 {
 	while ($row = mysqli_fetch_assoc($result))
    {
 		$id =$row['id'];
 		$profile_pic = $row['profile_pic'];
 		$profession = $row['profession'];
 	}
 }
 else
 {
 	$profile_pic = $full_url;
 	$profession = "";
 }


 ?>

<?php  if($_SESSION['user_role']==1):?>

	<h4 class="bg-danger text-center text-light">Admin Dashboard</h4>
	<?php else: ?>
		<h4 class="bg-danger text-center text-light">Users Dashboard</h4>
    <?php endif;?>

 <?php if(!$_SESSION['username']): ?>
 	<?php header('Location:index.php'); ?>
 <?php else:?>	



<div class="container-fluid pt-5">
 <h3 class="text-center">Welcome <?php echo $_SESSION['username'];  ?></h3>



<div class="row">
	
	<div class="col-lg-12">
		<p class="text-center">
		<img style="width: 250px; height: 200px; border-radius: 50%; border: 1px solid; padding: 15px;" src="<?php echo $profile_pic ;?>" >
		<?php echo '<h4 class="text-center">'.$profession.'</h4>'; ?>
		</p>
	</div>
</div>

<h1 class="text-center bg-primary text-light pb-2">Here are your posts</h1>

<?php



 $posts_query ="SELECT * FROM posts";
 $posts_result=mysqli_query($conn,$posts_query) or die("ERROR");

 if(mysqli_num_rows($posts_result)>0)
 {
 	while ($posts = mysqli_fetch_assoc($posts_result))
    {
 		$id = $posts['id'];
 		$title = $posts['title'];
 		$description = $posts['description'];
 		$category = $posts['category'];
 		$feat_image = $posts['feat_image'];
     ?>
			<div class="row container-fluid">
				
				<div class="col-lg-2 col-md-4 col-sm-12 text-center">
					<img style="width: 150px; height: 150px; padding: 15px;" src=<?php echo $feat_image;?> >
				</div>
				<div class="col-lg-10 col-md-8 col-sm-12">
					<h1><a href=""><?php echo $title; ?></a></h1>
					<p><?php echo $description; ?></p>
					<a href=""><?php echo $category; ?></a>
					<div class="row text-center pt-5">
						
						<?php if ($_SESSION['user_role']!=1): ?>

                      <div class="col-lg-12 col-md-12 col-sm-12"><a class="btn btn-danger" href=view.php?id=<?php echo $id;?>><b>View</b></a></div>
                      <?php else: ?>
                      	<div class="col-lg-1 col-md-4 col-sm-4"><a class="btn btn-danger" href=view.php?id=<?php echo $id;?>><b>View</b></a></div>
                      <div class="col-lg-1 col-md-4 col-sm-4"><a class="btn btn-danger" href=edit.php?id=<?php echo $id;?>><b>Edit</b></a></div>
                      <div class="col-lg-1 col-md-4 col-sm-4">
                             
                             <form action="delete.php" method="POST">
                             	<input type="hidden" name="id" value=<?php echo $id; ?>>
                             	<input type="hidden" name="feat_image" value=<?php echo $feat_image; ?>>
                             	<input type="submit" name="delete" value="DELETE" class="btn btn-danger">

                             </form>

                      </div> 
                  <?php endif;?>

					</div>
				</div>

			</div><hr>
     <?php
 		
 	}
 }

  ?>




</div>
 <?php include("inc/footer.php") ?>
 <?php endif;?>