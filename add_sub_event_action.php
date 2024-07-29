<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $event_id = $_POST['event_id'];
  $description = $_POST['description'];
  $status = $_POST['status']; // เพิ่มการรับค่าสถานะ Status จากฟอร์ม

  $sql = "INSERT INTO sub_events (event_id, description, status) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('iss', $event_id, $description, $status);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  header('Location: view_event.php?id=' . $event_id);
}
?>
