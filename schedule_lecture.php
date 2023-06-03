
<?php
// Get the scheduled lecture details from the form
$subject = $_POST['subject'];
$date = $_POST['date'];
$time = $_POST['time'];

// Combine the date and time into a single datetime string
$scheduledDatetime = $date . ' ' . $time;

// Get the current datetime
$currentDatetime = date('Y-m-d H:i:s');

// Check if the scheduled time is the current time or in the future
if ($scheduledDatetime >= $currentDatetime) {
  // Schedule the lecture and start the live session
  // Add your code here to handle the scheduling and starting of the live session
  echo "Lecture scheduled successfully. Live session will start at the scheduled time.";
} else {
  // Display an error message if the scheduled time is in the past
  echo "Error: Invalid scheduled time. Please choose a time in the future.";
}
?>
