<!DOCTYPE html>
<html>
<head>
    <title>My Page</title>
    <link rel="stylesheet" type="text/css" href="student_styles.css">
</head>
<body><?php 
session_start();
if(isset($_SESSION["email"])){

}
include("connect.php");
include("student_engine.php");
 ?>

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Student Login</h3><hr><br><br>
  <form action="courses.html" method="POST">
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
    <center><input type="submit" id="submit" name="student_login" class="btn btn-primary btn-block" value="Login"></center>
  </form>
</div>