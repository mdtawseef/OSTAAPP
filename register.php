<?php
require_once('connect.php');
//print_r($_POST); //this is to see if we are actually getting the data
// If the values are posted, insert them into the database.
if(isset($_POST) && !empty($_POST)){
  echo $username = mysqli_real_escape_string($connection, $_POST['username']);
  echo $email = mysqli_real_escape_string($connection, $_POST['email']);
  echo $password = md5($_POST['password']);
  
  echo $sql = "INSERT INTO `User_tbl` (username, email, password) VALUES ('$username', '$email', '$password')";
  $result = mysqli_query($connection, $sql);
  if($result){
    $smsg = "User Registration successfull";
  }else{
    $fmsg = "User registration failed";
  }
}

?>
<!DOCTYPE HTML >
<html>
  <head>
    <title>User Registration PHP & MySQL</title>
    
    <!-- Latest compiled and minified CSS //bootstrap cdn template theme-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    
    <!-- Latest compiled and minified JavaScript //link to an external style sheet -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    
    <link rel="stylesheet" type="text/css" href="styles.css">  
  </head>
  <body>
  <div class="container">
    <!-- Display status message -->
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
    <?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
    <?php } ?>
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Please Register</h2>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <label for="inputEmail" class="se-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
    </form>
  </div>
  </body>
</html>