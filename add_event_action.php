<?php
// Include database connection file
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $department = $_POST['department'];

  // Prepare the SQL statement
  $sql = "INSERT INTO events (title, description, date, time, department, status) VALUES (?, ?, ?, ?, ?, 'active')";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssss', $title, $description, $date, $time, $department);

  // Execute the statement
  if ($stmt->execute()) {
    // Redirect to homepage or another page
    header('Location: index.php');
    exit();
  } else {
    // Handle errors (optional)
    echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>
