<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $author_name = $_POST['author_name'];
    $book_link = $_POST['book_link'];

    // Direct update without image
    $sql = "UPDATE books SET title='$title', author_name='$author_name', book_link='$book_link' WHERE id=$id";

    if($conn->query($sql) === TRUE){
        header('Location:index.php'); //redirect back
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
