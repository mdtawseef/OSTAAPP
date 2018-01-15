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
<!--
Accord Template
http://www.templatemo.com/tm-478-accord
-->
    <title>Welcome - OSTAAPP</title>
</head>

<body>
    <div class="main-body">	
        <div class="container">
            <div class="row">               
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
                                    <a href="index.php" class="main-menu-link  block-keep-ratio__content">
                                        <span class="main-menu-link-text">
                                            GALLERY    
                                        </span>                                            
                                    </a> 
                                           
                                </div>                                
                            </div>

                            <!-- sidebar carousel -->
                           
                        </div> <!-- main-menu -->
                    </aside> <!-- main-navigation -->

                    <div class="content-main">
                        <a href="login.php" style="display:inline;color:white;float:right;">Login</a>
                         <a href="register.php" style="display:inline;color:white;float:right; padding-right: 30px;">Register</a>
                         <div class="form-group">                                    
                                            <input type="text" class="form-control" id="name" name="name" placeholder="SEARCH..." value="">                                    
                                        </div>
                        <div class="row margin-b-30">
						<?php

    include "dbconfig.php";

    $sql = "SELECT title, review, image, username
    FROM  `Review_tbl` 
    JOIN User_tbl ON Review_tbl.user_id = User_tbl.id
    ORDER BY Review_tbl.review_id DESC ";
    $query = mysql_query($sql);

    if ($query > 0) {
		
        while($row = mysql_fetch_array($query)){
            $review_id = $row['review_id'];
            $title = $row['title'];
            $review = $row['review'];
			$image= $row['image'];
			$name= $row['name'];
            
    
?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box london">
                                    
                                    <div class="box-icon" >
                                        <?php
                                    
										 echo '<img src="data:image/png;base64,'.base64_encode($row["image"]).'"width: 380px; height=122px;class="img-responsive"; / >' ;
										 ?>
                                      <!--  <img src="images/home-img-2.jpg" alt="Image" class="img-responsive"> -->
                                    </div>
                                    <div class="info float-container">
                                        <div class="col-sm-12 london-title">
                                            <h3 class="text-uppercase"><?php echo $title; ?></h3>
                                            <h4 class="text-uppercase"><?php echo $name; ?></h4>
                                        </div>
                                        <p><?php echo $review; ?></p><hr />
 
                                    </div>
                                </div>
                            </div>
							
	<?php } ?> <!-- end of while -->
	<?php } ?>  <!-- end of if(query) -->   
                        </div> <!-- row -->
                    
                    </div> <!-- .content-main -->
                </div> <!-- .main-page -->
            </div> <!-- .row -->           
            <footer class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer">
                    <p class="copyright">Copyright © 2017 OSTAAPP                 
                    </p>
                </div>    
            </footer>  <!-- .row -->      
        </div> <!-- .container -->
    </div> <!-- .main-body -->

    <!-- JavaScript -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
