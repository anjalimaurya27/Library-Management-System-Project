<?php
include "db.php";

// Insert Code
if (isset($_POST['add_student'])) 
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    

    $query = "INSERT INTO students (name,email) VALUES ( '$name','$email')";
    $result = mysqli_query($conn, $query);

    if($result)
        {
        echo "<script>alert('Add Student Successful');</script>";
    } else {
        echo "<script>alert('Error in registration');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Student | Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", "Segoe UI", Roboto, Arial, sans-serif;
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
      flex-shrink: 0;
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

    /* Main Content */
    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px;
    }

    /* === Add Student Form Card === */
    .card {
      width: min(720px, 86%);
      background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(250,250,250,0.98));
      border-radius: 10px;
      box-shadow: 0 8px 24px rgba(20,20,30,0.08), inset 0 1px 0 rgba(255,255,255,0.6);
      padding: 36px 40px;
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      align-items: center;
      position: fixed;
    }

    .title-area {
      text-align: center;
    }

    .title-area h1 {
      font-size: 24px;
      margin-bottom: 6px;
      color: #111;
      letter-spacing: 0.2px;
    }

    .subtitle {
      font-size: 13px;
      color: #666;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-top: 10px;
    }

    .form-row {
      display: flex;
      gap: 12px;
    }

    @media (max-width: 560px){
      .form-row { flex-direction: column; }
    }

    label {
      display: block;
      font-size: 13px;
      color: #333;
      margin-bottom: 6px;
      font-weight: 600;
    }

    .input {
      width: 100%;
      padding: 10px 12px;
      border-radius: 6px;
      border: 1px solid rgba(100,100,110,0.12);
      background: rgba(250,250,250,0.9);
      outline: none;
      font-size: 14px;
      box-shadow: 0 1px 0 rgba(255,255,255,0.6) inset;
      transition: border-color .18s ease, box-shadow .18s ease, transform .08s ease;
    }

    .input:focus {
      border-color: #f73e10;
      box-shadow: 0 4px 18px rgba(43,140,255,0.12);
      transform: translateY(-1px);
    }

    .small-note {
      font-size: 12px;
      color: #777;
      margin-top: 4px;
    }

    .actions {
      display: flex;
      justify-content: center;
      margin-top: 8px;
    }

    .btn {
      display: inline-block;
      padding: 10px 22px;
      border-radius: 6px;
      background: linear-gradient(180deg,#ff4500,#f75318);
      color: #fff;
      font-weight: 600;
      border: none;
      cursor: pointer;
      box-shadow: 0 6px 18px rgba(30,110,230,0.18);
      transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
      font-size: 14px;
    }

    .btn:active { transform: translateY(1px) scale(.998); }
    .btn:hover { box-shadow: 0 10px 28px rgba(30,110,230,0.20); opacity: 0.98; }

    .required { color: #d23; margin-left: 6px; }

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
      <h2>Admin Dashboard</h2>
      <ul>
        <li><a href="index.html"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href="add_book.php"><i class="fa-solid fa-book"></i> Add Book</a></li>
        <li><a href="book_list/index.php"><i class="fa-solid fa-book-open"></i> Book List</a></li>
        <!-- <li><a class="active"><i class="fa-solid fa-user-graduate"></i> Add Student</a></li> -->
        <!-- <li><a href="student_list/index.php"><i class="fa-solid fa-users-rectangle"></i> Student List</a></li>   -->
        <li><a href="admin_logout/index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="card" role="region" aria-label="Add Student form">
        <div class="title-area">
          <h1>Add New Student</h1>
        </div>

        <form action="" method="POST">
          <div>
            <label for="studentName">Student Name <span class="required">*</span></label>
            <input id="studentName" class="input" type="text" name="name" placeholder="Enter student name" required />
          </div>

          <div>
            <label for="email">Email</label>
            <input id="email" class="input" type="email" name="email" placeholder="student@example.com" />
          </div>

          <div class="actions">
            <button class="btn" type="submit" name="add_student">Add Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
