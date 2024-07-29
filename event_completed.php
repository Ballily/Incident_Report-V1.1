<!DOCTYPE html>
<html lang="th">
<head>
  <link rel="stylesheet" href="style_2.css">
  <meta charset="UTF-8">
  <title>Complete Event</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .button.view-button {
      display: inline-block;
      padding: 8px 16px;
      margin: 4px 2px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .button.view-button:hover {
      background-color: #45a049;
    }
    .no-events {
      text-align: center;
      margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container1">
    <h1>Complete Event</h1>

    <?php
      include 'db_connection.php';

      $sql = "SELECT * FROM events WHERE status = 'completed'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>Event Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['title']}</td>
                  <td>{$row['description']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['time']}</td>
                  <td><a href='view_event.php?id={$row['id']}' class='button view-button'>View Detail</a></td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "<p class='no-events'>ไม่มีกิจกรรมที่จบแล้ว</p>";
      }

      $conn->close();
    ?>

    <div class="button-container-center">
      <a href="index.php" class="button">Return to Homepage</a>
    </div>
  </div>
</body>
</html>
