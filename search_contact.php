<?php
include 'db.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM contacts WHERE name LIKE '%$query%' OR email LIKE '%$query%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Search Results</h2>
    <a href="index.php" class="back-link">Back to Contacts</a>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
      <?php
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

