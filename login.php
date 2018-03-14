<?php
session_start(); //Start the Session
require_once('connect.php');
//print_r($_POST); //this is to see if we are actually getting the data
//3. If the form is submitted or not.
//3.1 If the form is submitted
if(isset($_POST) && !empty($_POST)){
//3.1.1 Assigning posted values to variables.
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = md5($_POST['password']);  
  //3.1.2 Checking the values are existing in the database or not
  $sql = "SELECT * FROM `User_tbl` WHERE username = '$username' AND password='$password'";
  $result = mysqli_query($connection, $sql);
  $count = mysqli_num_rows($result);
  //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
  if($count == 1){
    $_SESSION['username'] = $username;
  }else{
    //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
    $fmsg = "Invalid Username/Password";
  }
}
//3.1.4 if the user is logged in Greets the user with message
if(isset($_SESSION['username'])){
  //$smsg = "User already logged in";
  header('location: index.php'); //redirects to index.php
  //echo "Hi " . $username . "";
  //echo "This is the Members Area";
  //echo "<a href='logout.php'>Logout</a>";
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.

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

   
    <title>Login to OSTAAPP</title>
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
                                        <h3>Login to OSTAAPP</h3>
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">        
                                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
          
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>                                    
                                            <input type="text" class="form-control" id="username" name="username" placeholder="User name" value="">                                    
                                        </div>
                                        
                                        <div class="input-group">
                                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>      
                                        </div>
                                            
                                        <div class="form-group">
                                            <input id="submit" name="btn-save" type="submit" value="Login" class="btn view_more btn-submit">
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
<?php } ?>