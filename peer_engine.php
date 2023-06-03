<?php 

$peer_id='';
$full_name='';
$email='';
$password='';
$phone_no='';
$address='';
$id_type='';
$id_photo='';

$errors=array();

$db = new mysqli('localhost','root','','hackathon');

if($db->connect_error){
	echo "Error connecting database";
}


if(isset($_POST['peer_register'])){
	peer_register();
}

if(isset($_POST['peer_login'])){
	peer_login();
}

if(isset($_POST['peer_update'])){
	peer_update();
}

function peer_register(){
	if(isset($_FILES['id_photo']))
	{
$id_photo='peer-photo/'.$_FILES['id_photo']['name'];

// echo $_FILES['image']['name'].'<br>';

if(!empty($_FILES['id_photo'])){
    $path = "peer-photo/";
    $path=$path. basename($_FILES['id_photo']['name']);
        if(move_uploaded_file($_FILES['id_photo']['tmp_name'], $path))
        {
            echo"The file ". basename($_FILES['id_photo']['name']). " has been uploaded";
        }

        else{
            echo "There was an error uploading the file, please try again!";
        }
}

	}
	global $peer_id,$full_name,$email,$password,$phone_no,$address,$id_type,$id_photo,$errors,$db;
	$peer_id=validate($_POST['peer_id']);
	$full_name=validate($_POST['full_name']);
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$phone_no=validate($_POST['phone_no']);
	$address=validate($_POST['address']);
	$id_type=validate($_POST['id_type']);
	$id_photo=$_POST['id_photo'];
	$password = md5($password); // Encrypt password
		$sql = "INSERT INTO peer(peer_id,full_name,email,password,phone_no,address,id_type,id_photo) VALUES('$peer_id','$full_name','$email','$password','$phone_no','$address','$id_type','$path')";
		if($db->query($sql)===TRUE){
			header("location:peer_register.php");
	}
}



function peer_login(){
	global $email,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);

		$password = md5($password); 
		$sql = "SELECT * FROM peer where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:index.php');


		}
		else{

?>

<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or not registered.</strong> Click here to <a href="peer_register.php" style="color: lightblue;"><b>Register</b></a>.
</div></div>



<?php
		}
}

function peer_update(){
	global $owner_id,$full_name,$email,$password,$phone_no,$address,$id_type,$id_photo,$errors,$db;
	$peer_id=validate($_POST['peer_id']);
	$full_name=validate($_POST['full_name']);
	$email=validate($_POST['email']);
	$phone_no=validate($_POST['phone_no']);
	$address=validate($_POST['address']);
	$id_type=validate($_POST['id_type']);
	$password = md5($password); // Encrypt password
		$sql = "UPDATE peer SET full_name='$full_name',email='$email',phone_no='$phone_no',address='$address',id_type='$id_type' WHERE peer_id='$peer_id'";
		$query=mysqli_query($db,$sql);
		if(!empty($query)){
			?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert" role='alert'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <center><strong>Your Information has been updated.</strong></center>
</div></div>


<?php
	}
}


function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



 ?>
 </html>
</body>