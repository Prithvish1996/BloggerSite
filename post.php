
<?php session_start(); ?>
<?php include "inc/header.php" ?>
    <?php  

       include("config/db.php");
       if(isset($_FILES['feat_image']))
       {
          $title = $_POST['title'];
          $descripton = $_POST['descripton'];
          $category = $_POST['category'];
          
           if($title!="" && $descripton!="" && $category!="")
           {
             
                $uploadok = 1;
                $file_name = $_FILES['feat_image']['name'];
                $file_size = $_FILES['feat_image']['size'];
                $file_tmp = $_FILES['feat_image']['tmp_name'];
                $file_type = $_FILES['feat_image']['type'];
                $target_dir="assets/featuredimages";
                $target_file=$target_dir.basename($file_name = $_FILES['feat_image']['name']);
                $check = getimagesize($_FILES['feat_image']['tmp_name']);
                
                $exp = explode('.', $_FILES['feat_image']['name']);
                $text = end($exp);
                $file_ext=strtolower($text);

              
           
                  
                  $extensions = array("jpg","jpeg","png");
                  if(in_array($file_ext,$extensions)==false)
                  {
                    echo '<div class="container pt-2">';
                    echo  '<div class="alert alert-danger text-center text-dark">';
                    echo  '<p>Please choose the image which has the extensions as jpeg, jpg, png.</p>';
                    echo  '</div>';
                    echo  '</div>';
                    $msg="NO";
                    
                  }
                  if(file_exists($target_file))
                  {
                    echo '<div class="container pt-2">';
                    echo  '<div class="alert alert-danger text-center text-dark">';
                    echo  '<p>Sorry! file already exsis</p>';
                    echo  '</div>';
                    echo  '</div>';
                    $msg="NO";
                  }
                  
                  if(empty($msg)==true)
                  {
                      move_uploaded_file($file_tmp, "assets/featuredimages/".$file_name);
                        $url = $_SERVER['HTTP_REFERER'];
                        $seg = explode('/',$url);
                        $path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
                        $full_url_fi = $path.'/'.'assets/featuredimages/'.$file_name;
                        $user_role = $_SESSION['user_role'];
                      $sql = "INSERT INTO posts(title,description,category, feat_image,user_role) VALUES('$title','$descripton','$category','$full_url_fi','$user_role')";

                        $query=$conn->query($sql);
                        if($query)
                        {
                          header('Location:dashboard.php');
                        }
                        else
                        {
                           echo '<div class="container pt-2">';
                           echo  '<div class="alert alert-danger text-center  text-dark">';
                           echo  '<p>Failed to upload Image.</p>';
                           echo  '</div>';
                           echo  '</div>';

                        }


                  }

           }
           else
           {
             echo '<div class="container pt-2">';
             echo  '<div class="alert alert-danger text-center text-dark">';
             echo  '<p>Please Enter all the details</p>';
             echo  '</div>';
             echo  '</div>';
             }
       }


    ?>


     <?php if(!isset($_SESSION['username'])): ?>
  <?php header('Location:post.php'); ?>
 <?php else:?>

 


<div class="row ">
<div class="col-lg-2 col-sm-12 col-md-12">
</div>
<div class="col-lg-8 col-sm-12 col-md-12">

<!---Registration Box--->
<div class="container-fluid pt-2">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <h3 class="modal-title text-justify text-light">Profile</h3>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="post.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name= "title" placeholder="Enter Title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="descripton">Description</label>
    <textarea class="form-control" rows="5" cols="10" name="descripton"
    placeholder="Description"></textarea>
    </div>

    <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control">
      
     <option>Select</option>
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


    <input type="submit" name ="post" value="Add POST" class="btn btn-primary">

    <button type="reset" class="btn btn-light">Reset</button>

      <div class="pt-5 text-center">
        
      </div>
    </form>
      </div>  
</div>
</div>
</div>





</div>



    <?php include "inc/footer.php" ?>
   <?php endif; ?>