<?php
    include_once("connect.php");
    session_start();
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `User_tbl` WHERE username='$username'";
        
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
                /*
                echo '<h1>'.$row["username"]."'s Profile</h1>";
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
               echo '<tr><td>Avatar:</td><td><img src="data:image/png;base64,'.base64_encode($row["avatar"]).'" width="100px" /></td></tr>';
                echo '<tr><td>Username:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>E-mail:</td><td>'.$row["email"].'</td></tr>';
                */
            }
            //echo '</table>';
        }
        else {
           echo "0 results";
        }
    }
    else {

        echo '<h2>All our members:</h2>';

        $sql = "SELECT * FROM `User_tbl`";
        
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                
                echo '<hr />';
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["avatar"].'" width="100px" /></td></tr>';
                echo '<tr><td>Username:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>E-mail:</td><td>'.$row["email"].'</td></tr>';
                
            }
        }
        else {
           echo "0 results";
        }
    }
    
    //include_once("includes/menu.php");
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

   
    <title>User Profile</title>
</head>

<body class="contact-page">
    <div class="main-body">
        <div class="container">
            <div class="row">
                         <?php 
                            if(isset($_SESSION['username']))
                            {
                                echo '<a href="userprofile.php" style="display:inline;color:white;float:right;">'.$_SESSION["username"].'</a>';
                                echo '<a href="logout.php" style="display:inline;color:white;float:right; padding-right: 20px">Logout</a>';
                            }
                            else
                            {
                                echo '<a href="login.php" style="display:inline;color:white;float:right;">Login</a>';
                                echo '<a href="register.php" style="display:inline;color:white;float:right; padding-right: 20px;">Register</a>';
                            }
                        ?>
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
                                        <h3><?php echo $username."'s Profile"; ?></h3>
                                        <h5><?php echo "ID: " .$row["id"]; ?></h5>
                                        <h5><?php echo "E-mail: ".$row["email"]; ?></h5>
                                        <div class="box-icon" >
                                        <?php
                                    
										                    echo '<img src="data:image/png;base64,'.base64_encode($row["avatar"]).'"width: "100px"; height="100px";class="img-responsive"; / >' ;
                     //<!-- src="data:image/png;base64,'.base64_encode($row["avatar"]).'" width="100px" -->
										                    ?>
										                    </div>
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">
        
                                        <div class="form-group">
                                          <h4><?php echo "My reviews:"; ?></h4>
                                        </div>
                                        <!--user reviews-->
                                        <div class="row margin-b-30">
						                              <?php
                                            include "dbconfig.php";

                                            $sql = "SELECT review_id,title, review, image, username
                                            FROM  `Review_tbl` 
                                            JOIN User_tbl ON Review_tbl.user_id = User_tbl.id
                                            WHERE Review_tbl.user_id =  '".$row["id"]."'
                                            ORDER BY Review_tbl.review_id DESC ";
                                            $query = mysql_query($sql);
                                        
                                            if ($query > 0) {
                                        		
                                                while($row = mysql_fetch_array($query)){
                                                    $review_id = $row['review_id'];
                                                    $title = $row['title'];
                                                    $review = $row['review'];
                                        			$image= $row['image'];
                                        			$name= $row['username'];
                                          ?>
                                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="box london">
                                    
                                              <div class="box-icon" >
                                                <?php
                                                  echo '<img src="data:image/png;base64,'.base64_encode($row["image"]).'"width: 380px; height=180px;class="img-responsive"; / >' ;
										                            ?>
                                      <!--  <img src="images/home-img-2.jpg" alt="Image" class="img-responsive"> -->
                                              </div>
                                              <div class="info float-container">
                                                <div class="col-sm-12 london-title">
                                                  <h3 class="text-uppercase">
                                                    <a href="DetailReview.php?r_id=<?=$review_id?>"> <?php echo $title; ?></a>
                                                  </h3>
                                                  <h4 class="text-uppercase"><?php echo $name; ?></h4>
                                                </div>
                                                <p><?php echo $review; ?></p><hr />
                                              </div>
                                            </div>
                                          </div>
							
	                                             <?php } ?> <!-- end of while -->
                                            <?php } ?>  <!-- end of if(query) -->   
                                        </div> <!-- row -->
                                        <!--end of user reviews -->
                                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input id="post-com" name="btn-post" type="submit" value="Load More" class="btn view_more btn-submit">
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

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>