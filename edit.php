<?php session_start() ?>
<?php if(!isset($_SESSION['username'])): ?>


<?php header('Location:dashboard.php');?>

<?php else:?>
<?php include('inc/header.php') ?>
<?php
     include("config/db.php");
     $id=$_GET['id'];

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

 		// $data = array(
   //                  'id'=>$id,
   //                  'title'=>$title,
   //                  'descripton'=>$descripton,
   //                  'category'=>$category,
   //                  'feat_image'=>$feat_image
   //        );
   //        print_r($data);
   //        exit();
 	}
 }		

 ?>



<div class="row ">
<div class="col-lg-2 col-sm-12 col-md-12">
</div>
<div class="col-lg-8 col-sm-12 col-md-12">

<!---Registration Box--->
<div class="container-fluid pt-2">
    <div class="modal-content">
      <div class="modal-header  bg-danger">



        <h3 class="modal-title text-justify text-light">Update Post</h3>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="update.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
     	<input type="hidden" name="id" value=<?php echo $id; ?>>
     	<input type="hidden" name="feat_image" 
     	value=<?php echo $feat_image; ?>>
    <label for="title">Title</label>
    <input type="text" name= "title" value=<?php echo $title; ?> placeholder="Enter Title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="descripton">Description</label>
    <textarea class="form-control" rows="5" cols="10" name="descripton"
    placeholder="Description"><?php echo $description; ?></textarea>
    </div>

    <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control">
      
     <option value=<?php echo $title; ?>><?php echo $category; ?></option>
     <option value="Entertainment">Entertainment</option>
     <option value="Education">Education</option>
     <option value="Technology">Technology</option>
     <option value="Politics">Politics</option>

    </select>

    </div>


    <div class="form-group">
    <label for="featuredimage">Featured Image</label>
    <input type="file" name="feat_image" class="form-control" placeholder="featured Image" id="pp">
    </div>


    <input type="submit" name ="post" value="Update POST" class="btn btn-primary">
   <a href="dashboard.php" class="btn btn-light">Back</a>
    
     
      <div class="pt-5 text-center">
      </div>
    </form>
      </div>  
</div>
</div>
</div>





</div>



    <?php include "inc/footer.php" ?>

<?php endif ?>	