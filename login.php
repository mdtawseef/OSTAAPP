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
  header('location: index.php');
  echo "Hi " . $username . "";
  echo "This is the Members Area ";
  echo "<a href='logout.php'>Logout</a>";
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.

?>
  <!DOCTYPE HTML >
  <html>
    <head>
      <title>Login in PHP & MySQL</title>
      
      <!-- Latest compiled and minified CSS //bootstrap cdn template theme-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      
      <!-- Latest compiled and minified JavaScript //link to an external style sheet -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      
      <link rel="stylesheet" type="text/css" href="styles.css">  
    </head>
    <body>
    <div class="container">
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
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
    </div>
    </body>
  </html>
<?php } ?>