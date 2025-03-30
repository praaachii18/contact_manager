<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Contact deleted successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error deleting contact: " . $conn->error;
    }
}
?>
