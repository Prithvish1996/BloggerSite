
<?php session_start() ?>
<?php if(!isset($_SESSION['username'])): ?>

<?php header('Location:dashboard.php');?>

<?php else:?>

<?php include('inc/header.php') ?>
<?php  include('config/db.php')?>
   <div class="container">
   	
   	<h1 class="pt-3 pb-5 mb-5 text-center bg-danger text-light">POST</h1>
   	<?php $id=$_GET['id']; ?>

   	<?php 

         
 $posts_query ="SELECT * FROM posts WHERE id='$id'";
 
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


       

    

 	}
 }	

              
   	 ?>

   	 
   	<div class="row bg-dark text-light mb-5">

   		<div class="col-lg-4 text-center pt-5 mt-5">
   			<img style="width: 300px; height: 300px; padding: 15px;" src=<?php echo $feat_image; ?>>
   		</div>
   		<div class="col-lg-8 text-center">
   			<h1 class="text-center"><?php echo $title; ?></h1>
   			<p><?php echo $description; ?></p>
   			<a href=""><?php echo $category; ?></a>
   			<div class="row">
   			    <div class="col-lg-12 pt-5 pb-5">
   			    	<div class="row">
   			    	<div class="col-lg-4 pb-2">
   			    		<form action="likes.php" method="POST">
   			    			  <input type="hidden" name="id" value=<?php echo $id; ?>>

                                   <?php  
                                      
                                    
                                     $sql="SELECT * FROM likes WHERE post_id = '$id'";
                                     $query = mysqli_query($conn,$sql) or die('error');


                                     $cnt_likes=mysqli_num_rows($query);
                                      
                                   ?>

   			    			<input type="submit" name="like" value="Likes (<?php echo $cnt_likes;?>)" class="btn btn-light text-danger font-weight-bold ">
   			    		</form>
   			    		


   			    	</div>

   			    	<div class="col-lg-4 pb-2">
   			    		
   			    		<form action="dislikes.php" method="POST">
   			    			  <input type="hidden" name="id" value=<?php echo $id; ?>>

                                   <?php  
                                      
                                    
                                     $sql="SELECT * FROM dislikes WHERE post_id = '$id'";
                                     $query = mysqli_query($conn,$sql) or die('error');


                                     $cnt_dislikes=mysqli_num_rows($query);
                                      
                                   ?>

   			    			<input type="submit" name="dislike" value="Dislikes (<?php echo $cnt_dislikes;?>)" class="btn btn-light text-danger font-weight-bold ">
   			    		</form>
   			    		

   			    	</div>

   			    	<div class="col-lg-4 pb-2">
   			    		
   			    		<a class="btn btn-light text-danger" href=""><b>Comments (0)</b></a>

   			    	</div>
   			    	</div>
   			    </div>
   			</div>


   			<div class="row ">
   				
   				<div class="col-lg-4"></div>
   				<div class="col-lg-12">
   					<form class="form-horizontal" action="comment.php" method="POST">
   						<input type="hidden" name="id" value=<?php echo $id;?>>
                          <div class="form-group">
                      <label class="col-lg-6 control-label bg-primary rounded text-dark">Add comments</label>
                      <div class="col-lg-12">
                      	<textarea class="form-control"  rows="5" cols="20" name="comment" placeholder="Comment"></textarea>
                      </div>
                          </div> 

                               <input type="submit" name="postcomment" value="Comment" class="btn-danger rounded "><hr class="bg-light">
                               <a href="dashboard.php" class="btn btn-primary mb-3">Go Back</a>
   					</form>
   				</div>	


   			</div>
   		</div>
   	</div>

<div class="row">
   	   	
   	   	  <div class="col-lg-4">
   	   	  <h2 class="bg-primary text-center text-light  px-5 pb-3 pt-2 rounded">All Comments</h2>
   	   	  </div>
   	   	  <div class="col-lg-8 bprder mb-5 rounded" style="width: 122200px; height: auto; padding: 15px;border: 1px solid; ">
   	   	  	  
   	   	  	  <?php 

                     $com_query="SELECT * FROM comments WHERE post_id ='$id'";
                     $coms_result=mysqli_query($conn,$com_query) or die("ERROR");

					 if(mysqli_num_rows($coms_result)>0)
					 {
					 	while ($com = mysqli_fetch_assoc($coms_result))
					    {
					 		
                            $username = $com['username'];
                            $comment = $com['comment'];
                            ?>

                          <h4><?php echo $comment; ?></h4>
                          <p class="text-danger"><i>Posted by: <?php echo $username; ?></i></p><hr>

                            <?php
					    

					 	}
					 }	    

   	   	  	   ?>
   	   	  </div>

   	   </div>

   </div>

<?php include('inc/footer.php') ?>

  <?php endif;?>