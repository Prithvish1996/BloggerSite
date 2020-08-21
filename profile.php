
<?php session_start(); ?>
<?php include "inc/header.php" ?>
    <?php  

       include("config/db.php");
       if(isset($_FILES['profile_pic']))
       {
          $profession = $_POST['profession'];
           if($profession!="")
           {
             
                $uploadok = 1;
                $file_name = $_FILES['profile_pic']['name'];
                $file_size = $_FILES['profile_pic']['size'];
                $file_tmp = $_FILES['profile_pic']['tmp_name'];
                $file_type = $_FILES['profile_pic']['type'];
                $target_dir="assets/uploads";
                $target_file=$target_dir.basename($file_name = $_FILES['profile_pic']['name']);
                $check = getimagesize($_FILES['profile_pic']['tmp_name']);
                
                $exp = explode('.', $_FILES['profile_pic']['name']);
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
                      move_uploaded_file($file_tmp, "assets/uploads/".$file_name);
                        $url = $_SERVER['HTTP_REFERER'];
                        $seg = explode('/',$url);
                        $path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
                        $full_url = $path.'/'.'assets/uploads/'.$file_name;
                        $user_role = $_SESSION['id'];
                        $id = $_SESSION['id'];

                      $sql = "INSERT INTO profile(profession, profile_pic,user_role) VALUES('$profession','$full_url','$user_role')";
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
             echo  '<p>Please Enter your Profession</p>';
             echo  '</div>';
             echo  '</div>';
             }
       }


    ?>


     <?php if(!isset($_SESSION['username'])): ?>
  <?php header('Location:profile.php'); ?>
 <?php else:?>

 


<div class="row ">
<div class="col-lg-4 col-sm-12 col-md-12">
</div>
<div class="col-lg-4 col-sm-12 col-md-12">

<!---Registration Box--->
<div class="container-fluid pt-2">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <h3 class="modal-title text-justify text-light">Profile</h3>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="profile.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
    <label for="username">Profession</label>
    <input type="text" name= "profession" placeholder="Enter Profession" class="form-control" id="username" aria-describedby="emailHelp">
    </div>


    <div class="form-group">
    <label for="profile_pic">Profile Picture</label>
    <input type="file" name="profile_pic" class="form-control" placeholder="Profile Picture" id="pp">
    </div>


    <input type="submit" name ="register" value="Add" class="btn btn-primary">

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