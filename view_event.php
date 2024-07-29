<!DOCTYPE html>
<html lang="th">
<head>
  <link rel="stylesheet" href="style_3.css">
  <meta charset="UTF-8">
  <title>IT Incident Report</title>
  <script>
    function verifyAction(event, correctCode) {
      const userCode = prompt("Please enter the verification code:");
      if (userCode !== correctCode) {
        alert("Incorrect verification code. Action aborted.");
        event.preventDefault();
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('addActionButton').addEventListener('click', function(event) {
        verifyAction(event, 'admin');  // Replace 'admin' with your desired verification code
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <h1>Incident Detail</h1>

    <?php
      include 'db_connection.php';

      $event_id = $_GET['id'];

      // Fetch event details
      $event_sql = "SELECT * FROM events WHERE id = ?";
      $stmt = $conn->prepare($event_sql);
      $stmt->bind_param('i', $event_id);
      $stmt->execute();
      $event_result = $stmt->get_result();

      if ($event_result->num_rows > 0) {
        $event = $event_result->fetch_assoc();
        echo "<h2>{$event['title']}</h2>";
        echo "<p><strong>Description: </strong> {$event['description']}</p>";
        echo "<p><strong>Concerned:</strong> {$event['department']}</p>";
        echo "<p><strong>Date:</strong> {$event['date']}<strong> Time: </strong>{$event['time']}</p>";
        echo "<p>Status: {$event['status']}</p>";
      } else {
        echo "<p>Event not found</p>";
      }

      $stmt->close();
    ?>
  </div>

  <div class="container">
    <h1>Incident Action</h1>

    <?php
      // Fetch sub-events
      $sub_event_sql = "SELECT * FROM sub_events WHERE event_id = ?";
      $stmt = $conn->prepare($sub_event_sql);
      $stmt->bind_param('i', $event_id);
      $stmt->execute();
      $sub_event_result = $stmt->get_result();

      if ($sub_event_result->num_rows > 0) {
        while ($sub_event = $sub_event_result->fetch_assoc()) {
          echo "<div class='sub-event'>
                <p>{$sub_event['description']} - Status: {$sub_event['status']}</p>
              </div>";
        }
      } else {
        echo "<p>No Action</p>";
      }

      $stmt->close();
      $conn->close();
    ?>
    <a href="add_sub_event.php?event_id=<?php echo $event_id; ?>" class="button" id="addActionButton">Action Reporting</a>
    <a href="index.php" class="button">Return to Homepage</a>
  </div>
</body>
</html>
