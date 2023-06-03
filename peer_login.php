
<!DOCTYPE html>
<html>
<head>
    <title>Peer Login Page</title>
    <script>
    function login() {
      // Perform login logic here
      alert("Login button clicked!");
    }
    
    // function register() {
    //   // Perform register logic here
    //   alert("Register button clicked!");
    // }
  </script>
    <link rel="stylesheet" type="text/css" href="student_styles.css">
</head>
<body><?php 
session_start();
if(isset($_SESSION["email"])){

}
include("connect.php");
include("peer_engine.php");
 ?>

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Peer Login</h3><hr><br><br>
  <form action="peer.html" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <!-- <div class="form-group">
      <a href="forgot-password.php">Lost your Password ? </a> 
    </div> -->
    <center>
    <input type="submit" id="submit" name="peer_login" class="btn btn-primary btn-block" value="Login" onclick="login()">
  </center>
  </form>
</div>