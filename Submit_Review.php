<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
     $user_id= $_POST['1'];
     $title = $_POST['title'];
     $price = floatval($_POST['price']);
     $review = $_POST['review'];
     $category_name=$_POST['category'];
     $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
     $image_name = addslashes($_FILES['image']['name']);
 // variables for input data

 // sql query for inserting data into database
 
     $sql_query = "INSERT INTO Review_tbl(user_id, title, review, image, category_name, price) 
     VALUES(1,'$title','$review','$image','$category_name','$price')";
     
     $result=mysql_query($sql_query);
     if($result)
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    
        //echo "Error: " . $sql_query . "<br>" . $conn->error;
        // sql query for inserting data into database
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

   
    <title>Submit Review</title>
</head>

<body class="contact-page">
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
                                        <h3>Submit A Review</h3>
                                        <h4>You write, we share!!!</h4>
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">        
                                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
          
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" id="title" name="title" placeholder="TITLE..." value="">                                    
                                        </div>
          
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="price" name="price" placeholder="PRICE...(Euros)" value="">      
                                        </div>
                                        
                                        <div class="form-group">
                                            <select id="category" name="category">
                                              <option value="">Select a Cetegory</option>
                                              <option value="Foods">Foods</option>
                                              <option value="Electronics">Electronics</option>
                                              <option value="Home">Home</option>
                                              <option value="Sports and leasures">Sports and leasures</option>
                                              <option value="Clothing and accessories">Clothing and accessories</option>
                                              <option value="Transport">Transport</option>
                                              <option value="Medicine">Medicine</option>
                                              <option value="Books and tationnary">Books and Stationnary</option>
                                              <option value="Beauty">Beauty</option>
                                              <option value="Toys and enfant care">Toys and enfant care</option>
                                              
                                            </select>
                                        </div>
                                      
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="review" name="review" placeholder="REVIEW..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" id="image">
                                        </div>
                                            
                                        <div class="form-group">
                                            <input id="submit" name="btn-save" type="submit" value="Save" class="btn view_more btn-submit">
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
        /* Google map
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                                zoom: 16,
                                center: new google.maps.LatLng(13.758468,100.567481),
                                scrollwheel: false
                            };  
        
            map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
                calculateCenter();
            });
        
            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(center);
            });
        } // initialize

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap(){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }
      
        // DOM is ready.
        $(document).ready(function(){
            loadGoogleMap();
        });
    </script>
</body>
</html>
