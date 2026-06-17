<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$user_email = $_SESSION['email'];

// --- FETCH USER DATA ---
$query = "SELECT * FROM users WHERE email = '$user_email'";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("<h2>User not found!</h2>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    body {
      font-family: "Poppins", sans-serif;
      background: #f5a957;
      padding: 30px;
      overflow-y: auto;
    }
    .dashboard {
      display: flex;
      min-height: 100vh;
      padding: 20px;
    }
    .profile-card {
      width: 400px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      text-align: center;
    }
    .profile-card h2 {
      color: #f73e10;
      margin-bottom: 20px;
    }
    .profile-card p {
      font-size: 18px;
      margin: 10px 0;
    }
    .icon {
      font-size: 70px;
      color: #3c1518;
      margin-bottom: 20px;
    }
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
    .sidebar ul li a i {
      margin-right: 10px;
    }
    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #f73e10;
      font-weight: bold;
      transform: translateX(5px);
    }
  </style>
</head>
<body>
<div class="dashboard">
     <div class="sidebar">
      <h2>User Dashboard</h2>
      <ul>
        <li><a href="index.html"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a class="active"><i class="fa-solid fa-user-graduate"></i> Profile</a></li>
        <li><a href="book_list.php"><i class="fa-solid fa-book-open"></i> Book List</a></li>    
        <li><a href="user_logout/index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      </ul>
    </div>

<div class="profile-card">
    <i class="fa-solid fa-circle-user icon"></i>
    <h2>Profile</h2>

    <p><strong>Name:</strong> 
       <?php echo $user['first_name'] . " " . $user['last_name']; ?>
    </p>

    <p><strong>Email:</strong> 
       <?php echo $user['email']; ?>
    </p>

</div>
</div>

</body>
</html>
