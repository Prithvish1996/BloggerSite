<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>BloggerSite</title>
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">BloggerSite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MENU
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           
           
<?php $login_url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>


         <?php if($login_url=="http://localhost/BloggerSite/index.php"): ?>
         <a class="dropdown-item" href="aboutus.php">About Us</a>
         <a class="dropdown-item bg-primary text-light text-center" href="blogger.php"><h3>Join Prime</h3></a>

          <?php elseif(isset($_SESSION['username'])): ?>
          <a class="dropdown-item" href="dashboard.php">Home</a>
          <?php if ($_SESSION['user_role']==1): ?>
         <a class="dropdown-item" href="post.php">Add Post</a>
         <?php endif;?>
          <a class="dropdown-item" href="profile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
           <?php elseif($login_url=="http://localhost/BloggerSite/prime.php"): ?>

                   <a class="dropdown-item" href="aboutus.php">About Us</a>
                   <a class="dropdown-item" href="index.php">LOGIN AND REGISTER</a>
             
               <?php else: ?>
                <a class="dropdown-item" href="dashboard.php">DashBoard</a>
        <?php endif;?>

           <?php if($login_url=="http://localhost/BloggerSite/blogger.php" ): ?>
            <a class="dropdown-item bg-danger text-light text-center" href="index.php"><h3>Join as Normal User</h3></a>
           <?php endif;?>
             
             
           
        </div>
      </li>
      <li class="nav-item">
      </li>
    </ul>
    
  </div>
</nav>


