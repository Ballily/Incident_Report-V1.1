<!DOCTYPE html>
<html lang="th">
<head>
  <link rel="stylesheet" href="style_2.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT Incident Report</title>
  <style>
    .container a.button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 10px;
    }
    .button-container-center {
      display: flex;
      justify-content: center; /* จัดตรงกลาง */
      align-items: center; /* จัดตรงกลาง */
      gap: 20px;
      margin-top: 20px;
    }

    .button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }

    .button:hover {
      background-color: #0056b3;
    }
      
      
  </style>
  <script>
    function verifyAction(event, correctCode) {
      const userCode = prompt("Please enter the verification code:");
      if (userCode !== correctCode) {
        alert("Incorrect verification code. Action aborted.");
        event.preventDefault();
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('addEventButton').addEventListener('click', function(event) {
        verifyAction(event, 'admin');  // Replace 'admin' with your desired verification code
      });

      document.querySelectorAll('.complete-button').forEach(button => {
        button.addEventListener('click', function(event) {
          verifyAction(event, 'admin');  // Replace 'admin' with your desired verification code
        });
      });
    });
  </script>
  
</head>
<body>
  <div class="container1">
    <img src="logo-GLPI-250-black.png" alt="Your Logo" class="logo">
    <h1>IT Incident Report</h1>
    <div class="container">
      <h2>Incident on Progress</h2>
      <?php
        include 'db_connection.php';

        $sql = "SELECT * FROM events WHERE status = 'active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='event'>
                    <div class='event-detail'>
                      <p><strong>Incident Name:</strong> {$row['title']}</p>
                      <p><strong>Description:</strong> {$row['description']}</p>
                      <p><strong>Date:</strong> {$row['date']}</p>
                      <p><strong>Time:</strong> {$row['time']}</p>
                      <p><strong>Concerned:</strong> {$row['department']}</p>
                      <form action='complete_event.php' method='post' class='inline-form'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <a href='view_event.php?id={$row['id']}' class='button view-button'>View Detail</a>
                        <button type='submit' class='button complete-button'>Complete</button>
                      </form>
                    </div>
                  </div>";
          }
        } else {
          echo "<p class='no-events'>NORMALCY</p>";
        }

        $conn->close();
      ?>
    </div>
    <div class="button-container-center">
      <a href="add_event.php" class="button" id="addEventButton">New Reporting</a>
      <a href="event_completed.php" class="button">Completed Incident Report</a>
    </div>
    <footer class="footer">
      <p>Copyright 2023 ©, V. 1.0.0 Created by IT TBZ</p>
    </footer>
  </div>
</body>
</html>
