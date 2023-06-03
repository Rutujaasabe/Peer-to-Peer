<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get input values
  $courseName = $_POST['course-name'];
  $courseDescription = $_POST['course-description'];
  $courseDuration = $_POST['course-duration'];
  $demoVideo = $_FILES['demo-video']['name']; // Get the filename of the selected file

  // Move the uploaded file to a desired location
  $targetDirectory = "uploads/"; // Change this to the desired directory path
  $targetFile = $targetDirectory . basename($demoVideo);
  move_uploaded_file($_FILES['demo-video']['tmp_name'], $targetFile);

  // Connect to the database
  $servername = "localhost"; // Change this if your database server is different
  $username = "root"; // Change this if your MySQL username is different
  $password = ""; // Change this if your MySQL password is different
  $database = "hackathon"; // Replace with your actual database name

  // Create a connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert the course data into the database
  $sql = "INSERT INTO courses (name, description, duration, video) VALUES ('$courseName', '$courseDescription', '$courseDuration', '$demoVideo')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to the next page after successful registration
    header("Location: home.html");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
