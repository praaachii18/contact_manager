<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM contacts WHERE id=$id");
    $contact = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE contacts SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Contact updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error updating contact: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Contact</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Contact</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
      <input type="text" name="name" value="<?php echo $contact['name']; ?>" required>
      <input type="email" name="email" value="<?php echo $contact['email']; ?>" required>
      <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" required>
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
