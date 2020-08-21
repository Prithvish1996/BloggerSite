<?php session_start(); ?>
<?php include "inc/header.php" ?>
    <?php  

       include("config/db.php");
       if(isset($_FILES['feat_image']))
       {
          $post_id=$_POST['id'];
          $title = $_POST['title'];
         $upl_feat_image=$_POST['feat_image'];
          $descripton = $_POST['descripton'];
          $category = $_POST['category'];

          // $data = array(
          //           'id'=>$post_id,
          //           'title'=>$title,
          //           'descripton'=>$descripton,
          //           'category'=>$category,
          //           'upl_feat_image'=>$upl_feat_image
          // );
          // print_r($data);
          // exit();
          
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
                         $image_path =explode('/', $upl_feat_image);
                         $image = $image_path[6];



                        $full_url_fi = $path.'/'.'assets/featuredimages/'.$file_name;
                        $user_role = $_SESSION['user_role'];
                      $sql = "UPDATE posts SET title='$title',description='$descripton' , category='$category',feat_image= '$full_url_fi' WHERE id='$post_id'";
                     

                      unlink("assets/featuredimages/". $image);

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
    <?php include "inc/footer.php" ?>
