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

    <title>About</title>
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
                                    <a href="index.html" class="block-keep-ratio__content  main-menu-link">
                                        <span class="main-menu-link-text">
                                                
                                        </span>                                        
                                    </a>
                                </div>                                
                            </div>

                            <div class="menu-container">                                
                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-left  about-main">                                    
                                    <a href="about.html" class="main-menu-link about block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-user fa-4x main-menu-link-icon"></i>
                                        ABOUT
                                    </a>                                    
                                </div>

                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-right  contact-main">
                                    <a href="contact.html" class="main-menu-link contact block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-envelope-o fa-4x main-menu-link-icon"></i>
                                        CONTACT
                                    </a>                                
                                </div>    
                            </div>   

                            

                            <!-- sidebar carousel -->
                            
                            </div>
                        </div> <!-- main-menu -->
                    </aside> <!-- main-navigation -->

                    <div class="content-main contact-content">
                        <div class="contact-content-upper">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="gallery_title">
                                        <h3>ABOUT US</h3>
                                        
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">        
                                    <form class="form-horizontal" method="post" action="#">
                                                    <div class="block-keep-ratio block-keep-ratio-2-1 block-width-full shop">                                    
                                    <a href="index.html" class="block-keep-ratio__content  main-menu-link">
                                        <span class="main-menu-link-text">
                                                
                                        </span>                                        
                                    </a>
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
                    <p class="copyright">Copyright © 2017 OSTAAPP
                    
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
