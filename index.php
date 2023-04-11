<!DOCTYPE html>
<html>
  <head>
    <title>Barangay Management System</title>
    <style>
      /* Set the font family and font size for the entire page */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
      }

      /* Style the navigation links */
      nav a {
        display: inline-block;
        margin-right: 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
      }

      nav a:hover {
        color: #666;
      }

      /* Style the login and registration links */
      .user-links a {
        display: inline-block;
        margin-left: 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
      }

      .user-links a:hover {
        color: #666;
      }

      /* Style the section headings */
      section h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 24px;
      }

      /* Style the section content */
      section p {
        line-height: 1.5;
        margin-bottom: 20px;
      }

      section ul {
        list-style: none;
        margin: 0;
        padding: 0;
        margin-bottom: 20px;
      }

      section li {
        margin-bottom: 10px;
      }

      section img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: auto;
      }
    </style>
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
          <a href="Registration/login.php">Log in</a>
          <a href="Registration/register.php">Register</a>
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
