<?php
include 'db.php';

if (isset($_GET['id']))
{
    $id = intval($_GET['id']);
    $sql = "DELETE FROM books WHERE id=$id";
    $conn->query($sql);
    echo "<script>alert('Data Deleted Successfuly!!')</script>";
}
header('Location:index.php'); //redirect back
$conn->close();
?>