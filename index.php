<!DOCTYPE html>
<html>
  <head>
    <title>Barangay Management System</title>
  </head>
  <body>
    <table width="100%">
      <tr>
        <td>
          <a href="#">Home</a>
          <a href="#">Contact</a>
          <a href="#">About</a>
        </td>
        <td align="right">
          <a href="#">Log in</a>
          <a href="#">Register</a>
        </td>
      </tr>
    </table>
    
    <h1>Welcome to Barangay Management System</h1>
    
    <section>
      <h2>About Sitio Igiban, Barangay Sta. Cruz, Antipolo City, Rizal</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum mauris vitae eros tincidunt malesuada. Donec auctor arcu ac nisl eleifend, at imperdiet odio cursus. Sed vel purus sit amet ex ultricies aliquet. </p>
      <img src="http://via.placeholder.com/250" alt="Barangay Hall">
    </section>
    
    <section>
      <h2>Barangay Projects</h2>
      <ul>
        <li>Construction of new barangay hall</li>
        <li>Installation of new street lights</li>
        <li>Launching of new waste management program</li>
        <li>Upgrading of barangay health center facilities</li>
        <li>Repair of damaged roads and sidewalks</li>
        <li>Construction of new basketball court</li>
      </ul>
      <img src="http://via.placeholder.com/250" alt="Barangay Projects">
    </section>
    
    <section>
      <h2>Latest News and Updates</h2>
      <?php
        // Include the database configuration
        include('db.php');

        // Retrieve the latest news
        $query = "SELECT * FROM news_events";
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
    </section>
    
  </body>
</html>
