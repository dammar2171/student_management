<?php
include '../includes/db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Student deleted successfully!";
    header("Location: ../index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
