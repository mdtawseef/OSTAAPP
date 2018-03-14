<?php
require_once('connect.php');
//print_r($_POST); //this is to see if we are actually getting the data
// If the values are posted, insert them into the database.
if(isset($_POST) && !empty($_POST)){
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = md5($_POST['password']);
  $avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
  
  $sql = "INSERT INTO `User_tbl` (username, email, password, avatar) VALUES ('$username', '$email', '$password', '$avatar')";
  $result = mysqli_query($connection, $sql);
  if($result){
    $smsg = "User Registration successfull";
  }else{
    $fmsg = "User registration failed";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,400italic'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" type="text/css" href="css/style.css">

   
    <title>Register to OSTAAPP</title>
</head>

<body class="contact-page">
    <div class="main-body">
        <div class="container">
            <!-- Display status message -->
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
            <?php } ?>
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
            <?php } ?>
            <div class="row">
                                        <a href="login.php" style="display:inline;color:white;float:right;">Login</a>
                        <a href="register.php" style="display:inline;color:white;float:right; padding-right: 20px;">Register</a>                

                <div class="main-page">
                    <aside class="main-navigation">
                        <div class="main-menu">

                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-2-1 block-width-full home">                                    
                                    <a href="index.php" class="block-keep-ratio__content  main-menu-link">
                                        <span class="main-menu-link-text">
                                                
                                        </span>                                        
                                    </a>
                                </div>                                
                            </div>

                            <div class="menu-container">                                
                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-left  about-main">                                    
                                    <a href="index.php" class="main-menu-link about block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-user fa-4x main-menu-link-icon"></i>
                                        ABOUT
                                    </a>                                    
                                </div>

                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-right  contact-main">
                                    <a href="Submit_Review.php" class="main-menu-link contact block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-envelope-o fa-4x main-menu-link-icon"></i>
                                        SUBMIT A REVIEW
                                    </a>                                
                                </div>    
                            </div>   

                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-1-1 block-keep-ratio-md-2-1 block-width-full gallery">                                    
                                    <a href="gallery.html" class="main-menu-link  block-keep-ratio__content">
                                        <span class="main-menu-link-text">
                                            GALLERY    
                                        </span>                                            
                                    </a>                                    
                                </div>                                
                            </div>

                            <!-- sidebar carousel -->
                            <div class="menu-container">
                                <!--<div class="mauris">-->
                                    
                                <!--</div> -->
                            </div>
                        </div> <!-- main-menu -->
                    </aside> <!-- main-navigation -->

                    <div class="content-main contact-content">
                        <div class="contact-content-upper">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="gallery_title">
                                        <h3>Register to OSTAAPP</h3>
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">        
                                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
          
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" id="username" name="username" placeholder="User name" value="">                                    
                                        </div>
          
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="">      
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>      
                                        </div>
                                      
                                        <div class="form-group">
                                            <input type="file" name="avatar" id="avatar">
                                        </div>
                                            
                                        <div class="form-group">
                                            <input id="submit" name="btn-save" type="submit" value="Register" class="btn view_more btn-submit">
                                        </div>            
                                    
                                    </form>    
                                </div> <!-- .contact-left -->

                            </div> <!-- .row -->
                        </div>

                    </div> <!-- .contact-content -->
                </div> <!-- .main-page -->
            </div> <!-- .row -->

            <footer class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer">
                    <p class="copyright">Copyright © 2017 | OSTAAPP
                    
                    </p>
                </div>    
            </footer>  <!-- .row -->   

        </div> <!-- .container -->
    </div> <!-- .main-body -->