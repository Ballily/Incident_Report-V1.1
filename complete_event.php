<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $sql = "UPDATE events SET status = 'completed' WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  header('Location: index.php');
}
?>
