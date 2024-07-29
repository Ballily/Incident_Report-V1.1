<!DOCTYPE html>
<html lang="th">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Add Event Action</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
    }
    .container h1 {
      margin-bottom: 20px;
    }
    .container form {
      display: flex;
      flex-direction: column;
    }
    .container form label {
      margin-bottom: 5px;
    }
    .container form textarea, .container form select, .container form input {
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .container form button {
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .container form button:hover {
      background-color: #218838;
    }
    .container a.button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 10px;
    }
    .container a.button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Add Event Action</h1>

    <form action="add_sub_event_action.php" method="post">
      <input type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>">
      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea><br><br>
      <label for="status">Status:</label>
      <select id="status" name="status">
        <option value="onProgress">onProgress</option>
        <option value="completed">Completed</option>
      </select><br><br>
      <button type="submit">Add Event Action</button>
    </form>

    <a href="view_event.php?id=<?php echo $_GET['event_id']; ?>" class="button">Return to Homepage</a>
  </div>
</body>
</html>
