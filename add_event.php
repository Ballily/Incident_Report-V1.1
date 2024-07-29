<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Add Event</title>
</head>
<body>
  <div class="container">
    <h1>Add Event</h1>

    <form action="add_event_action.php" method="post">
      <input type="text" id="title" name="title" required><br><br>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea><br><br>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required><br><br>

      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required><br><br>

      <label for="department">Concerned:</label>
      <input type="text" id="department" name="department" required><br><br>

      <button type="submit">Add Event</button>
      <a href="index.php" class="button">Return to Homepage</a>
    </form>
  </div>
</body>
</html>
