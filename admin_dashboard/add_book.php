<?php
include "db.php";

// Insert Code
if (isset($_POST['add_book'])) 
{
    $title = $_POST['title'];
    $author_name = $_POST['author_name'];
    $book_link = $_POST['book_link'];


    $query = "INSERT INTO books (title, author_name, book_link) 
              VALUES ('$title','$author_name','$book_link')";

    $result = mysqli_query($conn, $query);

    if($result) {
        echo "<script>alert('Book Added Successfully');</script>";
    } else {
        echo "<script>alert('Error in Adding Book');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Book | Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #f5a957;
      overflow-y: auto;
    }

    .dashboard {
      display: flex;
      min-height: 100vh;
      padding: 20px;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #3c1518;
      color: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.3);
      margin-right: 20px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 22px;
      border-bottom: 2px solid #f73e10;
      padding-bottom: 10px;
      color: #f73e10;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 10px;
      border-radius: 5px;
      transition: background 0.3s, transform 0.2s;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #f73e10;
      font-weight: bold;
      transform: translateX(5px);
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .card-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      text-align: left;
      position: fixed;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }
    
    form {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
      margin-left: 180px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      font-size: 16px;
      color: #333;
    }

    input::placeholder {
      color: #aaa;
    }

    .add-button {
      width: 100%;
      padding: 12px;
      background-color: #ff4500;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .add-button:hover {
      background-color: #ee561f;
    }
  </style>
</head>
<body>
  <div class="dashboard">

    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Admin Dashboard</h2>
      <ul>
        <li><a href="index.html"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a class="active"><i class="fa-solid fa-book"></i> Add Book</a></li>
        <li><a href="book_list/index.php"><i class="fa-solid fa-book-open"></i> Book List</a></li>
        <li><a href="admin_logout/index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Add Book Form -->
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="card-container">
        <h2>Add New Book</h2>

        <div class="form-group">
          <label>Book Title:</label>
          <input type="text" placeholder="Enter book title" name="title" required>
        </div>

        <div class="form-group">
          <label>Author Name:</label>
          <input type="text" placeholder="Enter author name" name="author_name" required>
        </div>

        <div class="form-group">
          <label>Book Link (URL):</label>
          <input type="text" placeholder="Enter book link" name="book_link">
        </div>
<!-- 
        <div class="form-group">
          <label>Book Image:</label>
          <input type="file" name="book_image" accept="image/*" required>
        </div> -->

        <button class="add-button" name="add_book">Add Book</button>
      </div>
    </form>

  </div>
</body>
</html>
