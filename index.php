<?php 
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Manager</title>
  <link rel="stylesheet" href="style.css">
  <script defer src="script.js"></script>
</head>
<body>
  <div class="container">
    <h2>Contact Management System</h2>

    <!-- Add Contact Form -->
    <form action="add_contact.php" method="POST">
      <input type="text" name="name" placeholder="Enter Name" required>
      <input type="email" name="email" placeholder="Enter Email" required>
      <input type="text" name="phone" placeholder="Enter Phone Number" required>
      <button type="submit">Add Contact</button>
    </form>

    <!-- Search Form -->
    <form class="search-form" action="search_contact.php" method="GET">
      <input type="text" name="query" placeholder="Search by Name or Email" required>
      <button type="submit">Search</button>
    </form>

    <h3>Contact List</h3>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
      <?php
      // Fetch contacts from the database and display them
      $sql = "SELECT * FROM contacts";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['name']}</td>
                      <td>{$row['email']}</td>
                      <td>{$row['phone']}</td>
                      <td>
                        <a href='edit_contact.php?id={$row['id']}'>Edit</a> | 
                        <a href='delete_contact.php?id={$row['id']}' class='delete-link'>Delete</a>
                      </td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No contacts found</td></tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
