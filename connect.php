<?php
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db_name = "hackathon";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn-> error);
 

 ?>