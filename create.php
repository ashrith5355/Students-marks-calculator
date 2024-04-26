<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the feedback from the table
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

// Display the feedback in an HTML table
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Name</th><th>Email</th><th>Feedback</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No feedback yet.";
}

// Close the database connection
$conn->close();
?>
