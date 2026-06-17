<?php
// Database connection
include 'db.php';

// Fetch books
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
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
      margin: 20px 0; /* vertical spacing between items */
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

    .sidebar ul li a i {
      margin-right: 15px; /* space between icon and text */
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #f73e10;
      font-weight: bold;
      transform: translateX(5px);
    }

    /* Main Section */
    .main-section {
      flex: 1;
      padding: 10px;
    }

    .container {
      width: 95%;
      margin: auto;
      padding-top: 10px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #000;
    }

    .books-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
    }

    .book-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      padding: 15px;
      text-align: center;
      transition: transform 0.2s;
    }

    .book-card:hover {
      transform: translateY(-5px);
    }

    .book-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 6px;
      margin-bottom: 10px;
    }

    .book-title {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 5px;
    }

    .author {
      color: #666;
      margin-bottom: 15px;
    }

    .btn {
      background: #ff7b00ff;
      padding: 8px 14px;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    .btn:hover {
      background: #db6c12ff;
    }

    @media (max-width: 768px) {
      .dashboard {
        flex-direction: column;
      }
      .sidebar {
        width: 100%;
        margin-right: 0;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

<div class="dashboard">

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>User Dashboard</h2>
    <ul>
      <li><a href="index.html"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
      <li><a href="profile.php"><i class="fa-solid fa-user-graduate"></i> Profile</a></li>
      <li><a class="active"><i class="fa-solid fa-book-open"></i> Book List</a></li>
      <li><a href="user_logout/index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-section">
    <div class="container">
      <h1>Available Books</h1>

      <div class="books-grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

          <div class="book-card">
            
              <!-- Book Image from database -->


              <div class="book-title"><?php echo $row['title']; ?></div>

              <div class="author">Author: <?php echo $row['author_name']; ?></div>

              <!-- Borrow button = open book link in new tab -->
              <a href="<?php echo $row['book_link']; ?>" target="_blank" class="btn">Read </a>

          </div>

        <?php } ?>

      </div>
    </div>
  </div>

</div>
0
</body>
</html>
