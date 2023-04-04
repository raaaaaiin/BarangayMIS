<!DOCTYPE html>
<html>
  <head>
    <title>Barangay Management System</title>
  </head>
  <body>
    <h1>Welcome to Barangay Management System</h1>
    <p>This system is designed to help manage the activities and information of our barangay. Please login to access the system.</p>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"><br>
      <input type="submit" value="Login">
    </form>
    
    <h2>Latest News and Updates</h2>
    <?php
      // Include the database configuration
      include('db.php');

      // Retrieve the latest news
      $query = "SELECT * FROM news_events WHERE type='news' ORDER BY date DESC LIMIT 5";
      $result = mysqli_query($conn, $query);

      // Display the news as a list
      echo "<ul>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><strong>" . $row['title'] . "</strong> - " . $row['description'] . "</li>";
      }
      echo "</ul>";

      // Close the database connection
      mysqli_close($conn);
    ?>
    
    <p>Note: The latest news is updated every few days.</p>
  </body>
</html>
